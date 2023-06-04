@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Expense</h4>
        <h5 class="h5">Update Expense</h5>
    </div>
    <form action="{{ route('charge.update', $charge->id_biaya) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3 p-lg-2">
            <div class="row">
                <label for="">Insert Date</label>
                <input type="date" name="tanggal_biaya" class="form-control" value="{{ $charge->tanggal_biaya }}">
            </div>
            <div class="row">
                <label for="">Type Expense</label>
                <input type="text" name="jenis_biaya" class="form-control" value="{{ $charge->jenis_biaya }}">
            </div>
            <div class="row">
                <label for="">Amount Expense</label>
                <input type="number" name="jumlah_biaya" class="form-control" value="{{ $charge->jumlah_biaya }}">
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
