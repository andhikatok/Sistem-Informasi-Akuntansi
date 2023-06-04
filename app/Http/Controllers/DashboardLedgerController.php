<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Ledger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $ledger = Ledger::orderBy('id_buku_besar', 'ASC')->get();
        return view('dashboard.ledger.index', compact('ledger'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banks = Bank::all();
        return view('dashboard.ledger.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'id_kas_bank' => 'required',
            'kredit' => 'required',
            'debit' => 'required',
            'saldo_kredit' => 'required',
            'saldo_debit' => 'required',
        ]);
        $ledger = new Ledger([
            'id_kas_bank' => $request->id_kas_bank,
            'debit' => $request->debit,
            'kredit' => $request->kredit,
            'saldo_debit' => $request->saldo_debit,
            'saldo_kredit' => $request->saldo_kredit,
        ]);


        $ledger->save();

        return redirect()->route('ledger.index')->with('success', 'Ledger successfully added');
    }




    /**
     * Display the specified resource.
     */
    public function show(Ledger $ledger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ledger $ledger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ledger $ledger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_buku_besar)
    {
        $ledger = Ledger::findOrFail($id_buku_besar);
        $ledger->delete($request->all());

        return redirect()->route('ledger.index');
    }
}
