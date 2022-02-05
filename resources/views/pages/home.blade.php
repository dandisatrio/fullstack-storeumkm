@extends('layouts.app')

@section('title', 'Home | Store UMKM Negeri Katon')

@section('content')
  <div class="page-content page-home">
    <section class="store-trend-categories mb-3">
      <div class="container">
        <div class="row mb-3">
          <div class="col-12">
            <h5>Kategori</h5>
          </div>
        </div>
        <div class="row">
          @forelse ($categories as $category)
          <div class="col-6 col-md-3 col-lg-2">
            <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                <div class="categories-image">
                    <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100" />
                </div>
                <p class="categories-text">
                    {{ $category->name }}
                </p>
            </a>
          </div>
          @empty
            <div class="col-6 text-center py-5">
              No Categories Found
            </div>
          @endforelse
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
          <div class="col-6 col-md-3 col-lg-2">
            <a href="detail-shop.html">
              <div class="card" style="width: 11rem">
                <img
                  src="assets/images/shopee.jpeg"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <p class="card-text">elektronik.id</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-6 col-md-3 col-lg-2">
            <a href="detail-shop.html">
              <div class="card" style="width: 11rem">
                <img
                  src="assets/images/shopee.jpeg"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <p class="card-text">elektronik.id</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-6 col-md-3 col-lg-2">
            <a href="detail-shop.html">
              <div class="card" style="width: 11rem">
                <img
                  src="assets/images/shopee.jpeg"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <p class="card-text">elektronik.id</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-6 col-md-3 col-lg-2">
            <a href="detail-shop.html">
              <div class="card" style="width: 11rem">
                <img
                  src="assets/images/shopee.jpeg"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <p class="card-text">elektronik.id</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-6 col-md-3 col-lg-2">
            <a href="detail-shop.html">
              <div class="card" style="width: 11rem">
                <img
                  src="assets/images/shopee.jpeg"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <p class="card-text">elektronik.id</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-6 col-md-3 col-lg-2">
            <a href="detail-shop.html">
              <div class="card" style="width: 11rem">
                <img
                  src="assets/images/shopee.jpeg"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <p class="card-text">elektronik.id</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="product-container">
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