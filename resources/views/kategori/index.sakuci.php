@extends('layouts.app')

@section('content')
<h1>kategori</h1>
<a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
<table class="table table-striped table-hover">
<div class="container">
    <h1>daftar kategori</h1>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
         @foreach ($data as $kategori)
                <tr>   
                 <td>{{ $kategori->id_kategori}}</td>
                 <td>{{ $kategori->kode_kategori}}</td>
                 <td>{{ $kategori->nama_kategori}}</td>
                 <td>{{ $kategori->keterangan}}</td>
                 <td>
                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                    <a href="" class="btn btn-danger btn_sm">Hapus</a>
                 </td> 
                </tr>
             @endforeach
            </tbody>
        </table>

        {!! $data->links() !!}
    </div>
@endsection                    