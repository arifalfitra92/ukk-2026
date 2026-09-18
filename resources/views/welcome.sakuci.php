@extends('layouts.app')

@section('title', config('app.name') . ' -- Kerangka PHP Ringan')

@section('content')

    {{-- Hero --}}
    <section class="text-center py-4 py-lg-5">
        <span class="badge rounded-pill badge-brand px-3 py-2 mb-3">Sakuci v1.0.0</span>

        <h1 class="display-5 fw-bold mb-3">
            Puncak Tertinggi,<br class="d-none d-md-inline">
            <span class="text-brand">Keindahan Sejati</span>
        </h1>

        <p class="lead text-secondary mx-auto mb-4" style="max-width: 620px;">
           Web Peminjaman Alat Camping memudahkan customer untuk menyewa/mencari
           peralatan untuk mendaki gunung gunung yang indah.
        </p>

        <div class="d-flex flex-wrap gap-2 justify-content-center">
            <a class="btn btn-brand btn-lg px-4" href="{{ route('kategori.index') }}">Kategori</a>
            <a class="btn btn-outline-brand btn-lg px-4" href="{{ route('alat.index') }}" target="_blank">Peralatan</a>
        </div>

        <p class="text-secondary small mt-3 mb-0">
            Pesan dan cari barang untuk mendukung pendakian kalian.
            <code class="inline"></code>
        </p>
    </section>



@endsection
