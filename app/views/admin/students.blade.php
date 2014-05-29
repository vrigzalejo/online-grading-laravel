@extends('master')

@section('navs')
    @include('navs')
@stop

@section('content')
<div class="container text-center">
	<h2 class="form-signin-heading text-center">Students</h2>
	

        <a href="{{ URL::route('acreatestudent') }}"><i class="glyphicon glyphicon-plus-sign"></i> Create Student</a>

 	

     	<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Course</th>
                        <th>Yr/Section</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($students))
	                @foreach ($students as $student)
	            	<tr>
	            		<td>
	            		@if(!empty($student->employee_id))     	
	            			{{{ $student->employee_id }}} (Employee)
	            		@else
	            			{{{ $student->student_id }}} ( Student )
	            		@endif
	            		</td>
	            		<td>{{{ $student->lastname }}}</td>
	            		<td>{{{ $student->firstname }}}</td>
	            		<td>{{{ $student->middlename }}}</td>
	            		<td>{{{ $student->course }}}</td>
	            		<td>{{{ $student->yrsection }}}</td>
	            		<td><a href="{{ URL::route('astudentsenroll',  $student->id) }}" class="pull-right btn btn-default">More</a>
                        {{ Form::open(['method'=> 'DELETE','route'=>['deletestudent', $student->id]]) }}
                        {{ Form::submit('Delete', ['class' => 'pull-right btn btn-danger','onclick'=>'return confirm("Continue to delete?")']) }}
                        {{ Form::close() }}                       
                        </td>
	            	</tr>
	                @endforeach
                @endif
                </tbody>
            </table>
            {{ $students->links() }}
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