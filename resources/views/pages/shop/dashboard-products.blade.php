@extends('layouts.dashboard-shop')

@section('title', 'Dashboard Shop Products | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <a
            href="{{ route('dashboard-shop-product-create') }}"
            class="btn btn-success"
            >Add New Product</a
          >
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-6 col-sm-6 col-md-4 col-lg-2">
          <a
            class="card card-dashboard-product d-block"
            href="/dashboard-shop-product-details.html"
          >
            <div class="card-body">
              <img
                src="/assets/images/product-card/product-card-1.png"
                alt=""
                class="w-100 mb-2"
              />
              <div class="product-title">Shirup Marzzan</div>
              <div class="product-category">Foods</div>
            </div>
          </a>
        </div>
        <div class="col-6 col-sm-6 col-md-4 col-lg-2">
          <a
            class="card card-dashboard-product d-block"
            href="/dashboard-shop-product-details.html"
          >
            <div class="card-body">
              <img
                src="/assets/images/product-card/product-card-1.png"
                alt=""
                class="w-100 mb-2"
              />
              <div class="product-title">Shirup Marzzan</div>
              <div class="product-category">Foods</div>
            </div>
          </a>
        </div>
        <div class="col-6 col-sm-6 col-md-4 col-lg-2">
          <a
            class="card card-dashboard-product d-block"
            href="/dashboard-shop-product-details.html"
          >
            <div class="card-body">
              <img
                src="/assets/images/product-card/product-card-1.png"
                alt=""
                class="w-100 mb-2"
              />
              <div class="product-title">Shirup Marzzan</div>
              <div class="product-category">Foods</div>
            </div>
          </a>
        </div>
        <div class="col-6 col-sm-6 col-md-4 col-lg-2">
          <a
            class="card card-dashboard-product d-block"
            href="/dashboard-shop-product-details.html"
          >
            <div class="card-body">
              <img
                src="/assets/images/product-card/product-card-1.png"
                alt=""
                class="w-100 mb-2"
              />
              <div class="product-title">Shirup Marzzan</div>
              <div class="product-category">Foods</div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection