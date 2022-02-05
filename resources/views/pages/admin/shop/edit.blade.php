@extends('layouts.admin')

@section('title', 'Dashboard Admin Shops | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Shops</h1>
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
            <form action="{{ route('shop.update', $item->id) }}" method="post" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group mb-2">
                        <label>Nama Toko</label>
                        <select name="users_id" id="" class="form-control">
                          <option value="{{ $item->users_id }}" selected>{{ $item->user->name }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12 mb-2">
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="photo" placeholder="Photo" required/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-end">
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