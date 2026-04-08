<?php

namespace App\Modules\MailSection\Actions;

use App\Core\Actions\BaseAction;
use Illuminate\Support\Facades\Mail;

class MailSendAction extends BaseAction
{      
    /**
     * Отправляем письмо
     * $recipients 'список адресов, куда отправить'
     * $subject 'тема письма'
     * $template 'путь к шаблону blade'
     * $data 'массив с информацией для шаблона blade'
     *
     * @param array $recipients, string $subject, string $template, array $data
     */
    public function sendMail(array $recipients, string $subject, string $template, array $data)
    {   
        Mail::send($template, $data, function($message) use ($recipients, $subject) {
        $message->to($recipients)
                ->subject($subject);
        
        // Адрес отправителя подтянется из .env (MAIL_FROM_ADDRESS),
        // но если нужно переопределить прямо в коде:
        // $message->from('portal@domen.ru', 'Корпоративный портал');
    });

    } 
}

