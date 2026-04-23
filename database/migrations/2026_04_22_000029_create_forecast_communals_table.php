<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForecastCommunalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecast_communals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('year');
            $table->string('title', 100);

            // Суммы - 1 полугодие
            $table->decimal('sum_budget_h1', 15, 2)->default(0);
            $table->decimal('sum_business_h1', 15, 2)->default(0);

            // Суммы - 2 полугодие
            $table->decimal('sum_budget_h2', 15, 2)->default(0);
            $table->decimal('sum_business_h2', 15, 2)->default(0);

            // Объемы - 1 полугодие
            $table->decimal('vol_budget_h1', 15, 4)->default(0);
            $table->decimal('vol_business_h1', 15, 4)->default(0);

            // Объемы - 2 полугодие
            $table->decimal('vol_budget_h2', 15, 4)->default(0);
            $table->decimal('vol_business_h2', 15, 4)->default(0);

            $table->timestamps(); // Это создаст created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forecast_communals');
    }
}