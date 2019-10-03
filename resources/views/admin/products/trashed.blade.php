@extends('layouts.app')
@section('content')
	 <div class="panel panel-default">
	 	<div class="panel-body">
			<table class="table table-hover">
		 		<thead>
					<th>Product Title</th>
					<th>Edit</th>
					<th>Restore</th>
					<th>Destroy</th>
					<tbody>
						@if($products->count()>0)
                            @foreach($products as $product)
			              <tr>
			              	<td>
			              	      {{ $product->title }}
			              	</td>
			              	 <td>Edit</td>
			              	 <td><a class="btn btn-xs btn-success" href="{{ route('products.restore', ['id'=>$product->id]) }}">Restore</a>
			              	 </td>
			              	 <td><a class="btn btn-xs btn-danger" href="{{ route('products.kill', ['id'=>$product->id]) }}">Delete</a>
			              	 </td>
			              </tr>
						   @endforeach
						@else
                                  <tr>
                                  	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">No Trashed Product Here</th>
                                  </tr>
						@endif
					</tbody>
				</thead>
			</table>
	 	</div>
	 </div>
@stop
