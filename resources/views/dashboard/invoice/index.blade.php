@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Invoice</h4>
        <h5 class="h5">Your Invoice, {{ Auth::user()->name }}</h5>
    </div>

    {{-- alert --}}
    @if (Session::has('success'))
        <div id="successAlert" class="alert alert-success" role="alert">
            Invoice added successfully
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
            <a href="{{ route('invoice.create') }}" class="btn btn-primary">Add Invoice</a>
            <a href="/exportinvoicepdf" class="btn btn-outline-dark m-1">EXPORT</a>
            <br><br>
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Name Product</th>
                    <th scope="col">Purchase</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $invoice->tanggal_invoice }}</td>
                        <td class="align-middle">{{ $invoice->jatuh_tempo }}</td>

                        <td class="align-middle">
                            @if ($invoice->product)
                                {{ $invoice->product->nama_barang }}
                            @endif
                        </td>

                        <td class="align-middle">
                            @if ($invoice->product)
                                {{ $invoice->product->harga_beli }}
                            @endif
                        </td>
                        <td class="align-middle">{{ $invoice->jumlah }}</td>
                        <td class="align-middle">{{ $invoice->total_harga }}</td>

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('invoice.edit', $invoice->id_invoice) }}" type="button"
                                    class="btn btn-warning">UPDATE</a>
                                <form action="{{ route('invoice.destroy', $invoice->id_invoice) }}" method="POST"
                                    class="btn btn-danger"
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
