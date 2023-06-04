<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class DashboardContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::orderBy('id_customer', 'ASC')->get();
        return view('dashboard.contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contact = Contact::all();
        return view('dashboard.contact.create', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama_customer' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
        ]);
        Contact::create($validatedData);

        return redirect()->route('contact.index')->with('success', 'Contact Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_customer)
    {
        $contact = Contact::findOrFail($id_customer);
        return view('dashboard.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'nama_customer' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_tlp' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $contact->update($validatedData);

        return redirect()->route('contact.index')->with('success', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_customer)
    {
        $contact = Contact::findOrFail($id_customer);
        $contact->delete();

        return redirect()->route('contact.index');
    }

    public function exportcontactpdf()
    {
        $datas = Contact::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Outlet</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>Nama Customer </th>
                <th>Alamat </th>
                <th>Kota</th>
                <th>No Tlp</th>
                <th>Email</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->nama_customer . "</td>
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
