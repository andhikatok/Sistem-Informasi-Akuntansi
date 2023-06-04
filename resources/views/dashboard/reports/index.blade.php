@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">General Ledger</h4>
        <h5 class="h5">Your General Ledger, {{ Auth::user()->name }}</h5>
    </div>

    {{-- Alert --}}
    @if (Session::has('success'))
        <div id="successAlert" class="alert alert-success" role="alert">
            {{ Session::get('success') }}
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
            <a href="{{ route('reports.create') }}" class="btn btn-primary">Add Entry</a>
            <br><br>
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Debit</th>
                    <th scope="col">Credit</th>
                    <th scope="col">Total Debit</th>
                    <th scope="col">Total Credit</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $reports)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $reports->debit }}</td>
                        <td class="align-middle">{{ $reports->credit }}</td>
                        <td class="align-middle">{{ $reports->saldo_debit }}</td>
                        <td class="align-middle">{{ $reports->saldo_kredit }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('general-ledger.edit', $reports->id_buku_besar) }}" type="button"
                                    class="btn btn-warning">UPDATE</a>
                                <form action="{{ route('general-ledger.destroy', $reports->id_buku_besar) }}" method="POST"
                                    class="btn btn-danger"
                                    onsubmit="return confirm('Are you sure you want to delete this entry?')">
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
