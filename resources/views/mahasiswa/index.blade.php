@extends('layout.main')
@section('title', 'Mahasiswa')

@section('content')

     </table>

     <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Mahasiswa</h4>
                  <p class="card-description">
                    Daftar Mahasiswa di MDP
                  </p>
                  <a href="{{ route ('mahasiswa.create')}}"class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                  <div class="table-responsive">
                    <table class="table table-dark">
                      <thead>
                            <tr>
                <td>Nama Mahasiswa</td>
                <td>Nomor Pokok Mahasiswa</td>
                <td>Kota</td>
                <td>Tanggal Lahir</td>
                <td>Foto</td>
                <td>Nama Prodi</td>
                <td>Nama Fakultas</td>
            </tr>
                      </thead>
                      <tbody>
                        @foreach ($mahasiswa as $item)
    <tr>
        <td>{{$item ['nama'] }}</td>
        <td>{{$item['npm']}}</td>
        <td>{{$item ['tempat_lahir'] }}</td>
        <td>{{$item['tanggal_lahir']}}</td>
        <td><img src="images/gigachad.jpg{{$item['foto']}}"class=:rounded-circle width="70px"/></td>
        <td>{{$item['prodi']['nama']}}</td>
        <td>{{$item['prodi']['fakultas']['nama']}}</td>
    </tr>


        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection
