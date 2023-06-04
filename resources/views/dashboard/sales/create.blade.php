@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Sales</h4>
        <h5 class="h5">Add Sales</h5>
    </div>
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="row mb-1 p-lg-3">
            <div class="row">
                <label for="">Insert Date</label>
                <input type="date" name="tanggal_transaksi" class="form-control" placeholder="" aria-label="First">
            </div>
            <div class="row">
                <label for="">Name Customer</label>
                <select name="id_customer" class="form-control">
                    <option selected disabled>Choose Customer</option>
                    @foreach ($contact as $contact)
                        <option value="{{ $contact->id_customer }}"> {{ $contact->nama_customer }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <label for="">Name Outlet</label>
                <select name="id_outlet" class="form-control">
                    <option selected disabled>Choose Outlet</option>
                    @foreach ($outlet as $outlet)
                        <option value="{{ $outlet->id_outlet }}"> {{ $outlet->nama_outlet }}</option>
                    @endforeach
                </select>

            </div>

            <div class="row">
                <label for="">Name Product</label>
                <select name="id_barang" class="form-control">
                    @foreach ($product as $product)
                        <option value="{{ $product->id_barang }}" data-harga="{{ $product->harga_jual }}">
                            {{ $product->nama_barang }} - {{ $product->harga_jual }}
                        </option>
                    @endforeach
                </select>
                <input type="hidden" name="harga_barang" id="harga_barang">
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
        document.querySelector('select[name="id_barang"]').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var hargaBarangInput = document.getElementById('harga_barang');
            hargaBarangInput.value = selectedOption.getAttribute('data-harga');
        });
    </script>
@endsection
