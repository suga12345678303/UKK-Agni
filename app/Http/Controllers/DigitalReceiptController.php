<?php

namespace App\Http\Controllers;

use App\Models\DigitalReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DigitalReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipts = DigitalReceipt::orderBy('receipt_date', 'desc')->paginate(10);
        return view('receipts.index', compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('receipts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'receipt_date' => 'required|date',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'receipt_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'receipt_number' => 'nullable|string|max:255',
        ]);

        $path = $request->file('receipt_image')->store('receipts', 'public');

        DigitalReceipt::create([
            'receipt_date' => $request->receipt_date,
            'description' => $request->description,
            'amount' => $request->amount,
            'file_path' => $path,
            'receipt_number' => $request->receipt_number,
        ]);

        return redirect()->route('receipts.index')
                         ->with('success', 'Kuitansi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DigitalReceipt $receipt)
    {
        return view('receipts.show', compact('receipt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DigitalReceipt $receipt)
    {
        return view('receipts.edit', compact('receipt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DigitalReceipt $receipt)
    {
        $request->validate([
            'receipt_date' => 'required|date',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'receipt_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'receipt_number' => 'nullable|string|max:255',
        ]);

        $path = $receipt->file_path;
        if ($request->hasFile('receipt_image')) {
            // Hapus file lama
            Storage::disk('public')->delete($receipt->file_path);
            // Simpan file baru
            $path = $request->file('receipt_image')->store('receipts', 'public');
        }

        $receipt->update([
            'receipt_date' => $request->receipt_date,
            'description' => $request->description,
            'amount' => $request->amount,
            'file_path' => $path,
            'receipt_number' => $request->receipt_number,
        ]);

        return redirect()->route('receipts.index')
                         ->with('success', 'Kuitansi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DigitalReceipt $receipt)
    {
        Storage::disk('public')->delete($receipt->file_path);
        $receipt->delete();

        return redirect()->route('receipts.index')
                         ->with('success', 'Kuitansi berhasil dihapus.');
    }
}
