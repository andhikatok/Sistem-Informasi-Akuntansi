@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Sales</h4>
        <h5 class="h5">Your Sales, {{ Auth::user()->name }}</h5>
    </div>

    {{-- alert --}}
    @if (Session::has('success'))
        <div id="successAlert" class="alert alert-success" role="alert">
            Sales added successfully
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
            <a href="{{ route('sales.create') }}" class="btn btn-primary">Add Sales</a>
            <br><br>
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Name Customer</th>
                    <th scope="col">Name Outlet</th>
                    <th scope="col">Name Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sales)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $sales->tanggal_transaksi }}</td>

                        <td class="align-middle">
                            @if ($sales->contact)
                                {{ $sales->contact->nama_customer }}
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($sales->outlet)
                                {{ $sales->outlet->nama_outlet }}
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($sales->product)
                                {{ $sales->product->nama_barang }}
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($sales->product)
                                {{ $sales->product->harga_jual }}
                            @endif
                        </td>

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('sales.edit', $sales->id_transaksi_penjualan) }}" type="button"
                                    class="btn btn-warning">UPDATE</a>
                                <form action="{{ route('sales.destroy', $sales->id_transaksi_penjualan) }}" method="POST"
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
