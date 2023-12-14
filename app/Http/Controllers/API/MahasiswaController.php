<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MahasiswaController extends Controller
{
    public function index() {
        $mahasiswa = Mahasiswa::with('prodi.fakultas')->get();
        return response()->json($mahasiswa, 200);
    }

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
         $response['success'] = true;
        $response['message'] = 'Mahasiswa berhasil disimpan';
        return response()->json($response, Response::HTTP_CREATED);
    }
}
