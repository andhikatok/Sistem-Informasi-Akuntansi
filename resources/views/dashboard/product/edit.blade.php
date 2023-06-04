@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Product</h4>
        <h5 class="h5">Update Product</h5>
    </div>
    <form action="{{ route('product.update', $product->id_barang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3 p-lg-2">
            <div class="row">
                <label for="">Insert Name Product</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $product->nama_barang }}">
            </div>
            <div class="row">
                <label for="">Purchase Price</label>
                <input type="number" name="harga_beli" class="form-control" value="{{ $product->harga_beli }}">
            </div>
            <div class="row">
                <label for="">Selling Price</label>
                <input type="number" name="harga_jual" class="form-control" value="{{ $product->harga_jual }}">
            </div>
            <div class="row">
                <label for="">Stock</label>
                <input type="number" name="stok" class="form-control" value="{{ $product->stok }}">
            </div>

            <div class="row">
                <label for="">Supplier Name</label>
                <select name="id_supplier" class="form-control">
                    <option selected disabled>Choose Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value='{{ $supplier->id_supplier }}'
                            {{ $supplier->id_supplier == $product->id_supplier ? 'selected' : '' }}>
                            {{ $supplier->nama_supplier }}</option>
                    @endforeach
                </select>
            </div>

            <br />
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">UPDATE</button>
            </div>
        </div>
    </form>
@endsection
