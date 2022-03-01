@extends('adminlte::page')

@section('content_header')
    Laporan
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Laporan') }}</div>

                    <div class="card-body">
                    <form action="{{ route('laporan') }}" method="post">                            
                        @csrf
                            <div class="form-group">
                                <label for="">Dari Tanggal :</label>
                                <input type="date" name="tanggalAwal" id="" class="form-control" style="width:20%;">
                            </div>
                            <div class="form-group">
                                <label for="">Samapi Tanggal :</label>
                                <input type="date" name="tanggalAkhir" id="" class="form-control" style="width:20%;">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Buat Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
