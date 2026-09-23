@extends('layouts.app')

@section('title', config('app.name') . ' -- Tambah Peminjaman')

@section('content')

<style> /* ========================================================= TAMBAH PEMINJAMAN - MOUNTAIN GREEN THEME ========================================================= */
.tambah-peminjaman-page {
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

.tambah-header {
    margin-bottom: 28px;
}

.tambah-badge {
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

.tambah-title {
    color: var(--bs-body-color);
    letter-spacing: -.7px;
}

.tambah-description {
    color: var(--bs-secondary-color);
}

/* =========================================================
   FORM CARD
   ========================================================= */

.tambah-form-card {
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
}

.tambah-form-card::before {
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

.tambah-form-body {
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

.form-label {
    color: var(--bs-body-color);
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
        box-shadow .25s ease;
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
   INPUT JUMLAH
   ========================================================= */

.input-group-text {
    min-width: 55px;

    justify-content: center;

    border-color: var(--bs-border-color);

    background: color-mix(
        in srgb,
        var(--bs-success) 8%,
        var(--bs-body-bg)
    );

    color: var(--bs-success);

    font-weight: 700;
}

/* =========================================================
   FORM HINT
   ========================================================= */

.form-hint {
    margin-top: 7px;

    color: var(--bs-secondary-color);

    font-size: .78rem;
}

/* =========================================================
   BUTTON
   ========================================================= */

.btn-save-peminjaman {
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

.btn-save-peminjaman:hover {
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

.btn-back-peminjaman {
    border-radius: 13px;
    font-weight: 600;

    transition: all .3s ease;
}

.btn-back-peminjaman:hover {
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

.footer-info {
    color: var(--bs-secondary-color);
    font-size: .8rem;
}

/* =========================================================
   DECORATION
   ========================================================= */

.tambah-decoration {
    position: absolute;

    pointer-events: none;
    user-select: none;

    font-size: 80px;
    opacity: .055;
}

.tambah-decoration.one {
    top: 25px;
    right: 35px;

    transform: rotate(-10deg);
}

.tambah-decoration.two {
    bottom: 25px;
    left: 25px;

    font-size: 65px;
    transform: rotate(10deg);
}

/* =========================================================
   DARK MODE
   ========================================================= */

[data-bs-theme="dark"] .tambah-peminjaman-page {
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

[data-bs-theme="dark"] .tambah-form-card {
    box-shadow:
        0 18px 50px rgba(0, 0, 0, .28);
}

/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 768px) {

    .tambah-peminjaman-page {
        padding: 35px 15px 50px;
    }

    .tambah-form-body {
        padding: 25px 20px;
    }

    .tambah-title {
        font-size: 1.8rem;
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

</style> <div class="tambah-peminjaman-page">
<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-8 col-xl-7">

            <!-- HEADER -->
            <div class="tambah-header">

                <span class="tambah-badge">
                    🏕️ DATA PEMINJAMAN
                </span>

                <h2 class="tambah-title fw-bold mb-2">
                    Tambah Peminjaman Alat
                </h2>

                <p class="tambah-description small mb-0">
                    Tambahkan data peminjaman alat baru ke dalam
                    sistem inventaris.
                </p>

            </div>

            <!-- FORM CARD -->
            <div class="tambah-form-card">

                <div class="tambah-decoration one">
                    ⛰️
                </div>

                <div class="tambah-decoration two">
                    🎒
                </div>

                <div class="tambah-form-body">

                    <form
                        action="{{ route('peminjaman.store') }}"
                        method="POST"
                    >

                        @csrf

                        <!-- USER -->
                        <div class="form-group">

                            <div class="label-wrapper">

                                <span class="input-icon">
                                    👤
                                </span>

                                <label
                                    for="id_user"
                                    class="form-label fw-semibold mb-0"
                                >
                                    Pilih User / Peminjam
                                </label>

                            </div>

                            <select
                                name="id_user"
                                id="id_user"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    -- Pilih User --
                                </option>

                                @foreach($users as $user)

                                    <option value="{{ $user->id }}">
                                        {{ $user->nama }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- ALAT -->
                        <div class="form-group">

                            <div class="label-wrapper">

                                <span class="input-icon">
                                    🎒
                                </span>

                                <label
                                    for="id_alat"
                                    class="form-label fw-semibold mb-0"
                                >
                                    Pilih Alat
                                </label>

                            </div>

                            <select
                                name="id_alat"
                                id="id_alat"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Alat --
                                </option>

                                @foreach($alat as $item)

                                    <option value="{{ $item->id }}">
                                        {{ $item->nama_alat }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- JUMLAH -->
                        <div class="form-group">

                            <div class="label-wrapper">

                                <span class="input-icon">
                                    🔢
                                </span>

                                <label
                                    for="jumlah"
                                    class="form-label fw-semibold mb-0"
                                >
                                    Jumlah
                                </label>

                            </div>

                            <div class="input-group">

                                <input
                                    type="number"
                                    name="jumlah"
                                    id="jumlah"
                                    class="form-control"
                                    value="1"
                                    min="1"
                                    required
                                >

                                <span class="input-group-text">
                                    Unit
                                </span>

                            </div>

                            <div class="form-hint">
                                Masukkan jumlah alat yang akan dipinjam.
                            </div>

                        </div>

                        <!-- TANGGAL PINJAM -->
                        <div class="form-group mb-0">

                            <div class="label-wrapper">

                                <span class="input-icon">
                                    📅
                                </span>

                                <label
                                    for="tanggal_pinjam"
                                    class="form-label fw-semibold mb-0"
                                >
                                    Tanggal Pinjam
                                </label>

                            </div>

                            <input
                                type="date"
                                name="tanggal_pinjam"
                                id="tanggal_pinjam"
                                class="form-control"
                                required
                            >

                        </div>

                        <!-- FOOTER -->
                        <div class="form-footer d-flex justify-content-between align-items-center">

                            <span class="footer-info">
                                🏕️ Pastikan data peminjaman sudah benar.
                            </span>

                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('peminjaman.index') }}"
                                    class="btn btn-outline-secondary btn-back-peminjaman px-4"
                                >
                                    ← Kembali
                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-save-peminjaman px-4"
                                >
                                    💾 Simpan Peminjaman
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



