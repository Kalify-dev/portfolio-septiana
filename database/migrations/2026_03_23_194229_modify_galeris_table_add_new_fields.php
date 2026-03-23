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
        if (!Schema::hasColumn('galeris', 'judul_kegiatan')) {
            Schema::table('galeris', function (Blueprint $table) {
                $table->string('judul_kegiatan')->after('id')->nullable();
            });
        }
        
        if (!Schema::hasColumn('galeris', 'deskripsi_singkat')) {
            Schema::table('galeris', function (Blueprint $table) {
                $table->text('deskripsi_singkat')->after('judul_kegiatan')->nullable();
            });
        }

        Schema::table('galeris', function (Blueprint $table) {
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
