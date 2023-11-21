@extends('layout.main')
@section('title', 'Fakultas')

@section('content')


    </table>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ubah Fakultas</h4>
                <p class="card-description">
                    Formulir Ubah Fakultas
                </p>
                <form class="forms-sample" method="POST" action = "{{ route('fakultas.update', $fakultas->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Fakultas</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Fakultas"
                            value="{{ $fakultas->nama }}">
                        @error('nama')
                            <label closs="text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Remember me
                            <i class="input-helper"></i></label>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ url('fakultas') }} " class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
