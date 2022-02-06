@extends('layouts.app')

@section('title', 'Shops | Store UMKM Negeri Katon')

@section('content')
    <div class="page-content">
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
                <div class="row">          
                    <div class="col-12 mt-4">
                      {{ $shops->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection