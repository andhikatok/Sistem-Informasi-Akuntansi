@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-4">
        
        
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
        </button>
        </div>  
        @endif

        @if(session()->has('LoginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('LoginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
        </button>
        </div>  
        @endif
        

        <main class="form-login w-100 m-auto">
            <br>
            <br>
            <br>
            <br>
            <div class="text-center"> 
                <h1 class="h2 mb-3 fw-font-font-weight-normal text-center col">Login</h1>
                <h1 class="h6 mb-2 fw-font-weight-normal col-m-auto mt-auto">Welcome To Prosepera</h1>
            </div>

            <form action="/login" method="POST">
                @csrf
                <div class="form-floating mb-1">
                    <input type="email" name="email" class="form-control @error('email')  is-invalid @enderror " id="email" placeholder="email@example.com" autofocus required  value="{{ old('email') }}">
                    <label for="email">Email Address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                <small class="d-block text-center mt-3">
                    Not Register? <a href="/register">Register Now</a>
                </small>
            </form>

        </main>
    </div>
</div>
<p class="text-justify-left-0 mt-3">&copy; Prospera 2023</p>



@endsection