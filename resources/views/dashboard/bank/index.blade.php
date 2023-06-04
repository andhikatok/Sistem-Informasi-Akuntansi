@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Bank</h4>
        <h5 class="h5">Your Bank, {{ Auth::user()->name }}</h5>
    </div>

    {{-- alert --}}
    @if (Session::has('success'))
        <div id="successAlert" class="alert alert-success" role="alert">
            Bank added successfully
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
            <a href="{{ route('bank.create') }}" class="btn btn-primary">Add Bank</a>
            <a href="/exportbankpdf" class="btn btn-outline-dark m-1">EXPORT</a>

            <br><br>
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Debit</th>
                    <th scope="col">Credit</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bank as $bank)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $bank->tanggal }}</td>
                        <td class="align-middle">{{ $bank->keterangan }}</td>
                        <td class="align-middle">{{ $bank->debit }}</td>
                        <td class="align-middle">{{ $bank->kredit }}</td>
                        <td class="align-middle">{{ $bank->saldo }}</td>
                        </td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('bank.edit', $bank->id_kas_bank) }}" type="button"
                                    class="btn btn-warning">UPDATE</a>
                                <form action="{{ route('bank.destroy', $bank->id_kas_bank) }}" method="POST"
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
