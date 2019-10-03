@extends('layouts.app')



@section('content')

	 <div class="panel panel-default">
	 	<div class="panel-body">

			<table class="table table-hover">
		 		<thead>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                    @if(Auth::user()->admin)

					<th>Actions</th>
                    @endif
					<tbody>

						@if($clients->count())
						 @foreach($clients as $client)

			              <tr>
			              	<td>
                                <a href="{{ route('client.view',['id'=>$client->id]) }}">
			              		    {{ $client->name }}
                                </a>
			              	</td>
                              <td>
                                  {{ $client->phone }}
                              </td>
                              <td>
                                  {{ $client->email }}
                              </td>
                              @if(Auth::user()->admin)
			              	    <td>


                                <a class="btn btn-primary" href="{{ route('client.edit',['id'=>$client->id]) }}">
                                    Edit
                                </a>
                                <a class="btn btn-danger" href="{{ route('client.delete',['id'=>$client->id]) }}">
                                    Delete
                                </a>
                                </td>

                              @endif

			              </tr>


						 @endforeach

						 @else
                              <tr>
                              	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">
                              		No Client Create yet
                              	</th>
                              </tr>

						 @endif
					</tbody>
				</thead>
			</table>
	 	</div>
	 </div>


@stop
