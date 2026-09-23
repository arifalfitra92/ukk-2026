@extends('layouts.app')

@section('title', config('app.name') . ' -- Kerangka PHP Ringan')

@section('content')

<style> /* ========================================================= MOUNTAIN LANDING PAGE ========================================================= */ .mountain-hero { position: relative; min-height: 620px; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 0 0 40px 40px; /* * HIJAU TETAP MENJADI WARNA UTAMA * tetapi mengikuti warna success dari framework. */ background: linear-gradient( 180deg, color-mix( in srgb, var(--bs-success) 65%, var(--bs-body-bg) ), color-mix( in srgb, var(--bs-success) 82%, var(--bs-body-bg) ) ); } /* ========================================================= EFEK KABUT ========================================================= */ .mountain-hero::before { content: ""; position: absolute; width: 700px; height: 700px; border-radius: 50%; background: color-mix( in srgb, var(--bs-light) 10%, transparent ); filter: blur(80px); top: -300px; left: -200px; } .mountain-hero::after { content: ""; position: absolute; width: 600px; height: 600px; border-radius: 50%; background: color-mix( in srgb, var(--bs-light) 10%, transparent ); filter: blur(90px); bottom: -350px; right: -150px; } /* ========================================================= CONTENT ========================================================= */ .hero-content { position: relative; z-index: 3; color: var(--bs-light); max-width: 850px; padding: 50px 20px; } /* ========================================================= BADGE ========================================================= */ .badge-brand { background: color-mix( in srgb, var(--bs-light) 15%, transparent ); border: 1px solid color-mix( in srgb, var(--bs-light) 30%, transparent ); color: var(--bs-light); backdrop-filter: blur(10px); box-shadow: 0 8px 25px color-mix( in srgb, var(--bs-dark) 15%, transparent ); letter-spacing: 1px; } /* ========================================================= TITLE ========================================================= */ .hero-title { font-size: clamp( 2.8rem, 7vw, 5.5rem ); line-height: 1.05; letter-spacing: -2px; color: var(--bs-light); text-shadow: 0 8px 25px color-mix( in srgb, var(--bs-dark) 25%, transparent ); } .text-brand-light { color: var(--bs-light); } /* ========================================================= DESCRIPTION ========================================================= */ .hero-description { color: color-mix( in srgb, var(--bs-light) 85%, transparent ); max-width: 650px; font-size: 1.15rem; line-height: 1.8; } /* ========================================================= BUTTON KUNING Tetap menggunakan warna framework ========================================================= */ .btn-mountain { background: var(--bs-warning); color: var(--bs-dark); border: 1px solid var(--bs-warning); font-weight: 700; border-radius: 14px; transition: all .3s ease; box-shadow: 0 10px 25px color-mix( in srgb, var(--bs-dark) 20%, transparent ); } .btn-mountain:hover { background: var(--bs-warning); border-color: var(--bs-warning); color: var(--bs-dark); transform: translateY(-3px); box-shadow: 0 15px 30px color-mix( in srgb, var(--bs-dark) 28%, transparent ); } /* ========================================================= OUTLINE BUTTON ========================================================= */ .btn-outline-mountain { color: var(--bs-light); border: 1px solid color-mix( in srgb, var(--bs-light) 55%, transparent ); background: color-mix( in srgb, var(--bs-light) 8%, transparent ); backdrop-filter: blur(8px); font-weight: 600; border-radius: 14px; transition: all .3s ease; } .btn-outline-mountain:hover { background: var(--bs-light); color: var(--bs-success); transform: translateY(-3px); } /* ========================================================= GUNUNG ========================================================= */ .mountain { position: absolute; bottom: -5px; z-index: 1; width: 0; height: 0; border-left: 260px solid transparent; border-right: 260px solid transparent; border-bottom: 390px solid color-mix( in srgb, var(--bs-dark) 45%, var(--bs-success) ); filter: drop-shadow( 0 -10px 15px color-mix( in srgb, var(--bs-dark) 10%, transparent ) ); } .mountain.one { left: -80px; } .mountain.two { right: -60px; transform: scale(1.25); opacity: .8; } .mountain.three { left: 35%; transform: scale(.75); opacity: .55; } /* ========================================================= SALJU ========================================================= */ .snow { position: absolute; z-index: 2; width: 0; height: 0; border-left: 65px solid transparent; border-right: 65px solid transparent; border-bottom: 95px solid color-mix( in srgb, var(--bs-light) 75%, transparent ); bottom: 288px; left: calc(50% - 65px); } /* ========================================================= POHON ========================================================= */ .trees { position: absolute; bottom: 0; left: 0; right: 0; height: 150px; z-index: 2; background: linear-gradient( 135deg, transparent 25%, color-mix( in srgb, var(--bs-dark) 60%, var(--bs-success) ) 25%, color-mix( in srgb, var(--bs-dark) 60%, var(--bs-success) ) 30%, transparent 30% ), linear-gradient( 45deg, transparent 25%, color-mix( in srgb, var(--bs-dark) 45%, var(--bs-success) ) 25%, color-mix( in srgb, var(--bs-dark) 45%, var(--bs-success) ) 30%, transparent 30% ); opacity: .9; } /* ========================================================= FLOATING ICON ========================================================= */ .floating-icon { position: absolute; z-index: 3; font-size: 35px; opacity: .8; animation: floating 4s ease-in-out infinite; } .icon-1 { top: 18%; left: 8%; } .icon-2 { top: 28%; right: 10%; animation-delay: 1s; } .icon-3 { bottom: 27%; left: 17%; animation-delay: 2s; } @keyframes floating { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-12px); } } /* ========================================================= INFO SECTION ========================================================= */ .mountain-info { margin-top: -1px; padding: 70px 20px; /* * TIDAK lagi menggunakan #f5f7f0. * Framework yang menentukan background. */ background: color-mix( in srgb, var(--bs-success) 5%, var(--bs-body-bg) ); color: var(--bs-body-color); } /* ========================================================= INFO CARD ========================================================= */ .info-card { /* * TIDAK lagi menggunakan white. */ background: var(--bs-body-bg); color: var(--bs-body-color); border: 1px solid var(--bs-border-color); border-radius: 20px; padding: 25px; height: 100%; box-shadow: 0 10px 35px color-mix( in srgb, var(--bs-dark) 8%, transparent ); transition: all .3s ease; } .info-card:hover { transform: translateY(-7px); box-shadow: 0 18px 40px color-mix( in srgb, var(--bs-dark) 14%, transparent ); } /* ========================================================= INFO ICON ========================================================= */ .info-icon { width: 55px; height: 55px; display: flex; align-items: center; justify-content: center; border-radius: 15px; background: color-mix( in srgb, var(--bs-success) 12%, var(--bs-body-bg) ); color: var(--bs-success); font-size: 25px; margin-bottom: 15px; } /* ========================================================= DARK MODE ========================================================= */ [data-bs-theme="dark"] .mountain-hero { background: linear-gradient( 180deg, color-mix( in srgb, var(--bs-success) 38%, var(--bs-body-bg) ), color-mix( in srgb, var(--bs-success) 20%, var(--bs-body-bg) ) ); } [data-bs-theme="dark"] .mountain-info { background: color-mix( in srgb, var(--bs-success) 7%, var(--bs-body-bg) ); } /* ========================================================= RESPONSIVE ========================================================= */ @media (max-width: 768px) { .mountain-hero { min-height: 650px; border-radius: 0 0 25px 25px; } .hero-title { letter-spacing: -1px; } .mountain { transform: scale(.65); transform-origin: bottom center; } .mountain.two { transform: scale(.8); } .mountain.three { transform: scale(.55); } .snow { bottom: 230px; } } </style>

