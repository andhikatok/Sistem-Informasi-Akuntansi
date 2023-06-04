@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Purchases</h4>
        <h5 class="h5">Your Purchases, {{ Auth::user()->name }}</h5>
    </div>

    {{-- alert --}}
    @if (Session::has('success'))
        <div id="successAlert" class="alert alert-success" role="alert">
            Purchases added successfully
            <button id="closeButton" class="close-button" onclick="closeAlert()">&times;</button>
        </div>
    @endif

    <script>
        function closeAlert() {
            document.getElementById('successAlert').style.display = 'none';
        }
    </script>

    <div class="mt-1 mb-5">
        <table class="table table-hover">
            <a href="{{ route('purchases.create') }}" class="btn btn-primary">Add Purchases</a>
            <br><br>
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Name Product</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchases)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $purchases->tanggal_transaksi }}</td>
                        <td class="align-middle">
                            @if ($purchases->invoice && $purchases->invoice->product)
                                {{ $purchases->invoice->product->nama_barang }}
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($purchases->invoice)
                                {{ $purchases->invoice->jumlah }}
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($purchases->invoice)
                                {{ $purchases->invoice->total_harga }}
                            @endif
                        </td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('purchases.edit', $purchases->id_transaksi_pembelian) }}" type="button"
                                    class="btn btn-warning">UPDATE</a>
                                <form action="{{ route('purchases.destroy', $purchases->id_transaksi_pembelian) }}"
                                    method="POST" class="btn btn-danger"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger p-0 mb-1">DELETE</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
