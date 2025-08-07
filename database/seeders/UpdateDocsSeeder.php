<?php

namespace Database\Seeders;

use App\Modules\DeloSection\Models\Document;
use Illuminate\Database\Seeder;

class UpdateDocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::where('status', 0)
            ->update([                
                'status' => 10,
            ]);
    }       
}

