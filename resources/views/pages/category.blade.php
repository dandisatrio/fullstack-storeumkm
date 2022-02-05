@extends('layouts.app')

@section('title', 'Category | Store UMKM Negeri Katon')

@section('content')
<div class="page-content page-categories">
  <section class="store-trend-categories">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>All Categories</h5>
        </div>
      </div>
      <div class="row">
        @forelse ($categories as $category)
        <div
          class="col-6 col-md-3 col-lg-2"
        >
          <a class="component-categories d-block" href="{{ Route('categories-detail', $category->slug) }}">
            <div class="categories-image">
              <img
                src="{{ Storage::url($category->photo) }}"
                alt="Gadgets Categories"
                class="w-100"
              />
            </div>
            <p class="categories-text">
              {{ $category->name }}
            </p>
          </a>
        </div>
        @empty
          <div class="col-12 text-center py-5" 
            data-aos="fade-up"
            data-aos-delay="100">
            No Categories Found
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <section class="store-new-products">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>All Products</h5>
        </div>
      </div>
      <div class="row">
        @forelse ($products as $product)
        <div
          class="col-6 col-md-4 col-lg-3"
        >
          <a class="component-products d-block" href="/details.html">
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
      <div class="row">          
        <div class="col-12 mt-4">
          {{ $products->links() }}
        </div>
      </div>
    </div>
  </section>
</div>
@endsection