@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Contact</h4>
        <h5 class="h5">Update Contact, {{ Auth::user()->name }}</h5>
    </div>
    <form action="{{ route('contact.update', $contact->id_customer) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3 p-lg-2">
            <div class="row">
                <label for="">Name Contact</label>
                <input type="text" name="nama_customer" class="form-control" value="{{ $contact->nama_customer }}">
            </div>
            <div class="row">
                <label for="">Address</label>
                <input type="text" name="alamat" class="form-control" value="{{ $contact->alamat }}">
            </div>
            <div class="row">
                <label for="">City</label>
                <input type="text" name="kota" class="form-control" value="{{ $contact->kota }}">
            </div>
            <div class="row">
                <label for="">No Phone</label>
                <input type="number" name="no_tlp" class="form-control" value="{{ $contact->no_tlp }}">
            </div>
            <div class="row">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $contact->email }}">
            </div>
            <br />
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">UPDATE</button>
            </div>
        </div>
    </form>
@endsection
