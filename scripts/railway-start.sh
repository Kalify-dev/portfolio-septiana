#!/bin/bash

# --- Initialize Folders ---
echo "Inisialisasi folder..."
mkdir -p storage/framework/{sessions,views,cache} storage/app/public storage/logs bootstrap/cache
chmod -R 777 storage bootstrap/cache

# --- Symlink Storage ---
echo "Membangun jembatan storage (Symlink)..."
# Hapus paksa folder/file 'storage' di folder public jika ada
rm -rf public/storage
# Buat symlink dari /app/storage/app/public (Volume) ke /app/public/storage
ln -sf /app/storage/app/public /app/public/storage
# Pastikan jembatan bisa dilewati
chmod -R 777 public/storage

# --- Database & Cache ---
echo "Migrasi database..."
php artisan migrate --force
echo "Pembersihan cache..."
php artisan config:clear
php artisan view:clear
php artisan cache:clear

# --- Start Server ---
echo "Menjalankan website di port $PORT..."
php artisan serve --host 0.0.0.0 --port $PORT
