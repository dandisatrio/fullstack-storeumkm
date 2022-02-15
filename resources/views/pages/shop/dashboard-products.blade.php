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
        @foreach ($products as $product)
        <div class="col-6 col-sm-6 col-md-4 col-lg-2">
          <a class="card card-dashboard-product d-block"
            href="{{ route('dashboard-shop-product-details', $product->id) }}"
          >
            <div class="card-body">
              <img
                src="{{ Storage::url($product->galleries->first()->photos ?? '') }}"
                alt=""
                class="w-100 mb-2"
              />
              <div class="product-title">{{ $product->name }}</div>
              <div class="product-category">{{ $product->category->name }}</div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</div>
@endsection