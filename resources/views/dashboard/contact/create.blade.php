    @extends('dashboard.layout.main')

    @section('container')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h4">Contact</h4>
            <h5 class="h5">Add Contact, {{ Auth::user()->name }}</h5>
        </div>
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="row mb-1 p-lg-3">
                <div class="row">
                    <label for="">Name Contact</label>
                    <input type="text" name="nama_customer" class="form-control" placeholder="" aria-label="First">
                </div>
                <div class="row">
                    <label for="">Address</label>
                    <input type="text" name="alamat" class="form-control" placeholder="" aria-label="First">
                </div>
                <div class="row">
                    <label for="">City</label>
                    <input type="text" name="kota" class="form-control" placeholder="" aria-label="First">
                </div>
                <div class="row">
                    <label for="">No Phone</label>
                    <input type="number" name="no_tlp" class="form-control" placeholder="" aria-label="First">
                </div>
                <div class="row">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="" aria-label="First">
                </div>
                <br />
            </div>
            <div>
                <div>
                    <button class="btn btn-primary">INSERT</button>
                </div>
            </div>
        </form>
    @endsection
