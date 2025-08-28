@extends('layouts.auth')

@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="../index3.html" method="post">
            <div class="input-group mb-1">
                <div class="form-floating">
                    <input id="loginEmail" type="email" class="form-control" value="" placeholder="" />
                    <label for="loginEmail">Email</label>
                </div>
                <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            <div class="input-group mb-1">
                <div class="form-floating">
                    <input id="loginPassword" type="password" class="form-control" placeholder="" />
                    <label for="loginPassword">Password</label>
                </div>
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
            <!--begin::Row-->
            <div class="row">
                <div class="col-8 d-inline-flex align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                        <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </div>
            </div>
        </form>
        <p class="mb-0">
            <a href="{{ route('auth.registerForm') }}" class="text-center"> Register a new membership </a>
        </p>
    </div>
@endsection
