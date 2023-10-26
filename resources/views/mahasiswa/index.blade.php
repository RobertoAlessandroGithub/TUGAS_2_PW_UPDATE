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
        </tr>

    @foreach ($mahasiswa as $item)
    <tr>
        <td>{{$item ['nama'] }}</td>
        <td>{{$item['npm']}}</td>
        <td>{{$item ['tempat_lahir'] }}</td>
        <td>{{$item['tanggal_lahir']}}</td>
    </tr>


        @endforeach
     </table>
@endsection
