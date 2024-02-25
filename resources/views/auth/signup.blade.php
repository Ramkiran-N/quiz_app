@extends('layout')
<div class="signup d-flex col-12  align-items-center justify-content-center min-vh-100 container-fluid">
    <div class="col-12 col-md-6 col-lg-5 col-xl-4">
        <h1 class="text-center">Online Quiz - Signup</h1>
        <div class="d-flex align-items-center justify-content-center p-3 p-md-5 mt-3">
            <div class="card p-3 w-100">
               <h4>Create an account</h4>
               <form class=mt-3 action="{{ route('signup') }}" method='post'>
                @csrf
                    <div class="form-group py-1">
                        <label class="text-secondary"><i class="bi bi-person"></i> Username</label>
                        <input type="text" class="form-control shadow-none border-top-0 border-end-0 border-start-0 rounded-0 @error('name') is-invalid @enderror" name='name' value="{{ old('name') }}">
                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group  py-1">
                        <label class="text-secondary"><i class="bi bi-envelope"></i> Email</label>
                        <input type="email" class="form-control shadow-none border-top-0 border-end-0 border-start-0 rounded-0  @error('email') is-invalid @enderror" name='email' value="{{ old('email') }}">
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group  py-1">
                        <label class="text-secondary"><i class="bi bi-lock"></i> New password</label>
                        <input type="password" class="form-control shadow-none border-top-0 border-end-0 border-start-0 rounded-0  @error('password') is-invalid @enderror" name='password' >
                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group  py-1">
                        <label class="text-secondary"><i class="bi bi-lock"></i> Confirm password</label>
                        <input type="password" class="form-control shadow-none border-top-0 border-end-0 border-start-0 rounded-0  @error('password_confirmation') is-invalid @enderror" name='password_confirmation'>
                        @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-success my-3 rounded-0 w-100 ">Submit</button>
                    <a href="/login" class='text-center text-decoration-none text-secondary'>Login</a>
                    </div>
                    </form>
                    @error('unknown')
                    <div class="mx-5">
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
            </div>
        </div>
    </div>
    
</div>