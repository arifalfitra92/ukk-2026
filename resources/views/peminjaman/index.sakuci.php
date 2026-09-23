```
@extends('layouts.app')

@section('title', config('app.name') . ' -- Daftar Peminjaman')

@section('content')

<style>
    /* =========================================================
       DAFTAR PEMINJAMAN - MOUNTAIN GREEN THEME
       ========================================================= */

    .peminjaman-page {
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

    .peminjaman-badge {
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

    .peminjaman-title {
        color: var(--bs-body-color);
        letter-spacing: -.7px;
    }

    .peminjaman-description {
        color: var(--bs-secondary-color);
    }

    /* =========================================================
       TOMBOL TAMBAH
       ========================================================= */

    .btn-add-peminjaman {
        background: var(--bs-success);
        border: 1px solid var(--bs-success);
        color: var(--bs-light);

        border-radius: 13px;
        font-weight: 700;

        padding: 11px 18px;

        box-shadow:
            0 8px 20px color-mix(
                in srgb,
                var(--bs-success) 25%,
                transparent
            );

        transition: all .3s ease;
    }

    .btn-add-peminjaman:hover {
        background: color-mix(
            in srgb,
            var(--bs-success) 85%,
            var(--bs-dark)
        );

        border-color: color-mix(
            in srgb,
            var(--bs-success) 85%,
            var(--bs-dark)
        );

        color: var(--bs-light);

        transform: translateY(-2px);

        box-shadow:
            0 12px 25px color-mix(
                in srgb,
                var(--bs-success) 32%,
                transparent
            );
    }

    /* =========================================================
       ALERT
       ========================================================= */

    .peminjaman-alert {
        border-radius: 14px;

        border: 1px solid color-mix(
            in srgb,
            var(--bs-success) 20%,
            var(--bs-border-color)
        );

        background: color-mix(
            in srgb,
            var(--bs-success) 8%,
            var(--bs-body-bg)
        );

        color: var(--bs-body-color);
    }

    /* =========================================================
       TABLE CARD
       ========================================================= */

    .peminjaman-table-card {
        position: relative;
        overflow: hidden;

        background: var(--bs-body-bg);

        border: 1px solid color-mix(
            in srgb,
            var(--bs-success) 15%,
            var(--bs-border-color)
        );

        border-radius: 22px;

        box-shadow:
            0 15px 45px color-mix(
                in srgb,
                var(--bs-dark) 8%,
                transparent
            );
    }

    .peminjaman-table-card::before {
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

        z-index: 2;
    }

    /* =========================================================
       TABLE
       ========================================================= */

    .peminjaman-table {
        color: var(--bs-body-color);
        min-width: 1100px;
    }

    .peminjaman-table thead {
        background: color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );
    }

    .peminjaman-table thead th {
        color: var(--bs-success);

        font-size: .72rem;
        font-weight: 800;
        letter-spacing: .7px;

        border-bottom: 1px solid color-mix(
            in srgb,
            var(--bs-success) 18%,
            var(--bs-border-color)
        );

        white-space: nowrap;
    }

    .peminjaman-table tbody tr {
        transition: background-color .25s ease;
    }

    .peminjaman-table tbody tr:hover {
        background: color-mix(
            in srgb,
            var(--bs-success) 5%,
            var(--bs-body-bg)
        );
    }

    .peminjaman-table tbody td {
        border-color: color-mix(
            in srgb,
            var(--bs-success) 8%,
            var(--bs-border-color)
        );

        white-space: nowrap;
    }

    /* =========================================================
       NOMOR
       ========================================================= */

    .number-badge {
        width: 32px;
        height: 32px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );

        color: var(--bs-success);

        font-size: .8rem;
        font-weight: 700;
    }

    /* =========================================================
       USER & ALAT
       ========================================================= */

    .person-wrapper,
    .tool-wrapper {
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .cell-icon {
        width: 35px;
        height: 35px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 10px;

        background: color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );

        color: var(--bs-success);
    }

    .cell-name {
        color: var(--bs-body-color);
        font-weight: 700;
    }

    /* =========================================================
       JUMLAH
       ========================================================= */

    .jumlah-badge {
        display: inline-block;

        padding: 6px 10px;

        border-radius: 9px;

        background: color-mix(
            in srgb,
            var(--bs-success) 8%,
            var(--bs-body-bg)
        );

        border: 1px solid color-mix(
            in srgb,
            var(--bs-success) 15%,
            var(--bs-border-color)
        );

        color: var(--bs-success);

        font-size: .78rem;
        font-weight: 700;
    }

    /* =========================================================
       STATUS
       ========================================================= */

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 7px 10px;

        border-radius: 9px;

        font-size: .75rem;
        font-weight: 700;

        border: 1px solid transparent;
    }

    .status-dot {
        width: 7px;
        height: 7px;

        border-radius: 50%;

        background: currentColor;
    }

    .status-pending {
        background: color-mix(
            in srgb,
            var(--bs-warning) 13%,
            var(--bs-body-bg)
        );

        color: var(--bs-warning);

        border-color: color-mix(
            in srgb,
            var(--bs-warning) 25%,
            var(--bs-border-color)
        );
    }

    .status-disetujui {
        background: color-mix(
            in srgb,
            var(--bs-info) 12%,
            var(--bs-body-bg)
        );

        color: var(--bs-info);

        border-color: color-mix(
            in srgb,
            var(--bs-info) 22%,
            var(--bs-border-color)
        );
    }

    .status-ditolak {
        background: color-mix(
            in srgb,
            var(--bs-danger) 10%,
            var(--bs-body-bg)
        );

        color: var(--bs-danger);

        border-color: color-mix(
            in srgb,
            var(--bs-danger) 20%,
            var(--bs-border-color)
        );
    }

    .status-dipinjam {
        background: color-mix(
            in srgb,
            var(--bs-primary) 10%,
            var(--bs-body-bg)
        );

        color: var(--bs-primary);

        border-color: color-mix(
            in srgb,
            var(--bs-primary) 20%,
            var(--bs-border-color)
        );
    }

    .status-dikembalikan {
        background: color-mix(
            in srgb,
            var(--bs-success) 11%,
            var(--bs-body-bg)
        );

        color: var(--bs-success);

        border-color: color-mix(
            in srgb,
            var(--bs-success) 22%,
            var(--bs-border-color)
        );
    }

    /* =========================================================
       DENDA
       ========================================================= */

    .denda {
        color: var(--bs-danger);
        font-weight: 700;
    }

    /* =========================================================
       ACTION
       ========================================================= */

    .btn-edit-peminjaman {
        color: var(--bs-warning);

        border-color: color-mix(
            in srgb,
            var(--bs-warning) 60%,
            var(--bs-border-color)
        );

        border-radius: 9px 0 0 9px;
        font-weight: 600;
    }

    .btn-edit-peminjaman:hover {
        background: var(--bs-warning);
        color: var(--bs-dark);
        border-color: var(--bs-warning);
    }

    .btn-delete-peminjaman {
        border-radius: 0 9px 9px 0;
        font-weight: 600;
    }

    /* =========================================================
       EMPTY STATE
       ========================================================= */

    .empty-state {
        padding: 65px 20px !important;
    }

    .empty-icon {
        width: 70px;
        height: 70px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin: 0 auto 15px;

        border-radius: 20px;

        background: color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );

        font-size: 30px;
    }

    /* =========================================================
       PAGINATION
       ========================================================= */

    .peminjaman-card-footer {
        background: color-mix(
            in srgb,
            var(--bs-success) 4%,
            var(--bs-body-bg)
        );

        border-top: 1px solid color-mix(
            in srgb,
            var(--bs-success) 12%,
            var(--bs-border-color)
        );
    }

    .peminjaman-card-footer .pagination {
        margin-bottom: 0;
    }

    .peminjaman-card-footer .page-link {
        color: var(--bs-success);

        border-color: color-mix(
            in srgb,
            var(--bs-success) 18%,
            var(--bs-border-color)
        );

        background: var(--bs-body-bg);

        border-radius: 9px;
        margin-left: 4px;

        transition: all .2s ease;
    }

    .peminjaman-card-footer .page-link:hover {
        background: color-mix(
            in srgb,
            var(--bs-success) 10%,
            var(--bs-body-bg)
        );

        color: var(--bs-success);
    }

    .peminjaman-card-footer .page-item.active .page-link {
        background: var(--bs-success);
        border-color: var(--bs-success);
        color: var(--bs-light);
    }

    /* =========================================================
       DARK MODE
       ========================================================= */

    [data-bs-theme="dark"] .peminjaman-page {
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

    [data-bs-theme="dark"] .peminjaman-table-card {
        box-shadow:
            0 18px 50px rgba(0, 0, 0, .28);
    }

    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (max-width: 768px) {

        .peminjaman-page {
            padding: 35px 15px 50px;
        }

        .peminjaman-header {
            flex-direction: column;
            align-items: stretch !important;
            gap: 18px;
        }

        .btn-add-peminjaman {
            width: 100%;
        }

        .peminjaman-table-card {
            border-radius: 18px;
        }
    }
</style>

<div class="peminjaman-page">

    <div class="container-fluid">

        <!-- HEADER -->
        <div class="peminjaman-header d-flex justify-content-between align-items-center mb-4">

            <div>

                <span class="peminjaman-badge">
                    🏕️ DATA PEMINJAMAN
                </span>

                <h2 class="peminjaman-title fw-bold mb-1">
                    Daftar Peminjaman Alat
                </h2>

                <p class="peminjaman-description small mb-0">
                    Kelola data peminjaman dan pengembalian alat camping.
                </p>

            </div>

            <a
                href="{{ route('peminjaman.create') }}"
                class="btn btn-add-peminjaman"
            >
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Peminjaman Baru
            </a>

        </div>

        <!-- ALERT -->
        @if(session('success'))

            <div
                class="alert peminjaman-alert alert-dismissible fade show mb-4"
                role="alert"
            >

                <strong>✓ Berhasil!</strong>
                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>

            </div>

        @endif

        <!-- TABLE CARD -->
        <div class="peminjaman-table-card">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table peminjaman-table table-hover align-middle mb-0">

                        <thead>

                            <tr>

                                <th
                                    class="py-3 px-4"
                                    style="width: 5%;"
                                >
                                    No
                                </th>

                                <th class="py-3">
                                    Peminjam
                                </th>

                                <th class="py-3">
                                    Nama Alat
                                </th>

                                <th class="py-3">
                                    Jumlah
                                </th>

                                <th class="py-3">
                                    Tgl Pinjam
                                </th>

                                <th class="py-3">
                                    Tgl Kembali
                                </th>

                                <th class="py-3">
                                    Status
                                </th>

                                <th class="py-3">
                                    Denda
                                </th>

                                <th
                                    class="py-3 text-center"
                                    style="width: 15%;"
                                >
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @php
                                $no = 1;
                            @endphp

                            @forelse ($datap as $peminjaman)

                                <tr>

                                    <!-- NOMOR -->
                                    <td class="px-4">

                                        <span class="number-badge">
                                            {{ $no++ }}
                                        </span>

                                    </td>

                                    <!-- PEMINJAM -->
                                    <td>

                                        <div class="person-wrapper">

                                            <span class="cell-icon">
                                                👤
                                            </span>

                                            <span class="cell-name">

                                                {{ $peminjaman->user->nama ?? 'User ID: ' . $peminjaman->id_user }}

                                            </span>

                                        </div>

                                    </td>

                                    <!-- ALAT -->
                                    <td>

                                        <div class="tool-wrapper">

                                            <span class="cell-icon">
                                                🎒
                                            </span>

                                            <span class="cell-name">

                                                {{ $peminjaman->alat->nama_alat ?? 'Alat ID: ' . $peminjaman->id_alat }}

                                            </span>

                                        </div>

                                    </td>

                                    <!-- JUMLAH -->
                                    <td>

                                        <span class="jumlah-badge">
                                            {{ $peminjaman->jumlah }} Unit
                                        </span>

                                    </td>

                                    <!-- TANGGAL PINJAM -->
                                    <td>

                                        <span class="text-muted">
                                            {{ $peminjaman->tanggal_pinjam }}
                                        </span>

                                    </td>

                                    <!-- TANGGAL KEMBALI -->
                                    <td>

                                        <span class="text-muted">
                                            {{ $peminjaman->tanggal_kembali ?? '-' }}
                                        </span>

                                    </td>

                                    <!-- STATUS -->
                                    <td>

                                        @if($peminjaman->status == 'Pending')

                                            <span class="status-badge status-pending">
                                                <span class="status-dot"></span>
                                                Pending
                                            </span>

                                        @elseif($peminjaman->status == 'Disetujui')

                                            <span class="status-badge status-disetujui">
                                                <span class="status-dot"></span>
                                                Disetujui
                                            </span>

                                        @elseif($peminjaman->status == 'Ditolak')

                                            <span class="status-badge status-ditolak">
                                                <span class="status-dot"></span>
                                                Ditolak
                                            </span>

                                        @elseif($peminjaman->status == 'Dipinjam')

                                            <span class="status-badge status-dipinjam">
                                                <span class="status-dot"></span>
                                                Dipinjam
                                            </span>

                                        @else

                                            <span class="status-badge status-dikembalikan">
                                                <span class="status-dot"></span>
                                                Dikembalikan
                                            </span>

                                        @endif

                                    </td>

                                    <!-- DENDA -->
                                    <td>

                                        <span class="denda">
                                            Rp {{ number_format($peminjaman->denda ?? 0, 0, ',', '.') }}
                                        </span>

                                    </td>

                                    <!-- AKSI -->
                                    <td class="text-center">

                                        <div
                                            class="btn-group"
                                            role="group"
                                        >

                                            <a
                                                href="{{ route('peminjaman.edit', ['id_peminjaman' => $peminjaman->id_peminjaman]) }}"
                                                class="btn btn-outline-warning btn-sm btn-edit-peminjaman px-3"
                                            >
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('peminjaman.delete', ['id_peminjaman' => $peminjaman->id_peminjaman]) }}"
                                                method="POST"
                                                class="d-inline"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-outline-danger btn-sm btn-delete-peminjaman px-3"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data peminjaman ini?')"
                                                >
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="9"
                                        class="text-center empty-state text-muted"
                                    >

                                        <div class="empty-icon">
                                            🏕️
                                        </div>

                                        <h6 class="fw-bold mb-1 text-body">
                                            Belum Ada Peminjaman
                                        </h6>

                                        <p class="small mb-0">
                                            Belum ada data peminjaman alat yang ditambahkan.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- PAGINATION -->
            @if(method_exists($datap, 'hasPages') && $datap->hasPages())

                <div class="peminjaman-card-footer py-3 px-3 d-flex justify-content-end">

                    {!! $datap->links() !!}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection
```