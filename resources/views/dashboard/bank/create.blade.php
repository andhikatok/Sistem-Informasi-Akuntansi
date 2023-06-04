@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Bank</h4>
        <h5 class="h5">Add Bank</h5>
    </div>
    <form action="{{ route('bank.store') }}" method="POST">
        @csrf
        <div class="row mb-1 p-lg-3">
            <div class="row">
                <label for="">Insert Date</label>
                <input type="date" name="tanggal" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Description</label>
                <input type="text" name="keterangan" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Debit</label>
                <input type="number" name="debit" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Credit</label>
                <input type="number" name="kredit" class="form-control" placeholder="" aria-label="First">
            </div>
            {{--             <div class="row">
                <label for="">Balance</label>
                <input type="number" name="saldo" class="form-control" placeholder="" aria-label="First">
            </div> --}}
            <br />
        </div>
        <div>
            <div>
                <button class="btn btn-primary">INSERT</button>
            </div>
        </div>
    </form>

    <script>
        function calculateSaldo() {
            let kredit = parseFloat(document.getElementById('kredit').value) || 0;
            let debit = parseFloat(document.getElementById('debit').value) || 0;
            let saldoInput = document.getElementById('saldo');
            let saldoSebelumnya = parseFloat(saldoInput.value) || 0;
            let saldo = saldoSebelumnya + debit - kredit;
            saldoInput.value = saldo.toFixed(2);
        }
    </script>
@endsection
