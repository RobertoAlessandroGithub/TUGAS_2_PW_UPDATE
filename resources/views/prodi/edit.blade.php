@extends('layout.main')
@section('title', 'Tambah Prodi')

@section('content')
    <h1>Halaman Prodi</h1>
    <div class="row">
        <div class="col-lg-12 grid-margin strech-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Prodi</h4>
                    <p class="card-description">Formulir tambah prodi</p>
                    <form class="forms-sample" method="POST" action="{{ route('prodi.update', $prodi->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Prodi</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Prodi"
                                value=" {{ $prodi['nama'] }}">
                            @error('nama')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                            <label for="fakultas_id">Fakultas</label>
                            <select name="fakultas_id" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($fakultas as $item)
                                    <option value="{{ $item['id'] }}" @if (old('fakultas_id', $prodi->fakultas_id) == $item['id']) selected @endif>
                                        {{ $item['nama'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('fakultas_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ url('prodi') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
