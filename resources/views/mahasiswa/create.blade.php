@extends('layout.main')
@section('title', 'Fakultas')

@section('content')


    </table>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Mahasiswa</h4>
                <p class="card-description">
                    Formulir tambah Mahasiswa
                </p>

                <form class="forms-sample" method="POST" action = "{{ route('mahasiswa.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="npm">Nomor Pokok Mahasiswa</label>
                        <input type="text" class="form-control" name="npm" placeholder="Nomor Pokok Mahasiswa">
                        @error('npm')
                            <label closs="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa">
                        @error('nama')
                            <label closs="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Kota Mahasiswa</label>
                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Kota Mahasiswa">
                        @error('tempat_lahir')
                            <label closs="text-danger">{{ $message }}</label>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir Mahasiswa</label>
                        <input type="date" class="form-control" name="tanggal_lahir"
                            placeholder="Tanggal Lahir Mahasiswa">
                        @error('tanggal_lahir')
                            <label closs="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jk">Jenis Kelamin Mahasiswa</label>
                        <input type="text" class="form-control" name="jk" placeholder="Jenis Kelamin Mahasiswa">

                        @error('jk')
                            <label closs="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto Mahasiswa</label>
                        <input type="file" class="form-control" name="foto" placeholder="Foto Mahasiswa">
                        @error('foto')
                            <label closs="text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="prodi_id">Nama Prodi</label>
                        <select name="prodi_id" class="form-control">
                            <label for="prodi_id">Pilih Prodi</label>
                            @foreach ($prodi as $item)
                                <option value="{{ $item->id }}"> {{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('nama')
                            <label closs="text-danger">{{ $message }}</label>
                        @enderror




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
