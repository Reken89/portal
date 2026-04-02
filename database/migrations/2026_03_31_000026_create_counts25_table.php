<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounts25Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counts25', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('ekr_id');
            $table->integer('year');
            $table->integer('status');
            $table->decimal('sum_fu', 15, 2);
            $table->decimal('sum_cb', 15, 2);
            $table->date('date_fu');
            $table->date('date_cb');
            
            // Добавляем групповой индекс
            $table->index(['user_id', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counts25');
    }
}

