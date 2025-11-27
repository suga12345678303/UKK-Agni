@extends('layouts.app')

@section('title', 'Edit Kuitansi')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Edit Kuitansi</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Kuitansi</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('receipts.update', $receipt->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="receipt_date">Tanggal Kuitansi <span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('receipt_date') is-invalid @enderror" id="receipt_date" name="receipt_date" value="{{ old('receipt_date', $receipt->receipt_date->format('Y-m-d')) }}" required>
                @error('receipt_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="receipt_number">Nomor Kuitansi (Opsional)</label>
                <input type="text" class="form-control @error('receipt_number') is-invalid @enderror" id="receipt_number" name="receipt_number" value="{{ old('receipt_number', $receipt->receipt_number) }}">
                @error('receipt_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi <span class="text-danger">*</span></label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $receipt->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="amount">Jumlah (Rp) <span class="text-danger">*</span></label>
                <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $receipt->amount) }}" required>
                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="receipt_image">Gambar Kuitansi</label>
                <p>Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $receipt->file_path) }}" alt="Receipt Image" width="200" class="mb-2">
                <input type="file" class="form-control-file @error('receipt_image') is-invalid @enderror" id="receipt_image" name="receipt_image">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                @error('receipt_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('receipts.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

@endsection
