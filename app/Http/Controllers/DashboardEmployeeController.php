<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Outlet;
use App\Models\Product;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class DashboardEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::orderBy('id_pegawai', 'ASC')->get();
        return view('dashboard.employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = Employee::all();
        return view('dashboard.employee.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
            'gaji' => 'required',
        ]);

        Employee::create($validatedData);

        return redirect()->route('employee.index')->with('success', 'Employee berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_pegawai)
    {
        $employee = Employee::findOrFail($id_pegawai);
        return view('dashboard.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email' => 'required|email',
            'gaji' => 'required|numeric',
        ]);

        $employee->update($validatedData);

        return redirect()->route('employee.index')->with('success', 'Employee update successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_pegawai)
    {
        $employee = Employee::findOrFail($id_pegawai);
        $employee->delete();

        return redirect()->route('employee.index');
    }

    public function exportemployeepdf()
    {
        $datas = Employee::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Outlet</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>Nama Pegawai </th>
                <th>Alamat </th>
                <th>No tlp</th>
                <th>Email</th>
                <th>Gaji</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->nama_pegawai . "</td>
            <td>" . $data->alamat . "</td>
            <td>" . $data->no_tlp . "</td>
            <td>" . $data->email . "</td>
            <td>" . $data->gaji . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Outlet.pdf');
    }
}
