@extends('layout')
<div class="login d-flex col-12  align-items-center justify-content-center min-vh-100 container-fluid">
    <div class="col-12 col-md-6 col-lg-5 col-xl-4">
        <h1 class="text-center">Online Quiz - Login</h1>
            <div class="card p-3 col-12 col-sm-9 col-md-9  col-xxl-8 mt-3 mx-auto">
               <h3 class='text-center'><b>Login</b></h3>
               <hr>
               <form class=mt-3 action="{{ route('authenticate') }}" method='post'>
                @csrf
                    <div class="form-group py-1">
                        <input type="text" class="form-control shadow-none border-top-0 border-end-0 border-start-0 rounded-0 @error('name') is-invalid @enderror" name='name' value="{{ old('name') }}" placeholder='Username'>
                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group  py-1 mb-2">
                        <input type="password" class="form-control shadow-none border-top-0 border-end-0 border-start-0 rounded-0  @error('password') is-invalid @enderror" name='password' placeholder='Password'>
                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <a href="/register" class='text-center text-decoration-none text-secondary '>Forgot password?</a>
                    <div class="text-center mt-2">
                    <button type="submit" class="btn btn-success my-3 rounded-pill w-100 text-light bg-primary">Login</button>
                    <a href="/register" class='text-center text-decoration-none text-secondary'>Not a member? <span class='text-primary'>Signup</span></a>
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