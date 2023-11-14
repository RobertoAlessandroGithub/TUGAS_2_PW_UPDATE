<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view("mahasiswa.index")->with("mahasiswa", $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $prodi = Prodi::all();
        return view("mahasiswa.create")->with('prodi',  $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            "npm"=>"required|unique:mahasiswa",
            "nama"=>"required",
            "tempat_lahir"=>"required",
            "tanggal_lahir"=>"required",
            "prodi_id"=>"required",
            "foto"=>"required|image",
        ]);

        //Ambil ekstensi file foto
        $ext = $request->foto->getClientOriginalExtension();

        //rename fle foto menjadi npm.extensi (contoh: 2226250030.jpg);
        $validasi["foto"] = $request->npm.".".$ext;

        //Upload file foto ke dalam folder public/foto
        $request->foto->move(public_path('images'), $validasi['foto']);

        //Simpan data mahasiswa ke tabel mahasiswas
        Mahasiswa::create($validasi);

        return redirect('mahasiswa')->with("success", "Data Mahasiswa berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
