@extends('layouts.app')

@section('title', 'Selamat Datang')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-lg-12">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang di Aplikasi Arsip Kuitansi Digital</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('img/undraw_posting_photo.svg') }}" alt="...">
                </div>
                <p>Aplikasi ini membantu Anda untuk mengelola dan mengarsipkan kuitansi atau bukti transaksi digital Anda dengan mudah. Anda dapat menambahkan, melihat, mengubah, dan menghapus data kuitansi.</p>
                <p>Untuk memulai, silakan klik tombol di bawah ini untuk melihat atau menambahkan data kuitansi baru.</p>
                <a rel="nofollow" href="{{ route('receipts.index') }}">Lihat Data Kuitansi →</a>
            </div>
        </div>

    </div>
</div>

@endsection