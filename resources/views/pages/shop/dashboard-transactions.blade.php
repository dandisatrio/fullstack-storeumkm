@extends('layouts.dashboard-shop')

@section('title', 'Dashboard Shop Transactions | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Transactions</h1>          
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="my-2">
        <a href="{{ route('dashboard-shop-transaction-generate-pdf') }}" class="btn btn-sm btn-success" target="_blank">CETAK Transaksi</a>
      </div>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 col-12">
          @foreach ($transaction_data as $transaction)
          <a
            class="card card-list d-block"
            href="{{ route('dashboard-shop-transaction-details', $transaction->id) }}"
          >
            <div class="card-body">
              <div class="row">
                <div class="col-3 col-md-2">{{ $transaction->code }}</div>
                <div class="col-4 col-md-3">{{ $transaction->created_at }}</div>
                <div class="col-2 col-md-3">Status Transaksi {{ $transaction->transaction_status }}</div>
                <div class="col-2 col-md-1 d-none d-sm-block">
                  <img
                    src="/assets/images/dashboard-arrow-right.svg"
                    alt=""
                  />
                </div>
              </div>
            </div>
          </a>
          @endforeach            
        </div>
      </div>
    </div>
  </section>
</div>
@endsection