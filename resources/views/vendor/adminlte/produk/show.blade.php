@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-header">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Data produk</h1>
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
                <div class="card-header">Data produk</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> Nama Produk</label>
                        <input type="text" name="nama_produk" value="{{$produk->nama_produk}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Produk</label>
                        <input type="text" name="harga_produk" value="{{$produk->harga_produk}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Total item</label>
                        <input type="text" name="total_item" class="form-control" value="{{$produk->total_item}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">deskripsi</label>
                        <input type="text" name="deskripsi" value="{{$produk->deskripsi}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Thumbnail</label>
                        <br>
                        <img src="{{ $produk->image() }}" style="width:350px; height:350px; padding:10px;" />
                    </div>
                    <div class="form-group">
                        <a href="{{url('admin/produk')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
