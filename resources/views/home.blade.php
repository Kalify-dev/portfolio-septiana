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
                @forelse($books as $index => $buku)
                    <article class="group border-t border-[#c9a96e]/20 pt-8 mt-4 hover:border-[#c9a96e]/50 transition-colors duration-500">
                        @if($buku->cover)
                            <!-- With Cover Image -->
                            <div class="flex flex-col md:flex-row gap-8 items-start">
                                <div class="w-full md:w-1/3 shrink-0 overflow-hidden aspect-[3/4] relative bg-[#1a110a]">
                                    <img src="{{ asset('storage/' . $buku->cover) }}" 
                                         alt="Cover {{ $buku->judul }}" 
                                         class="w-full h-full object-cover opacity-80 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700 ease-in-out">
                                </div>
                                <div class="w-full md:w-2/3 flex flex-col justify-between">
                                    <div>
                                        <div class="font-jost text-4xl text-[#c9a96e]/30 font-light tracking-widest mb-4">
                                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                        </div>
                                        <h3 class="font-cormorant text-3xl md:text-4xl text-[#fdfbf7] italic font-light mb-2 group-hover:text-[#c9a96e] transition-colors">
                                            {{ $buku->judul }}
                                        </h3>
                                        <p class="font-jost text-[9px] tracking-[4px] uppercase text-white/50 mb-6 font-medium">
                                            {{ $buku->penulis }}
                                        </p>
                                        @if($buku->deskripsi)
                                            <p class="font-jost text-sm text-[#fdfbf7]/60 leading-relaxed font-light line-clamp-3">
                                                {{ $buku->deskripsi }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="mt-8">
                                        <span class="inline-flex items-center gap-4 text-[#c9a96e] font-jost text-[10px] tracking-[4px] uppercase group-hover:text-white transition-colors duration-300">
                                            <span>Detail Buku</span>
                                            <span class="w-8 h-[1px] bg-[#c9a96e] group-hover:w-12 group-hover:bg-white transition-all duration-500"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Text Only Layout (No Cover) -->
                            <div class="font-jost text-4xl text-[#c9a96e]/30 font-light tracking-widest mb-6">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>
                            <h3 class="font-cormorant text-3xl md:text-5xl text-[#fdfbf7] italic font-light mb-4 group-hover:text-[#c9a96e] transition-colors duration-500">
                                {{ $buku->judul }}
                            </h3>
                            <p class="font-jost text-[10px] tracking-[4px] uppercase text-white/40 mb-8 font-medium">
                                {{ $buku->penulis }}
                            </p>
                            @if($buku->deskripsi)
                                <p class="font-jost text-sm text-[#fdfbf7]/60 leading-relaxed font-light line-clamp-2">
                                    {{ $buku->deskripsi }}
                                </p>
                            @endif
                            <div class="mt-8">
                                <span class="inline-flex items-center gap-4 text-[#c9a96e] font-jost text-[10px] tracking-[4px] uppercase group-hover:text-white transition-colors duration-300">
                                    <span class="w-8 h-[1px] bg-[#c9a96e] group-hover:w-20 group-hover:bg-white transition-all duration-500"></span>
                                </span>
                            </div>
                        @endif
                    </article>
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


    {{-- ==================== GALERI MOSAIC (Dee Lestari Style) ==================== --}}
    <div id="galeri-container" class="w-full">
        <div id="galeri" class="relative -top-24 invisible"></div>
        <section class="bg-[#1a110a] py-24 md:py-32 overflow-hidden" data-aos="fade-up">

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
            @endphp

            {{-- Section Header --}}
            <div class="max-w-[1400px] mx-auto px-8 md:px-16 mb-16">
                <div class="flex flex-col md:flex-row justify-between items-end border-b border-white/5 pb-12">
                    <div>
                        <span class="text-[10px] font-semibold tracking-[8px] text-[#c9a96e] uppercase mb-6 block">Moments & Memories</span>
                        <h2 class="font-cormorant text-5xl md:text-6xl font-light text-[#fdfbf7] tracking-tighter leading-none">
                            Galeri <em class="not-italic text-[#c9a96e]">Kegiatan</em>
                        </h2>
                    </div>
                    <a href="https://instagram.com/agustinseptiana"
                       target="_blank" rel="noopener noreferrer"
                       class="mt-8 md:mt-0 inline-flex items-center gap-3 font-jost text-[10px] tracking-[5px] uppercase text-white/40 hover:text-[#c9a96e] transition-colors duration-500 pb-1">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                        @agustinseptiana —
                    </a>
                </div>
            </div>

            @if(count($allPhotos) === 0)
                <div class="text-center py-20 opacity-30">
                    <p class="font-cormorant italic text-2xl text-white">Foto akan segera hadir...</p>
                </div>
            @else

            {{-- MOSAIC GRID (Dee Lestari style & Mobile Responsive) --}}
            <div class="w-full overflow-x-auto snap-x snap-mandatory pb-4" style="scrollbar-width: none;">
                <div class="flex gap-0" style="min-width: max-content;">
                    @foreach($allPhotos as $idx => $item)
                    <div class="group relative overflow-hidden flex-shrink-0 w-[50vw] h-[50vw] sm:w-[35vw] sm:h-[35vw] md:w-[260px] md:h-[260px] snap-start"
                         x-data="{ open: false }"
                         @keydown.escape.window="open = false">

                        <img src="{{ $item['url'] }}"
                             alt="{{ $item['label'] ?: 'Galeri Septiana Agustin' }}"
                             class="w-full h-full object-cover transition-all duration-[2500ms] group-hover:scale-110"
                             loading="lazy">

                        {{-- Hover Overlay --}}
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-all duration-700 flex flex-col items-center justify-center cursor-zoom-in"
                             @click="open = true">
                            <svg class="w-5 h-5 text-white opacity-0 group-hover:opacity-100 transition-all duration-500 mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                            </svg>
                            @if($item['label'])
                            <p class="font-cormorant italic text-white text-xs md:text-sm text-center px-4 opacity-0 group-hover:opacity-80 transition-all duration-500 leading-snug">
                                {{ $item['label'] }}
                            </p>
                            @endif
                        </div>

                        {{-- Lightbox --}}
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="fixed inset-0 z-[9999] bg-black/95 flex items-center justify-center p-4 md:p-6 cursor-zoom-out"
                             @click="open = false"
                             style="display:none;">
                            <img src="{{ $item['url'] }}"
                                 class="max-h-[85vh] max-w-[95vw] object-contain shadow-2xl">
                            <button class="absolute top-4 right-4 md:top-6 md:right-8 text-white/40 hover:text-white transition-colors"
                                    @click.stop="open = false">
                                <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                            @if($item['label'])
                            <div class="absolute bottom-6 md:bottom-8 left-1/2 -translate-x-1/2 w-full px-6">
                                <p class="font-cormorant italic text-white/80 text-lg md:text-xl tracking-wide text-center">{{ $item['label'] }}</p>
                            </div>
                            @endif
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Counter strip --}}
            <div class="max-w-[1400px] mx-auto px-6 md:px-16 mt-8 flex justify-between items-center opacity-80">
                <span class="font-jost text-[9px] md:text-[10px] tracking-[4px] uppercase text-[#c9a96e]">
                    {{ count($allPhotos) }} MOMENTS
                </span>
                <span class="font-jost text-[8px] md:text-[9px] tracking-[3px] uppercase text-white/60 flex items-center gap-2">
                    <svg class="w-3 h-3 animate-[pulse_2s_ease-in-out_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Geser
                </span>
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
