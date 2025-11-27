<?php

namespace App\Http\Controllers;

use App\Models\DigitalReceipt;
use Illuminate\Http\Request;

class UserKwitansiController extends Controller
{
    public function index()
    {
        // Ambil semua kwitansi dengan pagination
        $receipts = DigitalReceipt::latest('receipt_date')->paginate(10);
        
        return view('user.index', compact('receipts'));
    }

    public function show(DigitalReceipt $receipt)
    {
        return view('user.show', compact('receipt'));
    }
}