@extends('layout.main')
@section('title', 'Mahasiswa')

@section('content')

     </table>
     <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Program Studi</h4>
                  <p class="card-description">
                    Daftar Prodi di MDP
                  </p>
                  <div class="table-responsive">
                    <table class="table table-dark">
                      <thead>
                          <tr>
            <th>Nama Prodi</th>
            <th>Nama Fakultas</th>
        </tr>
                      </thead>
                      <tbody>
  @foreach ($prodi as $item)
    <tr>
        <td>{{$item['nama']}}</td>
        <td>{{$item['fakultas']['nama']}}</td>
    </tr>


        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection
