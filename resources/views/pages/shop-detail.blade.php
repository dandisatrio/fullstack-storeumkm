@extends('layouts.app')

@section('title', 'Shop Detail | Store UMKM Negeri Katon')

@section('content')
<div class="page-content">
    <section class="product-container">
      <div class="container">
        <div class="row mb-3">
          <div class="col-12">
            <h5>{{ $shop->name }}</h5>
          </div>
        </div>
        <div class="row">
          @forelse ($products as $product)
          <div class="col-6 col-md-4 col-lg-3">
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