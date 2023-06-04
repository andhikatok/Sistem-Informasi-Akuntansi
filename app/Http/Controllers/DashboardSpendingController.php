<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class DashboardSpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spending = Spending::orderBy('id_pengeluaran', 'ASC')->get();
        return view('dashboard.spending.index', compact('spending'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $spending = Spending::all();
        return view('dashboard.spending.create', compact('spending'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'tanggal_pengeluaran' => 'required',
            'jenis_pengeluaran' => 'required',
            'jumlah_pengeluaran' => 'required',
        ]);


        // Buat instansiasi objek Product dengan data yang diterima dari formulir
        $spending = new Spending([
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
            'jenis_pengeluaran' => $request->jenis_pengeluaran,
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
        ]);

        // Simpan objek Product ke dalam database
        $spending->save();

        // Redirect ke halaman index atau tampilkan pesan sukses jika perlu
        return redirect()->route('spending.index')->with('success', 'Spending berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spending $spending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_pengeluaran)
    {
        $spending = Spending::findOrFail($id_pengeluaran);
        return view('dashboard.spending.edit', compact('spending'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spending $spending)
    {
        $validatedData = $request->validate([
            'tanggal_pengeluaran' => 'required',
            'jenis_pengeluaran' => 'required',
            'jumlah_pengeluaran' => 'required',
        ]);

        $spending->update($validatedData);

        return redirect()->route('spending.index')->with('success', 'Spending Update Successfullly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_pengeluaran)
    {
        $Spending = Spending::findOrFail($id_pengeluaran);
        $Spending->delete($request->all());

        return redirect()->route('spending.index');
    }

    public function exportspendingpdf()
    {
        $datas = Spending::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Spending</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>Tanggal </th>
                <th>Jenis Pengeluaran </th>
                <th>Jumlah Pengeluaran</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->tanggal_pengeluaran . "</td>
            <td>" . $data->jenis_pengeluaran . "</td>
            <td>" . $data->jumlah_pengeluaran . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Outlet.pdf');
    }
}
