@extends('master')


@section('content')
 <div class="container">
      	{{ Form::open(['route' => 'ssignin', 'class' => 'form-signin']) }}
      	
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

     	<center>Employee Login <a href="{{ URL::route('login') }}">here</a></center><br />
		
		{{ Form::text('student_id', Input::old('student_id'), ['placeholder' => 'Student ID', 'class' => 'form-control', 'required', 'autofocus']) }}
		{{ Form::submit('View Grades', ['class' => 'btn btn-lg btn-primary btn-block']) }}
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