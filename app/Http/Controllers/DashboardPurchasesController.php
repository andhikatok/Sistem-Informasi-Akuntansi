<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Purchases;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;

class DashboardPurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchases::orderBy('id_transaksi_pembelian', 'ASC')->get();
        return view('dashboard.purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $purchases = Purchases::all();
        $invoice = Invoice::with('product')->get();
        return view('dashboard.purchases.create', compact('purchases', 'invoice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data dari form 
        $validatedData = $request->validate([
            'tanggal_transaksi' => 'required',
            'id_invoice' => 'required',
        ]);

        // inisialisasi object 
        $purchases = new Purchases([
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'id_invoice' => $request->id_invoice,
        ]);

        // menyimpan
        $purchases->save();

        // kembali ke halaman index
        return redirect()->route('purchases.index')->with('success', 'Purchases berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchases $purchases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_transaksi_pembelian)
    {
        $purchases = Purchases::findOrFail($id_transaksi_pembelian);
        $invoice = Invoice::all();
        $product = Product::all();
        return view('dashboard.purchases.edit', compact('purchases', 'invoice', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_transaksi_pembelian)
    {
        $purchases = Purchases::FindOrFail($id_transaksi_pembelian);
        $purchases->update($request->all());

        return redirect()->route('purchases.index')->with('success', 'purchases Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_transaksi_pembelian)
    {
        $purchases = Purchases::findOrFail($id_transaksi_pembelian);
        $purchases->delete($request->all());

        return redirect()->route('purchases.index');
    }
}
