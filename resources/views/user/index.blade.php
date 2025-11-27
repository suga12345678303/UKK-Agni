@extends('layouts.app')

@section('title', 'Lihat Kuitansi Digital')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Kuitansi</h1>
<p class="mb-4">Berikut adalah daftar semua kuitansi yang telah diarsipkan.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Arsip Kuitansi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>No. Kuitansi</th>
                        <th>Deskripsi</th>
                        <th>Jumlah</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($receipts as $index => $receipt)
                    <tr>
                        <td>{{ $receipts->firstItem() + $index }}</td>
                        <td>{{ $receipt->receipt_date->format('d M Y') }}</td>
                        <td>{{ $receipt->receipt_number ?? '-' }}</td>
                        <td>{{ $receipt->description }}</td>
                        <td>Rp {{ number_format($receipt->amount, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('user.show', $receipt) }}" target="_blank">
                                <img src="{{ asset('storage/' . $receipt->file_path) }}" alt="Receipt Image" width="100">
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('user.show', $receipt) }}" class="btn btn-info btn-sm" target="_blank">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data kuitansi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
            {{ $receipts->links() }}
        </div>
    </div>
</div>

@endsection