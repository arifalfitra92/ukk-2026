@extends('layouts.app')

@section('content')
     <div class="container">
        <h1>TambahKategori</h1>
        <from action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="from-group">
                <label for="nama">Kode kategori</label>
                <input type="text" class='form-control' id="nama" name='nama' required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </from>
    </div>
    @endsection