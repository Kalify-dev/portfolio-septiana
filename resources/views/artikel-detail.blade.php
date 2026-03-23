<x-layout>
    {{-- ANCHOR: Detail Artikel --}}
    <section class="bg-[#fdfbf7] py-32 md:py-48 px-6 md:px-16" data-aos="fade-up">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-4 mb-16 opacity-40 font-jost text-[9px] tracking-[4px] uppercase">
                <a href="{{ route('home') }}" class="hover:text-gold transition-colors">Beranda</a>
                <span>—</span>
                <span class="text-gold">Artikel</span>
            </div>

            <!-- Header -->
            <header class="mb-24">
                <span class="text-[10px] tracking-[6px] text-gold uppercase block mb-8 font-semibold">
                    {{ $artikel->published_at?->format('d M Y') ?? $artikel->created_at->format('d M Y') }}
                </span>
                <h1 class="font-cormorant text-5xl md:text-7xl font-light text-[#1a110a] leading-tight tracking-tighter">
                    {{ $artikel->judul }}
                </h1>
            </header>

            <!-- Thumbnail -->
            @if($artikel->thumbnail)
            <div class="aspect-video overflow-hidden rounded-sm shadow-2xl mb-32 group">
                <img src="{{ Storage::url($artikel->thumbnail) }}" 
                     alt="{{ $artikel->judul }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-[4s]">
            </div>
            @endif

            <!-- Content Body -->
            <article class="prose prose-stone prose-lg max-w-none font-jost text-[#4A3F35] leading-relaxed">
                <div class="font-cormorant text-2xl italic text-gold/80 mb-12 border-l-2 border-gold/20 pl-8 py-4 bg-gold/5">
                    {{ $artikel->excerpt ?? 'Telusuri makna di balik setiap rangkaian kata yang menyentuh jiwa dan menginspirasi langkah ke depan.' }}
                </div>
                
                <div class="article-content space-y-12">
                    {!! $artikel->konten !!}
                </div>
            </article>

            <!-- Komentar Section -->
            <div class="mt-32 pt-16 border-t border-[#1a110a]/5 max-w-3xl mx-auto">
                <h3 class="font-cormorant text-4xl text-[#1a110a] mb-12">Pesan &amp; Kesan</h3>

                <!-- List Komentar -->
                <div class="space-y-12 mb-24">
                    @forelse($artikel->comments()->where('is_approved', true)->latest()->get() as $komentar)
                    <div class="flex gap-6">
                        <div class="w-12 h-12 rounded-full overflow-hidden bg-[#c9a96e]/10 flex-shrink-0 flex items-center justify-center text-[#c9a96e] font-cormorant text-2xl italic">
                            {{ substr($komentar->nama, 0, 1) }}
                        </div>
                        <div>
                            <div class="flex items-baseline gap-4 mb-2">
                                <h4 class="font-jost font-semibold text-[#1a110a]">{{ $komentar->nama }}</h4>
                                <span class="font-jost text-[9px] tracking-widest text-[#c9a96e] uppercase">{{ $komentar->created_at->format('d M Y') }}</span>
                            </div>
                            <p class="font-jost text-[#4A3F35] leading-relaxed font-light">{{ $komentar->isi_komentar }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="font-jost text-[#1a110a]/40 italic font-light">Jadilah yang pertama meninggalkan pesan untuk tulisan ini.</p>
                    @endforelse
                </div>

                <!-- Form Komentar -->
                <div class="bg-white p-10 md:p-14 shadow-[0_4px_40px_rgba(0,0,0,0.03)] rounded-sm border border-[#c9a96e]/10">
                    <h4 class="font-cormorant text-3xl text-[#c9a96e] italic mb-8">Tinggalkan Jejak</h4>

                    @if(session('success'))
                    <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 text-sm font-jost rounded-sm font-light">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('artikel.comment', $artikel->slug) }}" method="POST" class="space-y-8">
                        @csrf
                        <div>
                            <input type="text" name="nama" required placeholder="Nama Anda" class="w-full bg-transparent border-b border-[#1a110a]/10 py-3 font-jost text-[#1a110a] placeholder:text-[#1a110a]/30 focus:outline-none focus:border-[#c9a96e] transition-colors @error('nama') border-red-300 @enderror" value="{{ old('nama') }}">
                            @error('nama') <span class="text-xs text-red-400 mt-2 block font-jost">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <textarea name="isi_komentar" required rows="4" placeholder="Kesan atau pesan..." class="w-full bg-transparent border-b border-[#1a110a]/10 py-3 font-jost text-[#1a110a] placeholder:text-[#1a110a]/30 focus:outline-none focus:border-[#c9a96e] transition-colors resize-none @error('isi_komentar') border-red-300 @enderror">{{ old('isi_komentar') }}</textarea>
                            @error('isi_komentar') <span class="text-xs text-red-400 mt-2 block font-jost">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="font-jost text-[10px] tracking-[4px] uppercase border px-10 py-4 bg-transparent text-[#1a110a] border-[#1a110a]/20 hover:bg-[#c9a96e] hover:text-white hover:border-[#c9a96e] transition-all duration-700">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
            <footer class="mt-48 pt-24 border-t border-[#1a110a]/5 flex justify-center">
                <a href="{{ route('home') }}#artikel" class="group flex flex-col items-center">
                    <div class="w-16 h-[1px] bg-gold/30 mb-8 group-hover:w-32 transition-all duration-700"></div>
                    <span class="font-jost text-[10px] tracking-[6px] uppercase text-[#1a110a] group-hover:text-gold transition-colors italic">
                        Kembali Menginspirasi —
                    </span>
                </a>
            </footer>
        </div>
    </section>

    {{-- Script AOS agar animasi jalan --}}
    <style>
        .article-content p { @apply mb-8; }
        .article-content h2 { @apply font-cormorant text-4xl mt-16 mb-8 text-[#1a110a]; }
        .article-content ul { @apply list-disc list-inside space-y-4 mb-8; }
    </style>
</x-layout>
