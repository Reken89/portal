<?php

namespace App\Modules\MailSection\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Core\Controllers\Controller;
use App\Modules\MailSection\Actions\MailSendAction;

class MailTestController extends Controller
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
    public function sendTest(Request $request)
    {  
        $recipients = ['finanse@kostamail.ru'];
        $subject = 'Проверка связи';
        $template = 'mail.test.start';
        $data = ['user_name' => 'kostamail'];
        $this->action(MailSendAction::class)->sendMail($recipients, $subject, $template, $data);             
    }
}
