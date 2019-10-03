@extends('layouts.app')
@section('content')

	 <div class="panel panel-default">
	 	<div class="panel-body">

			<table class="table table-hover">
		 		<thead>
					<th>Product Title</th>
					<th>Product Description</th>
					<th>Product Owner</th>
                    @if(Auth::user()->admin)
                        <th>Actions</th>
                    @endif
					<tbody>
                       @if($products->count()>0)
						 @foreach($products as $product)
			              <tr>
			              <td>{{ $product->title }}</td>
			              <td>{{ $product->body }}</td>
			              <td>{{ $product->client->name }}</td>
                              @if(Auth::user()->admin)

                                  <td>
                                    <a class="btn btn-primary" href="{{ route('products.edit', ['id'=>$product->id]) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('products.delete', ['id'=>$product->id]) }}">Trash</a>
                                 </td>
                            @endif
			              </tr>
						 @endforeach
                          @else
                          <tr>
                          	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">Post Create Not yet</th>
                          </tr>
                          @endif
					</tbody>
				</thead>
			</table>
	 	</div>
	 </div>
@stop
