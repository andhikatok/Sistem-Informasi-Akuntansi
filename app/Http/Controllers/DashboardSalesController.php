<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Support\Composer;

class DashboardSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sales::orderBy('id_transaksi_penjualan', 'ASC')->get();
        return view('dashboard.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contact = Contact::all();
        $outlet = Outlet::all();
        $product = Product::all();
        $sales = Sales::all();
        return view('dashboard.sales.create', compact('sales', 'contact', 'outlet', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data dari from 
        $validatedData = $request->validate([
            'tanggal_transaksi' => 'required',
            'id_customer' => 'required',
            'id_outlet' => 'required',
            'id_barang' => 'required',
        ]);

        //inisialisasi object 
        $sales = new Sales([
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'id_customer' => $request->id_customer,
            'id_outlet' => $request->id_outlet,
            'id_barang' => $request->id_barang,
            'harga_barang' => $request->harga_barang,
        ]);


        //menyimpan
        $sales->save();

        //kembali ke halaman index
        return redirect()->route('sales.index')->with('success', 'Sales berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show($id_transaksi_penjualan)
    {
        $sales = Sales::findOrFail($id_transaksi_penjualan);

        return view('dashboard.sales.show', compact('sales'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_transaksi_penjualan)
    {
        $sales = Sales::findOrFail($id_transaksi_penjualan);
        $contact = Contact::all();
        $outlet = Outlet::all();
        $product = Product::all();
        return view('dashboard.sales.edit', compact('sales', 'contact', 'outlet', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_transaksi_penjualan)
    {
        $sales = Sales::FindOrFail($id_transaksi_penjualan);
        $sales->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Sales Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_transaksi_penjualan)
    {
        $sales = Sales::findOrFail($id_transaksi_penjualan);
        $sales->delete($request->all());

        return redirect()->route('sales.index');
    }

    public function detailSales($id_transaksi_penjualan)
    {
        $sales = Sales::findOrFail($id_transaksi_penjualan);
        $nameCustomer = $sales->contact->nama_customer;
        $nameOutlet = $sales->outlet->nama_outlet;
        $nameProduct = $sales->product->nama_barang;
        $price = $sales->product->harga_jual;

        return view('detailsales', compact('nameCustomer', 'nameOutlet', 'nameProduct', 'price'));
    }
}
