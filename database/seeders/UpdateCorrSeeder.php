<?php

namespace Database\Seeders;

use App\Modules\DeloSection\Models\Correspondent;
use Illuminate\Database\Seeder;

class UpdateCorrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Correspondent::where('status', 0)
            ->update([                
                'status' => 10,
            ]);
    }       
}