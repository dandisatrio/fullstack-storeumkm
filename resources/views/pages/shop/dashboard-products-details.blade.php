@extends('layouts.dashboard-shop')

@section('title', 'Dashboard Shop Product Details | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Shirup Marzzan</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <form action="{{ route('dashboard-shop-product-update', $product->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="shops_id" value="{{ $shop_id }}">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Product Name</label>
                        <input
                          type="text"
                          class="form-control"
                          name="name"
                          value="{{ $product->name }}"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input
                          type="number"
                          class="form-control"
                          name="price"
                          value="{{ $product->price }}"
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kategori Product</label>
                        <select name="categories_id" class="form-control">
                          <option value="{{ $product->categories_id }}">Tidak diganti {{ $product->category->name }}</option>
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="editor">{!! $product->description !!}</textarea>
                      </div>
                    </div>
                    <div class="col">
                      <button
                        type="submit"
                        class="btn btn-success btn-block px-5"
                      >
                        Update Product
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  @foreach ($product->galleries as $gallery)
                  <div class="col-md-4">
                    <div class="gallery-container">
                      <img
                        src="{{ Storage::url($gallery->photos ?? '') }}"
                        alt=""
                        class="w-100"
                      />
                      <a class="delete-gallery" href="{{ route('dashboard-shop-product-gallery-delete', $gallery->id) }}">
                        <img src="/assets/images/icon-delete.svg" alt="" />
                      </a>
                    </div>
                  </div>
                  @endforeach
                  <div class="col-12 mt-3">
                    <form action="{{ route('dashboard-shop-product-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="products_id" value="{{ $product->id }}">
                      <input
                      type="file"
                      name="photos"
                      id="file"
                      style="display: none"
                      onchange="form.submit()"
                    />
                    <button type="button" class="btn btn-secondary btn-block" onclick="thisFileUpload();">
                      Add Photo
                    </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection

@push('addon-scripts')
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>
<script>
  function thisFileUpload() {
    document.getElementById("file").click();
  }
</script>
@endpush