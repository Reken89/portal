<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfs26Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofs26', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('ekr_id');
            $table->integer('mounth');
            $table->integer('chapter');           
            $table->integer('status');
            $table->decimal('lbo', 15, 2);
            $table->decimal('prepaid', 15, 2);
            $table->decimal('credit_year_all', 15, 2);
            $table->decimal('credit_year_term', 15, 2);
            $table->decimal('debit_year_all', 15, 2);
            $table->decimal('debit_year_term', 15, 2);
            $table->decimal('fact_all', 15, 2);
            $table->decimal('fact_mounth', 15, 2);
            $table->decimal('kassa_all', 15, 2);
            $table->decimal('kassa_mounth', 15, 2);
            $table->decimal('credit_end_all', 15, 2);
            $table->decimal('credit_end_term', 15, 2);
            $table->decimal('debit_end_all', 15, 2);
            $table->decimal('debit_end_term', 15, 2);
            $table->decimal('return_old_year', 15, 2);

            // Создаем ОДИН групповой индекс для всех запросов транзакции.
            // Порядок user_id -> mounth -> chapter идеален для ваших WHERE.
            // ekr_id в конце поможет JOIN-у и финальной фильтрации.
            $table->index(['user_id', 'mounth', 'chapter', 'ekr_id'], 'ofs26_main_search_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ofs26');
    }
}



