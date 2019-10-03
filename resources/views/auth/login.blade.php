@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('app/css/login.css') }}">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-label-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input  id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email">Email address</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                                @endif
                            </div>

                            <div class="form-label-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required >
                                <label for="password">Password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                                @endif
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                                class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
