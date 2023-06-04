@extends('dashboard.layout.main')

@section('container')
    <h4>Detail Sales</h4>

    <div class="mt-1">
        <table class="table">
            <tbody>
                <tr>
                    <th>Date:</th>
                    <td>{{ $sales->tanggal_transaksi }}</td>
                </tr>
                <tr>
                    <th>Name Customer:</th>
                    <td>{{ $sales->contact->nama_customer }}</td>
                </tr>
                <tr>
                    <th>Name Outlet:</th>
                    <td>{{ $sales->outlet->nama_outlet }}</td>
                </tr>
                <tr>
                    <th>Name Product:</th>
                    <td>{{ $sales->product->nama_barang }}</td>
                </tr>
                <tr>
                    <th>Price:</th>
                    <td>{{ $sales->product->harga_jual }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
