@extends('layouts.dashboard')

@section('title', 'Dashboard | Store UMKM Negeri Katon')

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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ number_format($expenditure, 0, ',', '.') }}</h3>

                <p>Pengeluaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ number_format($transaction_count) }}</h3>

                <p>Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
    </section>

    {{-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Recent Transactions</h4>
          </div>
        </div>
      </div>
    </div> --}}

    {{-- Belum dapat tampilkan setiap transaksi terakhir --}}
    {{-- <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-12">
            @foreach ($transaction_data as $transaction)
            <a
              class="card card-list d-block"
              href="{{ route('dashboard-transaction-details', $transaction->id) }}"
            >
              <div class="card-body">
                <div class="row">
                  <div class="col-2">
                    <img
                      src="{{ Storage::url($transaction->product->shop->photo ?? '') }}"
                      alt=""
                    />
                  </div>
                  <div class="col-3 col-md-2"></div>
                  <div class="col-4 col-md-3">{{ $transaction->created_at }}</div>
                  <div class="col-2 col-md-3">{{ $transaction->transaction_status }}</div>
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
    </section> --}}
</div>
@endsection