<?php

namespace Database\Seeders;

use App\Modules\DeloSection\Models\Document;
use Illuminate\Database\Seeder;

class AddDocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::insert([
            [
                'number'           => 0,
                'npa_id'           => 6,
                'correspondent_id' => 4,
                'date'             => date('Y-m-d'),
                'user_id'          => 39,
                'content'          => "Тестовое письмо ДСП",
                'author'           => "Подскальнюк Р.В.",
                'type'             => "dspout",
                'status'           => 10,
            ],
            [
                'number'           => 0,
                'npa_id'           => 6,
                'correspondent_id' => 4,
                'date'             => date('Y-m-d'),
                'user_id'          => 39,
                'content'          => "Тестовое письмо ДСП",
                'author'           => "Подскальнюк Р.В.",
                'type'             => "dspin",
                'status'           => 10,
            ],
        ]);
    }       
}