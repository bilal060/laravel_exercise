@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('app/css/login.css') }}">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Register</h5>
                        <form class="form-signin" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="form-label-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input id="name" placeholder="Enter Name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                <label for="name">Enter Name</label>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif

                            </div>
                            <div class="form-label-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" placeholder="Enter Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <label for="email">Enter Email</label>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                            </div>
                            <div class="form-label-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" placeholder="Enter Password"  type="password" class="form-control" name="password" required>
                                <label for="password">Enter Password</label>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-label-group">
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <label for="password-confirm">Confirm Password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign Up</button>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

