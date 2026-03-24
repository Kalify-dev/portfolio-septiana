<div class="custom-login-container">
    <!-- SISI KIRI: Background & Tagline (50%) -->
    <div class="custom-left">
        <div class="overlay"></div>
        <div class="quote-wrapper">
            <blockquote>"Bermanja syahdu dikala senja, menikmati kopi sembari bermimpi."</blockquote>
            <p class="author">— Septiana Agustin</p>
        </div>
    </div>
    
    <!-- SISI KANAN: Background Gelap & Form Login (50%) -->
    <div class="custom-right">
        <div class="login-box">
            <div class="header">
                <!-- Vibe Penulis: Huruf tipis, jarak lebar, kesan elegan -->
                <h1>SEPTIANA <span class="italic-gold">Agustin</span></h1>
                <p class="sub-header">Writer & Educator Portfolio</p>
                <div class="divider"></div>
            </div>
            
            <div class="filament-form-wrapper">
                <x-filament-panels::form wire:submit="authenticate">
                    {{ $this->form }}

                    <button type="submit" class="custom-submit-btn">
                        SIGN IN
                    </button>
                </x-filament-panels::form>
            </div>
        </div>
    </div>

    <!-- STYLE OVERRIDES -->
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Jost:wght@300;400;600&display=swap');

    /* Reset Filament Default Layout Components */
    .fi-simple-layout { background-color: #0c0c0c !important; }
    .fi-simple-main-ctn, .fi-simple-page, .fi-simple-main {
        max-width: 100% !important; padding: 0 !important; margin: 0 !important;
        background: transparent !important; box-shadow: none !important; border: none !important;
    }
    .fi-logo, .fi-simple-main > header, .fi-simple-main > footer, .fi-simple-main footer,
    .fi-form-actions, .fi-simple-main-ctn footer { display: none !important; }

    /* Main Container Split Screen */
    .custom-login-container {
        position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
        display: flex; z-index: 9999; font-family: 'Cormorant Garamond', serif;
    }

    /* Left Side: 50% Lebar dengan Gambar Vibes */
    .custom-left {
        width: 50%; background-image: url('{{ asset('assets/images/bg-login.jpg') }}'); 
        background-size: cover; background-position: center 30%; background-repeat: no-repeat;
        display: flex; align-items: flex-end; justify-content: center; position: relative;
        padding-bottom: 8.5rem;
    }
    .custom-left .overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.2) 65%, rgba(0,0,0,0.1) 100%);
        z-index: 1;
    }
    .quote-wrapper { text-align: center; position: relative; z-index: 10; padding: 0 4rem; max-width: 90%; }
    .quote-wrapper blockquote {
        font-family: 'Cormorant Garamond', serif; font-size: 3rem; color: #ffffff;
        font-style: italic; font-weight: 300; line-height: 1.35; margin-bottom: 1.8rem;
        text-shadow: 2px 2px 15px rgba(0,0,0,0.8); letter-spacing: 0.5px;
    }
    .quote-wrapper .author {
        font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; color: #c9a96e;
        margin: 0; text-transform: uppercase; letter-spacing: 7px; opacity: 0.9; font-weight: 400;
    }

    /* Right Side: Dark Mode Minimalis Luxe */
    .custom-right {
        width: 50%; background-color: #0c0c0c; display: flex;
        align-items: center; justify-content: center; padding: 3rem; z-index: 20;
    }
    .login-box { width: 100%; max-width: 380px; }
    
    .header { text-align: center; margin-bottom: 4.5rem; }
    .header h1 {
        font-family: 'Cormorant Garamond', serif; font-size: 2.8rem; color: #ffffff;
        font-weight: 300; margin: 0; letter-spacing: 12px; text-transform: uppercase;
    }
    .header .italic-gold { color: #c9a96e; font-style: italic; letter-spacing: 2px; text-transform: none; font-size: 3.2rem; }
    .header .sub-header {
        font-family: 'Jost', sans-serif; font-size: 0.7rem; color: #555;
        text-transform: uppercase; letter-spacing: 5px; margin-top: 1rem;
    }
    .header .divider {
        width: 45px; height: 1px; background: rgba(201, 169, 110, 0.4); margin: 2rem auto;
    }

    /* Form Fields Styling: Elegant & Serif */
    .filament-form-wrapper, .filament-form-wrapper * { font-family: 'Cormorant Garamond', serif !important; }
    .filament-form-wrapper .fi-fo-field-wrp-label span {
        font-size: 1.1rem !important; color: #666 !important; font-weight: 400 !important;
        letter-spacing: 2px; text-transform: uppercase; transition: color 0.4s ease;
    }
    .fi-fo-field-wrp:focus-within label span { color: #c9a96e !important; }
    
    .fi-input-wrp {
        background-color: transparent !important; border: none !important;
        box-shadow: 0 1px 0 0 rgba(201, 169, 110, 0.15) !important;
        border-radius: 0 !important; transition: all 0.5s ease;
    }
    .fi-input-wrp:focus-within { box-shadow: 0 1px 0 0 rgba(201, 169, 110, 1) !important; }
    .filament-form-wrapper input {
        background-color: transparent !important; border: none !important;
        color: #f1f1f1 !important; padding: 1.25rem 0 !important; font-size: 1.45rem !important;
        box-shadow: none !important; letter-spacing: 0.5px;
    }

    /* Autofill & Checkbox */
    .filament-form-wrapper input:-webkit-autofill,
    .filament-form-wrapper input:-webkit-autofill:hover, 
    .filament-form-wrapper input:-webkit-autofill:focus, 
    .filament-form-wrapper input:-webkit-autofill:active{
        -webkit-box-shadow: 0 0 0 30px #0c0c0c inset !important;
        -webkit-text-fill-color: white !important;
        transition: background-color 500s ease-in-out 0s;
    }
    .fi-checkbox-input { color: #c9a96e !important; border-color: rgba(201,169,110,0.3) !important; background-color: transparent !important; }
    .fi-checkbox-input:checked { background-color: #c9a96e !important; }

    /* Submit Button: Premium Transition */
    .custom-submit-btn {
        width: 100%; margin-top: 4rem; padding: 1.3rem;
        font-family: 'Jost', sans-serif; font-size: 0.85rem;
        background-color: #c9a96e; color: #0c0c0c; border: none;
        cursor: pointer; transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        border-radius: 2px; font-weight: 600; letter-spacing: 6px; text-transform: uppercase;
    }
    .custom-submit-btn:hover {
        background-color: #f3dfb4; letter-spacing: 8px; transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.5), 0 5px 15px rgba(201, 169, 110, 0.2);
    }

    /* Additional Animations */
    .login-box { animation: fadeInRight 1.5s ease-out; }
    @keyframes fadeInRight {
        from { opacity: 0; transform: translateX(20px); }
        to { opacity: 1; transform: translateX(0); }
    }
    .quote-wrapper { animation: fadeInLeft 1.5s ease-out; }
    @keyframes fadeInLeft {
        from { opacity: 0; transform: translateX(-20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .custom-left { display: none; }
        .custom-right { width: 100%; padding: 2rem; }
        .custom-login-container { position: relative; }
    }
    </style>
</div>
