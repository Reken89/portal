<?php

namespace App\Modules\MailSection\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Core\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Modules\MailSection\Actions\SelectCommunalAction;
use App\Modules\MailSection\Actions\MailSendAction;
use App\Modules\MailSection\Actions\WorkAction;

class MailCommunalController extends Controller
{      
     /**
     * Показать шаблон
     *
     * @param Request $request
     * @return View
     */
    public function showView(Request $request): View
    {    
        return view('mail.test.start', ['title' => 'Тест', 'user_name' => 'kostamail', 'items' => []]);        
    }
    
     /**
     * Тестовая отправка письма
     *
     * @param Request $request
     */
    public function sendResult(Request $request): JsonResponse
    {  
        if ($request->get('key') !== '21052023') {
            return response()->json(['error' => 'Unauthorized'], 401); 
        }
        
        $date = $this->action(WorkAction::class)->getDate();

        if (empty($date['months'])) {
            return response()->json(null, 500);
        }
        
        $data = $this->action(SelectCommunalAction::class)->selectInfo($date['months'], $date['year']); 
        
        if (empty($data)) {
            return response()->json(null, 500);
        }
        
        $info = $this->action(WorkAction::class)->getInfoForAdmin();

        $this->action(MailSendAction::class)->sendMail($info['recipients'], $info['subject'], $info['template'], 
                ['items' => $data, 'name_months' => $info['name_months'], 'status' => $info['status']]); 
        

        $info_user = $this->action(WorkAction::class)->getInfoForUser();
        
        foreach ($data as $item) {
            $this->action(MailSendAction::class)->sendMail([$item['user']['email']], $info_user['subject'], $info_user['template'], 
                ['year' => $item['year'], 'name_months' => $info_user['name_months'], 'month' => $item['mounth']]); 
        }
        
        return response()->json($data, 200);
    }
}

