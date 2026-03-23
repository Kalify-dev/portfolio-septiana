@props(['num', 'title', 'type'])

<div class="group relative bg-[#faf8f4] hover:bg-deep-brown transition-all duration-700 ease-in-out px-10 py-12 md:px-14 md:py-16 border-b border-r border-gold/10">
    <div class="font-cormorant text-xs tracking-[4px] text-gold uppercase mb-6 group-hover:translate-x-2 transition-transform duration-700">
        {{ str_pad($num, 2, '0', STR_PAD_LEFT) }}
    </div>
    
    <h3 class="font-cormorant text-2xl font-light text-deep-brown group-hover:text-gold-light leading-snug transition-all duration-700">
        {{ $title }}
    </h3>
    
    <div class="mt-8 flex justify-between items-end">
        <span class="text-[10px] tracking-[3px] text-text-muted/60 group-hover:text-gold opacity-100 group-hover:opacity-100 uppercase transition-all duration-700">
            {{ $type }}
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gold group-hover:-translate-y-2 opacity-0 group-hover:opacity-100 transition-all duration-700 ease-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
    </div>

    <!-- Hover Texture Overlay -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/handmade-paper.png')] opacity-0 group-hover:opacity-10 transition-opacity duration-700 pointer-events-none"></div>
</div>
