@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Spending</h4>
        <h5 class="h5">Add Spending</h5>
    </div>
    <form action="{{ route('spending.store') }}" method="POST">
        @csrf
        <div class="row mb-1 p-lg-3">
            <div class="row">
                <label for="">Insert Date</label>
                <input type="date" name="tanggal_pengeluaran" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Type Spending</label>
                <input type="text" name="jenis_pengeluaran" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Amount Spending</label>
                <input type="number" name="jumlah_pengeluaran" class="form-control" placeholder="" aria-label="First">
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
