@extends('layout.main')
@section('title', 'Mahasiswa')

@section('content')
    <h1>Halaman Prodi</h1>
     <table class="table table-dark table-striped">
        <tr>

            <th>Nama Prodi</th>
            <th>Nama Fakultas</th>

        </tr>

    @foreach ($prodi as $item)
    <tr>
        <td>{{$item['nama']}}</td>
        <td>{{$item['fakultas']['nama']}}</td>
    </tr>


        @endforeach
     </table>
@endsection
