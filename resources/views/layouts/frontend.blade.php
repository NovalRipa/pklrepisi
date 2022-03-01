<!DOCTYPE html>
<html>
    @include('layouts.member.showslide')
    <br><br><br>       <br><br><br>
<head>
   <!-- Basic -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" type="">
   <title>Famms - Fashion HTML Template</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.css')}}" />
   <!-- font awesome style -->
   <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" />
   <!-- responsive style -->
   <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet" />
   <link href="{{asset('frontend/css/image.css')}}" rel="stylesheet" />
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <center><h2>Produk yang anda suka</h2></center>
    <section class="product_section layout_padding">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-3">
                <img src="{{ url('images/logo.png') }}" class="rounded mx-auto d-block" width="" alt="">
            </div>
                @foreach($barang as $data)
                <div class="col-md-4">
                    <div class="card">
                    <center><img src="{{$data->image()}}" alt=""  class="card-img-top" style="width:100px; height:100px;" alt="cover"></center>
                    <div class="card-body">
                        <h5 style="font-family:'verdana';font-size:15px;" class="card-title" >{{ $data->nama_barang }}</h5>
                        <p class="card-text">
                            <strong>Harga :
                            </strong> Rp. {{ number_format ($data->harga)}} <br>
                            <Strong>Stok :
                            </strong>{{ $data->stock }} <br>
                            <Strong>Kategori :
                            </strong>{{ $data->kategori }} <br>
                            <hr>
                            <Strong style="font-family:'verdana';font-size:12px;" >Deskripsi :
                            </strong>{{ $data->deskripsi }} <br>
                        </p>
                        <a href="/admin/pesanan/create" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
                      </div>
                      <!-- /admin/transaksi/cek_out_pesan -->
                    </div>
    <br><br><br>

                    </div>
                @endforeach

        </div>
    </div>
</div>
</div>
   </section>


   <!-- jQery -->
   <script src="js/jquery-3.4.1.min.js"></script>
   <script src="js/image.js"></script>
   <!-- popper js -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="js/custom.js"></script>
</body>

</html>
@extends('layouts.member.footer')

@extends('layouts.member.image')

