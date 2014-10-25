@extends('master')

@section('navs')
	@include('navs')
@stop

@section('content')
<div class="container text-center">
	{{ Form::open(['route' => 'aadduser', 'class' => 'form-signin']) }}
	{{ Form::token() }}
	<h2 class="form-signin-heading text-center">Users</h2>
    @foreach($errors->all() as $error)
		<li>{{{ $error }}}</li>
    @endforeach
    
    <a href="#" id="show-create-form"><i class="glyphicon glyphicon-plus-sign"></i> Create User</a>
    <a href="#" style="display:none;" id="hide-create-form"><i class="glyphicon glyphicon-minus-sign"></i> Hide</a>

    <div style="display:none;" id="create-user-form">
    	Employee ID: 
		<select name="employee_id" class="selectpicker">
			@foreach ($admins as $admin) 
				<option value="{{{ $admin->employee_id }}}">{{{ $admin->employee_id }}}</option>
			@endforeach
			@foreach ($professors as $professor) 
				<option value="{{{ $professor->employee_id }}}">{{{ $professor->employee_id }}}</option>
			@endforeach
		</select>

		{{ Form::text('username', Input::old('username'), ['placeholder' => 'Username', 'class' => 'form-control', 'required', 'autofocus']) }}
		{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'required', 'autofocus']) }}
		{{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control', 'required', 'autofocus']) }}
		{{ Form::submit('Add User', ['class' => 'btn btn-lg btn-primary btn-block']) }}
		{{ Form::close() }}
	</div>

	<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($users))
	                @foreach ($users as $user)
	            	<tr>
	            		<td>
	            		@if(!empty($user->employee_id))     	
	            			{{{ $user->employee_id }}} (Employee)
	            		@else
	            			{{{ $user->student_id }}} ( Student )
	            		@endif
	            		</td>
	            		<td>{{{ $user->username }}}</td>
	            		<td>
	            		@if($user->type == 1) Admin
						@else Professor
						@endif
	            		</td>
	            		<td>{{{ $user->created_at }}}</td>
	            		<td>{{{ $user->updated_at }}}</td>
	            		<td>
	            		@if($user->username != 'admin1' || $user->username != 'prof1')
	            		{{ Form::open(['method'=> 'DELETE','route'=>['deleteuser', $user->id]]) }}
	            		{{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>'return confirm("Are you sure?")']) }}
	            		{{ Form::close() }}
	            		@else
	            		<button type="button" class="btn btn-danger" onclick="return alert('Don't delete this.)">Delete</button>	            		
	            		@endif	
	            		</td>
	            	</tr>
	                @endforeach
                @endif
                </tbody>
            </table>
            {{ $users->links() }}
</div>
@stop

@section('styles')
{{ HTML::style('/css/bootstrap-select.min.css')}}
{{ HTML::style('/css/bootstrap.min.css')}}
{{ HTML::style('/css/signin.min.css')}}
@stop


@section('scripts')
{{ HTML::script('/js/jquery.min.js')}}
{{ HTML::script('/js/bootstrap-select.min.js')}}
<script type="text/javascript">
jQuery(document).ready(function(){jQuery("#show-create-form").click(function(){jQuery("#create-user-form").toggle();jQuery("#show-create-form").toggle();jQuery("#hide-create-form").toggle()});jQuery("#hide-create-form").click(function(){jQuery("#create-user-form").toggle();jQuery("#show-create-form").toggle();jQuery("#hide-create-form").toggle()})});$("select").selectpicker();
</script>

@stop