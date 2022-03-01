@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Data produk</h1>
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
                <div class="card-header">Edit Data produk</div>
                <div class="card-body">
                    <form action="{{route('produk.update', $produk->id)}}" method="post" enctype="multipart/from-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Masukan Nama produk</label>
                            <input type="text" name="nama" value="{{ $produk->nama_produk }}" class="form-control @error('$produk->nama_produk') is-invalid @enderror">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan harga produk</label>
                            <input type="text" name="harga" value="{{ $produk->harga_produk }}" class="form-control @error('$produk->harga_produk') is-invalid @enderror">
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan total item</label>
                            <input type="text" name="total" value="{{ $produk->total_item }}" class="form-control @error('$produk->total_item') is-invalid @enderror">
                            @error('total')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Deskripsi</label>
                            <input type="text" name="deskripsi" value="{{ $produk->deskripsi }}" class="form-control @error('$produk->deskripsi') is-invalid @enderror">
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan image</label>
                            <br>
                            <img src="{{ $produk->image() }}" height="75" style="padding:10px;" />
                            <input type="file" name="image" value="{{ $produk->image }}" class="form-control">
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
