<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilities', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('user_id');
            $table->integer('year');
            $table->integer('mounth');
            $table->integer('status');
            $table->decimal('mb_volume_heat', 15, 4);
            $table->decimal('pd_volume_heat', 15, 4);
            $table->decimal('mb_sum_heat', 15, 2);
            $table->decimal('pd_sum_heat', 15, 2);
            $table->decimal('mb_volume_drainage', 15, 4);
            $table->decimal('pd_volume_drainage', 15, 4);
            $table->decimal('mb_sum_drainage', 15, 2);
            $table->decimal('pd_sum_drainage', 15, 2);
            $table->decimal('mb_volume_negative', 15, 4);
            $table->decimal('pd_volume_negative', 15, 4);
            $table->decimal('mb_sum_negative', 15, 2);
            $table->decimal('pd_sum_negative', 15, 2);
            $table->decimal('mb_volume_water', 15, 4);
            $table->decimal('pd_volume_water', 15, 4);
            $table->decimal('mb_sum_water', 15, 2);
            $table->decimal('pd_sum_water', 15, 2);
            $table->decimal('mb_volume_power', 15, 4);
            $table->decimal('pd_volume_power', 15, 4);
            $table->decimal('mb_sum_power', 15, 2);
            $table->decimal('pd_sum_power', 15, 2);
            $table->decimal('mb_volume_trash', 15, 4);
            $table->decimal('pd_volume_trash', 15, 4);
            $table->decimal('mb_sum_trash', 15, 2);
            $table->decimal('pd_sum_trash', 15, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilities');
    }
}




