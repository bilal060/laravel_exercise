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
                        <form role="form" action="{{ route('product.store') }}" method="POST">
                            {{ csrf_field() }}
                            <h2>Add New Product.</h2>
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="title" id="title" class="form-control input-lg" placeholder="Enter Name"  tabindex="1">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <select name="client_id" id="category_id" class="form-control">
                                            @foreach($clients as $client)

                                                <option value="{{$client->id}}">{{$client->name}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="body" cols="10" rows="10" placeholder="Enter your content" class="form-control"></textarea>
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
@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
@stop
@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
@stop
