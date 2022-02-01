@extends('layouts.dashboard-shop')

@section('title', 'Dashboard Shop Transactions | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Transactions</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 col-12">
          <a
            class="card card-list d-block"
            href="/dashboard-shop-transaction-details.html"
          >
            <div class="card-body">
              <div class="row">
                <div class="col-2">
                  <img
                    src="/assets/images/dashboard-icon-product-1.png"
                    alt=""
                  />
                </div>
                <div class="col-3 col-md-2">User</div>
                <div class="col-4 col-md-3">25 February 2022</div>
                <div class="col-2 col-md-3">PENDING</div>
                <div class="col-2 col-md-1 d-none d-sm-block">
                  <img
                    src="/assets/images/dashboard-arrow-right.svg"
                    alt=""
                  />
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection