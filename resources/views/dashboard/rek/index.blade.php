@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-1 mb-1 border-bottom">
    <h4 class="h4">Bank</h4>
    <h5 class="h5">Your Bank and Cash ,{{ Auth::user()-> name }} </h5>
  </div>
  <br>
  <a  class="btn btn-info" href="bank/create">tambah</a>
  <br>
  <br>
  <div class="table-responsive table-bordered" table>
    <table class="table table-striped table-sm ">
      <thead>
        <tr>
          <th scope="col">Nama Bank</th>
          <th scope="col">No Rekening</th>
        </tr>
        @php
         $no=1;   
        @endphp
        @foreach ($data as $key => $value)
            <tr>
              <td>{{ $value->nama }}</td>
              <td>{{ $value->no }}</td>
            </tr>
        @endforeach

      </thead>
    </table>
  </div>

  <div class="button position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
            type="button"
            aria-expanded="false"
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>

  </div>

@endsection