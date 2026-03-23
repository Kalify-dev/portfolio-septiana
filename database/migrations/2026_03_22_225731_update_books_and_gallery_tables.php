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
        Schema::table('bukus', function (Blueprint $table) {
            $table->string('penulis')->nullable()->after('judul');
            $table->text('sinopsis')->nullable()->after('penulis');
        });
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('judul_kegiatan')->nullable()->after('id');
            $table->text('deskripsi_singkat')->nullable()->after('judul_kegiatan');
            $table->json('foto')->nullable()->change(); // Filament multiple stores json
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bukus', function (Blueprint $table) {
            $table->dropColumn(['penulis', 'sinopsis']);
        });
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn(['judul_kegiatan', 'deskripsi_singkat']);
            // change back to string?
            $table->string('foto')->nullable()->change();
        });
    }
};
