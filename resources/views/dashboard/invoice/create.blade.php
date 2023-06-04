@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Invoice</h4>
        <h5 class="h5">Add Invoice</h5>
    </div>
    <form action="{{ route('invoice.store') }}" method="POST">
        @csrf
        <div class="row mb-1 p-lg-3">
            <div class="row">
                <label for="">Insert Date</label>
                <input type="date" name="tanggal_invoice" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Due Date</label>
                <input type="date" name="jatuh_tempo" class="form-control" placeholder="" aria-label="First">
            </div>

            <div class="row">
                <label for="">Name Product</label>
                <select name="id_barang" class="form-control" id="id_barang">
                    <option selected disabled>Choose Product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id_barang }}" data-harga="{{ $product->harga_beli }}">
                            {{ $product->nama_barang }}
                            - {{ $product->harga_beli }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <label for="">Insert Amount</label>
                <input type="number" name="jumlah" class="form-control" placeholder="" aria-label="First"
                    id="jumlah_barang">
            </div>

            <div class="row">
                <label for="">Total Price</label>
                <input type="number" name="total_harga" class="form-control" placeholder="" aria-label="First"
                    id="total_harga" readonly>
            </div>
            <br />
        </div>
        <div>
            <div>
                <button class="btn btn-primary">INSERT</button>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('id_barang').addEventListener('change', function() {
            var hargaBeli = this.options[this.selectedIndex].getAttribute('data-harga');
            var jumlahBarang = document.getElementById('jumlah_barang').value;
            var totalHarga = hargaBeli * jumlahBarang;
            document.getElementById('total_harga').value = totalHarga;
        });

        document.getElementById('jumlah_barang').addEventListener('input', function() {
            var hargaBeli = document.getElementById('id_barang').options[document.getElementById('id_barang')
                    .selectedIndex]
                .getAttribute('data-harga');
            var jumlahBarang = this.value;
            var totalHarga = hargaBeli * jumlahBarang;
            document.getElementById('total_harga').value = totalHarga;
        });
    </script>
@endsection
