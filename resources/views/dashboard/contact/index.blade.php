@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Contact</h4>
        <h5 class="h5">Your Contact, {{ Auth::user()->name }}</h5>
    </div>

    {{-- Alert --}}
    @if (Session::has('success'))
        <div id="successAlert" class="alert alert-success" role="alert">
            Contact added successfully
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
            <a href="{{ route('contact.create') }}" class="btn btn-primary">Add Contact</a>
            <a href="/exportcontactpdf" class="btn btn-outline-dark m-1">EXPORT</a>
            <br><br>
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name Contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">No Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contact as $contact)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $contact->nama_customer }}</td>
                        <td class="align-middle">{{ $contact->alamat }}</td>
                        <td class="align-middle">{{ $contact->kota }}</td>
                        <td class="align-middle">{{ $contact->no_tlp }}</td>
                        <td class="align-middle">{{ $contact->email }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('contact.edit', $contact->id_customer) }}" type="button"
                                    class="btn btn-warning">UPDATE</a>
                                <form action="{{ route('contact.destroy', $contact->id_customer) }}" method="POST"
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
