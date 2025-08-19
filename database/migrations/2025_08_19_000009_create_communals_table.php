<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('year');
            $table->integer('mounth');
            $table->integer('status');
            $table->decimal('heat-volume', 15, 3);
            $table->decimal('heat-sum', 15, 2);
            $table->decimal('drainage-volume', 15, 3);
            $table->decimal('drainage-sum', 15, 2);
            $table->decimal('negative-volume', 15, 3);
            $table->decimal('negative-sum', 15, 2);
            $table->decimal('water-volume', 15, 3);
            $table->decimal('water-sum', 15, 2);
            $table->decimal('power-volume', 15, 3);
            $table->decimal('power-sum', 15, 2);
            $table->decimal('trash-volume', 15, 3);
            $table->decimal('trash-sum', 15, 2);
            $table->decimal('disposal-volume', 15, 3);
            $table->decimal('disposal-sum', 15, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communals');
    }
}

