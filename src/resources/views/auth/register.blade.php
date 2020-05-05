@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card bg-light">
                    <article class="card-body mx-auto" style="max-width: 400px;">
                        <h4 class="card-title mt-3 text-center">Create Account</h4>
                        <p class="text-center">Get started with your free account</p>
                        <p>
                            <a href="{{ route('loginGithub') }}" class="btn btn-block btn-github"> <i class="fab fa-github"></i>   Login via Github </a>
                            <a  href="{{ route('loginFacebook') }}" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via Facebook</a>
                            <a href="{{ route('loginGoogle') }}" class="btn btn-block btn-google"> <i class="fab fa-google"></i>  Login via Google</a>
                        </p>
                        <p class="divider-text">
                            <span class="bg-light">OR</span>
                        </p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="name" class="form-control" placeholder="Full name" type="text">
                            </div> <!-- form-group// -->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                </div>
                                <input name="email" class="form-control" placeholder="Email address" type="email">
                            </div> <!-- form-group// -->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="password" class="form-control" placeholder="Create password" type="password">
                            </div> <!-- form-group// -->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="password_confirmation" class="form-control" placeholder="Repeat password" type="password">
                            </div> <!-- form-group// -->                                      
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                            </div> <!-- form-group// -->      
                            <p class="text-center">Have an account? <a href="/login">Log In</a> </p>                                                                 
                        </form>
                    </article>
                </div> <!-- card.// -->
            </div>
            
        </div>
    </div>
</div>
@endsection
