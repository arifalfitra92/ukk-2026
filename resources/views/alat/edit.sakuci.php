```
@extends('layouts.app')

@section('title', config('app.name') . ' -- Edit Alat')

@section('content')

<style>
    /* =========================================================
       EDIT ALAT - MOUNTAIN GREEN THEME
       ========================================================= */

    .tool-page {
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

    .tool-header {
        margin-bottom: 28px;
    }

    .tool-badge {
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

    .tool-title {
        color: var(--bs-body-color);
        letter-spacing: -.7px;
    }

    .tool-description {
        color: var(--bs-secondary-color);
    }

    /* =========================================================
       FORM CARD
       ========================================================= */

    .tool-form-card {
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

    .tool-form-card::before {
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

    .tool-form-card:hover {
        box-shadow:
            0 20px 55px color-mix(
                in srgb,
                var(--bs-dark) 12%,
                transparent
            );
    }

    .tool-form-body {
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

    .form-control,
    .form-select {
        min-height: 48px;

        border-radius: 13px;

        border: 1px solid var(--bs-border-color);

        background-color: var(--bs-body-bg);
        color: var(--bs-body-color);

        transition:
            border-color .25s ease,
            box-shadow .25s ease,
            transform .25s ease;
    }

    .form-control:focus,
    .form-select:focus {
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
       CURRENT DATA INFO
       ========================================================= */

    .current-data {
        display: flex;
        align-items: center;
        gap: 10px;

        margin-bottom: 25px;
        padding: 13px 15px;

        border-radius: 13px;

        background: color-mix(
            in srgb,
            var(--bs-success) 7%,
            var(--bs-body-bg)
        );

        border: 1px solid color-mix(
            in srgb,
            var(--bs-success) 14%,
            var(--bs-border-color)
        );

        color: var(--bs-success);

        font-size: .85rem;
    }

    .current-data-icon {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 10px;

        background: color-mix(
            in srgb,
            var(--bs-success) 12%,
            var(--bs-body-bg)
        );
    }

    /* =========================================================
       BUTTON
       ========================================================= */

    .btn-save-tool {
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

    .btn-save-tool:hover {
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

    .btn-back-tool {
        border-radius: 13px;
        font-weight: 600;

        transition: all .3s ease;
    }

    .btn-back-tool:hover {
        transform: translateY(-2px);
    }

    /* =========================================================
       FORM FOOTER
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

    .tool-decoration {
        position: absolute;

        pointer-events: none;
        user-select: none;

        font-size: 80px;
        opacity: .055;
    }

    .tool-decoration.one {
        top: 25px;
        right: 35px;
        transform: rotate(-10deg);
    }

    .tool-decoration.two {
        bottom: 20px;
        left: 25px;

        font-size: 65px;
        transform: rotate(10deg);
    }

    /* =========================================================
       DARK MODE
       ========================================================= */

    [data-bs-theme="dark"] .tool-page {
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

    [data-bs-theme="dark"] .tool-form-card {
        box-shadow:
            0 18px 50px rgba(0, 0, 0, .28);
    }

    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (max-width: 768px) {

        .tool-page {
            padding: 35px 15px 50px;
        }

        .tool-form-body {
            padding: 25px 20px;
        }

        .tool-title {
            font-size: 1.8rem;
        }

        .tool-decoration {
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

        .current-data {
            align-items: flex-start;
        }
    }
</style>

<div class="tool-page">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8 col-xl-7">

                <!-- HEADER -->
                <div class="tool-header">

                    <span class="tool-badge">
                        ✏️ EDIT INVENTARIS
                    </span>

                    <h2 class="tool-title fw-bold mb-2">
                        Edit Alat
                    </h2>

                    <p class="tool-description mb-0">
                        Perbarui informasi data alat inventaris
                        untuk menjaga data tetap akurat.
                    </p>

                </div>

                <!-- FORM CARD -->
                <div class="tool-form-card">

                    <div class="tool-decoration one">
                        🎒
                    </div>

                    <div class="tool-decoration two">
                        🌲
                    </div>

                    <div class="tool-form-body">

                        <!-- INFO DATA SAAT INI -->
                        <div class="current-data">

                            <span class="current-data-icon">
                                🏕️
                            </span>

                            <span>
                                Sedang mengubah data
                                <strong>{{ $datal->nama_alat }}</strong>
                            </span>

                        </div>

                        <form
                            action="{{ route('alat.update', ['id_alat' => $datal->id_alat]) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')

                            <!-- NAMA ALAT -->
                            <div class="form-group">

                                <div class="label-wrapper">

                                    <span class="input-icon">
                                        🎒
                                    </span>

                                    <label
                                        for="nama_alat"
                                        class="form-label fw-semibold mb-0"
                                    >
                                        Nama Alat
                                    </label>

                                </div>

                                <input
                                    type="text"
                                    name="nama_alat"
                                    id="nama_alat"
                                    class="form-control"
                                    value="{{ $datal->nama_alat }}"
                                    placeholder="Contoh: Tenda Camping"
                                    required
                                >

                            </div>

                            <!-- KODE ALAT -->
                            <div class="form-group">

                                <div class="label-wrapper">

                                    <span class="input-icon">
                                        🏷️
                                    </span>

                                    <label
                                        for="kode_alat"
                                        class="form-label fw-semibold mb-0"
                                    >
                                        Kode Alat
                                    </label>

                                </div>

                                <input
                                    type="text"
                                    name="kode_alat"
                                    id="kode_alat"
                                    class="form-control"
                                    value="{{ $datal->kode_alat }}"
                                    placeholder="Contoh: ALT-01"
                                    required
                                >

                            </div>

                            <!-- KATEGORI -->
                            <div class="form-group mb-0">

                                <div class="label-wrapper">

                                    <span class="input-icon">
                                        ⛰️
                                    </span>

                                    <label
                                        for="id_kategori"
                                        class="form-label fw-semibold mb-0"
                                    >
                                        Kategori
                                    </label>

                                </div>

                                <select
                                    name="id_kategori"
                                    id="id_kategori"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        -- Pilih Kategori --
                                    </option>

                                    @foreach ($kategori as $k)

                                        <option
                                            value="{{ $k->id_kategori }}"
                                            {{ $datal->id_kategori == $k->id_kategori ? 'selected' : '' }}
                                        >
                                            {{ $k->nama_kategori }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <!-- FOOTER -->
                            <div class="form-footer d-flex justify-content-between align-items-center">

                                <span class="required-info">
                                    * Semua data wajib diisi
                                </span>

                                <div class="d-flex gap-2">

                                    <a
                                        href="{{ route('alat.index') }}"
                                        class="btn btn-outline-secondary btn-back-tool px-4"
                                    >
                                        ← Kembali
                                    </a>

                                    <button
                                        type="submit"
                                        class="btn btn-save-tool px-4"
                                    >
                                        💾 Simpan Perubahan
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