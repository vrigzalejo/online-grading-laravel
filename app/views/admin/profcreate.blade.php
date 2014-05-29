@extends('master')

@section('navs')
	@include('navs')
@stop

@section('content')
	<h2 class="form-signin-heading text-center">Professors</h2>

 	{{ Form::open(['route' => 'aaddprof', 'class' => 'form-signin']) }}

 			@if(Session::has('message'))
			<div class="alert alert-warning text-center">
		    	{{ Session::get('message') }}<br />
		    </div>
		    @endif
		    @foreach($errors->all() as $error)
		    <div class="alert alert-danger text-center">
		      {{ $error }}<br />
		    </div>
		    @endforeach		   
	
     	{{ Form::token() }}
     	{{ Form::text('employee_id', Input::old('employee_id'), ['placeholder' => 'Employee ID.', 'class' => 'form-control', 'required', 'autofocus']) }}
		{{ Form::text('lastname', Input::old('lastname'), ['placeholder' => 'Lastname', 'class' => 'form-control', 'required', 'autofocus']) }}
		{{ Form::text('firstname', Input::old('firstname'), ['placeholder' => 'Firstname', 'class' => 'form-control', 'required', 'autofocus']) }}
		{{ Form::text('middlename', Input::old('middlename'), ['placeholder' => 'Middle Initial', 'class' => 'form-control', 'required', 'autofocus']) }}
		{{ Form::text('contact', Input::old('contact'), ['placeholder' => 'Contact No.', 'class' => 'form-control', 'autofocus', 'required']) }}
		{{ Form::text('email', Input::old('email'), ['placeholder' => 'Email', 'class' => 'form-control', 'autofocus', 'required']) }}
		{{ Form::text('birthday', Input::old('birthday'), ['placeholder' => 'Birthday', 'class' => 'form-control datepicker', 'required', 'autofocus']) }}
		{{ Form::text('address', Input::old('address'), ['placeholder' => 'Address', 'class' => 'form-control', 'autofocus', 'required']) }}
		{{ Form::submit('Add Professor', ['class' => 'btn btn-lg btn-primary btn-block']) }}
     	{{ Form::close() }}
 
@stop



@section('styles')
{{ HTML::style('/css/datepicker/metallic.min.css')}}
{{ HTML::style('/css/signin.min.css')}}
@stop


@section('scripts')
{{ HTML::script('/js/zebra_datepicker.min.js')}}
{{ HTML::script('/js/functions.min.js')}}
@stop