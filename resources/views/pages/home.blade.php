@extends('layouts.app')

@section('title', 'Home | Store UMKM Negeri Katon')

@section('content')
  <div class="page-content">
    <section class="store-trend-hero mt-4 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8 align-self-center">
            <h2>Kecamatan Negeri Katon</h2>
            <p>Mempunyai wadah untuk para pelaku UMKM di daerah Kecamatan Negeri Katon, yaitu sistem marketplace UMKM Negeri Katon yang dapat digunakan oleh para pelaku UMKM sehingga dapat mempermudah para pelaku UMKM  untuk menjual produk mereka, banyak produk-produk yang berasal dari daerah Kecamatan Negeri Katon. Cek Sekarang Produknya Segera!!!</p>
            <br>
            <a href="#products"><button class="btn btn-sm btn-warning p-3 border-5">Beli Sekarang</button></a>
          </div>
          <div class="col-md-4 d-none d-md-block">
            <img src="assets/images/hero.png" class="w-100" alt="">
          </div>
        </div>
      </div>
    </section>

    <section class="store-trend-hero mb-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" style="height: 180px;">
                <div class="carousel-item active">
                  <img src="/assets/images/discount-banner.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="/assets/images/discount-banner.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="/assets/images/discount-banner.png" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="shop-container mb-3">
      <div class="container">
        <div class="row mb-3">
          <div class="col-12">
            <h5>Toko Tersedia</h5>
          </div>
        </div>
        <div class="row">
          @forelse ($shops as $shop)
          <div class="col-6 col-md-3 col-lg-2">
            <a href="{{ route('shop-details', $shop->slug) }}" class="component-categories d-block">
                <div class="categories-image">
                  <img src="{{ Storage::url($shop->photo) }}" alt="" class="w-100">
                </div>
                <p class="categories-text">
                    {{ $shop->name }}
                </p>
            </a>
          </div>
          @empty
            <div class="col-6 text-center py-5">
              No Shop Found
            </div>
          @endforelse
        </div>
      </div>
    </section>

    <section class="product-container" id="products">
      <div class="container">
        <div class="row mb-3">
          <div class="col-12">
            <h5>Produk Terbaru</h5>
          </div>
        </div>
        <div class="row">
          @forelse ($products as $product)
            <div class="col-6 col-md-4 col-lg-3">
              <a href="{{ route('product-detail', $product->slug) }}" class="component-products d-block">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
                    style="
                      @if($product->galleries->count())                   
                        background-image: url('{{ Storage::url($product->galleries->first()->photos) }}');
                      @else
                        background-color: #f5f5f5;
                      @endif
                    "
                  ></div>
                </div>
                <div class="products-text">{{ $product->name }}</div>
                <div class="products-price">Rp. {{ number_format($product->price, 0, ',', '.') }}</div>
              </a>
          </div>
          @empty
          <div class="col-6 text-center py-5">
            No Products Found
          </div>
          @endforelse
        </div>
      </div>
    </section>
  </div>
@endsection
