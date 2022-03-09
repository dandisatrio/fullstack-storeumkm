@extends('layouts.dashboard')

@section('title', 'Dashboard Transaction Details | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">#{{ $transaction->code }}</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th style="width: 25%;">Image</th>
                        <th style="width: 20%;">Nama Produk</th>
                        <th style="width: 20%;">Nama Toko</th>
                        <th>Harga</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($products as $product)
                      <tr>
                        <td>
                          <img
                            src="{{ Storage::url($product->product->galleries->first()->photos ?? '') }}"
                            class="w-50"
                          />
                        </td>
                        <td>{{ $product->product->name }}</td>
                        <td>{{ $product->product->shop->name }}</td>
                        <td>Rp. {{ number_format($product->product->price, 0, ',', '.') }}</td>
                        <td>
                          @if ($transaction->shipping_status == 'SUCCESS')
                          <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalReview{{ $product->product->id }}">
                            Review Produk
                          </button>
                          @endif
                          
                          <!-- Modal -->
                          <div class="modal fade" id="modalReview{{ $product->product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">{{ $product->product->name }}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="container-fluid">
                                    <form action="{{ route('dashboard-transaction-review') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="products_id" value="{{ $product->product->id }}">
                                    <div class="row justify-content-center mb-3">
                                      <img
                                        src="{{ Storage::url($product->product->galleries->first()->photos ?? '') }}"
                                        class="w-50"
                                      />
                                    </div>
                                    <div class="row mb-3">
                                      <div class="col-sm-12">
                                        <div class="rating">
                                          <input type="radio" name="rating" value="5" id="5">
                                          <label for="5">☆</label>
                                          <input type="radio" name="rating" value="4" id="4">
                                          <label for="4">☆</label>
                                          <input type="radio" name="rating" value="3" id="3">
                                          <label for="3">☆</label>
                                          <input type="radio" name="rating" value="2" id="2">
                                          <label for="2">☆</label> 
                                          <input type="radio" name="rating" value="1" id="1">
                                          <label for="1">☆</label>           
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-12">
                                        <textarea name="comment" rows="4" class="form-control" placeholder="Berikan review produk"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Simpan Ulasan</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="row">
                <div class="col-8">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th style="width: 25%;">Tanggal Transaksi</th>
                        <th style="width: 20%;">Biaya Pengiriman</th>
                        <th style="width: 20%;">Total Transaksi (+unique)</th>
                        <th>Status Transaksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ $transaction->created_at }}</td>
                        <td>Rp. {{ number_format($transaction->shipping_price, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                        <td><span style="color: red;">{{ $transaction->transaction_status }}</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>            

              <hr>
              <h5>Informasi Pengiriman</h5>
              <div class="row">
                <div class="col-8">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th style="width: 30%;">Alamat</th>
                        <th style="width: 25%;">Nomor WhatsApp</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ $transaction->user->address }}</td>
                        <td>{{ $transaction->user->phone_number }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>  

              <div class="row">
                <div class="col-8">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th style="width: 30%;">Provinsi</th>
                        <th style="width: 25%;">Kabupaten</th>
                        <th style="width: 25%;">Kecamatan</th>
                        <th style="width: 25%;">Kode Pos</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ App\Models\Province::find($transaction->user->provinces_id)->name }}</td>
                        <td>{{ App\Models\Regency::find($transaction->user->regencies_id)->name }}</td>
                        <td>{{ App\Models\District::find($transaction->user->districts_id)->name }}</td>
                        <td>{{ $transaction->user->zip_code }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>  

              <div class="row">
                <div class="col-8">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th style="width: 15%;">Status Pengiriman</th>
                        <th style="width: 38%;">Resi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="color: red;">{{ $transaction->shipping_status }}</td>
                        <td>{{ $transaction->resi }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection