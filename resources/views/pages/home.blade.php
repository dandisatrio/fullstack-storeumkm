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
          <div
            class="col-6 col-md-3 col-lg-2"
          >
              <a href="" class="component-categories d-block">
                  <div class="categories-image">
                      <img
                      src=""
                      alt=""
                      class="w-100"
                      />
                  </div>
                  <p class="categories-text">
                      ewr
                  </p>
              </a>
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
          <div class="col-6 col-md-4 col-lg-3">
            <a href="/detail-product.html" class="component-products d-block">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('/assets/images/product-home/products-black-edition-nike.jpg');
                  "
                ></div>
              </div>
              <div class="products-text">Apple Watch 4</div>
              <div class="products-price">Rp. 5440000</div>
            </a>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <a href="/detail-product.html" class="component-products d-block">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('/assets/images/product-home/products-apple-watch.jpg');
                  "
                ></div>
              </div>
              <div class="products-text">Apple Watch 4</div>
              <div class="products-price">Rp. 5440000</div>
            </a>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <a href="/detail-product.html" class="component-products d-block">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('/assets/images/product-home/products-bubuk-maketti.jpg');
                  "
                ></div>
              </div>
              <div class="products-text">Apple Watch 4</div>
              <div class="products-price">Rp. 5440000</div>
            </a>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <a href="/detail-product.html" class="component-products d-block">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('/assets/images/product-home/products-mavic-kawe.jpg');
                  "
                ></div>
              </div>
              <div class="products-text">Apple Watch 4</div>
              <div class="products-price">Rp. 5440000</div>
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection