<?php

namespace App\Modules\MailSection\Actions;

use App\Core\Actions\BaseAction;

class WorkAction extends BaseAction
{      
    /**
     * Получаем массив месяцев и год
     *
     * @return array
     */
    public function getDate(): array
    {   
        $now = now();
        $limitMonth = ($now->day < 18) ? $now->month - 2 : $now->month - 1;
        $months = ($limitMonth >= 1) ? range(1, $limitMonth) : [];
        $year = now()->year; 
        return ['months' => $months, 'year' => $year];
    } 
    
    /**
     * Получаем информацию для
     * шаблона администратора
     *
     * @return array
     */
    public function getInfoForAdmin(): array
    {   
        return [
            'recipients'       => ['finanse@kostamail.ru'],
            'subject'          => 'Отчет по коммунальным услугам',
            'template'         => 'mail.communal.result',
            'name_months'      => ['1' => 'январь', '2' => 'февраль', '3' => 'март', '4' => 'апрель', '5' => 'май', 
            '6' => 'июнь', '7' => 'июль', '8' => 'август', '9' => 'сентябрь', '10' => 'октябрь', '11' => 'ноябрь', '12' => 'декабрь'],
            'status'           => ['2' => 'информация не отправлена', '3' => 'запрос редактирования'],
        ];
    } 
}

