@extends('layouts.dashboard-shop')

@section('title', 'Dashboard Shop | Store UMKM Negeri Katon')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Rp. {{ number_format($revenue, 0, ',', '.') }}</h3>
                <p>Pemasukan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $transaction_count }}</h3>
                <p>Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Recent Transactions</h4>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
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
                  <div class="col-2 col-md-3">Status Pengiriman {{ $transaction->shipping_status }}</div>
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