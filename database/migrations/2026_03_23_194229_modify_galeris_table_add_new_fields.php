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
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('judul_kegiatan')->after('id')->nullable();
            $table->text('deskripsi_singkat')->after('judul_kegiatan')->nullable();
            $table->string('caption')->nullable()->change();
            $table->text('foto')->change(); // To allow larger arrays of multiple photos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn(['judul_kegiatan', 'deskripsi_singkat']);
            $table->string('caption')->nullable(false)->change();
            $table->string('foto')->change();
        });
    }
};
