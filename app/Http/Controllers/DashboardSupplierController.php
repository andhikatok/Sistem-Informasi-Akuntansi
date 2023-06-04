<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::orderBy('id_supplier', 'ASC')->get();
        return view('dashboard.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_tlp' => 'required|digits:12',
            'email' => 'required|email',
        ], [
            'no_tlp.digits' => 'The phone number must consist of 12 digits.'
        ]);

        $supplier = new Supplier([
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
        ]);

        $supplier->save();

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_supplier)
    {
        $supplier = Supplier::findOrFail($id_supplier);

        return view('dashboard.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_supplier)
    {
        $supplier = Supplier::findOrFail($id_supplier);
        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,  $id_supplier)
    {
        $supplier = Supplier::findOrFail($id_supplier);
        $supplier->delete($request->all());

        return redirect()->route('supplier.index');
    }

    public function exportsupplierpdf()
    {
        $datas = Supplier::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Supplier</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>Nama Supplier </th>
                <th>Alamat </th>
                <th>Kota</th>
                <th>No Tlp</th>
                <th>Email</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->nama_supplier . "</td>
            <td>" . $data->alamat . "</td>
            <td>" . $data->kota . "</td>
            <td>" . $data->no_tlp . "</td>
            <td>" . $data->email . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Outlet.pdf');
    }
}
