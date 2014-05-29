@extends('master')

@section('navs')
	@include('navs')
@stop

@section('content')
 <div class="container text-center">
	<h2 class="form-signin-heading text-center">Professors</h2>
	
		

		@if(Auth::user()->type == 1)
			@foreach($locks as $lock)
				
				{{ Form::open(['method'=> 'PUT','route'=>['enableencode', $lock->id]]) }}
	      		{{ Form::token() }}
	      		@if($lock->lock == 0)
		      		<label>Enable Encoding
		      		<input name="lock" type="checkbox" value="{{ (($lock->lock == 0) ? 1 : 0 ) }}">
		      		</label>
	      		@endif
	     	 	<br />
	     	 	@if($lock->lock == 1)
	     	 		{{ Form::submit('Disable Encoding', ['class' => 'btn btn-default','onclick'=>'return confirm("Continue to Disable?")']) }}
	     	 	@else
	     	 		{{ Form::submit('Ok', ['class' => 'btn btn-default']) }}
	     	 	@endif

	     	 	{{ Form::close() }}
     	 	@endforeach
     	 	<br />
     	 	<br />	
            <a href="{{ URL::route('acreateprof') }}"><i class="glyphicon glyphicon-plus-sign"></i>  Create Professor</a>
        @endif
 	
 		

     	<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($professors))
	                @foreach ($professors as $professor)
	            	<tr>
	            		<td>
	            		@if(!empty($professor->employee_id))     	
	            			{{{ $professor->employee_id }}} (Employee)
	            		@else
	            			{{{ $professor->student_id }}} ( Student )
	            		@endif
	            		</td>
	            		<td>{{{ $professor->lastname }}}</td>
	            		<td>{{{ $professor->firstname }}}</td>
	            		<td>{{{ $professor->middlename }}}</td>
	            		<td><a href="{{ (Auth::user()->type == 1 ? URL::route('aprofessorstasks',  $professor->id) : URL::route('pprofessorstasks', $professor->id)) }}" class="pull-right btn btn-default">More</a>
	            		@if(Auth::user()->type == 1)
	            		{{ Form::open(['method'=> 'DELETE','route'=>['deleteprof', $professor->id]]) }}
	            		{{ Form::submit('Delete', ['class' => 'pull-right btn btn-danger','onclick'=>'return confirm("Continue to delete?")']) }}
	            		{{ Form::close() }}
	            		@endif
	            		</td>
	            	</tr>
	                @endforeach
                @endif
                </tbody>
            </table>
            {{ $professors->links() }}
 </div>
@stop



@section('styles')
{{ HTML::style('/css/datepicker/metallic.min.css')}}
{{ HTML::style('/css/signin.min.css')}}
@stop


@section('scripts')
{{ HTML::script('/js/zebra_datepicker.min.js')}}
{{ HTML::script('/js/functions.min.js')}}
@stop