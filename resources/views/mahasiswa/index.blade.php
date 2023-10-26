@extends('layout.main')
@section('title', 'Mahasiswa')

@section('content')
    <h1>Halaman fakultas</h1>
     <table class="table table-dark table-striped">
        <tr>
            <td>Nama Mahasiswa</td>
            <td>Nomor Pokok Mahasiswa</td>
            <td>Kota</td>
            <td>Tanggal Lahir</td>
            <td>Foto</td>
            <td>Nama Prodi</td>
            <td>Nama Fakultas</td>
        </tr>

    @foreach ($mahasiswa as $item)
    <tr>
        <td>{{$item ['nama'] }}</td>
        <td>{{$item['npm']}}</td>
        <td>{{$item ['tempat_lahir'] }}</td>
        <td>{{$item['tanggal_lahir']}}</td>
        <td><img src="images/gigachad.jpg{{$item['foto']}}"class=:rounded-circle" width="70px"/></td>
        <td>{{$item['prodi']['nama']}}</td>
        <td>{{$item['prodi']['fakultas']['nama']}}</td>
    </tr>


        @endforeach
     </table>
@endsection
