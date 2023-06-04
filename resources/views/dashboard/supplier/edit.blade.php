@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Supplier</h4>
        <h5 class="h5">Update Supplier</h5>
    </div>
    <form action="{{ route('supplier.update', $supplier->id_supplier) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3 p-lg-2">
            <div class="row">
                <label for="">Insert Name Supplier</label>
                <input type="text" name="nama_supplier" class="form-control" value="{{ $supplier->nama_supplier }}">
            </div>
            <div class="row">
                <label for="">Address</label>
                <input type="text" name="alamat" class="form-control" value="{{ $supplier->alamat }}">
            </div>
            <div class="row">
                <label for="">City</label>
                <input type="text" name="kota" class="form-control" value="{{ $supplier->kota }}">
            </div>
            <div class="row">
                <label for="">No Phone</label>
                <input type="number" name="no_tlp" class="form-control" value="{{ $supplier->no_tlp }}">
            </div>
            <div class="row">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $supplier->email }}">
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
