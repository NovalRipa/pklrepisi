<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <center>
        <div class="card-body">
            <div class="table-responsive">
                <center>
                    <h4>LAPORAN PESANAN BULANAN</h4>
                </center>
                <table class="table" border="1">
                    <thead>
                        <center>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pesanan</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Nama Pemesan</th>
                                <th>Nama Barang</th>
                                <th>No Telephone</th>
                                <th>Alamat</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </center>
                    </thead>
                    @php $no=1; @endphp
                    @foreach ($pesanan ?? '' as $data)
                        <tbody>
                            <center>
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->tanggal_pesan }}</td>
                                    <td>{{ $data->tanggal_bayar }}</td>
                                    <td>{{ $data->pemesan }}</td>
                                    <td>{{ $data->barang->nama_barang }}</td>
                                    <td>0{{ $data->no_telephone }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->jumlah }}</td>
                                    <td>Rp. {{ number_format($data->barang->harga, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($data->total, 0, ',', '.') }}</td>
                                </tr>
                            </center>
                        </tbody>
                    @endforeach
                    <tr>
                    <th colspan="9">Total Transaksi</th>
                    <td style="text-align: center">Rp. {{ number_format($totalMasukan->totalMasukan, 2) }}
                    </td>
                </tr>
                </table>
            </div>
        </div>
        <center>
            <script>
                window.print();
            </script>
        </center>
    </center>
    
</body>

</html>
