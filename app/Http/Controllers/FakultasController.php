<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{

    public function __construct()
    {
        $this->middleware
        ('checkRole:A')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = Fakultas::all();
        return view("fakultas.index")->with("fakultas", $fakultas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("fakultas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        //Validasi data yang dikirim input form
        $validasi = $request->validate([
            "nama" => "required|unique:fakultas"
        ]);

        //simpan data ke tabel fakultas
        Fakultas::create($validasi);

        return redirect("fakultas")->with("success","Data Fakultas berhasil disimpan");
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
    public function edit($id)
    {
        $fakultas = Fakultas::find($id);

        return view('fakultas.edit')->with('fakultas', $fakultas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request -> validate([
            "nama" =>
            "required"
        ]);
        Fakultas::find($id)
        ->update($validasi);

        return redirect('fakultas')->with('Data Fakultas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fakultas = Fakultas::find($id);
        // dd($fakultas);
        $fakultas->delete();
        return redirect('fakultas')->with('succces', 'Data Fakultas berhasil dihapus.');
    }
}
