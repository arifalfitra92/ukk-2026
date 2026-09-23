```
@extends('layouts.app')

@section('title', config('app.name') . ' -- Tambah Kategori')

@section('content')

<style>
    /* =========================================================
       TAMBAH KATEGORI - MOUNTAIN GREEN THEME
       ========================================================= */

    .kategori-page {
        min-height: calc(100vh - 80px);
        padding: 45px 20px 70px;

        background:
            radial-gradient(
                circle at 5% 5%,
                color-mix(in srgb, var(--bs-success) 10%, transparent),
                transparent 32%
            ),
            radial-gradient(
                circle at 95% 90%,
                color-mix(in srgb, var(--bs-success) 7%, transparent),
                transparent 30%
            ),
            var(--bs-body-bg);
    }

    /* =========================================================
       HEADER
       ========================================================= */

    .kategori-header {
        margin-bottom: 28px;
    }

    .kategori-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        padding: 7px 15px;
        margin-bottom: 12px;

        border-radius: 50px;

        background: color-mix(
            in srgb,
            var(--bs-success) 12%,
            var(--bs-body-bg)
        );

        border: 1px solid color-mix(
            in srgb,
            var(--bs-success) 22%,
            var(--bs-border-color)
        );

        color: var(--bs-success);

        font-size: .76rem;
        font-weight: 700;
        letter-spacing: .8px;
    }

    .kategori-title {
        color: var(--bs-body-color);
        letter-spacing: -.7px;
    }

    .kategori-description {
        color: var(--bs-secondary-color);
    }

    /* =========================================================
       FORM CARD
       ========================================================= */

    .kategori-form-card {
        position: relative;
        overflow: hidden;

        background: var(--bs-body-bg);

        border: 1px solid color-mix(
            in srgb,
            var(--bs-success) 15%,
            var(--bs-border-color)
        );

        border-radius: 24px;

        box-shadow:
            0 15px 45px color-mix(
                in srgb,
                var(--bs-dark) 8%,
                transparent
            );

        transition: all .3s ease;
    }

    .kategori-form-card::before {
        content: "";

        position: absolute;
        top: 0;
        left: 0;
        right: 0;

        height: 5px;

        background: linear-gradient(
            90deg,
            var(--bs-success),
            color-mix(
                in srgb,
                var(--bs-success) 65%,
                var(--bs-warning)
            ),
            var(--bs-success)
        );
    }

    .kategori-form-card:hover {
        box-shadow:
            0 20px 55px color-mix(
                in srgb,
                var(--bs-dark) 12%,
                transparent
            );
    }

    .kategori-form-body {
        padding: 35px;
    }

    /* =========================================================
       FORM
       ========================================================= */

    .form-group {
        margin-bottom: 22px;
    }

    .label-wrapper {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
    }

    .form-label {
        color: var(--bs-body-color);
    }

    .input-icon {
        width: 34px;
        height: 34px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        margin-right: 8px;

        border-radius: 10px;

        background: color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );

        color: var(--bs-success);

        font-size: 16px;
    }

    .form-control {
        min-height: 48px;

        border-radius: 13px;

        border: 1px solid var(--bs-border-color);

        background-color: var(--bs-body-bg);
        color: var(--bs-body-color);

        transition:
            border-color .25s ease,
            box-shadow .25s ease;
    }

    .form-control:focus {
        border-color: var(--bs-success);

        box-shadow:
            0 0 0 .2rem color-mix(
                in srgb,
                var(--bs-success) 15%,
                transparent
            );

        background-color: var(--bs-body-bg);
        color: var(--bs-body-color);
    }

    /* =========================================================
       OPTIONAL INFO
       ========================================================= */

    .form-hint {
        display: block;

        margin-top: 7px;

        color: var(--bs-secondary-color);

        font-size: .78rem;
    }

    /* =========================================================
       BUTTON
       ========================================================= */

    .btn-save-kategori {
        background: var(--bs-warning);
        border: 1px solid var(--bs-warning);

        color: var(--bs-dark);

        font-weight: 700;
        border-radius: 13px;

        transition: all .3s ease;

        box-shadow:
            0 8px 20px color-mix(
                in srgb,
                var(--bs-warning) 22%,
                transparent
            );
    }

    .btn-save-kategori:hover {
        background: var(--bs-warning);
        border-color: var(--bs-warning);

        color: var(--bs-dark);

        transform: translateY(-2px);

        box-shadow:
            0 12px 25px color-mix(
                in srgb,
                var(--bs-warning) 30%,
                transparent
            );
    }

    .btn-back-kategori {
        border-radius: 13px;
        font-weight: 600;

        transition: all .3s ease;
    }

    .btn-back-kategori:hover {
        transform: translateY(-2px);
    }

    /* =========================================================
       FOOTER
       ========================================================= */

    .form-footer {
        margin-top: 30px;
        padding-top: 25px;

        border-top: 1px solid color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-border-color)
        );
    }

    .required-info {
        color: var(--bs-secondary-color);
        font-size: .8rem;
    }

    /* =========================================================
       DECORATION
       ========================================================= */

    .kategori-decoration {
        position: absolute;

        pointer-events: none;
        user-select: none;

        font-size: 80px;
        opacity: .055;
    }

    .kategori-decoration.one {
        top: 25px;
        right: 35px;

        transform: rotate(-10deg);
    }

    .kategori-decoration.two {
        bottom: 20px;
        left: 25px;

        font-size: 65px;
        transform: rotate(10deg);
    }

    /* =========================================================
       DARK MODE
       ========================================================= */

    [data-bs-theme="dark"] .kategori-page {
        background:
            radial-gradient(
                circle at 5% 5%,
                color-mix(in srgb, var(--bs-success) 13%, transparent),
                transparent 32%
            ),
            radial-gradient(
                circle at 95% 90%,
                color-mix(in srgb, var(--bs-success) 8%, transparent),
                transparent 30%
            ),
            var(--bs-body-bg);
    }

    [data-bs-theme="dark"] .kategori-form-card {
        box-shadow:
            0 18px 50px rgba(0, 0, 0, .28);
    }

    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (max-width: 768px) {

        .kategori-page {
            padding: 35px 15px 50px;
        }

        .kategori-form-body {
            padding: 25px 20px;
        }

        .kategori-title {
            font-size: 1.8rem;
        }

        .kategori-decoration {
            font-size: 60px;
        }
    }

    @media (max-width: 480px) {

        .form-footer {
            flex-direction: column-reverse;
            align-items: stretch !important;
            gap: 15px;
        }

        .form-footer .btn {
            width: 100%;
        }
    }
</style>

<div class="kategori-page">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8 col-xl-7">

                <!-- HEADER -->
                <div class="kategori-header">

                    <span class="kategori-badge">
                        🏕️ KATEGORI INVENTARIS
                    </span>

                    <h2 class="kategori-title fw-bold mb-2">
                        Tambah Kategori
                    </h2>

                    <p class="kategori-description small mb-0">
                        Tambahkan kategori inventaris baru ke dalam sistem
                        agar peralatan camping lebih mudah dikelola.
                    </p>

                </div>

                <!-- FORM CARD -->
                <div class="kategori-form-card">

                    <div class="kategori-decoration one">
                        ⛰️
                    </div>

                    <div class="kategori-decoration two">
                        🌲
                    </div>

                    <div class="kategori-form-body">

                        <form
                            action="{{ route('kategori.store') }}"
                            method="POST"
                        >

                            @csrf

                            <!-- NAMA KATEGORI -->
                            <div class="form-group">

                                <div class="label-wrapper">

                                    <span class="input-icon">
                                        🏕️
                                    </span>

                                    <label
                                        for="nama_kategori"
                                        class="form-label fw-semibold mb-0"
                                    >
                                        Nama Kategori
                                    </label>

                                </div>

                                <input
                                    type="text"
                                    name="nama_kategori"
                                    id="nama_kategori"
                                    class="form-control"
                                    value="{{ old('nama_kategori') }}"
                                    placeholder="Contoh: Alat Masak"
                                    required
                                >

                            </div>

                            <!-- KODE KATEGORI -->
                            <div class="form-group">

                                <div class="label-wrapper">

                                    <span class="input-icon">
                                        🏷️
                                    </span>

                                    <label
                                        for="kode_kategori"
                                        class="form-label fw-semibold mb-0"
                                    >
                                        Kode Kategori
                                    </label>

                                </div>

                                <input
                                    type="text"
                                    name="kode_kategori"
                                    id="kode_kategori"
                                    class="form-control font-monospace"
                                    value="{{ old('kode_kategori') }}"
                                    placeholder="Contoh: KTG-01"
                                    required
                                >

                                <span class="form-hint">
                                    Gunakan kode yang unik untuk setiap kategori.
                                </span>

                            </div>

                            <!-- KETERANGAN -->
                            <div class="form-group mb-0">

                                <div class="label-wrapper">

                                    <span class="input-icon">
                                        📝
                                    </span>

                                    <label
                                        for="keterangan"
                                        class="form-label fw-semibold mb-0"
                                    >
                                        Keterangan
                                    </label>

                                </div>

                                <input
                                    type="text"
                                    name="keterangan"
                                    id="keterangan"
                                    class="form-control"
                                    value="{{ old('keterangan') }}"
                                    placeholder="Masukkan keterangan kategori"
                                    required
                                >

                            </div>

                            <!-- FOOTER -->
                            <div class="form-footer d-flex justify-content-between align-items-center">

                                <span class="required-info">
                                    * Semua data wajib diisi
                                </span>

                                <div class="d-flex gap-2">

                                    <a
                                        href="{{ route('kategori.index') }}"
                                        class="btn btn-outline-secondary btn-back-kategori px-4"
                                    >
                                        ← Kembali
                                    </a>

                                    <button
                                        type="submit"
                                        class="btn btn-save-kategori px-4"
                                    >
                                        💾 Simpan Kategori
                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
```