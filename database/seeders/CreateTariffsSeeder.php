<?php

namespace Database\Seeders;

use App\Modules\UtilitiesSection\Admin\Models\Tarif;
use Illuminate\Database\Seeder;

class CreateTariffsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Названия услуг
        $title = ['heat', 'water', 'drainage', 'power', 'trash', 'negative'];
                
        //Добавляем значения в таблицу communal
        foreach ($title as $type) {
            for ($mounth = 1; $mounth < 13; $mounth++){
                Tarif::create([
                    'year'      => 2026,
                    'mounth'    => $mounth,
                    'tarif_min' => 1,
                    'tarif_max' => 1,
                    'title'     => $type,                   
                    'date'      => date('Y-m-d'),
                ]);               
            }                                             
        }
    }       
}

