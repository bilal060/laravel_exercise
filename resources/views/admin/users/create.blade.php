@extends('layouts.app')
@section('content')
    @include('admin.includes.errors')

    <div class="container">
        <br>
        <br>
        <div class="row" id="main">
            <div class="col-md-8 well" id="rightPanel">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" action="{{ route('user.store') }}" method="POST">
                            {{ csrf_field() }}
                            <h2>Add New User</h2>
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Name" tabindex="1">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                            </div>
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-12 col-md-6"></div>
                                <div class="col-xs-12 col-md-6">
                                    <input type="submit" value="Save" class="btn btn-success btn-block btn-lg"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal -->
            </div>
        </div>
    </div>
    </div>
@stop
