@extends('layouts.app')

@section('title', config('app.name') . ' -- Daftar Alat')

@section('content')

<style> /* ========================================================= DAFTAR ALAT - MOUNTAIN GREEN THEME ========================================================= */
.alat-page {
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

/* HEADER */

.alat-badge {
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

.alat-title {
    color: var(--bs-body-color);
    letter-spacing: -.7px;
}

.alat-description {
    color: var(--bs-secondary-color);
}

/* TOMBOL TAMBAH */

.btn-add-alat {
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

.btn-add-alat:hover {
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

/* CARD TABEL */

.alat-table-card {
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

.alat-table-card::before {
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

/* TABLE */

.alat-table {
    color: var(--bs-body-color);
}

.alat-table thead {
    background: color-mix(
        in srgb,
        var(--bs-success) 10%,
        var(--bs-body-bg)
    );
}

.alat-table thead th {
    color: var(--bs-success);

    font-size: .75rem;
    font-weight: 800;
    letter-spacing: .7px;

    border-bottom: 1px solid color-mix(
        in srgb,
        var(--bs-success) 18%,
        var(--bs-border-color)
    );

    white-space: nowrap;
}

.alat-table tbody tr {
    transition:
        background-color .25s ease,
        transform .25s ease;
}

.alat-table tbody tr:hover {
    background: color-mix(
        in srgb,
        var(--bs-success) 5%,
        var(--bs-body-bg)
    );
}

.alat-table tbody td {
    border-color: color-mix(
        in srgb,
        var(--bs-success) 8%,
        var(--bs-border-color)
    );
}

/* NOMOR */

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

/* NAMA ALAT */

.alat-name {
    font-weight: 700;
    color: var(--bs-body-color);
}

.alat-name-icon {
    width: 36px;
    height: 36px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    margin-right: 10px;

    border-radius: 10px;

    background: color-mix(
        in srgb,
        var(--bs-success) 10%,
        var(--bs-body-bg)
    );

    font-size: 17px;
}

/* KODE */

.kode-badge {
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
        var(--bs-success) 16%,
        var(--bs-border-color)
    );

    color: var(--bs-success);

    font-size: .8rem;
    font-weight: 600;
}

/* KATEGORI */

.kategori-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    padding: 6px 11px;

    border-radius: 50px;

    background: color-mix(
        in srgb,
        var(--bs-success) 11%,
        var(--bs-body-bg)
    );

    border: 1px solid color-mix(
        in srgb,
        var(--bs-success) 18%,
        var(--bs-border-color)
    );

    color: var(--bs-success);

    font-size: .78rem;
    font-weight: 700;
}

/* BUTTON AKSI */

.btn-edit-alat {
    color: var(--bs-warning);

    border-color: color-mix(
        in srgb,
        var(--bs-warning) 60%,
        var(--bs-border-color)
    );

    border-radius: 9px 0 0 9px;
    font-weight: 600;
}

.btn-edit-alat:hover {
    background: var(--bs-warning);
    color: var(--bs-dark);
    border-color: var(--bs-warning);
}

.btn-delete-alat {
    border-radius: 0 9px 9px 0;
    font-weight: 600;
}

/* EMPTY STATE */

.empty-state {
    padding: 60px 20px !important;
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

/* PAGINATION */

.alat-card-footer {
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

.alat-card-footer .pagination {
    margin-bottom: 0;
}

.alat-card-footer .page-link {
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

.alat-card-footer .page-link:hover {
    background: color-mix(
        in srgb,
        var(--bs-success) 10%,
        var(--bs-body-bg)
    );

    color: var(--bs-success);
}

.alat-card-footer .page-item.active .page-link {
    background: var(--bs-success);
    border-color: var(--bs-success);
    color: var(--bs-light);
}

/* DARK MODE */

[data-bs-theme="dark"] .alat-page {
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

[data-bs-theme="dark"] .alat-table-card {
    box-shadow:
        0 18px 50px rgba(0, 0, 0, .28);
}

/* RESPONSIVE */

@media (max-width: 768px) {

    .alat-page {
        padding: 35px 15px 50px;
    }

    .alat-header-top {
        flex-direction: column;
        align-items: stretch !important;
        gap: 18px;
    }

    .btn-add-alat {
        width: 100%;
    }

    .alat-table-card {
        border-radius: 18px;
    }

    .alat-table {
        min-width: 750px;
    }
}

</style> <div class="alat-page">
<div class="container-fluid">

    <!-- HEADER -->
    <div class="alat-header alat-header-top d-flex justify-content-between align-items-center mb-4">

        <div>

            <span class="alat-badge">
                🎒 ALAT CAMPING
            </span>

            <h2 class="alat-title fw-bold mb-1">
                Daftar Alat
            </h2>

            <p class="alat-description small mb-0">
                Kelola data alat peminjaman dengan mudah.
            </p>

        </div>

        <a
            href="{{ route('alat.create') }}"
            class="btn btn-add-alat"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Alat Baru
        </a>

    </div>

    <!-- TABLE CARD -->
    <div class="alat-table-card">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table alat-table table-hover align-middle mb-0">

                    <thead>

                        <tr>

                            <th
                                class="py-3 px-4"
                                style="width: 7%;"
                            >
                                No
                            </th>

                            <th class="py-3">
                                Nama Alat
                            </th>

                            <th class="py-3">
                                Kode Alat
                            </th>

                            <th class="py-3">
                                Kategori
                            </th>

                            <th
                                class="py-3 text-center"
                                style="width: 18%;"
                            >
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @php
                            $no = 1;
                        @endphp

                        @forelse ($datal as $alats)

                            <tr>

                                <!-- NOMOR -->
                                <td class="px-4">

                                    <span class="number-badge">
                                        {{ $no++ }}
                                    </span>

                                </td>

                                <!-- NAMA ALAT -->
                                <td>

                                    <div class="d-flex align-items-center">

                                        <span class="alat-name-icon">
                                            🎒
                                        </span>

                                        <span class="alat-name">
                                            {{ $alats->nama_alat }}
                                        </span>

                                    </div>

                                </td>

                                <!-- KODE -->
                                <td>

                                    <span class="kode-badge font-monospace">
                                        {{ $alats->kode_alat }}
                                    </span>

                                </td>

                                <!-- KATEGORI -->
                                <td>

                                    @php
                                        $namaKategori = '-';

                                        foreach ($kategori as $k) {
                                            if ($k->id_kategori == $alats->id_kategori) {
                                                $namaKategori = $k->nama_kategori;
                                                break;
                                            }
                                        }
                                    @endphp

                                    <span class="kategori-badge">
                                        ⛰️
                                        {{ $namaKategori }}
                                    </span>

                                </td>

                                <!-- AKSI -->
                                <td class="text-center">

                                    <div
                                        class="btn-group"
                                        role="group"
                                    >

                                        <a
                                            href="{{ route('alat.edit', ['alat' => $alats->id_alat]) }}"
                                            class="btn btn-outline-warning btn-sm btn-edit-alat px-3"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('alat.delete', ['id' => $alats->id_alat]) }}"
                                            method="POST"
                                            class="d-inline"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-outline-danger btn-sm btn-delete-alat px-3"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus alat ini?')"
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
                                    colspan="5"
                                    class="text-center empty-state text-muted"
                                >

                                    <div class="empty-icon">
                                        🎒
                                    </div>

                                    <h6 class="fw-bold mb-1 text-body">
                                        Belum Ada Alat
                                    </h6>

                                    <p class="small mb-0">
                                        Belum ada data alat yang ditambahkan.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- PAGINATION -->
        @if($datal->hasPages())

            <div class="alat-card-footer py-3 px-3 d-flex justify-content-end">

                {!! $datal->links() !!}

            </div>

        @endif

    </div>

</div>

</div>
@endsection



