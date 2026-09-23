```blade
@extends('layouts.app')

@section('title', 'Admin Dashboard - InventarisHub')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

/* ==============================
   SIMPLE ADMIN DASHBOARD
================================ */

.admin-page {
    background: color-mix(
        in srgb,
        var(--bs-success) 4%,
        var(--bs-body-bg)
    );

    min-height: 100vh;

    padding: 35px 0 60px;
}


/* ==============================
   HEADER
================================ */

.admin-header {
    background: var(--bs-success);

    color: var(--bs-light);

    border-radius: 22px;

    padding: 35px;

    margin-bottom: 30px;

    box-shadow: 0 10px 30px
        color-mix(
            in srgb,
            var(--bs-dark) 12%,
            transparent
        );
}

.admin-header h1 {
    font-weight: 700;

    margin-bottom: 8px;
}

.admin-header p {
    margin: 0;

    opacity: .85;
}


/* ==============================
   NAVIGATION BUTTON
================================ */

.admin-nav {
    margin-bottom: 25px;
}

.admin-nav button {
    border-radius: 12px;

    font-weight: 600;
}


/* ==============================
   CARD
================================ */

.admin-card {

    background: var(--bs-body-bg);

    border: 1px solid var(--bs-border-color);

    border-radius: 18px;

    padding: 25px;

    height: 100%;

    text-decoration: none;

    color: var(--bs-body-color);

    display: flex;

    flex-direction: column;

    justify-content: space-between;

    transition: .25s ease;

    box-shadow: 0 6px 20px
        color-mix(
            in srgb,
            var(--bs-dark) 6%,
            transparent
        );
}

.admin-card:hover {

    transform: translateY(-5px);

    color: var(--bs-body-color);

    border-color: var(--bs-success);

    box-shadow: 0 12px 30px
        color-mix(
            in srgb,
            var(--bs-dark) 10%,
            transparent
        );
}


/* ==============================
   ICON
================================ */

.admin-icon {

    width: 55px;

    height: 55px;

    border-radius: 15px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: color-mix(
        in srgb,
        var(--bs-success) 12%,
        var(--bs-body-bg)
    );

    color: var(--bs-success);

    font-size: 24px;

    margin-bottom: 18px;
}


/* ==============================
   SIDEBAR
================================ */

.admin-sidebar-link {

    color: var(--bs-body-color);

    border-radius: 10px;

    padding: 12px 14px;

    transition: .2s ease;
}

.admin-sidebar-link:hover {

    background: color-mix(
        in srgb,
        var(--bs-success) 10%,
        var(--bs-body-bg)
    );

    color: var(--bs-success);
}


/* ==============================
   RESPONSIVE
================================ */

@media (max-width: 768px) {

    .admin-page {

        padding-top: 20px;
    }

    .admin-header {

        padding: 25px;

        border-radius: 18px;
    }

}

</style>


<div class="admin-page">

    <div class="container">


        <!-- ==========================
             NAVIGASI
        =========================== -->

        <div class="admin-nav">

            <button
                class="btn btn-outline-success d-flex align-items-center gap-2"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#adminSidebar"
            >

                <i class="bi bi-grid-fill"></i>

                Navigasi Cepat

            </button>

        </div>


        <!-- ==========================
             SIDEBAR
        =========================== -->

        <div
            class="offcanvas offcanvas-start"
            tabindex="-1"
            id="adminSidebar"
        >

            <div class="offcanvas-header border-bottom">

                <h5 class="fw-bold mb-0">

                    <i class="bi bi-speedometer2 text-success me-2"></i>

                    Menu Admin

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="offcanvas"
                ></button>

            </div>


            <div class="offcanvas-body">

                <p class="text-secondary small">

                    Menu pengelolaan InventarisHub.

                </p>


                <div class="d-flex flex-column gap-2">

                    <a
                        href="{{ route('kategori.index') }}"
                        class="admin-sidebar-link text-decoration-none"
                    >

                        <i class="bi bi-tags me-2"></i>

                        Kelola Kategori

                    </a>


                    <a
                        href="{{ route('alat.index') }}"
                        class="admin-sidebar-link text-decoration-none"
                    >

                        <i class="bi bi-box-seam me-2"></i>

                        Kelola Alat

                    </a>


                    <a
                        href="{{ route('peminjaman.index') }}"
                        class="admin-sidebar-link text-decoration-none"
                    >

                        <i class="bi bi-cloud-arrow-down me-2"></i>

                        Data Peminjaman

                    </a>

                </div>

            </div>

        </div>


        <!-- ==========================
             HEADER
        =========================== -->

        <div class="admin-header">

            <div class="d-flex justify-content-between align-items-center gap-3">

                <div>

                    <div class="small mb-2 opacity-75">

                        <i class="bi bi-shield-lock-fill me-1"></i>

                        AREA ADMINISTRATOR

                    </div>


                    <h1 class="h3">

                        Halo, {{ $user->username }} 👋

                    </h1>


                    <p>

                        Selamat datang di dashboard
                        administrator InventarisHub.

                    </p>

                </div>


                <i
                    class="bi bi-speedometer2 d-none d-md-block"
                    style="font-size: 55px; opacity: .25;"
                ></i>

            </div>

        </div>


        <!-- ==========================
             TITLE
        =========================== -->

        <div class="mb-4">

            <h2 class="h5 fw-bold mb-1">

                Pengelolaan Sistem

            </h2>

            <p class="text-secondary small mb-0">

                Pilih menu yang ingin kamu kelola.

            </p>

        </div>


        <!-- ==========================
             MENU CARD
        =========================== -->

        <div class="row g-4">


            <!-- ROLE -->

            <div class="col-md-4">

                <a
                    href="{{ route('admin.roles.index') }}"
                    class="admin-card"
                >

                    <div>

                        <div class="admin-icon">

                            <i class="bi bi-shield-check"></i>

                        </div>


                        <h3 class="h6 fw-bold">

                            Manage Role

                        </h3>


                        <p class="text-secondary small mb-0">

                            Atur role dan hak akses
                            pengguna sistem.

                        </p>

                    </div>


                    <div class="text-success small fw-semibold mt-4">

                        Kelola Role

                        <i class="bi bi-arrow-right ms-1"></i>

                    </div>

                </a>

            </div>


            <!-- USER -->

            <div class="col-md-4">

                <a
                    href="{{ route('admin.users.index') }}"
                    class="admin-card"
                >

                    <div>

                        <div class="admin-icon">

                            <i class="bi bi-people-fill"></i>

                        </div>


                        <h3 class="h6 fw-bold">

                            Manage User

                        </h3>


                        <p class="text-secondary small mb-0">

                            Kelola akun pengguna
                            dan role mereka.

                        </p>

                    </div>


                    <div class="text-success small fw-semibold mt-4">

                        Kelola User

                        <i class="bi bi-arrow-right ms-1"></i>

                    </div>

                </a>

            </div>


            <!-- DATABASE -->

            <div class="col-md-4">

                <a
                    href="{{ route('admin.database.export') }}"
                    class="admin-card"
                >

                    <div>

                        <div class="admin-icon">

                            <i class="bi bi-database-down"></i>

                        </div>


                        <h3 class="h6 fw-bold">

                            Download Database

                        </h3>


                        <p class="text-secondary small mb-0">

                            Download backup database
                            dalam format SQL.

                        </p>

                    </div>


                    <div class="text-success small fw-semibold mt-4">

                        Unduh Database

                        <i class="bi bi-arrow-right ms-1"></i>

                    </div>

                </a>

            </div>


        </div>

    </div>

</div>

@endsection
```
