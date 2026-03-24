<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tables and their respective image columns
        $targets = [
            'profiles' => ['image'],
            'artikels' => ['thumbnail'],
            'bukus' => ['cover'],
            'galeris' => ['foto'], // Galeri stores a JSON array
        ];

        foreach ($targets as $table => $columns) {
            foreach ($columns as $column) {
                DB::table($table)->get()->each(function ($record) use ($table, $column) {
                    $value = $record->$column;
                    if (empty($value)) return;

                    if ($table === 'galeris' && $column === 'foto') {
                        // Handle JSON array/string for Galeri
                        $photos = is_array($value) ? $value : json_decode($value, true);
                        if (is_array($photos)) {
                            $cleaned = array_map(fn($p) => $this->cleanPath($p), $photos);
                            DB::table($table)->where('id', $record->id)->update([$column => json_encode($cleaned)]);
                        }
                    } else {
                        // Handle standard string columns
                        $cleaned = $this->cleanPath($value);
                        DB::table($table)->where('id', $record->id)->update([$column => $cleaned]);
                    }
                });
            }
        }
    }

    /**
     * Helper to strip absolute paths.
     */
    private function cleanPath($path)
    {
        if (empty($path) || !is_string($path)) return $path;

        // Standardize separators
        $path = str_replace('\\', '/', $path);

        // If it contains public/ (as in storage/app/public/...)
        if (str_contains($path, 'public/')) {
            $parts = explode('public/', $path);
            return end($parts);
        }

        // If it specifically mentions the storage root
        if (str_contains($path, 'storage/')) {
            $parts = explode('storage/', $path);
            $sub = end($parts);
            // If it still has app/public/...
            return str_replace(['app/public/', 'app/'], '', $sub);
        }

        return $path;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No reverse needed as we are cleaning dirty data
    }
};
