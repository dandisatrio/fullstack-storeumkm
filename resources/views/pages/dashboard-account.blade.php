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
          <form action="{{ route('dashboard-account-redirect', 'dashboard-account') }}" method="POST" id="locations">
            @csrf
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
                        value="{{ $user->name }}"
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
                        value="{{ $user->email }}"
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
                        value="{{ $user->address }}"
                      />
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
                        value="{{ $user->phone_number }}"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="provinces_id">Provinsi</label>
                      <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id" required>
                        <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                      </select>
                      <select v-else class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="regencies_id">Kabupaten</label>
                      <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id" required>
                        <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                      </select>
                      <select v-else class="form-control"></select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="districts_id">Kecamatan</label>
                      <select name="districts_id" id="districts_id" class="form-control" v-if="districts" v-model="districts_id" required>
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
                        value="{{ $user->zip_code }}"
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