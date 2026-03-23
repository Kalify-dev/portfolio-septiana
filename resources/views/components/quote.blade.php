@props(['text', 'source'])

<section class="bg-deep-brown py-32 px-6 md:px-16 overflow-hidden relative">
    <div class="max-w-4xl mx-auto text-center relative z-10">
        <div class="w-16 h-[1px] bg-gold/30 mx-auto mb-12"></div>

        <blockquote class="relative">
            <p class="font-cormorant text-3xl md:text-5xl italic text-gold-light leading-relaxed mb-10">
                "{{ $text }}"
            </p>
            
            @if($source)
                <cite class="not-italic block text-sm tracking-[5px] text-gold uppercase opacity-80">
                    — {{ $source }}
                </cite>
            @endif
        </blockquote>

        <div class="w-16 h-[1px] bg-gold/30 mx-auto mt-12"></div>
    </div>

    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 font-cormorant text-[300px] text-white/5 pointer-events-none select-none">
        “
    </div>
</section>