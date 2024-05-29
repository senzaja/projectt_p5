@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('industri') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('industri.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <hr>
                    <h4>{{ $industri->nama_industri }}</h4>
                    <H4>{{ $industri->alamat }}</H4>
                    <p class=tmt-3>
                        tahun kerjasama : {{$industri->tahun_kerjasama}}
                    </p>
               
                    <p class=tmt-3>
                        jurusan : {{$industri->jurusan->nama_jurusan}}
                    </p>

            </div>
        </div>
    </div>
</div>
@endsection