<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nana — Septiana Agustin</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet">
<style>
:root{--cream:#f5f0e8;--warm-white:#faf8f4;--deep-brown:#2c1f14;--mid-brown:#6b4c35;--gold:#c9a96e;--gold-light:#e8d5b0;--sage:#8a9e8c;--text-main:#2c1f14;--text-muted:#7a6a5a}
*{margin:0;padding:0;box-sizing:border-box}html{scroll-behavior:smooth}
body{background-color:var(--warm-white);color:var(--text-main);font-family:'Jost',sans-serif;font-weight:300;overflow-x:hidden}
nav{position:fixed;top:0;left:0;right:0;z-index:100;display:flex;justify-content:space-between;align-items:center;padding:24px 60px;background:rgba(250,248,244,0.9);backdrop-filter:blur(12px);border-bottom:1px solid rgba(201,169,110,0.15)}
.nav-logo{font-family:'Cormorant Garamond',serif;font-size:22px;font-weight:500;letter-spacing:2px;color:var(--deep-brown);text-decoration:none}
.nav-links{display:flex;gap:40px;list-style:none}
.nav-links a{font-size:11px;font-weight:400;letter-spacing:3px;text-transform:uppercase;color:var(--text-muted);text-decoration:none;transition:color 0.3s}
.nav-links a:hover{color:var(--gold)}
footer{background:#1a110a;padding:40px 60px;display:flex;justify-content:space-between;align-items:center}
.footer-logo{font-family:'Cormorant Garamond',serif;font-size:18px;color:var(--gold);letter-spacing:2px}
.footer-copy{font-size:11px;letter-spacing:1px;color:rgba(201,169,110,0.4)}
@media(max-width:768px){nav{padding:20px 24px}.nav-links{display:none}footer{flex-direction:column;gap:12px;text-align:center}}
</style>
@stack('styles')
</head>
<body>
<nav>
  <a href="/" class="nav-logo">N A N A</a>
  <ul class="nav-links">
    <li><a href="#bio">Biografi</a></li>
    <li><a href="#buku">Buku</a></li>
    <li><a href="#artikel">Artikel</a></li>
    <li><a href="#kontak">Kontak</a></li>
  </ul>
</nav>
@yield('content')
<footer>
  <div class="footer-logo">NANA</div>
  <div class="footer-copy">© {{ date('Y') }} Septiana Agustin. All rights reserved.</div>
</footer>
</body>
</html>
