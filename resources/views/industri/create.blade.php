@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Dashboard') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('industri.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('industri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Industri</label>
                            <input type="text" class="form-control @error('nama_industri') is-invalid @enderror" name="nama_industri" value="{{ old('nama_industri') }}" placeholder="nama industri" required>
                            @error('nama_industri')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="alamat" required>
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Kerjasama</label>
                            <input type="date" class="form-control @error('tahun_kerjasama') is-invalid @enderror" name="tahun_kerjasama" value="{{ old('tahun_kerjasama') }}" placeholder="tahun_kerjasama" required>
                            @error('tahun_kerjasama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">jurusan</label>
                            <select name="id_jurusan" class="form-select" aria-label="Default select example">
                                <option selected="">Pilih jurusan</option>
                                @forelse ($jurusan as $data)
                                <option value="{{ $data->id }}">{{$data->nama_jurusan}} </option>
                                @empty
                                <option value="" disabled>Data belum tersedia</option>
                                @endforelse
                            </select>
                            @error('id_jurusan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-sm btn-warning">Reset</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection