@props(['profile', 'quote'])

<!-- PARALLAX HERO SECTION (DEE LESTARI INSPIRED) -->
<section class="relative min-h-screen w-full flex items-center justify-center overflow-hidden bg-fixed bg-center bg-cover" 
         style="background-image: url('{{ $quote && $quote->foto_hero ? asset('storage/' . $quote->foto_hero) : ($profile && $profile->image ? asset('storage/' . $profile->image) : asset('images/assets/bg-login.jpg')) }}');">
    
    <!-- Sophisticated Overlay: bg-black/50 for perfect readability -->
    <div class="absolute inset-0 bg-black/50 z-0"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/30 to-transparent z-0"></div>

    <!-- Centered Typography Content -->
    <div class="relative z-10 w-full max-w-6xl text-left px-10 md:px-20 animate-parallaxFade">
        <span class="font-jost text-[10px] tracking-[0.8em] text-white/40 uppercase block mb-12">
            Writer & Educator / Principal
        </span>
        
        <h1 class="font-cormorant text-4xl sm:text-6xl md:text-9xl lg:text-[12rem] font-light leading-none text-[#FDFBF7] tracking-tighter mb-10 capitalize drop-shadow-2xl">
            Septiana <span class="italic text-[#c9a96e] font-medium opacity-90 transition-all duration-1000 group-hover:opacity-100">Agustin</span>
        </h1>

        <div class="max-w-2xl border-t border-white/20 pt-16">
            <p class="font-cormorant text-2xl md:text-4xl italic text-white/95 leading-relaxed font-light tracking-wide italic">
                "Bermanja syahdu dikala senja, menikmati kopi sembari bermimpi."
            </p>
        </div>

        <!-- Scroll nudge (very minimal) -->
        <div class="mt-28 inline-flex flex-col items-center gap-6 opacity-40 hover:opacity-100 transition-opacity">
            <div class="w-[1px] h-24 bg-gradient-to-b from-white to-transparent"></div>
            <span class="font-jost text-[9px] tracking-[6px] uppercase text-white">Scroll Slowly</span>
        </div>
    </div>
</section>

<style>
@keyframes parallaxFade {
    from { opacity: 0; transform: translateY(60px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-parallaxFade {
    animation: parallaxFade 3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
</style>
