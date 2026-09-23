<style>
    /* =========================================================
       NAVBAR MOUNTAIN THEME
       ========================================================= */

    .main-navbar {
        background: color-mix(
            in srgb,
            var(--bs-body-bg) 92%,
            var(--bs-success)
        ) !important;

        border-bottom: 1px solid
            color-mix(
                in srgb,
                var(--bs-success) 15%,
                var(--bs-border-color)
            ) !important;

        backdrop-filter: blur(12px);
        box-shadow:
            0 4px 20px
            color-mix(in srgb, var(--bs-dark) 6%, transparent);
    }

    /* =========================================================
       BRAND
       ========================================================= */

    .main-navbar .navbar-brand {
        color: var(--bs-body-color);
        transition: all .25s ease;
    }

    .main-navbar .navbar-brand:hover {
        color: var(--bs-success);
    }

    /* =========================================================
       THEME / DATABASE BUTTON
       ========================================================= */

    .logo-toggle {
        width: 42px;
        height: 42px;

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 0;

        border: 1px solid
            color-mix(
                in srgb,
                var(--bs-success) 25%,
                var(--bs-border-color)
            );

        border-radius: 13px;

        background: color-mix(
            in srgb,
            var(--bs-success) 8%,
            var(--bs-body-bg)
        );

        color: var(--bs-success);

        cursor: pointer;

        transition: all .3s ease;
    }

    .logo-toggle:hover {
        background: color-mix(
            in srgb,
            var(--bs-success) 15%,
            var(--bs-body-bg)
        );

        border-color: var(--bs-success);

        transform: translateY(-2px);

        box-shadow:
            0 8px 20px
            color-mix(in srgb, var(--bs-success) 15%, transparent);
    }

    .logo-ring {
        fill: none;
        stroke: var(--bs-success);
        stroke-width: 2;
    }

    /* =========================================================
       NAV LINK
       ========================================================= */

    .main-navbar .nav-link {
        position: relative;

        color: var(--bs-body-color);

        font-weight: 500;

        padding: 9px 13px !important;

        border-radius: 10px;

        transition: all .25s ease;
    }

    .main-navbar .nav-link:hover {
        color: var(--bs-success);

        background: color-mix(
            in srgb,
            var(--bs-success) 8%,
            transparent
        );
    }

    .main-navbar .nav-link.active {
        color: var(--bs-success);

        font-weight: 700;

        background: color-mix(
            in srgb,
            var(--bs-success) 10%,
            transparent
        );
    }

    /* =========================================================
       LOGIN BUTTON
       ========================================================= */

    .navbar-login {
        background: var(--bs-warning);

        color: var(--bs-dark);

        border: 1px solid var(--bs-warning);

        font-weight: 700;

        transition: all .3s ease;

        box-shadow:
            0 6px 18px
            color-mix(in srgb, var(--bs-dark) 12%, transparent);
    }

    .navbar-login:hover {
        background: var(--bs-warning);

        border-color: var(--bs-warning);

        color: var(--bs-dark);

        transform: translateY(-2px);

        box-shadow:
            0 10px 25px
            color-mix(in srgb, var(--bs-dark) 18%, transparent);
    }

    /* =========================================================
       LOGOUT BUTTON
       ========================================================= */

    .navbar-logout {
        border-radius: 10px;

        font-weight: 600;

        transition: all .25s ease;
    }

    .navbar-logout:hover {
        transform: translateY(-2px);
    }

    /* =========================================================
       MOBILE TOGGLER
       ========================================================= */

    .main-navbar .navbar-toggler {
        padding: 8px 10px;

        border-radius: 10px;

        background: color-mix(
            in srgb,
            var(--bs-success) 8%,
            transparent
        );
    }

    .main-navbar .navbar-toggler:focus {
        box-shadow:
            0 0 0 .2rem
            color-mix(
                in srgb,
                var(--bs-success) 20%,
                transparent
            );
    }

    /* =========================================================
       DARK MODE
       ========================================================= */

    [data-bs-theme="dark"] .main-navbar {
        background: color-mix(
            in srgb,
            var(--bs-body-bg) 90%,
            var(--bs-success)
        ) !important;

        border-bottom-color:
            color-mix(
                in srgb,
                var(--bs-success) 20%,
                var(--bs-border-color)
            ) !important;
    }

    [data-bs-theme="dark"] .navbar-login {
        color: var(--bs-dark);
    }

    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (max-width: 991.98px) {

        .main-navbar .navbar-collapse {
            margin-top: 12px;

            padding: 12px;

            border-radius: 16px;

            background: color-mix(
                in srgb,
                var(--bs-body-bg) 96%,
                var(--bs-success)
            );

            border: 1px solid var(--bs-border-color);

            box-shadow:
                0 10px 30px
                color-mix(in srgb, var(--bs-dark) 8%, transparent);
        }

        .main-navbar .nav-link {
            margin-bottom: 3px;
        }

        .navbar-login,
        .navbar-logout {
            width: 100%;
            justify-content: center;
        }
    }
</style>


