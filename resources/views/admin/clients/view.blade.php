@extends('layouts.app')



@section('content')
    <h3>Client Info</h3>
	 <div class="panel panel-default">
	 	<div class="panel-body">

			<table class="table table-hover">
		 		<thead>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
				</thead>
                <tbody>
                    <td>
                        {{ $client->name }}
                    </td>
                    <td>
                        {{ $client->phone }}
                    </td>
                    <td>
                        {{ $client->email }}
                    </td>
                </tbody>
            </table>
	 	</div>
	 </div>
     <h3>Products Associated with above clients.</h3>
     <div class="panel panel-default">
         <div class="panel-body">

             <table class="table table-hover">
                 <thead>

                 <th>Product Title</th>
                 <th>Product Description</th>
                 @if(Auth::user()->admin)
                     <th>Actions</th>
                 @endif

                 <tbody>
                 @if($client->products->count()>0)
                     @for($x = 0; $x < $client->products->count(); $x++)
                         <tr>
                             <td>{{ $client->products[$x]->title }}</td>
                             <td>{{ $client->products[$x]->body }}</td>
                             @if(Auth::user()->admin)

                                 <td>
                                     <a class="btn btn-primary" href="{{ route('products.edit', ['id'=>$client->products[$x]->id]) }}">Edit</a>
                                     <a class="btn btn-danger" href="{{ route('products.delete', ['id'=>$client->products[$x]->id]) }}">Trash</a>
                                 </td>
                             @endif
                         </tr>
                     @endfor

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
