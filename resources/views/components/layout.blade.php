<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Nana — Septiana Agustin | Penulis & Pendidik' }}</title>

    {{-- SEO Meta Tags --}}
    <meta name="description" content="{{ $metaDescription ?? 'Septiana Agustin — Penulis, Pendidik, dan Kepala Sekolah. Jelajahi karya, tulisan, dan perjalanan inspiratif seorang perempuan yang berkarya dengan sepenuh hati dari Bondowoso, Jawa Timur.' }}">
    <meta name="author" content="Septiana Agustin">
    <meta name="keywords" content="Septiana Agustin, penulis Indonesia, pendidik, kepala sekolah, buku motivasi, antologi sastra, Bondowoso">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph (Facebook, WhatsApp share) --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Nana — Septiana Agustin | Penulis & Pendidik' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Jelajahi karya dan perjalanan inspiratif Septiana Agustin — penulis, pendidik, dan kepala sekolah dari Bondowoso, Jawa Timur.' }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('assets/images/bg-login.jpg') }}">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="Septiana Agustin">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Nana — Septiana Agustin' }}">
    <meta name="twitter:description" content="{{ $metaDescription ?? 'Penulis, Pendidik, dan Kepala Sekolah dari Bondowoso, Jawa Timur.' }}">
    <meta name="twitter:image" content="{{ $ogImage ?? asset('assets/images/bg-login.jpg') }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#faf8f4] text-deep-brown font-jost antialiased selection:bg-gold/30 opacity-0 transition-opacity duration-[1500ms]" id="luxe-body">
    <x-nav />
    
    <main>
        {{ $slot }}
    </main>

    <footer class="bg-black/95 py-10 px-6 md:px-12 border-t border-white/5">
        <div class="max-w-[1400px] mx-auto flex flex-row justify-between items-end gap-0">
            <!-- LEFT SISI: SEPTIANA AGUSTIN -->
            <div class="text-left">
                <div class="font-cormorant text-lg md:text-xl tracking-[6px] text-[#FAF8F5]/50 uppercase mb-2 leading-none">Septiana Agustin</div>
                <p class="text-[9px] text-[#FAF8F5]/30 tracking-[4px] uppercase leading-none">
                    © 2026 Septiana Agustin.
                </p>
            </div>

            <!-- RIGHT SISI: HANYA LOGO -->
            <div class="text-right">
                <a href="https://kalifydev.netlify.app/" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="inline-block opacity-70 hover:opacity-100 hover:scale-105 active:scale-95 hover:drop-shadow-[0_0_8px_rgba(255,255,255,0.3)] transition-all duration-500">
                    <img src="{{ asset('assets/images/kalify_logo.png') }}" 
                         class="h-8 md:h-10 w-auto ml-auto" 
                         alt="Kalify.dev - Engineered for Simplicity">
                </a>
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Global Fade-In
        window.addEventListener('DOMContentLoaded', () => {
            document.getElementById('luxe-body').classList.remove('opacity-0');
        });

        // Init GSAP Scroll
        document.querySelectorAll('a[href^="#"]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('href');
                gsap.to(window, {
                    duration: 2.5, 
                    scrollTo: { y: target, offsetY: 95 }, 
                    ease: "power4.inOut",
                    overwrite: true
                });
            });
        });

        // Init AOS
        AOS.init({
            duration: 1200,
            once: true,
            offset: 100
        });
    </script>
</body>
</html>
