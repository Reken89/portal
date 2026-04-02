<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('budget25', function (Blueprint $table) {
            $table->id();
            
            // Внешние ключи или просто ID
            $table->integer('ekr_id');
            $table->integer('year')->index();
            
            // Поле JSON для хранения сумм и метаданных
            $table->json('data')->nullable();         
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('budget25');
    }
};

