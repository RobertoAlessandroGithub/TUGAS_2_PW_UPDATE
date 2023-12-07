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
                @can('create', App\Prodi::class)
                    <a href="{{ route('prodi.create') }}"class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                    <div class="table-responsive">
                    @endcan

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
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['fakultas']['nama'] }}</td>
                                    <td>
                                        @can('update', $item)
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('prodi.edit', $item->id) }}">
                                                    <button class="btn-success btn-sm">Edit</button>
                                                </a>
                                            </div>
                                        @endcan
                                        @can('delete', $item)
                                            <div>
                                                <form method="POST" action="{{ route('prodi.destroy', $item->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-danger btn-rounded btn-sm mx-3">Delete</button>
                                                </form>
                                            </div>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
