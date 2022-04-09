<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View Report Transactions</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
</head>
<body>

  <center>
    <h4>Store UMKM Kecamatan Negeri Katon</h4>
		<h6>Laporan Transaksi Terakhir Penjualan Produk Toko</h4>
    <h5>{{ Auth::user()->name }}</h5>
	</center>

  <br>
  <br>

  <table class='table table-bordered'>
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Transaksi</th>
        <th>Nama Pembeli</th>
        {{-- <th>Produk</th> --}}
        <th>Total Harga</th>
        <th>Waktu Transaksi</th>
        <th>Status Pembayaran</th>
        {{-- <th>Resi Pengiriman</th> --}}
        <th>Status Pengiriman</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1 @endphp
      @foreach($transactions as $transaction)
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $transaction->code }}</td>
        <td>{{ $transaction->user->name }}</td>
        {{-- <td>{{ $transaction->product }}</td> --}}
        <td>{{ $transaction->total_price }}</td>
        <td>{{ $transaction->created_at }}</td>
        <td>{{ $transaction->transaction_status }}</td>
        {{-- <td>{{ $transaction->resi }}</td> --}}
        <td>{{ $transaction->shipping_status }}</td>
      </tr>
      @endforeach
    </tbody>
</body>
</html>
