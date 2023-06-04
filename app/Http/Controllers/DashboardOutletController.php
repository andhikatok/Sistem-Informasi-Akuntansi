<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\PDF;


class DashboardOutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlet = Outlet::orderBy('id_outlet', 'ASC')->get();
        return view('dashboard.outlet.index', compact('outlet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outlet = Outlet::all();
        return view('dashboard.outlet.create', compact('outlet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_outlet' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_tlp' => 'required',
        ]);

        Outlet::create($validatedData);

        return redirect()->route('outlet.index')->with('success', 'Outlet berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_outlet)
    {
        $outlet = Outlet::findOrFail($id_outlet);
        return view('dashboard.outlet.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outlet $outlet)
    {
        $validatedData = $request->validate([
            'nama_outlet' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_tlp' => 'required|numeric',
        ]);

        $outlet->update($validatedData);

        return redirect()->route('outlet.index')->with('success', 'Outlet update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_outlet)
    {
        $outlet = Outlet::findOrFail($id_outlet);
        $outlet->delete();

        return redirect()->route('outlet.index');
    }

    public function exportoutletpdf()
    {
        $datas = Outlet::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Outlet</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>Nama </th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>No tlp</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->nama_outlet . "</td>
            <td>" . $data->alamat . "</td>
            <td>" . $data->kota . "</td>
            <td>" . $data->no_tlp . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Outlet.pdf');
    }
}
