@extends('layouts.app')

@section('title', 'Cart | Store UMKM Negeri Katon')

@section('content')
  <div class="page-content page-cart">
    <section class="store-breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Cart
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="store-cart">
      <div class="container">
        <div class="row">
          <div class="col-12 table-responsive">
            <table
              class="table table-borderless table-cart"
              aria-describedby="Cart"
            >
              <thead>
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Name &amp; Seller</th>
                  <th scope="col">Price</th>
                  {{-- <th scope="col">Quantity</th> --}}
                  <th scope="col">Menu</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $totalPrice = 0
                @endphp
                @foreach ($carts as $cart)
                  <tr>
                    <td style="width: 25%">
                      @if ($cart->product->galleries)
                      <img
                        src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                        alt=""
                        class="cart-image"
                      />
                      @endif
                    </td>
                    <td style="width: 15%">
                      <div class="product-title">{{ $cart->product->name }}</div>
                      <div class="product-subtitle">by {{ $cart->product->shop->name }}</div>
                    </td>
                    <td style="width: 15%">
                      <div class="product-title">RP. {{ number_format($cart->product->price, 0, ',', '.') }}</div>
                      <div class="product-subtitle">IDR</div>
                    </td>
                    {{-- <td style="width: 15%">
                      <div class="product-title d-flex">    
                            <input
                              type="number"
                              name="quantity"
                              id="quantity"
                              class="form-control input-qty text-center"
                              min="1"
                            />
                            <button type="submit" class="btn-sm btn-group-qty">add</button>
                      </div>
                    </td> --}}
                    <td style="width: 25%">
                      <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger btn-remove-cart">
                          Remove
                        </button>
                      </form>
                    </td>
                  </tr>
                  @php 
                    $totalPrice += $cart->product->price + rand(100, 1000);
                  @endphp
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <hr />
          </div>
          <div class="col-12">
            <h2 class="mb-4">Informasi Pengiriman</h2>
          </div>
        </div>

        <form action="" id="locations">
          <div class="row mb-2">
            <div class="col-md-6">
              <div class="form-group">
                <label for="addressOne">Alamat Lengkap</label>
                <textarea
                  name="address"
                  id="address"
                  cols="65"
                  rows="1"
                  class="form-control"
                ></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone_number">Nomor WhatsApp</label>
                <input
                  type="text"
                  class="form-control"
                  id="phone_number"
                  name="phone_number"
                  value=""
                />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="provinces_id">Provinsi</label>
                <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                  <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                </select>
                <select v-else class="form-control"></select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="regencies_id">Kabupaten</label>
                <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                  <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                </select>
                <select v-else class="form-control"></select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="districts_id">Kecamatan</label>
                <select name="districts_id" id="districts_id" class="form-control" v-if="districts" v-model="districts_id">
                  <option v-for="district in districts" :value="district.id">@{{ district.name }}</option>
                </select>
                <select v-else class="form-control"></select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="zip_code">Kode Pos</label>
                <input
                  type="text"
                  class="form-control"
                  id="zip_code"
                  name="zip_code"
                  value=""
                />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2>Informasi Pembayaran</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-6 col-md-4">
              <div class="product-title text-success">Rp. {{ number_format($totalPrice ?? 0) }}</div>
              <div class="product-subtitle">Total Pembayaran(+unique)</div>
            </div>
            <div class="col-6 col-md-2">
              <div class="product-title">Rp. 30.000</div>
              <div class="product-subtitle">Ongkos Kirim</div>
            </div>
          </div>          
        </form>
        <div class="row">
          <div class="col-6 col-md-6">
            <h4>Media Pembayaran</h4>
            <img src="/assets/images/bri.png" alt="" />
            <div class="product-title">5666 1111 7777 123</div>
            <div class="product-subtitle">Admin UMKM Negeri Katon</div>
            <a href="{{ route('success') }}" class="btn btn-success mt-3">Checkout Now</a>
          </div>
          <div class="col-6 col-md-6 mt-3">
            <h2>Informasi Penting</h2>
            <p>
              Proses konfirmasi pembayaran akan membutuhkan waktu sekitar 20
              menit (dari pesan WhatsApp dikirim) jika menggunakan metode
              pembayaran manual. Mohon menunggu dengan sabar dan terima kasih.
            </p>
            <div class="row d-flex">
              <div class="col-md-8">
                <h2>Butuh Bantuan, silahkan hubungi kami</h2>
                <p>
                  Admin <br />
                  No. WhatsApp 081122223333
                </p>
              </div>
              <div class="col-md-4 align-self-center">
                <a target="_blank" href="#" class="btn btn-sm btn-info mt-3 py-2">WhatsApp Admin</a>
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
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>
    var locations = new Vue({
      el: "#locations",
      mounted() {
        this.getProvincesData();
      },
      data: {
        provinces: null,
        regencies: null,
        districts: null,
        provinces_id: null,
        regencies_id: null,
        districts_id: null,
      },
      methods: {
        getProvincesData() {
          var self = this;
          axios.get('{{ route('api-provinces') }}')
            .then(function (response) {
              self.provinces = response.data
            })
        },
        getRegenciesData() {
          var self = this;
          axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
            .then(function (response) {
              self.regencies = response.data
            })
        },
        getDistrictsData() {
          var self = this;
          axios.get('{{ url('api/districts') }}/' + self.regencies_id)
            .then(function (response) {
              self.districts = response.data
            })
        },
      },
      watch: {
        provinces_id: function (val, oldVal) {
          this.regencies_id = null;
          this.getRegenciesData();
        },
        regencies_id: function (val, oldVal) {
          this.districts_id = null;
          this.getDistrictsData();
        },
      }      
    })
  </script>
@endpush