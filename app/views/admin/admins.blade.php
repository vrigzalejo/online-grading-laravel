@extends('master')

@section('navs')

@if(Auth::user()->type == 1)
<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Online Grading System</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
           <li class="dropdown">
              <a href="#" class="dropdown-toggle dropdown-header" data-toggle="dropdown">Management Settings <b class="caret"></b></a>
              <ul class="dropdown-menu">
             	 <li><a href="{{ URL::route('acourses') }}">Courses</a></li>
                <li><a href="{{ URL::route('asubjects') }}">Subjects</a></li>
                <li><a href="{{ URL::route('ausers') }}">Users</a></li>
                <li><a href="{{ URL::route('astudents') }}">Students</a></li>
		        <li><a href="{{ URL::route('aprofessors') }}">Professors</a></li>
		        <li><a href="{{ URL::route('aadmins') }}">Admins</a></li>
		        <li><a href="{{ URL::route('arooms') }}">Rooms</a></li>
		        <li><a href="{{ URL::route('ayrsections') }}">Yr/Sections</a></li>
              </ul>
            </li>
	        <li><a class="dropdown-header" href="{{ URL::route('agrades') }}">Submitted Grades</a></li>
	        <li><a class="dropdown-header" href="{{ URL::route('asearch') }}">Search</a></li>
	        <li><a class="dropdown-header" href="{{ URL::to('logout') }}">Logout, {{ Auth::user()->username }} 
					@if(Auth::user()->type == 1) ( Admin )
					@else ( Professor )
					@endif
				</a>
			</li>

           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


@elseif(Auth::user()->type == 2)
<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Online Grading System</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
           <li class="dropdown">
              <a href="#" class="dropdown-toggle dropdown-header" data-toggle="dropdown">Tasks <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ URL::route('pencode') }}">Encode Grades</a></li>
		        <li><a href="{{ URL::route('psubmit') }}">Submitted Grades</a></li>
		        <li><a href="{{ URL::route('pscheds') }}">My Scheds</a></li>
		        <li><a href="{{ URL::route('pprofessors') }}">Professors</a></li>
              </ul>
            </li>
	        <li><a class="dropdown-header" href="{{ URL::route('psearch') }}">Search</a></li>
	        <li><a class="dropdown-header" href="{{ URL::to('logout') }}">Logout, {{ Auth::user()->username }} 
					@if(Auth::user()->type == 1) ( Admin )
					@else ( Professor )
					@endif
				</a>
			</li>

           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
   

@endif

@stop


@section('content')
	<h2 class="form-signin-heading text-center">Admins</h2>

	<div class="text-center">
            <a href="{{ URL::route('acreateadmin') }}"><i class="glyphicon glyphicon-plus-sign"></i>  Create Admin</a>
        </div>
 	

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
                @if(!empty($admins))
	                @foreach ($admins as $admin)
	            	<tr>
	            		<td>
	            		@if(!empty($admin->employee_id))     	
	            			{{{ $admin->employee_id }}} (Employee)
	            		@else
	            			{{{ $admin->student_id }}} ( Student )
	            		@endif
	            		</td>
	            		<td>{{{ $admin->lastname }}}</td>
	            		<td>{{{ $admin->firstname }}}</td>
	            		<td>{{{ $admin->middlename }}}</td>
	            		<td><a href="{{URL::route('aadminstasks', $admin->id) }}" class="pull-right btn btn-default">More</a>
	            		{{ Form::open(['method'=> 'DELETE','route'=>['deleteadmin', $admin->id]]) }}
	            		{{ Form::submit('Delete', ['class' => 'pull-right btn btn-danger','onclick'=>'return confirm("Continue to delete?")']) }}
	            		{{ Form::close() }}
	            		</td>
	            	</tr>
	                @endforeach
                @endif
                </tbody>
            </table>

@stop



@section('styles')
{{ HTML::style('/css/datepicker/metallic.min.css')}}
{{ HTML::style('/css/signin.min.css')}}
@stop


@section('scripts')
{{ HTML::script('/js/zebra_datepicker.min.js')}}
{{ HTML::script('/js/functions.min.js')}}
@stop