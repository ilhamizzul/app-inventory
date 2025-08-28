@extends('layouts.auth')

@section('content')
    <div class="card-body register-card-body">
        <p class="register-box-msg">Register a new membership</p>
        <form action="{{ route('auth.register') }}" method="post">
            @csrf
            <div class="input-group mb-1">
                <div class="form-floating">
                    <input id="registerFullName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="" value="{{ old('name') }}" required />
                    <label for="registerFullName">Full Name</label>
                </div>
                <div class="input-group-text"><span class="bi bi-person"></span></div>
            </div>
            @error('name')
                <div class="text-danger small mb-2">{{ $message }}</div>
            @enderror
            <div class="input-group mb-1">
                <div class="form-floating">
                    <input id="registerEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="" value="{{ old('email') }}" required />
                    <label for="registerEmail">Email</label>
                </div>
                <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            @error('email')
                <div class="text-danger small mb-2">{{ $message }}</div>
            @enderror
            <div class="input-group mb-1">
                <div class="form-floating">
                    <input id="registerPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="" required />
                    <label for="registerPassword">Password</label>
                </div>
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
            @error('password')
                <div class="text-danger small mb-2">{{ $message }}</div>
            @enderror
            <div class="row">
                <div class="col-8 d-inline-flex align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                        <label class="form-check-label" for="flexCheckDefault">
                            I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </div>
            </div>
        </form>
        <p class="mb-0">
            <a href="{{ route('auth.loginForm') }}" class="link-primary text-center"> I already have a membership </a>
        </p>
    </div>
@endsection
