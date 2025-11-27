@extends('layouts.app')

@section('title', 'Detail Kuitansi')

@section('content')

<h1 class="h3 mb-2 text-gray-800">Detail Kuitansi</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informasi Kuitansi</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th width="40%">Tanggal</th>
                        <td>: {{ $receipt->receipt_date->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <th>No. Kuitansi</th>
                        <td>: {{ $receipt->receipt_number ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>: {{ $receipt->description }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>: Rp {{ number_format($receipt->amount, 2, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6 text-center">
                <h6 class="mb-3">Gambar Kuitansi</h6>
                <img src="{{ asset('storage/' . $receipt->file_path) }}" alt="Receipt Image" class="img-fluid border">
            </div>
        </div>
        
        <div class="mt-4">
            <a href="{{ route('user.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ asset('storage/' . $receipt->file_path) }}" class="btn btn-primary" download>
                <i class="fas fa-download"></i> Download Gambar
            </a>
        </div>
    </div>
</div>

@endsection