@extends('layout.main')
@section('title', 'Mahasiswa')

@section('content')
    <h1>Halaman fakultas</h1>
     <table class="table table-dark table-striped">
        <tr>

            <th>Nama Fakultas</th>

        </tr>

    @foreach ($fakultas as $item)
    <tr>
        <td>{{$item ['nama'] }}</td>
    </tr>


        @endforeach
     </table>
@endsection