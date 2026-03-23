<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $bukus = [
            [
                'judul'      => 'Filosofi Semut',
                'penulis'    => 'Septiana Agustin',
                'tipe'       => 'Inovasi & Motivasi',
                'sinopsis'   => '<p>Semut adalah makhluk kecil yang menyimpan pelajaran besar tentang kerja keras, kekompakan, dan ketekunan. Buku ini mengajak kita merenungkan kembali nilai-nilai sederhana yang sering kita lupakan di tengah hiruk pikuk modernitas.</p><p>Melalui filosofi semut, Septiana Agustin berbagi refleksi tentang bagaimana kita bisa menjalani hidup dengan lebih bermakna — tidak dengan menjadi luar biasa, tetapi dengan konsisten melakukan hal-hal kecil yang berdampak besar.</p>',
                'deskripsi'  => 'Buku motivasi yang menginspirasi melalui pelajaran hidup dari alam.',
                'cover'      => null,
                'nomor'      => 1,
                'created_at' => Carbon::now()->subYears(3),
                'updated_at' => Carbon::now()->subYears(3),
            ],
            [
                'judul'      => 'Cookies in the Morning',
                'penulis'    => 'Septiana Agustin, dkk.',
                'tipe'       => 'Antologi Sastra',
                'sinopsis'   => '<p>Sebuah antologi yang lahir dari kebersamaan para penulis yang percaya bahwa pagi adalah waktu paling jujur untuk menulis. Seperti cookies yang baru keluar dari oven — hangat, harum, dan penuh kasih sayang.</p><p>Kumpulan puisi dan prosa ini merayakan keindahan momen-momen sederhana: secangkir teh di pagi hari, suara hujan di atap rumah, dan senyum anak-anak yang belum mengerti kesedihan dunia.</p>',
                'deskripsi'  => 'Antologi puisi dan prosa tentang keindahan momen-momen pagi hari.',
                'cover'      => null,
                'nomor'      => 2,
                'created_at' => Carbon::now()->subYears(2),
                'updated_at' => Carbon::now()->subYears(2),
            ],
            [
                'judul'      => 'Cemerlang Bagai Emas Murni',
                'penulis'    => 'Septiana Agustin',
                'tipe'       => 'Karya Tunggal',
                'sinopsis'   => '<p>Emas tidak menjadi murni tanpa melewati proses pembakaran. Begitu pula manusia — tidak ada kemurnian tanpa ujian, tidak ada kedewasaan tanpa rasa sakit yang dihadapi dengan lapang dada.</p><p>Buku ini adalah perjalanan reflektif seorang pendidik yang menemukan makna di balik setiap tantangan karier dan kehidupan. Sebuah karya yang mengajak pembaca untuk percaya bahwa proses penempaan justru adalah berkah yang terselubung.</p>',
                'deskripsi'  => 'Karya reflektif tentang perjalanan menempa diri menjadi pribadi yang lebih kuat.',
                'cover'      => null,
                'nomor'      => 3,
                'created_at' => Carbon::now()->subYear(),
                'updated_at' => Carbon::now()->subYear(),
            ],
            [
                'judul'      => 'Selagi Masih Sempat',
                'penulis'    => 'Septiana Agustin, dkk.',
                'tipe'       => 'Antologi Sastra',
                'sinopsis'   => '<p>Hidup tidak pernah menjanjikan hari esok. Maka selagi masih sempat — sampaikan rasa terima kasih, ucapkan maaf, genggam tangan mereka yang kita cintai.</p><p>Antologi ini adalah pengingat bahwa waktu adalah anugerah paling berharga yang sering kita abaikan. Kumpulan tulisan dari para penulis dengan latar belakang berbeda yang berbagi satu keyakinan: bahwa hidup yang bermakna adalah hidup yang dijalani dengan penuh kesadaran.</p>',
                'deskripsi'  => 'Antologi tentang kesadaran waktu dan makna hidup yang sesungguhnya.',
                'cover'      => null,
                'nomor'      => 4,
                'created_at' => Carbon::now()->subMonths(8),
                'updated_at' => Carbon::now()->subMonths(8),
            ],
            [
                'judul'      => 'Jejak Langkah Kepala Sekolah',
                'penulis'    => 'Septiana Agustin',
                'tipe'       => 'Non-Fiksi Pendidikan',
                'sinopsis'   => '<p>Menjadi Kepala Sekolah bukan sekadar jabatan — ia adalah amanah yang menuntut hati yang besar, pikiran yang jernih, dan langkah yang bijaksana setiap harinya.</p><p>Buku ini berbagi pengalaman nyata dari lapangan: dilema kebijakan, dinamika guru, tantangan orang tua murid, hingga momen-momen mengharukan yang menjadi alasan untuk terus berjuang. Sebuah panduan dan inspirasi bagi para pemimpin pendidikan di Indonesia.</p>',
                'deskripsi'  => 'Panduan inspiratif kepemimpinan pendidikan berdasarkan pengalaman nyata.',
                'cover'      => null,
                'nomor'      => 5,
                'created_at' => Carbon::now()->subMonths(4),
                'updated_at' => Carbon::now()->subMonths(4),
            ],
            [
                'judul'      => 'Doktor di Desa',
                'penulis'    => 'Septiana Agustin',
                'tipe'       => 'Memoar & Biografi',
                'sinopsis'   => '<p>Perjalanan dari bangku SD di sebuah desa kecil hingga meraih gelar Doktor Ilmu Pendidikan dari Universitas Sebelas Maret — bukan jalan yang mudah, tapi selalu penuh makna.</p><p>Memoar ini ditulis bukan untuk membanggakan pencapaian, melainkan untuk menginspirasi anak-anak desa di seluruh Indonesia bahwa mimpi tidak mengenal batas geografi. Bahwa dengan tekad dan doa, jarak antara mimpi dan kenyataan bisa ditempuh.</p>',
                'deskripsi'  => 'Memoar perjalanan pendidikan dari desa hingga raih gelar Doktor.',
                'cover'      => null,
                'nomor'      => 6,
                'created_at' => Carbon::now()->subMonths(2),
                'updated_at' => Carbon::now()->subMonths(2),
            ],
        ];

        DB::table('bukus')->insert($bukus);
    }
}
