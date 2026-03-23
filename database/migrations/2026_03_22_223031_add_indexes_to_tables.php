<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('artikels', function (Blueprint $table) {
            $table->index('judul');
        });
        Schema::table('bukus', function (Blueprint $table) {
            $table->index('judul');
        });
        Schema::table('galeris', function (Blueprint $table) {
            $table->index('caption');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artikels', function (Blueprint $table) {
            $table->dropIndex(['judul']);
        });
        Schema::table('bukus', function (Blueprint $table) {
            $table->dropIndex(['judul']);
        });
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropIndex(['caption']);
        });
    }
};
