@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data brand
                        <a href="{{ route('brand.index') }}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="">Nama brand</label>
                            <input type="text" class="form-control @error('nama_brand') is-invalid @enderror" name="nama_brand"
                            value="{{$brand->nama_brand}}" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="">email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{$brand->email}}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
