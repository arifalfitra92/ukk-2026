<?php

namespace App\Controllers;
use Sakuci\Controller;
use Sakuci\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $data = Kategori::orderBy('id_kategori', 'desc')->paginate(10);
        return view('kategori.index', compact('data'));
    }
    public function create (request $request)
    {
       return view('kategori.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        kategori::create([
            'keterangan' => $request->input('nama')
        ]);

        return redirect()->route('kategori.index')->with('succsess', 'kategori berhasil ditambahkan');
    } 
}
