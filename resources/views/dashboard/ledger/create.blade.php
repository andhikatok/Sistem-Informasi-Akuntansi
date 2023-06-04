@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">LEDGER</h4>
        <h5 class="h5">Add LEDGER</h5>
    </div>
    <form action="{{ route('ledger.store') }}" method="POST">
        @csrf
        <div class="row mb-1 p-lg-3">
            <div class="row">
                <label for="">Transaction</label>
                <select name="id_kas_bank" class="form-control">
                    <option selected disabled>Choose transaction</option>
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->id_kas_bank }}"> {{ $bank->keterangan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <label for="">Credit</label>
                <input type="number" name="kredit" class="form-control" placeholder="" aria-label="First">
            </div>

            <div class="row">
                <label for="">Debit</label>
                <input type="number" name="debit" class="form-control" placeholder="" aria-label="First">
            </div>

            <div class="row">
                <label for="">Total Credit</label>
                <input type="number" name="saldo_kredit" class="form-control" placeholder="" aria-label="First">
            </div>

            <div class="row">
                <label for="">Total Debit</label>
                <input type="number" name="saldo_debit" class="form-control" placeholder="" aria-label="First">
            </div>
            <br />
        </div>
        <div>
            <div>
                <button class="btn btn-primary" type="submit">INSERT</button>
            </div>
        </div>
    </form>
@endsection
