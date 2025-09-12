<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekr', function (Blueprint $table) {
            $table->id();
            $table->string('shared', 10);
            $table->string('main', 10);
            $table->integer('number');
            $table->integer('ekr');
            $table->string('title', 800);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ekr');
    }
}

