@extends('master')

@section('navs')

@stop


@section('content')
 <div class="container">
      	{{ Form::open(['route' => 'asignin', 'class' => 'form-signin']) }}
      	
      	    <center><img src="img/plptag.png" class="text-center" height="150px" width="150px"/></center>

      	    <h3 class="form-signin-heading text-center">Online Grading System</h3>
      	    @if(Session::has('message'))
			<div class="alert alert-warning text-center">
		    	{{ Session::get('message') }}<br />
		    </div>
		    @foreach($errors->all() as $error)
		    <div class="alert alert-danger text-center">
		      {{ $error }}<br />
		    </div>
		    @endforeach		   
		@endif
     	{{ Form::token() }}

     	<center>Student Login <a href="{{ URL::route('studlogin') }}">here</a></center><br />
		Employee ID: 
		<select name="employee_id" class="selectpicker">
			@foreach ($employees as $employee) 
				<option value="{{ $employee->employee_id }}">{{ $employee->employee_id }}</option>
			@endforeach
		</select>
		{{ Form::text('username', Input::old('username'), ['placeholder' => 'Username', 'class' => 'form-control', 'required', 'autofocus']) }}
		{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'required'] ) }}
		{{ Form::submit('Login', ['class' => 'btn btn-lg btn-primary btn-block']) }}
     	{{ Form::close() }}
     	
    </div> <!-- /container -->

    @include('footer')
@stop



@section('styles')
{{ HTML::style('/css/bootstrap-select.min.css')}}
{{ HTML::style('/css/signin.min.css')}}

@stop

@section('scripts')
{{ HTML::script('/js/bootstrap-select.min.js')}}
<script>
$('select').selectpicker();
</script>
@stop