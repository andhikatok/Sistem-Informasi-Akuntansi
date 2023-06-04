<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Models\rek;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DashboardBankController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bank = Bank::orderBy('tanggal', 'ASC')->get();
        return view('dashboard.bank.index', compact(
            'bank'
        ));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bank = Bank::all();
        return view('dashboard.bank.create', compact('bank'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|min:5',
            'debit' => 'required|int',
            'kredit' => 'required|int',
        ]);

        $debit = $request->debit;
        $kredit = $request->kredit;
        $saldo = $debit - $kredit;

        $bank = new Bank([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'debit' => $debit,
            'kredit' => $kredit,
            'saldo' => $saldo,
        ]);

        // Simpan data ke dalam tabel_kas_dan_bank
        $bank->save();

        // Redirect atau tampilkan pesan sukses jika diperlukan
        return redirect()->route('bank.index')->with('succses', 'Bank berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_kas_bank)
    {
        $bank = Bank::findOrFail($id_kas_bank);
        $bank->delete($request->all());

        return redirect()->route('bank.index');
    }

    public function exportbankpdf()
    {
        $datas = Bank::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Outlet</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>Tanggal </th>
                <th>Keterangan </th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Saldo</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->tanggal . "</td>
            <td>" . $data->keterangan . "</td>
            <td>" . $data->debit . "</td>
            <td>" . $data->kredit . "</td>
            <td>" . $data->saldo . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Outlet.pdf');
    }
}
