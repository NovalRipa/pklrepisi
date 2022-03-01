@extends('adminlte::page')

@section('title', 'Data Barang')

@section('content_header')

Data Barang

@endsection

@section('css')

<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css')}}">

@endsection

@section('js')
<script src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
    $('#kategori').DataTable();
} );
</script>

@endsection
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">DATA PRODUK</h1>
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
                    Data Kategori
                    <a href="{{route('kategori.create')}}" class="float-right btn btn-sm btn-outline-primary">Tambah Kategori</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive table-striped">
                        <table class="table" id="kategori">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($kategori as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->kategori}}</td>
                                    <td><img src="{{$data->image()}}" alt="" style="width:150px; height:150px;" alt="gambar"></td>

                                    <td>
                                        <form action="{{route('kategori.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('kategori.edit', $data->id)}}" class="mb-2 btn btn-warning">Edit</a>
                                            <a href="{{route('kategori.show', $data->id)}}" class="btn btn-info">Show</a><br>
                                            <button type="submit" class="btn btn-danger delete-confirm">Delete</button><br>
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
