@extends('layouts.dashboard-shop')

@section('title', 'Dashboard Shop Transaction Details | Store UMKM Negeri Katon')

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

  <section class="content" id="transactionDetails">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5>{{ $transaction->user->name }}</h5>
              <div class="row">
                <div class="col-8">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th style="width: 30%;">Image</th>
                        <th style="width: 25%;">Nama Produk</th>
                        <th style="width: 25%;">Nama Toko</th>
                        <th>Harga</th>
                        {{-- <th>Quantity</th> --}}
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
                        {{-- <td>1</td> --}}
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
                        <th style="width: 30%;">Tanggal Transaksi</th>
                        <th style="width: 25%;">Biaya Pengiriman</th>
                        <th style="width: 25%;">Total Transaksi</th>
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

              <hr />
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

              <form action="{{ route('dashboard-shop-transaction-update', $transaction->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-8">
                      <table
                        class="table table-borderless table-responsive"
                      >
                        <thead>
                          <tr>
                            <th style="width: 20%">Status Pengiriman</th>
                            <th style="width: 40%">Resi</th>
                            <th style="width: 20%"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <select
                                name="shipping_status"
                                id="status"
                                class="form-control"
                                v-model="status"
                              >
                                <option value="PENDING">Pending</option>
                                <option value="SHIPPING">Shipping</option>
                                <option value="SUCCESS">Success</option>
                              </select>
                            </td>
                            <template v-if="status == 'SHIPPING'">
                              <td>
                                  <input
                                    class="form-control"
                                    type="text"
                                    name="resi"
                                    v-model="resi"
                                  />
                              </td>
                              <td>
                                <button
                                  type="submit"
                                  class="btn btn-sm btn-success btn-block"
                                >
                                  Update Resi
                                </button>
                              </td>
                            </template>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-12 text-right">
                    <button
                      type="submit"
                      class="btn btn-success btn-lg mb-3 me-3"
                    >
                      Save Now
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('addon-scripts')
<script src="/assets/vendor/vue/vue.js"></script>
<script>
  var transactionDetails = new Vue({
    el: "#transactionDetails",
    data: {
      status: "{{ $transaction->shipping_status }}",
      resi: "{{ $transaction->resi }}",
    },
  });
</script>
@endpush