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
          <form action="">
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
                        aria-describedby="name"
                        name="storeName"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input
                        type="number"
                        class="form-control"
                        id="price"
                        aria-describedby="price"
                        name="price"
                      />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea
                        name="descrioption"
                        id=""
                        cols="30"
                        rows="4"
                        class="form-control"
                      >
                      </textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="thumbnails">Thumbnails</label>
                      <input
                        type="file"
                        multiple
                        class="form-control pt-1"
                        id="thumbnails"
                        aria-describedby="thumbnails"
                        name="thumbnails"
                      />
                      <small class="text-muted">
                        Kamu dapat memilih lebih dari satu file
                      </small>
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