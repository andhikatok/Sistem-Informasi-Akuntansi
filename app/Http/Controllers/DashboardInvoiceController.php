<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class DashboardInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('product')->get();
        return view('dashboard.invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('dashboard.invoice.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_invoice' => 'required',
            'jatuh_tempo' => 'required',
            'total_harga' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
        ]);

        Invoice::create($request->all());

        return redirect()->route('invoice.index')->with('success', 'Invoice added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $products = Product::all();
        return view('dashboard.invoice.edit', compact('invoice', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'tanggal_invoice' => 'required',
            'jatuh_tempo' => 'required',
            'total_harga' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoice.index')->with('success', 'Invoice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoice.index')->with('success', 'Invoice deleted successfully');
    }

    public function exportinvoicepdf()
    {
        $datas = Invoice::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Outlet</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>Tanggal </th>
                <th>Jatuh Tempo </th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>ID Barang</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $products = Product::find($data->id_barang);
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->tanggal_invoice . "</td>
            <td>" . $data->jatuh_tempo . "</td>
            <td>" . $data->jumlah . "</td>
            <td>" . $data->total_harga . "</td>
            <td>" . $products->id_barang . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Outlet.pdf');
    }
}
