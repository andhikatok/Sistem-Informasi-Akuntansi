@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Product</h4>
        <h5 class="h5">Your Product, {{ Auth::user()->name }}</h5>
    </div>

    {{-- alert --}}
    @if (Session::has('success'))
        <div id="successAlert" class="alert alert-success" role="alert">
            Product added successfully
            <button id="closeButton" class="close-button" onclick="closeAlert()">&times;</button>
        </div>
    @endif

    <script>
        function closeAlert() {
            document.getElementById('successAlert').style.display = 'none';
        }
    </script>

    <div class="mt-1 mb-5">
        <table class="table table-hover">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a>
            <a href="/exportproductpdf" class="btn btn-outline-dark m-1">EXPORT</a>
            <br><br>
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name Product</th>
                    <th scope="col">Purchase Price</th>
                    <th scope="col">Selling Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $product->nama_barang }}</td>
                        <td class="align-middle">{{ $product->harga_beli }}</td>
                        <td class="align-middle">{{ $product->harga_jual }}</td>
                        <td class="align-middle">{{ $product->stok }}</td>
                        <td class="align-middle">
                            @if ($product->supplier)
                                {{ $product->supplier->nama_supplier }}
                            @endif
                        </td>

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('product.edit', $product->id_barang) }}" type="button"
                                    class="btn btn-warning">UPDATE</a>
                                <form action="{{ route('product.destroy', $product->id_barang) }}" method="POST"
                                    class="btn btn-danger"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger p-0 mb-1">DELETE</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
