@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Edit Purchase</h4>
        <h5 class="h5">Edit Purchases, {{ Auth::user()->name }}</h5>
    </div>

    {{-- alert --}}
    @if (Session::has('success'))
        <div id="successAlert" class="alert alert-success mb-4" role="alert">
            Purchases added successfully
            <button id="closeButton" class="close-button" onclick="closeAlert()">&times;</button>
        </div>
    @endif

    <script>
        function closeAlert() {
            document.getElementById('successAlert').style.display = 'none';
        }
    </script>

    <form action="{{ route('purchases.update', $purchases->id_transaksi_pembelian) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tanggal_transaksi">Date</label>
            <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi"
                value="{{ $purchases->tanggal_transaksi }}">
        </div>

        <div class="form-group">
            <label for="id_invoice">Name Product</label>
            <select class="form-control" id="id_invoice" name="id_invoice">
                <option value="">Pilih Produk</option>
                @foreach ($invoice as $inv)
                    <option value="{{ $inv->id_invoice }}" @if ($inv->id_invoice == $purchases->id_invoice) selected @endif>
                        {{ $inv->product->nama_barang }} (Jumlah: {{ $inv->jumlah }}), Total Harga:
                        {{ $inv->total_harga }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
