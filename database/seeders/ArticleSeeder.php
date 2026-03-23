<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'judul'        => 'Ketika Kata-Kata Menjadi Rumah',
                'slug'         => 'ketika-kata-kata-menjadi-rumah',
                'excerpt'      => 'Menulis bukan sekadar merangkai huruf. Ia adalah cara jiwa berbicara ketika lisan tak mampu mengungkap sepenuhnya apa yang dirasakan hati.',
                'konten'       => '<p>Menulis bukan sekadar merangkai huruf. Ia adalah cara jiwa berbicara ketika lisan tak mampu mengungkap sepenuhnya apa yang dirasakan hati.</p>
<p>Sejak kecil, saya selalu percaya bahwa setiap orang memiliki cerita yang layak untuk dituturkan. Tidak perlu luar biasa, tidak perlu dramatis. Cukup jujur dan tulus — maka ia akan menyentuh hati siapapun yang membacanya.</p>
<p>Kata-kata adalah rumah yang selalu terbuka. Di sana, kita bisa menaruh kegembiraan, kesedihan, harapan, dan kenangan. Tidak ada yang perlu disembunyikan, karena tulisan yang baik lahir dari keberanian untuk berserah.</p>
<blockquote><em>"Bermanja syahdu dikala senja, menikmati kopi sembari bermimpi."</em></blockquote>
<p>Jadikan setiap hari sebagai halaman baru. Dan jangan takut untuk menulis — bahkan ketika belum tahu bagaimana cerita ini akan berakhir.</p>',
                'thumbnail'    => null,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(5),
                'created_at'   => Carbon::now()->subDays(5),
                'updated_at'   => Carbon::now()->subDays(5),
            ],
            [
                'judul'        => 'Filosofi Kopi dan Keheningan Pagi',
                'slug'         => 'filosofi-kopi-dan-keheningan-pagi',
                'excerpt'      => 'Ada ritual kecil yang tidak pernah saya lewatkan: secangkir kopi di pagi hari, sebelum dunia ramai bersuara. Di situlah saya menemukan diri saya yang paling jujur.',
                'konten'       => '<p>Ada ritual kecil yang tidak pernah saya lewatkan: secangkir kopi di pagi hari, sebelum dunia ramai bersuara. Di situlah saya menemukan diri saya yang paling jujur.</p>
<p>Kopi mengajarkan saya tentang kesabaran. Ia tidak bisa terburu-buru. Ia perlu waktu untuk menyeduh, untuk meresap, untuk memberikan aromanya yang terbaik. Seperti halnya tulisan — tidak bisa dipaksa, harus dibiarkan mengalir dengan caranya sendiri.</p>
<p>Keheningan pagi adalah hadiah yang sering kita lewatkan. Di antara suara burung dan cahaya yang perlahan merangkak masuk lewat jendela, ada percakapan sunyi antara kita dan semesta.</p>
<p>Ambillah waktu untuk diam sejenak. Rasakan. Dan tuliskanlah — apa saja — sebelum hari meminta terlalu banyak dari kita.</p>',
                'thumbnail'    => null,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(12),
                'created_at'   => Carbon::now()->subDays(12),
                'updated_at'   => Carbon::now()->subDays(12),
            ],
            [
                'judul'        => 'Menjadi Guru adalah Menjadi Penjaga Cahaya',
                'slug'         => 'menjadi-guru-adalah-menjadi-penjaga-cahaya',
                'excerpt'      => 'Tidak ada profesi yang lebih mulia dan lebih melelahkan sekaligus — menjadi guru. Kita tidak hanya mengajar, kita menghidupkan.',
                'konten'       => '<p>Tidak ada profesi yang lebih mulia dan lebih melelahkan sekaligus — menjadi guru. Kita tidak hanya mengajar, kita menghidupkan.</p>
<p>Setiap anak yang duduk di depan kita membawa dunianya masing-masing. Ada yang datang dengan semangat membara, ada yang datang dengan beban yang terlalu berat untuk usianya. Tugas kita bukan hanya menyampaikan materi, tapi juga memastikan bahwa setiap anak itu merasa dilihat, didengar, dan dihargai.</p>
<p>Saya ingat betul seorang murid yang pernah berkata: <em>"Bu, saya tidak pandai, tapi Ibu selalu percaya dengan saya."</em> Kata-kata itu masih saya simpan sampai sekarang, karena ia mengingatkan saya mengapa saya memilih jalan ini.</p>
<p>Menjadi guru adalah menjadi penjaga cahaya — memastikan bahwa setiap murid yang pergi dari kelas kita membawa nyala yang lebih terang dari sebelumnya.</p>',
                'thumbnail'    => null,
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(20),
                'created_at'   => Carbon::now()->subDays(20),
                'updated_at'   => Carbon::now()->subDays(20),
            ],
        ];

        DB::table('artikels')->insert($articles);
    }
}
