<div x-data="{ open: false }">
    <!-- FLOATING BURGER BUTTON (Top Right) -->
    <button @click="open = true" 
            class="fixed top-6 right-6 z-[60] p-4 rounded-full border border-[#c9a96e]/30 bg-white/5 backdrop-blur-md hover:bg-[#c9a96e] transition-all duration-500 group shadow-xl"
            aria-label="Open Menu">
        <div class="w-6 h-5 flex flex-col justify-between items-end">
            <span class="w-full h-[1px] bg-[#c9a96e] group-hover:bg-white transition-colors duration-300"></span>
            <span class="w-4/5 h-[1px] bg-[#c9a96e] group-hover:bg-white transition-colors duration-300"></span>
            <span class="w-full h-[1px] bg-[#c9a96e] group-hover:bg-white transition-colors duration-300"></span>
        </div>
    </button>

    <!-- FULLSCREEN OVERLAY MENU -->
    <div x-show="open"
         @click.away="open = false"
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-400"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 bg-[#1a110a]/97 backdrop-blur-md flex items-center justify-center overflow-hidden"
         style="display: none;">

        <!-- Close Button (X) -->
        <button @click="open = false"
                class="absolute top-6 right-6 p-4 text-[#c9a96e] hover:text-white transition-colors duration-300"
                aria-label="Close Menu">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Ghost Decor Text -->
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-[0.02]">
            <span class="font-cormorant text-[30vw] text-[#c9a96e] italic tracking-tighter select-none">NANA</span>
        </div>

        <!-- Menu Links — Uses JS smooth scroll AFTER overlay closes -->
        <nav class="relative z-10 text-center">
            <ul class="flex flex-col gap-6 md:gap-10">
                @php 
                    $navLinks = [
                        ['no' => '01', 'label' => 'Beranda',      'target' => 'home'],
                        ['no' => '02', 'label' => 'Biografi',     'target' => 'biografi'],
                        ['no' => '03', 'label' => 'Karya & Buku', 'target' => 'karya'],
                        ['no' => '04', 'label' => 'Artikel',      'target' => 'artikel'],
                        ['no' => '05', 'label' => 'Galeri',       'target' => 'galeri'],
                        ['no' => '06', 'label' => 'Kontak',       'target' => 'kontak'],
                    ];
                @endphp
                @foreach($navLinks as $link)
                <li>
                        <a href="{{ $link['target'] === 'home' ? url('/') : url('/') . '#' . $link['target'] }}" 
                           @click="open = false"
                           class="group flex items-center justify-center gap-6 font-cormorant text-4xl md:text-7xl lg:text-8xl text-[#fdfbf7] hover:text-[#c9a96e] transition-all duration-500 tracking-tighter w-full cursor-pointer">
                            <span class="font-jost text-xs tracking-[6px] uppercase text-[#c9a96e]/30 group-hover:text-[#c9a96e] transition-colors duration-500">
                                {{ $link['no'] }}.
                            </span>
                            {{ $link['label'] }}
                        </a>
                </li>
                @endforeach
            </ul>

            <div class="mt-20 md:mt-28 space-y-3 opacity-30">
                <p class="font-jost text-[9px] tracking-[8px] uppercase text-[#c9a96e]">Yayasan Gema Nada Inspiratif</p>
                <p class="font-jost text-[9px] tracking-[4px] uppercase text-white">Bondowoso — Jawa Timur</p>
            </div>
        </nav>
    </div>
</div>