{{-- =========================================================
HERO
========================================================= --}}

<section class="mountain-hero">
{{-- Gunung --}}

<div class="mountain one"></div>

<div class="mountain two"></div>

<div class="mountain three"></div>

<div class="snow"></div>


{{-- Hutan --}}

<div class="trees"></div>


{{-- Dekorasi --}}

<div class="floating-icon icon-1">
    🏕️
</div>

<div class="floating-icon icon-2">
    ⛰️
</div>

<div class="floating-icon icon-3">
    🌲
</div>


{{-- Content --}}

<div class="hero-content text-center">

    <span class="badge rounded-pill badge-brand px-4 py-2 mb-4">

        MULAI MUNCAK YUKK!!

    </span>


    <h1 class="hero-title fw-bold mb-4">

        Puncak Tertinggi,<br>

        <span class="text-brand-light">

            Keindahan Sejati

        </span>

    </h1>


    <p class="hero-description mx-auto mb-4">

        Web Peminjaman Alat Camping memudahkan customer untuk menyewa/mencari
        peralatan untuk mendaki gunung gunung yang indah.

    </p>


    <div class="d-flex flex-wrap gap-3 justify-content-center">

        <a
            class="btn btn-mountain btn-lg px-4 py-3"
            href="{{ route('kategori.index') }}"
        >

            🏕️ &nbsp; Kategori

        </a>


        <a
            class="btn btn-outline-mountain btn-lg px-4 py-3"
            href="{{ route('alat.index') }}"
            target="_blank"
        >

            🎒 &nbsp; Peralatan

        </a>

    </div>


    <p class="small mt-4 mb-0 text-white-50">

        Pesan dan cari barang untuk mendukung pendakian kalian.

        <code class="inline"></code>

    </p>

</div>

</section>

{{-- =========================================================
INFO SECTION
========================================================= --}}

<section class="mountain-info">
<div class="container">

    <div class="row g-4 justify-content-center">


        <div class="col-md-4">
            <div class="info-card">

               <div class="info-icon">
                    🎒
                </div>

                <h5 class="fw-bold">

                    Peralatan Camping

                </h5>

                <p class="text-secondary mb-0">

                    Temukan berbagai perlengkapan yang dapat
                    mendukung perjalanan pendakian kalian.

                </p>

            </div>
        </div>


        <div class="col-md-4">

            <div class="info-card">

                <div class="info-icon">
                    ⛰️
                </div>

                <h5 class="fw-bold">

                    Siap Mendaki

                </h5>

                <p class="text-secondary mb-0">

                    Persiapkan perlengkapan sebelum menikmati
                    keindahan alam dan pegunungan.

                </p>

            </div>

        </div>


        <div class="col-md-4">

            <div class="info-card">

                <div class="info-icon">
                    🏕️
                </div>

                <h5 class="fw-bold">

                    Petualangan Baru

                </h5>

                <p class="text-secondary mb-0">

                    Lengkapi kebutuhan camping untuk perjalanan
                    dan petualangan yang lebih menyenangkan.

                </p>

            </div>

        </div>


    </div>

</div>

</section>

@endsection