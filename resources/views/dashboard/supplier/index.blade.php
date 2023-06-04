@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Supplier</h4>
        <h5 class="h5">Your Supplier ,{{ Auth::user()->name }} </h5>
    </div>


    {{-- alert --}}
    @if (Session::has('success'))
        <div id="successAlert" class="alert alert-success" role="alert">
            supplier added successfully
            <button id="closeButton" class="close-button" onclick="closeAlert()">&times;</button>
        </div>
    @endif


    <script>
        function closeAlert() {
            document.getElementById('successAlert').style.display = 'none';
        }
    </script>



    <div class=" mt-1 mb-5">
        <table class="table table-hover">
            <a href="{{ route('supplier.create') }}" class="btn btn-primary ">Add Supplier</a>
            <a href="/exportsupplierpdf" class="btn btn-outline-dark m-1">EXPORT</a>
            <br><br>
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name Supplier</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">No Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supplier as $supplier)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $supplier->nama_supplier }}</td>
                        <td class="align-middle">{{ $supplier->alamat }}</td>
                        <td class="align-middle">{{ $supplier->kota }}</td>
                        <td class="align-middle">{{ $supplier->no_tlp }}</td>
                        <td class="align-middle">{{ $supplier->email }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('supplier.edit', $supplier->id_supplier) }}" type="button"
                                    class="btn btn-warning">UPDATE</a>
                                <form action="{{ route('supplier.destroy', $supplier->id_supplier) }}" method="POST"
                                    class="btn btn-danger "
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
