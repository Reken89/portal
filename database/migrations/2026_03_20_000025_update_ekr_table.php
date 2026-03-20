<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ekr', function (Blueprint $table) {
            // Создаем групповой индекс для ускорения JOIN и фильтрации
            $table->index(['number', 'shared', 'main'], 'ekr_lookup_index');
        });
    }

    public function down(): void
    {
        Schema::table('ekr', function (Blueprint $table) {
            $table->dropIndex('ekr_lookup_index');
        });
    }
};
