@extends('layouts.app')

@section('title', 'Login')

@section('content')

<style>
    /* =========================================================
       LOGIN PAGE - MOUNTAIN THEME
       ========================================================= */

    .login-wrapper {
        position: relative;
        min-height: 620px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding: 50px 20px;
        background:
            linear-gradient(
                180deg,
                color-mix(in srgb, var(--bs-success) 65%, var(--bs-body-bg)),
                color-mix(in srgb, var(--bs-success) 82%, var(--bs-body-bg))
            );
        border-radius: 0 0 40px 40px;
    }

    /* Kabut kiri */
    .login-wrapper::before {
        content: "";
        position: absolute;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: color-mix(
            in srgb,
            var(--bs-light) 10%,
            transparent
        );
        filter: blur(80px);
        top: -220px;
        left: -150px;
    }

    /* Kabut kanan */
    .login-wrapper::after {
        content: "";
        position: absolute;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: color-mix(
            in srgb,
            var(--bs-light) 10%,
            transparent
        );
        filter: blur(90px);
        bottom: -280px;
        right: -150px;
    }

    /* =========================================================
       GUNUNG
       ========================================================= */

    .login-mountain {
        position: absolute;
        bottom: -5px;
        z-index: 1;
        width: 0;
        height: 0;
        border-left: 230px solid transparent;
        border-right: 230px solid transparent;
        border-bottom: 350px solid color-mix(
            in srgb,
            var(--bs-dark) 45%,
            var(--bs-success)
        );
        filter: drop-shadow(
            0 -10px 15px
            color-mix(in srgb, var(--bs-dark) 10%, transparent)
        );
    }

    .login-mountain.one {
        left: -100px;
    }

    .login-mountain.two {
        right: -80px;
        transform: scale(1.2);
        opacity: .8;
    }

    .login-mountain.three {
        left: 38%;
        transform: scale(.7);
        opacity: .5;
    }

    /* Salju */
    .login-snow {
        position: absolute;
        z-index: 2;
        width: 0;
        height: 0;
        border-left: 55px solid transparent;
        border-right: 55px solid transparent;
        border-bottom: 80px solid color-mix(
            in srgb,
            var(--bs-light) 75%,
            transparent
        );
        bottom: 255px;
        left: calc(50% - 55px);
    }

    /* =========================================================
       FLOATING ICON
       ========================================================= */

    .login-icon {
        position: absolute;
        z-index: 3;
        font-size: 32px;
        opacity: .8;
        animation: loginFloating 4s ease-in-out infinite;
    }

    .login-icon.one {
        top: 15%;
        left: 10%;
    }

    .login-icon.two {
        top: 25%;
        right: 10%;
        animation-delay: 1s;
    }

    .login-icon.three {
        bottom: 20%;
        left: 15%;
        animation-delay: 2s;
    }

    @keyframes loginFloating {
        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-12px);
        }
    }

    /* =========================================================
       LOGIN CONTENT
       ========================================================= */

    .login-content {
        position: relative;
        z-index: 5;
        width: 100%;
        max-width: 440px;
    }

    .login-card {
        background: color-mix(
            in srgb,
            var(--bs-body-bg) 94%,
            transparent
        );
        color: var(--bs-body-color);
        border: 1px solid color-mix(
            in srgb,
            var(--bs-light) 25%,
            var(--bs-border-color)
        );
        border-radius: 24px;
        padding: 8px;
        box-shadow:
            0 25px 60px
            color-mix(in srgb, var(--bs-dark) 25%, transparent);
        backdrop-filter: blur(15px);
    }

    .login-card-body {
        padding: 32px;
    }

    /* =========================================================
       BRAND ICON
       ========================================================= */

    .login-brand-icon {
        width: 65px;
        height: 65px;
        margin: 0 auto 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        background: color-mix(
            in srgb,
            var(--bs-success) 14%,
            var(--bs-body-bg)
        );
        color: var(--bs-success);
        font-size: 30px;
        box-shadow:
            0 10px 25px
            color-mix(in srgb, var(--bs-success) 15%, transparent);
    }

    .login-title {
        font-weight: 800;
        font-size: 2rem;
        margin-bottom: 8px;
    }

    .login-description {
        color: var(--bs-secondary-color);
        margin-bottom: 28px;
    }

    /* =========================================================
       FORM
       ========================================================= */

    .login-card .form-label {
        font-weight: 600;
        margin-bottom: 8px;
    }

    .login-card .form-control {
        min-height: 48px;
        border-radius: 13px;
        border: 1px solid var(--bs-border-color);
        background: var(--bs-body-bg);
        color: var(--bs-body-color);
        transition: all .25s ease;
    }

    .login-card .form-control:focus {
        border-color: var(--bs-success);
        box-shadow:
            0 0 0 .2rem
            color-mix(in srgb, var(--bs-success) 18%, transparent);
    }

    /* =========================================================
       LOGIN BUTTON
       ========================================================= */

    .btn-login {
        min-height: 50px;
        border-radius: 14px;
        background: var(--bs-warning);
        color: var(--bs-dark);
        border: 1px solid var(--bs-warning);
        font-weight: 700;
        transition: all .3s ease;
        box-shadow:
            0 10px 25px
            color-mix(in srgb, var(--bs-dark) 18%, transparent);
    }

    .btn-login:hover {
        background: var(--bs-warning);
        border-color: var(--bs-warning);
        color: var(--bs-dark);
        transform: translateY(-3px);
        box-shadow:
            0 15px 30px
            color-mix(in srgb, var(--bs-dark) 25%, transparent);
    }

    /* =========================================================
       REGISTER
       ========================================================= */

    .register-text {
        color: var(--bs-secondary-color);
    }

    .register-link {
        color: var(--bs-success);
        font-weight: 700;
        text-decoration: none;
    }

    .register-link:hover {
        text-decoration: underline;
    }

    /* =========================================================
       DARK MODE
       ========================================================= */

    [data-bs-theme="dark"] .login-wrapper {
        background: linear-gradient(
            180deg,
            color-mix(in srgb, var(--bs-success) 38%, var(--bs-body-bg)),
            color-mix(in srgb, var(--bs-success) 20%, var(--bs-body-bg))
        );
    }

    [data-bs-theme="dark"] .login-card {
        background: color-mix(
            in srgb,
            var(--bs-body-bg) 90%,
            var(--bs-success)
        );

        border-color: color-mix(
            in srgb,
            var(--bs-light) 12%,
            var(--bs-border-color)
        );
    }

    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (max-width: 768px) {

        .login-wrapper {
            min-height: 650px;
            border-radius: 0 0 25px 25px;
        }

        .login-card-body {
            padding: 25px;
        }

        .login-title {
            font-size: 1.7rem;
        }

        .login-mountain {
            transform: scale(.65);
            transform-origin: bottom center;
        }

        .login-mountain.two {
            transform: scale(.75);
        }

        .login-mountain.three {
            transform: scale(.5);
        }

        .login-snow {
            bottom: 220px;
        }
    }
