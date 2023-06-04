@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Product</h4>
        <h5 class="h5">Add Product</h5>
    </div>
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="row mb-1 p-lg-3">
            <div class="row">
                <label for="">Insert Name Product</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Purchase Price</label>
                <input type="number" name="harga_beli" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Selling Price</label>
                <input type="number" name="harga_jual" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Stock</label>
                <input type="number" name="stok" class="form-control" placeholder="" aria-label="First">
            </div>

            <div class="row">
                <label for="">Supplier Name</label>
                <select name="id_supplier" class="form-control">
                    <option selected disabled>Choose Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id_supplier }}"> {{ $supplier->nama_supplier }}</option>
                        </option>
                    @endforeach
                </select>
            </div>

            <br />

        </div>
        <div>
            <div>
                <button class="btn btn-primary">INSERT</button>
            </div>
        </div>
    </form>
@endsection
