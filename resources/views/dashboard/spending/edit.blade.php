@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Spending</h4>
        <h5 class="h5">Update Spending</h5>
    </div>
    <form action="{{ route('spending.update', $spending->id_pengeluaran) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3 p-lg-2">
            <div class="row">
                <label for="">Insert Date</label>
                <input type="date" name="tanggal_pengeluaran" class="form-control"
                    value="{{ $spending->tanggal_pengeluaran }}">
            </div>
            <div class="row">
                <label for="">Type Spending</label>
                <input type="text" name="jenis_pengeluaran" class="form-control"
                    value="{{ $spending->jenis_pengeluaran }}">
            </div>
            <div class="row">
                <label for="">Amount Spending</label>
                <input type="number" name="jumlah_pengeluaran" class="form-control"
                    value="{{ $spending->jumlah_pengeluaran }}">
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
