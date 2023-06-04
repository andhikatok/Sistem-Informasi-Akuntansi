<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use TheSeer\Tokenizer\Exception;
use App\StudInsert;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id_barang', 'ASC')->get();
        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('dashboard.product.create', compact('suppliers'));

        $suppliers = Supplier::all();
        return view('dashboard.product.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'id_supplier' => 'required',
        ]);


        // Buat instansiasi objek Product dengan data yang diterima dari formulir
        $product = new Product([
            'nama_barang' => $request->nama_barang,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'id_supplier' => $request->id_supplier,
        ]);

        // Simpan objek Product ke dalam database
        $product->save();

        // Redirect ke halaman index atau tampilkan pesan sukses jika perlu
        return redirect()->route('product.index')->with('success', 'Product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_barang)
    {
        $product = Product::findOrFail($id_barang);
        $suppliers = Supplier::all();
        return view('dashboard.product.edit', compact('product', 'suppliers'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_barang)
    {
        $product = Product::findOrFail($id_barang);
        $product->update($request->all());

        return redirect()->route('product.index')->with('success', 'Product Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_barang)
    {
        $product = Product::findOrFail($id_barang);
        $product->delete($request->all());

        return redirect()->route('product.index');
    }

    public function exportproductpdf()
    {
        $datas = Product::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Data Product</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>ID</th>
                <th>Nama Barang </th>
                <th>Harga Beli </th>
                <th>Harga Jual</th>
                <th>Stok</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->id_barang . "</td>
            <td>" . $data->nama_barang . "</td>
            <td>" . $data->harga_beli . "</td>
            <td>" . $data->harga_jual . "</td>
            <td>" . $data->stok . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Product.pdf');
    }
}
