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
                  <th scope="col">Quantity</th>
                  <th scope="col">Menu</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 25%">
                    <img
                      src="/assets/images/product-cart/product-cart-1.jpg"
                      alt=""
                      class="cart-image"
                    />
                  </td>
                  <td style="width: 15%">
                    <div class="product-title">Sofa Ternyaman</div>
                    <div class="product-subtitle">by User Toko</div>
                  </td>
                  <td style="width: 15%">
                    <div class="product-title">RP. 100.000</div>
                    <div class="product-subtitle">IDR</div>
                  </td>
                  <td style="width: 15%">
                    <div class="product-title d-flex">
                      <input
                        type="number"
                        name="quantity"
                        class="form-control input-qty text-center"
                        value="1"
                      />
                      <button class="btn-sm btn-group-qty">add</button>
                    </div>
                  </td>
                  <td style="width: 25%">
                    <a href="#" class="btn btn-sm btn-danger btn-remove-cart">
                      Remove
                    </a>
                  </td>
                </tr>
                <tr>
                  <td style="width: 25%">
                    <img
                      src="/assets/images/product-cart/product-cart-2.jpg"
                      alt=""
                      class="cart-image"
                    />
                  </td>
                  <td style="width: 15%">
                    <div class="product-title">Sneaker</div>
                    <div class="product-subtitle">by User Toko</div>
                  </td>
                  <td style="width: 15%">
                    <div class="product-title">Rp. 100.000</div>
                    <div class="product-subtitle">IDR</div>
                  </td>
                  <td style="width: 15%">
                    <div class="product-title d-flex">
                      <input
                        type="number"
                        name="quantity"
                        class="form-control input-qty text-center"
                        value="1"
                      />
                      <button class="btn-sm btn-group-qty">add</button>
                    </div>
                  </td>
                  <td style="width: 25%">
                    <a href="#" class="btn btn-sm btn-danger btn-remove-cart">
                      Remove
                    </a>
                  </td>
                </tr>
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

        <form action="">
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
                <label for="no_telp">Nomor WhatsApp</label>
                <input
                  type="text"
                  class="form-control"
                  id="no_telp"
                  name="no_telp"
                  value=""
                />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="provinces">Provinsi</label>
                <select name="provinces" id="provinces" class="form-control">
                  <option value="">Jawa Barat</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="regencies">Kabupaten</label>
                <select name="regencies" id="regencies" class="form-control">
                  <option value="">Bandung</option>
                </select>
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
              <div class="product-title text-success">Rp. 230.250</div>
              <div class="product-subtitle">Total Pembayaran(+unique)</div>
            </div>
            <div class="col-6 col-md-2">
              <div class="product-title">Rp. 30.000</div>
              <div class="product-subtitle">Ongkos Kirim</div>
            </div>
          </div>
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
      </form>
      </div>
    </section>
  </div>
@endsection