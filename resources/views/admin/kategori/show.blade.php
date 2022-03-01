@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard

@endsection
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Produk</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Show Data Produk</div>
                <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">kategori</label>
                            <input type="text" name="kategori" class="form-control @error('amount') is-invalid @enderror">
                             @error('kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Gambar</label>
                            <input type="file" name="gambar" value="{{$kategori->gambar}}" class="form-control @error('cover') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{url('admin/kategori')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
