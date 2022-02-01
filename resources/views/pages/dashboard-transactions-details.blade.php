@extends('layouts.dashboard')

@section('title', 'Dashboard Transaction Details | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">#STORE160222</h1>
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
              <h5>elektronik.id</h5>
              <div class="row">
                <div class="col-8">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th style="width: 30%;">Image</th>
                        <th style="width: 30%;">Nama Produk</th>
                        <th>Harga</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <img
                            src="/assets/images/dashboard-icon-product-1.png"
                            alt=""
                          />
                        </td>
                        <td>Sofa Ternyaman</td>
                        <td>Rp. 100.000</td>
                        <td>1</td>
                      </tr>
                      <tr>
                        <td>
                          <img
                            src="/assets/images/dashboard-icon-product-1.png"
                            alt=""
                          />
                        </td>
                        <td>Sofa Ternyaman</td>
                        <td>Rp. 100.000</td>
                        <td>1</td>
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
                        <th style="width: 30%;">Tanggal Transaksi</th>
                        <th style="width: 30%;">Total Pembayaran</th>
                        <th>Status Pembayaran</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>25 Februari 2022</td>
                        <td>Rp. 200.000</td>
                        <td><span style="color: red;">PENDING</span></td>
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
                        <th style="width: 40%;">Alamat</th>
                        <th style="width: 30%;">Nomor WhatsApp</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, tenetur!</td>
                        <td>0811 1111 1111</td>
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
                        <th style="width: 20%;">Provinsi</th>
                        <th style="width: 20%;">Kabupaten</th>
                        <th style="width: 30%;">Kode Pos</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Jawa Barat</td>
                        <td>Bandung</td>
                        <td>123456</td>
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
                        <td style="color: red;">PENDING</td>
                        <td>123456</td>
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