@extends('layouts.app')

@section('title', 'Pencarian | Store UMKM Negeri Katon')

@section('content')
<div class="page-content">
  <section class="store-new-products">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12" data-aos="fade-up">
            <form action="{{ route('search') }}">
                <li class="nav-item">
                  <div class="input-group-append">
                    <input id="search" name="search" type="search" class="form-control" value="{{ request('search') }}" placeholder="Cari Produk" style="width: 300px">
                    <button class="btn btn-outline-secondary" type="submit" id="search">Cari</button>
                  </div>
                </li>
            </form>
        </div>
      </div>
      <div class="row">
        @forelse ($products as $product)
        <div
          class="col-6 col-md-4 col-lg-3"
        >
          <a class="component-products d-block" href="{{ route('product-detail', $product->slug) }}">
            <div class="products-thumbnail">
              <div
                class="products-image"
                style="
                  @if($product->galleries->count())
                      background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                  @else
                    background-color: #eee
                  @endif
                "
              ></div>
            </div>
            <div class="products-text">
              {{ $product->name }}
            </div>
            <div class="products-price">
              Rp. {{ number_format($product->price, 0, ',', '.') }}
            </div>
          </a>
        </div>
        @empty
          <div class="col-12 text-center py-5">
            No Product Found
          </div>
        @endforelse   
      </div>
    </div>
  </section>
</div>
@endsection