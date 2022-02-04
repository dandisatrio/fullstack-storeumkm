@extends('layouts.admin')

@section('title', 'Dashboard Admin Products Create | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Product</h1>
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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group mb-2">
                            <label>Nama Product</label>
                            <input type="text" class="form-control" name="name" required />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group mb-2">
                            <label>Pemilik Product</label>
                            <select name="users_id" id="" class="form-control">
                              @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group mb-2">
                            <label>Kategori Product</label>
                            <select name="categories_id" id="" class="form-control">
                              @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group mb-2">
                            <label>Harga Product</label>
                            <input type="number" class="form-control" name="price" required />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group mb-2">
                            <label>Deskripsi Product</label>
                            <textarea name="description" id="editor"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col text-right">
                          <button
                            type="submit"
                            class="btn btn-success px-5"
                          >
                            Save Now
                          </button>
                        </div>
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