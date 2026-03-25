<?php

namespace App\Modules\Ofs26Section\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\Ofs26Section\User\Exports\ExportTable;
use App\Modules\Ofs26Section\User\Actions\SelectInfoAction;
use App\Modules\Ofs26Section\User\Actions\CalculateInfoAction;
use App\Modules\Ofs26Section\User\Actions\UpdateInfoAction;
use App\Modules\Ofs26Section\User\Requests\UpdateOfsRequest;
use App\Modules\Ofs26Section\User\Requests\SynchOfsRequest;
use App\Modules\Ofs26Section\User\Dto\UpdateOfsDto;
use App\Modules\Ofs26Section\User\Dto\SynchOfsDto;

class Ofs26UserController extends Controller
{   
    private array $mounth = ['null', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
    private array $chapter = ['null', 'МБ МЗ(МБ)', 'МБ ИЦ', 'РК МЗ(РК)', 'РК ИЦ', 'ПД'];
    
     /**
     * Front отрисовка страницы
     *
     * @param Request $request
     * @return View
     */
    public function FrontView(Request $request): View
    {      
        $info = [
            'user'    => $request->user ?? null,
            'chapter' => $request->chapter ?? null,
            'mounth'  => $request->mounth ?? null,
            'email'   => Auth::user()->email(),
            'role'    => Auth::user()->role(),
        ];

        return view('ofs26.user.work', compact('info'));  
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param Request $request
     * @return View
     */
    public function ShowTable(Request $request): View
    {  
        // 1. Сразу выходим, если юзера нет
        if (!$request->user) {
            return view('ofs26.user.templates.table', ['info' => ['status' => false]]);
        }

        // 2. Если дошли сюда, значит юзер есть — работаем спокойно
        $ofs = $this->action(SelectInfoAction::class)
            ->SelectInfo($request->user, $request->mounth, $request->chapter);

        // 3. Лаконично определяем статус структуры
        $isSingleChapter = count($request->chapter) === 1;
        $structure = ($isSingleChapter && ($ofs[0]['status'] ?? null) == 2) ? 'open' : 'close';

        $info = [
            'status'    => true,
            'ofs'       => $ofs,
            'structure' => $structure,
            'chapter'   => $this->chapter,
            'chapters'  => $request->chapter,
            'mounth'    => $this->mounth,
            'total'     => $this->action(CalculateInfoAction::class)->SelectTotal($ofs),
        ];

        return view('ofs26.user.templates.table', compact('info'));    
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param UpdateOfsRequest $request
     * @return JsonResponse
     */
    public function UpdateOfs(UpdateOfsRequest $request): JsonResponse
    {  
        $dto = UpdateOfsDto::fromRequest($request);   
        $result = $this->action(UpdateInfoAction::class)->UpdateOfs($dto);
        return $result 
            ? response()->json(null, 204) 
            : response()->json(null, 500);
    }
    
    /**
     * Синхронизация ОФС
     *
     * @param SynchOfsRequest $request
     * @return JsonResponse
     */
    public function SynchOfs(SynchOfsRequest $request): JsonResponse
    {  
        $dto = SynchOfsDto::fromRequest($request); 

        // 1. Сначала отсекаем 2025 год (или 1 месяц)
        if ($dto->mounth === 1) {
            return response()->json(['message' => 'Синхронизация с 2025 годом невозможна!'], 400);
        }

        // 2. Проверяем количество разделов
        if (count($dto->chapter) !== 1) {
            return response()->json(['message' => 'Выберите ровно один раздел!'], 422);
        }

        // 3. Если дошли сюда — всё хорошо, работаем
        $this->action(UpdateInfoAction::class)->synchOfs($dto);

        return response()->json(['message' => 'Синхронизация выполнена!']);
    }
    
    /**
     * Меняем статус
     *
     * @param SynchOfsRequest $request
     * @return JsonResponse
     */
    public function CloseOfs(SynchOfsRequest $request): JsonResponse
    {  
        $dto = SynchOfsDto::fromRequest($request); 

        // Проверка бизнес-логики
        if ($this->action(CalculateInfoAction::class)->hasErrors($dto)) {
            return response()->json(['message' => 'В таблицах присутствуют ошибки!'], 422);
        }

        if (count($dto->chapter) !== 1) {
            return response()->json(['message' => 'Выберите ровно один раздел!'], 422);
        }

        $isUpdated = $this->action(UpdateInfoAction::class)->updateStatus($dto);

        return $isUpdated 
            ? response()->json(['message' => 'Таблица закрыта!'])
            : response()->json(['message' => 'Таблица уже была закрыта ранее!'], 400);
    }
    
    /**
     * Выгрузка таблицы в EXCEL
     * 
     * @param SynchOfsRequest $request
     * @return Excel
     */
    public function ExportTable(SynchOfsRequest $request)
    {
        $dto = SynchOfsDto::fromRequest($request); 
        $ofs = $this->action(SelectInfoAction::class)->SelectInfo($dto->user_id, $dto->mounth, $dto->chapter);
        $data = [
            'ofs'   => $ofs,
            'total' => $this->action(CalculateInfoAction::class)->SelectTotal($ofs),
        ];
        return Excel::download(new ExportTable($data), 'table.xlsx');
    }
    
     /**
     * Front отрисовка страницы
     * Полноэкранный режим таблицы
     *
     * @param SynchOfsRequest $request
     * @return View
     */
    public function FullScreen(SynchOfsRequest $request): View
    {      
        $dto = SynchOfsDto::fromRequest($request); 
        $info = [
            'user'    => $dto->user_id,
            'chapter' => $dto->chapter,
            'mounth'  => $dto->mounth,
            'email'   => Auth::user()->email(),
            'role'    => Auth::user()->role(),
        ];

        return view('ofs26.user.fullscreen', compact('info'));   
    }

}



