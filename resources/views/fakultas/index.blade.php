@extends('layout.main')
@section('title', 'mahasiswa')
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Fakultas</h4>
                    <p class="card-description">
                        Daftar Fakultas di Universitas MDP
                    </p>
                    @if (Auth::user()->role == 'A')
                        <a href="{{ route('fakultas.create') }}"class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                </tr>
                                @foreach ($fakultas as $item)
                                    <td>{{ $item['nama'] }}</td>

                                    @if (Auth::user()->role == 'A')
                                        <td>

                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('fakultas.edit', $item->id) }}">
                                                    <button class="btn btn-success btn-sm btn-rounded">Edit</button>
                                                </a>
                                                <form method="POST" action="{{ route('fakultas.destroy', $item->id) }}">
                                                    @csrf

                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger btn-rounded show_confirm"
                                                        data-toggle="tooltip" title='Delete'
                                                        data-nama='{{ $item->nama }}'>Hapus</button>
                                                </form>
                                            </div>

                                        </td>
                                    @endif


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
