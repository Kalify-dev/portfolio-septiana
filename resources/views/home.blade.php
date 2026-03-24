<x-layout>

    {{-- ==================== HERO ==================== --}}
    <div id="home">
        <x-hero :profile="$profile" :quote="$quotes->first()" />
    </div>


    {{-- ==================== BIOGRAFI ==================== --}}
    <div id="biografi" class="relative -top-24 invisible"></div>
    <section class="bg-[#fdfbf7] py-32 md:py-48 px-6 md:px-16 lg:px-24" data-aos="fade-up">
        <div class="max-w-[1400px] mx-auto flex flex-col md:flex-row items-center gap-24 lg:gap-40">

            {{-- Foto Kiri --}}
            <div class="w-full md:w-5/12 relative group">
                <div class="aspect-[4/5] overflow-hidden rounded-sm shadow-2xl grayscale hover:grayscale-0 transition-all duration-1000">
                    <img src="{{ $profile && $profile->image ? asset('storage/' . $profile->image) : asset('assets/images/bg-login.jpg') }}"
                         alt="{{ $profile->name ?? 'Septiana Agustin' }}"
                         class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-[3s]">
                </div>
                <div class="absolute -top-10 -left-10 w-48 h-48 bg-[#c9a96e]/5 -z-10 group-hover:-translate-x-4 group-hover:-translate-y-4 transition-transform duration-1000"></div>
            </div>

            {{-- Teks Kanan --}}
            <div class="w-full md:w-7/12 px-6 md:px-0">
                <span class="text-[10px] font-semibold tracking-[8px] text-[#c9a96e] uppercase mb-16 block text-center md:text-left">The Narrative &amp; Roots</span>
                <h2 class="font-cormorant text-7xl md:text-[6.5rem] font-light text-[#1a110a] leading-none tracking-tighter mb-20 text-center md:text-left">
                    Jejak Identitas <br><span class="font-cormorant italic font-light text-[0.7em] md:text-[0.6em] text-[#c9a96e] align-middle mr-2">&amp;</span>Akar
                </h2>

                <div class="font-cormorant text-2xl md:text-3xl italic text-[#4A3F35]/90 leading-relaxed mb-16 text-center md:text-left">
                    {{ $profile->bio_short ?? 'Seorang pendidik yang bermimpi melalui kata-kata, menjalani setiap peran dengan irama cinta dan dedikasi yang mendalam bagi sesama.' }}
                </div>

                <div class="font-jost text-lg md:text-xl text-[#4A3F35] leading-relaxed space-y-12 font-light text-justify">
                    @if($profile && $profile->bio_long)
                        @php $bio = nl2br(e($profile->bio_long)); @endphp
                        <p class="first-letter:text-[7rem] first-letter:font-cormorant first-letter:text-[#c9a96e] first-letter:float-left first-letter:mr-6 first-letter:mt-2 first-letter:leading-[0.7] first-letter:not-italic">
                            {!! $bio !!}
                        </p>
                    @else
                        <p class="first-letter:text-[7rem] first-letter:font-cormorant first-letter:text-[#c9a96e] first-letter:float-left first-letter:mr-6 first-letter:mt-2 first-letter:leading-[0.7] first-letter:not-italic">
                            Pendidikannya dimulai dari SDN Wonoharjo, SMPN 3 Ambarawa, hingga SMAN 1 Ambarawa. Kecintaannya pada dunia pendidikan membawanya menempuh pendidikan tinggi hingga meraih gelar <span class="font-semibold text-[#c9a96e] italic">Doktor (S3) Ilmu Pendidikan</span> dari Universitas Sebelas Maret (UNS) Surakarta pada tahun 2020.
                        </p>
                        <div class="border-l-2 border-[#c9a96e]/30 pl-8 py-4 my-12">
                            <span class="font-cormorant text-2xl md:text-3xl text-[#c9a96e] italic leading-snug block mb-4">
                                "Selagi masih sehat dan sempat, berikanlah kebermanfaatan bagi sesama."
                            </span>
                            <span class="text-xs tracking-[4px] uppercase opacity-50">— Prinsip Hidup Septiana Agustin</span>
                        </div>
                        <p>
                            Saat ini, ia menetap di <b class="text-[#c9a96e] font-medium">Bondowoso, Jawa Timur</b>, menjalankan amanah sebagai Kepala Sekolah dan terus berkarya melalui tulisan-tulisan inspiratifnya. Bersama suaminya, <b class="text-[#c9a96e] font-medium">David Moria Banatau</b>, ia mendirikan <span class="font-cormorant text-xl text-[#c9a96e] font-semibold underline decoration-[#c9a96e]/30 underline-offset-8">Yayasan Gema Nada Inspiratif</span> pada Mei 2024.
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </section>


    {{-- ==================== QUOTE ==================== --}}
    <section class="bg-[#fdfbf7] py-40 px-6 md:px-16" id="quote" data-aos="fade-up"
             x-data="{ active: 0, count: {{ $quotes->count() > 0 ? $quotes->count() : 1 }}, timer: null }"
             x-init="timer = setInterval(() => { active = (active + 1) % count }, 6000)">
        <div class="max-w-4xl mx-auto text-center h-[400px] flex flex-col justify-center relative">

            <div class="w-16 h-[1px] bg-[#c9a96e]/30 mx-auto mb-16"></div>

            @forelse($quotes as $index => $quote)
                <div x-show="active === {{ $index }}"
                     x-transition:enter="transition ease-out duration-1000"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-500"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-4"
                     class="absolute inset-0 flex flex-col justify-center">
                    <blockquote class="font-cormorant italic text-3xl md:text-5xl lg:text-6xl text-[#1a110a] leading-relaxed mb-16">
                        "{{ $quote->text }}"
                    </blockquote>
                    <cite class="not-italic font-jost text-[10px] tracking-[6px] text-[#c9a96e] uppercase block opacity-80">
                        — {{ $quote->source ?? 'Septiana Agustin' }}
                    </cite>
                </div>
            @empty
                <div class="flex flex-col justify-center">
                    <blockquote class="font-cormorant italic text-3xl md:text-5xl lg:text-6xl text-[#1a110a] leading-relaxed mb-16">
                        "Selagi masih sehat dan sempat, maka teruslah bermanfaat."
                    </blockquote>
                    <cite class="not-italic font-jost text-[10px] tracking-[6px] text-[#c9a96e] uppercase block opacity-80">
                        — Septiana Agustin
                    </cite>
                </div>
            @endforelse

            @if($quotes->count() > 1)
            <div class="absolute bottom-0 left-0 right-0 flex justify-center gap-4 mt-20">
                @foreach($quotes as $index => $q)
                    <button @click="active = {{ $index }}; clearInterval(timer)"
                            class="w-2 h-2 rounded-full transition-all duration-500"
                            :class="active === {{ $index }} ? 'bg-[#c9a96e] w-8' : 'bg-[#c9a96e]/20'">
                    </button>
                @endforeach
            </div>
            @endif

            <div class="w-16 h-[1px] bg-[#c9a96e]/30 mx-auto mt-16 absolute bottom-[-40px] left-1/2 transform -translate-x-1/2"></div>
        </div>
    </section>


    {{-- ==================== KOLEKSI & SASTRA ==================== --}}
    <div id="karya" class="relative -top-24 invisible"></div>
    <section class="bg-[#1a110a] py-48 md:py-64 px-6 md:px-16 overflow-hidden" data-aos="fade-up">
        <div class="max-w-[1400px] mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-40 border-b border-white/5 pb-16">
                <div>
                    <span class="text-xs font-semibold tracking-[8px] text-[#c9a96e] uppercase mb-10 block">Gallery of Works</span>
                    <h2 class="font-cormorant text-5xl md:text-7xl font-light text-[#fdfbf7] tracking-tighter leading-none">
                        Koleksi <br><em class="not-italic text-[#c9a96e]">&amp; Sastra</em>
                    </h2>
                </div>
                <div class="font-cormorant text-7xl text-white/5 tracking-[0.2em] transform translate-y-8 hidden md:block">WORKS</div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-32">
                @forelse($books as $i => $buku)
                <div class="group border-b border-white/5 pb-20 hover:border-[#c9a96e]/40 transition-all duration-1000 cursor-default">
                    <span class="text-white/10 font-cormorant text-7xl group-hover:text-[#c9a96e]/20 transition-colors">
                        {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                    </span>
                    <h3 class="font-cormorant text-4xl text-[#fdfbf7] group-hover:text-[#c9a96e] transition-colors italic leading-tight mt-10 mb-6 drop-shadow-md">
                        {{ $buku->judul }}
                    </h3>
                    <p class="font-jost text-[10px] tracking-[4.5px] text-white/40 uppercase opacity-60">{{ $buku->penulis ?? $buku->tipe }}</p>
                    <div class="w-8 h-[1px] bg-[#c9a96e]/20 mt-10 group-hover:w-full group-hover:bg-[#c9a96e]/40 transition-all duration-1000"></div>
                </div>
                @empty
                @php
                    $defaults = [
                        ['title' => 'Filosofi Semut',           'cat' => 'Inovasi & Motivasi'],
                        ['title' => 'Cookies in the morning',   'cat' => 'Antologi Sastra'],
                        ['title' => 'Cemerlang Bagai Emas Murni','cat' => 'Karya Tunggal'],
                    ];
                @endphp
                @foreach($defaults as $i => $d)
                <div class="group border-b border-white/5 pb-20 hover:border-[#c9a96e]/40 transition-all duration-1000 cursor-default">
                    <span class="text-white/10 font-cormorant text-7xl group-hover:text-[#c9a96e]/20 transition-colors italic">
                        {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                    </span>
                    <h3 class="font-cormorant text-5xl text-[#fdfbf7] group-hover:text-[#c9a96e] transition-colors italic leading-tight mt-10 mb-6">
                        {{ $d['title'] }}
                    </h3>
                    <p class="font-jost text-[10px] tracking-[4.5px] text-white/40 uppercase">{{ $d['cat'] }}</p>
                </div>
                @endforeach
                @endforelse
            </div>
        </div>
    </section>


    {{-- ==================== ARTIKEL ==================== --}}
    <div id="artikel" class="relative -top-24 invisible"></div>
    <section class="bg-[#fdfbf7] py-32 md:py-48 px-6 md:px-16 lg:px-24" data-aos="fade-up">
        <div class="max-w-[1400px] mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-32 border-b border-[#1a110a]/5 pb-16">
                <div>
                    <span class="text-[10px] font-semibold tracking-[8px] text-[#c9a96e] uppercase mb-10 block">Inspirasi &amp; Catatan</span>
                    <h2 class="font-cormorant text-5xl md:text-7xl font-light text-[#1a110a] tracking-tighter leading-none">
                        Tulisan <br><em class="not-italic text-[#c9a96e]">Terbaru</em>
                    </h2>
                </div>
                <a href="#" class="font-jost text-[10px] tracking-[4px] uppercase text-[#1a110a]/40 hover:text-[#c9a96e] transition-colors duration-500 pb-4">Lihat Semua Blog —</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-24">
                @forelse($articles as $article)
                <div class="group flex flex-col bg-white border border-[#1a110a]/5 rounded-sm overflow-hidden hover:shadow-2xl transition-all duration-1000">
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ $article->thumbnail ? Storage::url($article->thumbnail) : 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?q=80&w=2670&auto=format&fit=crop' }}"
                             alt="{{ $article->judul }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-[3s]">
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <span class="text-[9px] tracking-[4px] text-[#c9a96e] uppercase mb-3 block">
                            {{ $article->published_at?->format('d M Y') ?? $article->created_at->format('d M Y') }}
                        </span>
                        <h3 class="font-cormorant text-3xl text-[#1a110a] leading-tight mb-6 flex-1">{{ $article->judul }}</h3>
                        <p class="font-jost text-sm text-[#4A3F35]/70 leading-relaxed line-clamp-2 mb-8">
                            {{ $article->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($article->konten), 100) }}
                        </p>
                        <a href="{{ route('artikel.show', $article->slug) }}"
                           class="inline-block font-jost text-[10px] tracking-[4px] uppercase text-[#c9a96e] hover:text-[#1a110a] transition-colors">
                            Baca Tulisan —
                        </a>
                    </div>
                </div>
                @empty
                    <div class="col-span-full py-20 text-center opacity-30 italic font-cormorant text-2xl">Belum ada catatan yang diterbitkan.</div>
                @endforelse
            </div>
        </div>
    </section>


    {{-- ==================== GALERI (High-End Mosaic) ==================== --}}
    <div id="galeri-container" class="w-full">
        <div id="galeri" class="relative -top-24 invisible"></div>
        <section class="bg-[#1a110a] pt-32 pb-40 overflow-hidden" data-aos="fade-up">
            
            {{-- Header Section (Minimalis & Terpusat) --}}
            <div class="max-w-5xl mx-auto px-6 text-center mb-24">
                <span class="text-[10px] font-semibold tracking-[8px] text-[#c9a96e] uppercase mb-6 block">Moments & Memories</span>
                <h2 class="font-cormorant text-5xl md:text-7xl font-light text-[#fdfbf7] tracking-tighter leading-tight">
                    Galeri <em class="not-italic text-[#c9a96e]">Kegiatan</em>
                </h2>
            </div>

            @if($galeris->isEmpty())
            <div class="text-center py-32 opacity-30">
                <p class="font-cormorant italic text-3xl text-white">Galeri foto akan segera hadir...</p>
            </div>
            @else
                {{-- Kumpulkan semua foto dari tabel galleries (Local Data) --}}
                @php
                    $allPhotos = [];
                    foreach ($galeris->sortBy('urutan') as $galeri) {
                        if ($galeri->foto) {
                            $photos = is_array($galeri->foto) ? $galeri->foto : json_decode($galeri->foto, true);
                            if (is_array($photos)) {
                                foreach ($photos as $photo) {
                                    $allPhotos[] = [
                                        'url'   => asset('storage/' . $photo),
                                        'label' => $galeri->judul_kegiatan ?? '',
                                    ];
                                }
                            }
                        }
                    }
                    // Batasi 10 foto untuk tampilan grid yang rapat & seimbang
                    $allPhotos = array_slice($allPhotos, 0, 10);
                @endphp

                {{-- Full-Width Grid: 0 Gap, 1:1 Aspect Ratio (Mosaic Style) --}}
                <div class="w-full grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-0 border-y border-white/5">
                    @foreach($allPhotos as $idx => $item)
                    <div class="group relative aspect-square overflow-hidden bg-stone-900"
                         x-data="{ lightbox: false }"
                         @keydown.escape.window="lightbox = false">

                        {{-- Image with Zoom Hover Effect --}}
                        <div class="w-full h-full cursor-zoom-in relative" @click="lightbox = true">
                            <img src="{{ $item['url'] }}"
                                 alt="{{ $item['label'] ?: 'Galeri Septiana Agustin' }}"
                                 class="w-full h-full object-cover transition-all duration-[3000ms] group-hover:scale-110"
                                 loading="lazy">
                            
                            {{-- Premium Hover Overlay (Dark Fade + Icon) --}}
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-all duration-700 flex items-center justify-center">
                                <div class="p-4 rounded-full border border-white/20 translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-700 scale-75 group-hover:scale-100">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- Lightbox (Popup Gambar) --}}
                        <div x-show="lightbox"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="fixed inset-0 z-[9999] bg-black/95 flex items-center justify-center p-6 cursor-zoom-out"
                             @click="lightbox = false"
                             style="display:none;">
                            <img src="{{ $item['url'] }}"
                                 alt="{{ $item['label'] ?: 'Galeri' }}"
                                 class="max-h-[90vh] max-w-[90vw] object-contain rounded-sm shadow-2xl">
                            <button class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors"
                                    @click.stop="lightbox = false">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                            @if($item['label'])
                            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-center w-full px-10">
                                <p class="font-cormorant italic text-white/70 text-2xl tracking-wide">{{ $item['label'] }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Luxury Amber Instagram Button --}}
                <div class="mt-32 text-center px-6">
                    <a href="https://instagram.com/agustinseptiana" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="inline-block group relative">
                        <div class="absolute -inset-4 bg-[#c9a96e]/10 blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="relative flex items-center gap-8 bg-transparent border border-[#c9a96e]/20 px-16 py-6 overflow-hidden rounded-sm transition-all duration-700 hover:border-[#c9a96e]">
                            {{-- Sliding Background Hover --}}
                            <div class="absolute inset-0 bg-[#c9a96e] translate-y-full group-hover:translate-y-0 transition-transform duration-700 ease-out"></div>
                            
                            <span class="relative font-jost text-xs tracking-[8px] uppercase font-bold text-[#c9a96e] group-hover:text-[#1a110a] transition-colors duration-500">
                                Follow on Instagram
                            </span>
                            <svg class="relative w-5 h-5 text-[#c9a96e] group-hover:text-[#1a110a] transition-all duration-500 transform group-hover:rotate-12" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </div>
                    </a>
                </div>
            @endif
        </section>
    </div>


    {{-- ==================== KONTAK ==================== --}}
    <div id="kontak" class="relative -top-24 invisible"></div>
    <section class="bg-[#fdfbf7] py-48 md:py-64" data-aos="fade-up">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="font-cormorant text-7xl md:text-[10rem] font-light text-[#1a110a] tracking-tighter mb-28">
                Mari <br><em class="not-italic text-[#c9a96e]">Terhubung</em>
            </h2>

            <div class="flex flex-wrap justify-center gap-16 md:gap-32 pb-40 border-b border-[#1a110a]/5 mb-32">
                <a href="https://instagram.com/agustinseptiana" class="group text-center">
                    <span class="text-[10px] tracking-[6px] text-[#c9a96e] uppercase block mb-6 px-10 py-3 border border-[#c9a96e]/10 group-hover:bg-[#c9a96e] group-hover:text-white rounded-full transition-all duration-700">Instagram</span>
                    <span class="font-cormorant text-4xl text-[#1a110a] tracking-tighter">@agustinseptiana</span>
                </a>
                <a href="https://tiktok.com/@missnana" class="group text-center">
                    <span class="text-[10px] tracking-[6px] text-[#c9a96e] uppercase block mb-6 px-10 py-3 border border-[#c9a96e]/10 group-hover:bg-[#c9a96e] group-hover:text-white rounded-full transition-all duration-700">TikTok</span>
                    <span class="font-cormorant text-4xl text-[#1a110a] tracking-tighter">@missnana</span>
                </a>
            </div>

            <div class="space-y-6">
                <p class="font-cormorant italic text-3xl md:text-4xl text-[#4A3F35] font-medium tracking-[0.15em] mb-4">
                    Yayasan Gema Nada Inspiratif
                </p>
                <div class="w-12 h-[1px] bg-[#1a110a]/10 mx-auto"></div>
                <div class="font-jost text-[10px] md:text-xs tracking-[8px] uppercase text-[#1a110a]/60">
                    Bondowoso — Jawa Timur
                </div>
            </div>
        </div>
    </section>

</x-layout>
