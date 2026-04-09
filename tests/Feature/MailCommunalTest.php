<?php

namespace Tests\Feature;

use Tests\TestCase;
use Carbon\Carbon;

class MailCommunalTest extends TestCase
{
    /** @test */
    public function it_fetches_real_data_from_db_for_april()
    {
        // 1. Прикидываемся, что сейчас Апрель 2026 года
        // (чтобы массив месяцев был [1, 2, 3])
        Carbon::setTestNow(Carbon::create(2026, 4, 15));

        // 2. Стучимся в твой боевой роут
        $response = $this->getJson('/budget/mail/communal/result?key=21052023');

        // 3. Смотрим, что ответил сервер
        // Если в базе есть записи за 2026 год с месяцами 1, 2 или 3 и статусом 2 или 3
        $response->assertStatus(200)
                 ->assertJsonIsArray();
        
        // Давай выведем результат в консоль, чтобы убедиться, что данные пришли
        dump($response->json());
    }

    /** @test */
    public function it_returns_500_in_january_even_with_data()
    {
        // В январе массив месяцев будет [], и код должен выкинуть 500
        Carbon::setTestNow(Carbon::create(2026, 1, 10));

        $response = $this->getJson('/budget/mail/communal/result?key=21052023');

        $response->assertStatus(500);
    }
}
