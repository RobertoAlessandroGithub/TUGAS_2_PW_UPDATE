@extends('layout.main')
@section('title', 'mahasiswa')
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mahasiswa</h4>
                    <p class="card-description">
                        Daftar Mahasiswa di Universitas MDP
                    </p>
                    <a href="{{ route('mahasiswa.create') }}"class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Npm</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Foto</th>
                                    <th>Nama Prodi</th>
                                    <th>Nama Fakultas</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($mahasiswa as $item)
                                    <tr>
                                        <td>{{ $item['npm'] }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item['tempat_lahir'] }}</td>
                                        <td>{{ $item['tanggal_lahir'] }}</td>
                                        <td>{{ $item['jk'] }}</td>
                                        <td><img src ="images/{{ $item['foto'] }}"class="rounded-circle" width="70px" />
                                        </td>
                                        <td>{{ $item['prodi']['nama'] }} </td>
                                        <td>{{ $item['prodi']['fakultas']['nama'] }}</td>
                                        <td>

                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('mahasiswa.edit', $item->id) }}">
                                                    <button class="btn-success btn-sm btn-rounded">Edit</button>
                                                </a>
                                                <form method="POST" action="{{ route('mahasiswa.destroy', $item->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger btn-rounded show_confirm"
                                                        data-toggle="tooltip" title='Delete'
                                                        data-nama='{{ $item->nama }}'>Hapus</button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        @if (Session::get('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
    </script>
@endsection
