<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\fakultas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FakultasController extends Controller
{
    public function index(){
        $fakultas = Fakultas::all();
        return response()->json($fakultas, Response::HTTP_OK);
    }
    public function store(Request  $request){
        $validate = $request->validate([
            'nama' => 'required|unique:fakultas'
        ]);
        Fakultas::create($validate);
        $response['success'] = true;
        $response['message'] = 'Fakultas berhasil di simpan';
        return response()->json($response, Response::HTTP_CREATED);
    }
}
