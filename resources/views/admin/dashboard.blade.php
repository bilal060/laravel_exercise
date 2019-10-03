@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 40px">
    <div id="accordion" style="width: 100%">
        @if($clients->count())
            @foreach($clients as $key=>$client)
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <table class="table table-hover">
                            <thead>
                            <th style="border: 0;width: 15%"> {{ $client->name }}</th>
                            <th style="border: 0;width: 15%"> {{ $client->phone }}</th>
                            <th style="border: 0;width: 30%"> {{ $client->email }}</th>
                            <th style="border: 0;width: 25%">
                            @if(Auth::user()->admin)
                                    <a class="btn btn-primary" href="{{ route('client.edit', ['id'=>$client->id]) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('client.delete',['id'=>$client->id]) }}">Delete</a>
                            @endif
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$key}}" aria-expanded="true" aria-controls="collapseOne{{$key}}">
                                    View Products
                                </button>
                            </th>
                            </thead>
                        </table>
                    </div>

                    <div id="collapseOne{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        @if($client->products->count() > 0)
                            <div class="card-body" style="background-color: #7c7c7d;">
                            <ul class="list-group">
                                <div class="row" style="display: flex;">
                                    @foreach($client->products as $product)
                                        <div class="col-4 card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->title }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $product->slug }}</h6>
                                                <p class="card-text">{{ $product->body }}</p>
                                                @if(Auth::user()->admin)
                                                    <a href="{{ route('products.edit', ['id'=>$product->id]) }}" class="card-link">Edit</a>
                                                    <a href="{{ route('products.delete', ['id'=>$product->id]) }}" class="card-link">Remove</a>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </ul>
                        </div>
                            @else
                            <div class="card-body">
                                No product found againest this client.
                            </div>
                        @endif

                    </div>
                </div>
            @endforeach
        @else
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            No Client found
                        </button>
                    </h5>
                </div>

            </div>

        @endif

    </div>

</div>
@endsection
