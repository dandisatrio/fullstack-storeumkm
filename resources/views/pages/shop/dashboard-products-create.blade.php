@extends('layouts.dashboard-shop')

@section('title', 'Dashboard Shop Product Create | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create new product</h1>
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
          <form action="{{ route('dashboard-shop-product-store') }}" method="POST" enctype="multipart/form-data">
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
                        id="name"
                        name="name"
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
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kategori Product</label>
                      <select name="categories_id" class="form-control">
                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="editor"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="thumbnails">Thumbnails</label>
                      <input type="file" name="photo" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col">
                <button
                  type="submit"
                  class="btn btn-success btn-block px-5"
                >
                  Save Now
                </button>
              </div>
            </div>
          </form>
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
@endpush