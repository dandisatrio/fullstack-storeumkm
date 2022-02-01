@extends('layouts.dashboard')

@section('title', 'Dashboard Account | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Account</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <form action="">
            <div class="card">
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Nama Lengkap</label>
                      <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="User"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        aria-describedby="emailHelp"
                        name="email"
                        value="user@mail.com"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="address">Alamat</label>
                      <input
                        type="text"
                        class="form-control"
                        id="address"
                        name="address"
                        value="Setra Duta Cemara"
                      />
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
                        value="08111111111"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="provinces">Provinsi</label>
                      <select
                        name="provinces"
                        id="provinces"
                        class="form-control"
                      >
                        <option value="West Java">Jawa Barat</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="regencies">Kabupaten</label>
                      <select name="regencies" id="regencies" class="form-control">
                        <option value="Bandung">Bandung</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="districts">Kecamatan</label>
                      <select name="districts" id="districts" class="form-control">
                        <option value="Bandung">Bandung</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="postalCode">Kode Pos</label>
                      <input
                        type="text"
                        class="form-control"
                        id="postalCode"
                        name="postalCode"
                        value="40512"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button type="submit" class="btn btn-success px-5">
                      Save Now
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection