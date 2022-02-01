@extends('layouts.app')

@section('title', 'Transaction Success | Store UMKM Negeri Katon')

@section('content')
    <div class="page-content page-success py-5">
        <div class="section-success" data-aos="zoom-in">
        <div class="container">
            <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
                <img src="/assets/images/success.svg" alt="" class="mb-4" />
                <h2>Transaksi sedang diproses!</h2>
                <p>
                Silahkan kirim bukti pembayaran Anda dengan menghubungi via
                WhatsApp
                </p>
                <div>
                <a target="_blank" class="btn btn-success w-50 mt-4" href="#">
                    WhatsApp Admin
                </a>
                <a class="btn btn-outline-info w-50 mt-2" href="/dashboard-user.html">
                    My Dashboard
                </a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection