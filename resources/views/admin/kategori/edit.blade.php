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
                <h1 class="m-0">Edit Produk</h1>
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
                <div class="card-header">Kategori</div>
                <div class="card-body">
                    <form action="{{route('kategori.update', $kategori->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="kategori">Kategori :</label> <br>
                        <div class="form-check form-check-inline">
                            <label for="kategori">
                                <input type="radio" name="kategori" value="Anak-anak " id="kategori">Anak-anak
                                <input type="radio" name="kategori" value="Remaja " id="kategori">Remaja
                                <input type="radio" name="kategori" value="Dewasa " id="kategori">Dewasa
                            </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Gambar</label>
                            <input type="file" name="gambar" value="{{$kategori->gambar}}" class="form-control @error('cover') is-invalid @enderror">
                             @error('cover')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