<nav class="navbar navbar-expand-lg sticky-top main-navbar">

    <div class="container">

        {{-- Logo + Theme Toggle --}}
        <div class="d-flex align-items-center gap-2">

            @php
                $dbConnected = false;

                try {
                    \Sakuci\Database\Connection::pdo();
                    $dbConnected = true;
                } catch (\Throwable $e) {
                    $dbConnected = false;
                }
            @endphp


            {{-- Theme Toggle --}}
            <button
                id="themeToggle"
                type="button"
                class="logo-toggle"
                aria-label="Ganti tema terang/gelap (status database: {{ $dbConnected ? 'terhubung' : 'tidak terhubung' }})"
                title="Ganti tema terang/gelap"
            >

                <svg
                    width="28"
                    height="28"
                    viewBox="0 0 32 32"
                    xmlns="http://www.w3.org/2000/svg"
                    style="display:block;"
                    aria-hidden="true"
                >

                    <circle
                        class="logo-ring"
                        cx="16"
                        cy="16"
                        r="15"
                    />

                    <circle
                        cx="16"
                        cy="16"
                        r="9"
                        fill="{{ $dbConnected ? '#28a745' : '#dc3545' }}"
                    />

                </svg>

            </button>


            {{-- Brand --}}
            <a
                class="navbar-brand fw-bold m-0"
                href="{{ route('home') }}"
            >
                🏕️ {{ config('app.name') }}
            </a>

        </div>


        {{-- Mobile Toggle --}}
        <button
            class="navbar-toggler border-0"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menuUtama"
            aria-controls="menuUtama"
            aria-expanded="false"
            aria-label="Buka menu"
        >

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- Navigation --}}
        <div
            class="collapse navbar-collapse"
            id="menuUtama"
        >

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">


                {{-- Beranda --}}
                <li class="nav-item">

                    <a
                        class="nav-link {{ is_route('home') ? 'active' : '' }}"
                        href="{{ route('home') }}"
                    >
                        🏠 Beranda
                    </a>

                </li>


                {{-- Kategori --}}
                <li class="nav-item">

                    <a
                        class="nav-link {{ is_route('kategori.index') ? 'active' : '' }}"
                        href="{{ route('kategori.index') }}"
                    >
                        🏕️ Kategori
                    </a>

                </li>


                {{-- Peralatan --}}
                <li class="nav-item">

                    <a
                        class="nav-link {{ is_route('alat.index') ? 'active' : '' }}"
                        href="{{ route('alat.index') }}"
                    >
                        🎒 Peralatan
                    </a>

                </li>


                {{-- Peminjaman --}}
                <li class="nav-item">

                    <a
                        class="nav-link {{ is_route('peminjaman.index') ? 'active' : '' }}"
                        href="{{ route('peminjaman.index') }}"
                    >
                        📋 Peminjaman
                    </a>

                </li>


                @php
                    $currentUser = \App\Models\User::current();
                @endphp


                @if ($currentUser)

                    {{-- Dashboard --}}
                    <li class="nav-item">

                        <a
                            class="nav-link {{ is_route('admin.dashboard', 'dashboard') ? 'active' : '' }}"
                            href="{{ $currentUser->role === 'admin'
                                ? route('admin.dashboard')
                                : route('dashboard') }}"
                        >
                            📊 Dashboard
                        </a>

                    </li>


                    {{-- Logout --}}
                    <li class="nav-item">

                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                            class="d-lg-inline"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="btn btn-sm btn-outline-secondary navbar-logout w-100 mt-2 mt-lg-0"
                            >
                                Keluar
                                ({{ $currentUser->username }})
                            </button>

                        </form>

                    </li>

                @else

                    @php
                        $canRegister = false;

                        if ($dbConnected) {
                            try {
                                $canRegister = \App\Models\Role::where(
                                    'can_register',
                                    1
                                )->exists();
                            } catch (\Throwable $e) {
                                $canRegister = false;
                            }
                        }
                    @endphp


                    {{-- Register --}}
                    @if ($canRegister)

                        <li class="nav-item">

                            <a
                                class="nav-link {{ is_route('register') ? 'active' : '' }}"
                                href="{{ route('register') }}"
                            >
                                📝 Daftar
                            </a>

                        </li>

                    @endif


                    {{-- Login --}}
                    <li class="nav-item">

                        <a
                            class="btn btn-sm navbar-login rounded-pill px-3 d-inline-flex align-items-center gap-2 mt-2 mt-lg-0"
                            href="{{ route('login') }}"
                        >

                            <svg
                                width="14"
                                height="14"
                                viewBox="0 0 16 16"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >

                                <circle
                                    cx="8"
                                    cy="5"
                                    r="3"
                                    fill="currentColor"
                                    stroke="none"
                                />

                                <path
                                    d="M2.5 14c0-3.6 2.9-5.8 5.5-5.8s5.5 2.2 5.5 5.8"
                                />

                            </svg>

                            Masuk

                        </a>

                    </li>

                @endif

            </ul>

        </div>

    </div>

</nav>