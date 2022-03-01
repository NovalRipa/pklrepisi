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
                <h1 class="m-0">Tambah Pesanan Baru</h1>
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
                <div class="card-header">
                    Kategori
                </div>
                <div class="card-body">
                   <form action="{{route('kategori.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kategori">Kategori :</label> <br>
                        <div class="form-check form-check-inline">
                            <label for="kategori">
                                <input type="radio" name="kategori" value="Baju Muslim Pria " id="kategori">Baju Muslim Pria
                                <br>
                                <input type="radio" name="kategori" value="Baju Muslim Wanita" id="kategori">Baju Muslim Wanita
                                <br>
                                <input type="radio" name="kategori" value="Baju Muslim Anak - Anak" id="kategori">Baju Muslim Anak - Anak
                            </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Gambar</label>
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                             @error('gambar')
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

