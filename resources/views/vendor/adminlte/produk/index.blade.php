@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Data produk</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')

<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css')}}">

@endsection

@section('js')

<script src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

@endsection

@section('content')
@include('layouts._flash')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data produk
                    <a href="{{route('produk.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah produk</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama produk</th>
                                    <th>Harga produk</th>
                                    <th>Total item</th>
                                    <th>Destripsi</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($produk as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama_produk}}</td>
                                    <td>{{$data->harga_produk}}</td>
                                    <td>{{$data->total_item}}</td>
                                    <td>{{$data->deskripsi}}</td>
                                    <td><img src="{{$data->image()}}" alt="" style="width:100px; height:100px;" alt="image"></td>
                                <td>
                                        <form action="{{route('produk.destroy',$data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('produk.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                            <a href="{{route('produk.show',$data->id)}}" class="btn btn-outline-warning">Show</a>
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus ini?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
