<?php

namespace Database\Seeders;

use App\Modules\OfsSection\Admin\Models\Coordinator;
use Illuminate\Database\Seeder;

class CreateCoordinatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //id из таблицы users
        $users = [
            3, 4, 5, 7, 8,
            9, 10, 13, 15,
            16, 17, 18, 19, 21, 21,
            23, 25, 26, 27, 28, 29
            ];
        
        foreach ($users as $user) {
            Coordinator::create([
                'user_id' => $user,
                'mounth'  => 1,
                'date'    => date('Y-m-d'),                             
            ]);                                        
        }
    }       
}
