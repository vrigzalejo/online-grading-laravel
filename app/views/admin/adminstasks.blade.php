@extends('master')

@section('navs')
	@include('navs')
@stop

@section('content')
			<div class="container text-center">
				<br />
				<br />
				@foreach($errors->all() as $error)
					{{ $error }}<br />
			    @endforeach

				@foreach($admins as $admin)
				<div class="admin-profile">
					{{ Form::open(['method'=> 'PUT','route'=>['updateadmin', $admin->id]]) }}
					
					<strong>Employee ID: </strong><span>{{{ $admin->employee_id }}}</span>

					@if($admin->employee_id != '1234567' || $admin->employee_id != '123456789')
					{{ Form::text('employee_id', $admin->employee_id, ['class' => 'form-control admin-employeeid'] ) }}
					@else
					{{ Form::text('employee_id', $admin->employee_id, ['class' => 'form-control admin-employeeid', 'disabled'] ) }}
					@endif

					<br />
					<strong>Lastname: </strong><span>{{{ $admin->lastname }}}</span>
					{{ Form::text('lastname', $admin->lastname, ['class' => 'form-control admin-lastname'] ) }}
					<br />
					<strong>Firstname: </strong><span>{{{ $admin->firstname }}}</span>
					{{ Form::text('firstname', $admin->firstname, ['class' => 'form-control admin-firstname'] ) }}
					<br />
					<strong>M.I. : </strong><span>{{{ $admin->middlename }}}</span>
					{{ Form::text('mi', $admin->middlename, ['class' => 'form-control admin-middlename'] ) }}					
					<br />
					<strong>Birthday: </strong><span>{{{ date('M d, Y', strtotime($admin->birthday)) }}}</span>
					{{ Form::text('birthday', $admin->birthday, ['class' => 'form-control datepicker admin-birthday'] ) }}						
					<br />
					<strong>Contact: </strong><span>{{{ $admin->contact }}}</span>
					{{ Form::text('contact', $admin->contact, ['class' => 'form-control admin-contact'] ) }}					
					<br />
					<strong>Email: </strong><span>{{{ $admin->email }}}</span>
					{{ Form::text('email', $admin->email, ['class' => 'form-control admin-email'] ) }}									
					<br />
					<strong>Address: </strong><span>{{{ $admin->address }}}</span>
					{{ Form::text('address', $admin->address, ['class' => 'form-control admin-address'] ) }}											
					<br />
					<strong>Registered: </strong>{{{ $admin->created_at }}}<br />
					<br />
					<br />
					<a class="text-center btn btn-default admin-edit" data-employeeid="{{ $admin->employee_id }}" data-lastname="{{ $admin->lastname }}" data-firstname="{{ $admin->firstname }}" data-middlename="{{ $admin->middlename }}" data-contact="{{ $admin->contact }}" data-email="{{ $admin->email }}" data-birthday="{{ $admin->birthday }}" data-address="{{ $admin->address }}">Edit</a>
					{{ Form::submit('Save', ['class' => 'btn btn-success admin-save', 'onclick'=>'return confirm("Continue to save?")']) }}
	            	{{ Form::close() }}
					<br />
					<br />
				</div>
				@endforeach
			</div>
			
@stop



@section('styles')
{{ HTML::style('/css/bootstrap-timepicker.min.css') }}
{{ HTML::style('/css/datepicker/metallic.min.css')}}
{{ HTML::style('/css/signin.min.css')}}
@stop


@section('scripts')
{{ HTML::script('/js/zebra_datepicker.min.js')}}
{{ HTML::script('/js/functions.min.js')}}
{{ HTML::script('/js/jquery.min.js') }}
{{ HTML::script('/js/bootstrap-timepicker.min.js') }}
<script type="text/javascript">
jQuery(document).ready(function(){jQuery(".admin-save, .admin-employeeid, .admin-lastname, .admin-firstname, .admin-middlename, .admin-birthday, .admin-contact, .admin-email, .admin-address").hide();jQuery(".admin-edit").click(function(){jQuery(this).hide();jQuery(this).parents(".admin-profile").find("span").hide();jQuery(this).parents(".admin-profile").find('input[type="text"]').show();jQuery(this).parents(".admin-profile").find(".admin-save").show();jQuery(this).parents(".admin-profile").find(".admin-employeeid").val(jQuery(this).attr("data-employeeid"));jQuery(this).parents(".admin-profile").find(".admin-lastname").val(jQuery(this).attr("data-lastname"));jQuery(this).parents(".admin-profile").find(".admin-firstname").val(jQuery(this).attr("data-firstname"));jQuery(this).parents(".admin-profile").find(".admin-middlename").val(jQuery(this).attr("data-middlename"));jQuery(this).parents(".admin-profile").find(".admin-birthday").val(jQuery(this).attr("data-birthday"));jQuery(this).parents(".admin-profile").find(".admin-contact").val(jQuery(this).attr("data-contact"));jQuery(this).parents(".admin-profile").find(".admin-email").val(jQuery(this).attr("data-email"));jQuery(this).parents(".admin-profile").find(".admin-address").val(jQuery(this).attr("data-address"))})});$("#timepicker1").timepicker();$("#timepicker2").timepicker();
</script>

@stop