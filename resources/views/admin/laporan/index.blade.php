@extends('adminlte::page')

@section('title', 'Data Laporan')

@section('content_header')

Data Laporan

@endsection

@section('css')

<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css')}}">

@endsection

@section('js')
<script src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
    $('#laporan').DataTable();
} );
</script>

@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-12">
                <h1 class="m-0">LAPORAN </h1>
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
                    Data Laporan
                    <a href="{{route('laporan.create')}}" class="float-right btn btn-sm btn-outline-primary">Tambah Laporan Baru</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive table-striped">
                        <table class="table" id="laporan">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang Keluar</th>
                                <th>Tanggal Keluar</th>
                                <th>Pemasukan</th>
                                <th>Id Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($laporan as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama_barang_keluar}}</td>
                                    <td>{{$data->tanggal_keluar}}</td>
                                    <td>Rp. {{ number_format($data->pemasukan, 0, ',', '.') }} </td>
                                    <td>{{$data->pembayaran->id}}</td>
                                    <td>{{$data->status}}</td>

                                    <td>
                                        <a href="{{route('laporan.edit', $data->id)}}" class="mb-2 btn btn-warning">Edit</a>
                                        <form action="{{route('laporan.destroy', $data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('laporan.show', $data->id)}}" class="btn btn-info">Show</a><br>
                                            <button type="submit" class="btn btn-danger delete-confirm">Delete</button>
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
