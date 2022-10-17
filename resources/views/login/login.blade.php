@extends('login.main')
@section('container')
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="/login" method="POST">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" 
                placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
            <label for="email">Email address</label>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" required placeholder="Password">
            <label for="password">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        {{-- <small class="d-block text-center mt-2">Belom Regis? <a href="/registrasi">Regis sekarang</a></small> --}}
        <small class="d-block text-center "><a href="/">Kembali Kerumah</a></small>

    </form>
@endsection
