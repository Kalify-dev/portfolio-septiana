<div align="center">

<br>

# ✦ Septiana Agustin — Portfolio

**Website Portofolio Profesional Pendidik & Penulis Indonesia**

[![Live Demo](https://img.shields.io/badge/🌐_Live_Demo-portfolio--septiana-production.up.railway.app-c9a96e?style=for-the-badge&logoColor=white)](https://portfolio-septiana-production.up.railway.app/)
[![Built with Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Filament](https://img.shields.io/badge/Filament-3-FDAE4B?style=for-the-badge)](https://filamentphp.com)
[![Deployed on Railway](https://img.shields.io/badge/Railway-Deployed-0B0D0E?style=for-the-badge&logo=railway&logoColor=white)](https://railway.app)

</div>

---

## ✦ Tentang Proyek

Website portofolio editorial bergaya premium untuk **Dr. Septiana Agustin, M.Pd** — seorang Penulis, Pendidik, dan Kepala Sekolah asal Bondowoso, Jawa Timur.

Dibangun dengan estetika tinggi terinspirasi dari gaya editorial sastra modern Indonesia, menampilkan tipografi mewah, animasi sinematik, dan pengalaman membaca yang mendalam.

---

## ✦ Fitur Utama

| Fitur | Keterangan |
|-------|-----------|
| 🎨 **Hero Parallax** | Background dinamis dengan GSAP smooth scroll |
| 📖 **Biografi Editorial** | Tampilan drop-cap bergaya majalah sastra |
| 📚 **Koleksi Buku & Karya** | Showcase publikasi dengan cover art |
| ✍️ **Artikel Blog** | Konten tulisan yang dapat dipublish dari admin |
| 🖼️ **Galeri Kegiatan** | Mosaic grid foto kegiatan full-width |
| 🔒 **Admin Panel** | Dashboard Filament 3 untuk kelola semua konten |
| 💾 **Persistent Storage** | Railway Volume untuk upload foto permanen |

---

## ✦ Tech Stack

```
Backend   : Laravel 12 (PHP 8.2)
Admin     : Filament 3
Frontend  : Blade + Alpine.js + Tailwind CSS
Animation : GSAP 3 + AOS
Build     : Vite
Deploy    : Railway (Nixpacks)
Database  : MySQL (Railway)
Storage   : Railway Volume (Persistent)
```

---

## ✦ Instalasi Lokal

```bash
# Clone repository
git clone https://github.com/Kalify-dev/portfolio-septiana.git
cd portfolio-septiana

# Install dependensi
composer install
npm install

# Konfigurasi environment
cp .env.example .env
php artisan key:generate

# Setup database
php artisan migrate --seed

# Buat symlink storage
php artisan storage:link

# Jalankan build & server
npm run dev
php artisan serve
```

---

## ✦ Konfigurasi Admin Panel

Akses admin panel di: `http://localhost:8000/admin`

Buat user admin pertama:
```bash
php artisan make:filament-user
```

### Kelola Konten via Admin:
- **Profil** → Foto profil, biografi, headline
- **Quote** → Kutipan + foto background hero
- **Buku** → Koleksi buku & karya
- **Galeri** → Upload foto kegiatan
- **Artikel** → Tulis & publish artikel

---

## ✦ Deployment (Railway)

Proyek ini sudah dikonfigurasi untuk Railway dengan:
- **Builder**: Nixpacks (PHP 8.2 + Node.js 20)
- **Database**: MySQL Railway service
- **Storage**: Railway Volume di `/app/storage/app/public`
- **Start Command**: `sh scripts/railway-start.sh`
- **Healthcheck**: `/up`

### Variabel Environment yang Dibutuhkan:
```env
APP_KEY=
APP_URL=https://your-domain.up.railway.app
APP_ENV=production
APP_DEBUG=false

DB_HOST=${MySQL.MYSQLHOST}
DB_PORT=${MySQL.MYSQLPORT}
DB_DATABASE=${MySQL.MYSQLDATABASE}
DB_USERNAME=${MySQL.MYSQLUSER}
DB_PASSWORD=${MySQL.MYSQLPASSWORD}
FILESYSTEM_DISK=public
```

---

## ✦ Update Aset Frontend

Setiap ada perubahan CSS/JS/Tailwind, jalankan:
```bash
npm run build
git add public/build
git commit -m "Build: update assets"
git push origin main
```

---

<div align="center">

**Dibangun dengan ❤️ oleh [Kalify.dev](https://kalifydev.netlify.app)**

*"Selagi masih sehat dan sempat, berikanlah kebermanfaatan bagi sesama."*
— Dr. Septiana Agustin, M.Pd

</div>
