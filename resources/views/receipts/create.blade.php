@extends('layouts.app')

@section('title', 'Tambah Kuitansi Baru')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Tambah Kuitansi Baru</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Kuitansi</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('receipts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="receipt_date">Tanggal Kuitansi <span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('receipt_date') is-invalid @enderror" id="receipt_date" name="receipt_date" value="{{ old('receipt_date') }}" required>
                @error('receipt_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="receipt_number">Nomor Kuitansi (Opsional)</label>
                <input type="text" class="form-control @error('receipt_number') is-invalid @enderror" id="receipt_number" name="receipt_number" value="{{ old('receipt_number') }}">
                @error('receipt_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi <span class="text-danger">*</span></label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="amount">Jumlah (Rp) <span class="text-danger">*</span></label>
                <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" required>
                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="receipt_image">Gambar Kuitansi <span class="text-danger">*</span></label>
                <input type="file" class="form-control-file @error('receipt_image') is-invalid @enderror" id="receipt_image" name="receipt_image" required>
                @error('receipt_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('receipts.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

@endsection