</style>


<section class="login-wrapper">

    {{-- Gunung --}}
    <div class="login-mountain one"></div>
    <div class="login-mountain two"></div>
    <div class="login-mountain three"></div>

    {{-- Salju --}}
    <div class="login-snow"></div>


    {{-- Floating Icon --}}
    <div class="login-icon one">
        🏕️
    </div>

    <div class="login-icon two">
        ⛰️
    </div>

    <div class="login-icon three">
        🌲
    </div>


    {{-- Login Content --}}
    <div class="login-content">

        <div class="login-card">

            <div class="login-card-body">

                {{-- Icon --}}
                <div class="login-brand-icon">
                    🏕️
                </div>

                {{-- Heading --}}
                <div class="text-center">

                    <h1 class="login-title">
                        Selamat Datang
                    </h1>

                    <p class="login-description">
                        Masuk untuk melanjutkan petualanganmu.
                    </p>

                </div>


                {{-- Form --}}
                <form method="POST" action="{{ route('login.attempt') }}">

                    @csrf

                    {{-- Username --}}
                    <div class="mb-3">

                        <label
                            class="form-label"
                            for="username"
                        >
                            Username
                        </label>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="{{ old('username') }}"
                            class="form-control {{ errors()->has('username') ? 'is-invalid' : '' }}"
                            placeholder="Masukkan username"
                            autofocus
                        >

                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Password --}}
                    <div class="mb-4">

                        <label
                            class="form-label"
                            for="password"
                        >
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control {{ errors()->has('password') ? 'is-invalid' : '' }}"
                            placeholder="Masukkan password"
                        >

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Login Button --}}
                    <button
                        class="btn btn-login w-100"
                        type="submit"
                    >
                        🏕️ &nbsp; Masuk
                    </button>

                </form>


                {{-- Register --}}
                @php
                    $canRegister = false;

                    try {
                        $canRegister = \App\Models\Role::where(
                            'can_register',
                            1
                        )->exists();
                    } catch (\Throwable $e) {
                        $canRegister = false;
                    }
                @endphp


                @if ($canRegister)

                    <p class="register-text small text-center mt-4 mb-0">

                        Belum punya akun?

                        <a
                            href="{{ route('register') }}"
                            class="register-link"
                        >
                            Daftar di sini
                        </a>

                    </p>

                @endif

            </div>

        </div>

    </div>

</section>

@endsection