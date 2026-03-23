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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Septiana Agustin');
            $table->string('headline')->nullable(); // "Nana Bermanja Syahdu..."
            $table->string('image')->nullable(); // Profile Photo path
            $table->text('bio_short')->nullable(); // First editorial paragraph
            $table->text('bio_long')->nullable(); // Subsequent paragraphs
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
