@extends('layouts.admin')

@section('title', 'Dashboard Admin Transactions Create | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Transaction</h1>
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
            <form action="{{ route('transaction.update', $item->id) }}" method="post" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group mb-2">
                        <label>Status Transaction</label>
                        <select name="transaction_status" class="form-control">
                          <option value="{{ $item->transaction_status }}" selected disabled>{{ $item->transaction_status }}</option>
                          <option value="PENDING">PENDING</option>
                          <option value="SUCCESS">SUCCESS</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-2">
                        <label>Total Harga</label>
                        <input type="number" class="form-control" name="total_price" value="{{ $item->total_price }}" disabled />
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