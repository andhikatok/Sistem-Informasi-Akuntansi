<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class DashboardChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $charge = Charge::orderBy('id_biaya', 'ASC')->get();
        return view('dashboard.charge.index', compact('charge'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $charge = Charge::all();
        return view('dashboard.charge.create', compact('charge'));

        $charge = Charge::all();
        return view('dashboard.charge.create', compact('charge'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'tanggal_biaya' => 'required',
            'jenis_biaya' => 'required',
            'jumlah_biaya' => 'required',
        ]);


        // Buat instansiasi objek Product dengan data yang diterima dari formulir
        $charge = new Charge([
            'tanggal_biaya' => $request->tanggal_biaya,
            'jenis_biaya' => $request->jenis_biaya,
            'jumlah_biaya' => $request->jumlah_biaya,
        ]);

        // Simpan objek Product ke dalam database
        $charge->save();

        // Redirect ke halaman index atau tampilkan pesan sukses jika perlu
        return redirect()->route('charge.index')->with('success', 'Expense berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Charge $charge)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_biaya)
    {
        $charge = Charge::findOrFail($id_biaya);
        return view('dashboard.charge.edit', compact('charge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Charge $charge)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'tanggal_biaya' => 'required',
            'jenis_biaya' => 'required',
            'jumlah_biaya' => 'required',
        ]);

        // Cari data charge berdasarkan id_biaya
        $charge->update($validatedData);

        return redirect()->route('charge.index')->with('success', 'Charge update successfully');
    }

    public function destroy(Request $request, $id_biaya)
    {
        $charge = Charge::findOrFail($id_biaya);
        $charge->delete($request->all());

        return redirect()->route('charge.index');
    }

    public function exportchargepdf()
    {
        $datas = Charge::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Expanse</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>Tanggal </th>
                <th>Jenis Biaya</th>
                <th>Jumlah Biaya</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->tanggal_biaya . "</td>
            <td>" . $data->jenis_biaya . "</td>
            <td>" . $data->jumlah_biaya . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Outlet.pdf');
    }
}
