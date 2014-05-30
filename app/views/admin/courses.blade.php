@extends('master')

@section('navs')
	@include('navs')
@stop

@section('content')
 <div class="container text-center">
{{ Form::open(['route' => 'aaddcourse', 'class' => 'form-signin']) }}
{{ Form::token() }}
<h2 class="form-signin-heading text-center">Courses</h2>

    @foreach($errors->all() as $error)
		{{ $error }}<br />
    @endforeach

 	<a href="#" id="show-create-form"><i class="glyphicon glyphicon-plus-sign"></i> Create Course</a>
    <a href="#" style="display:none;" id="hide-create-form"><i class="glyphicon glyphicon-minus-sign"></i> Hide</a>

<div style="display:none;" id="create-course-form">
{{ Form::text('code', Input::old('code'), ['placeholder' => 'Code', 'class' => 'form-control', 'required', 'autofocus']) }}
{{ Form::text('college_code', Input::old('college_code'), ['placeholder' => 'College Code', 'class' => 'form-control', 'required', 'autofocus']) }}
{{ Form::text('description', Input::old('description'), ['placeholder' => 'Description', 'class' => 'form-control', 'required', 'autofocus']) }}
{{ Form::submit('Add', ['class' => 'btn btn-lg btn-primary btn-block']) }}
{{ Form::close() }}
</div>

<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>College Code</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($courses))
	                @foreach ($courses as $course)
	            	<tr>
	            		{{ Form::open(['method'=> 'PUT','route'=>['updatecourse', $course->id]]) }}
	               		<td>
	            		<span>
	            		{{{ $course->code }}}
	            		</span>
	            		{{ Form::text('course_code', $course->code, ['class' => 'form-control course-code'] ) }}       		
	            		</td>
	            		<td>
	            		<span>{{{ $course->college_code }}}
	            		</span>
	            		{{ Form::text('course_collegecode', $course->college_code, ['class' => 'form-control course-collegecode'] ) }}  
	            		</td>
	            		<td>
	            		<span>
	            			{{{ $course->description }}}
	            		</span>
	            		{{ Form::text('course_description', $course->description, ['class' => 'form-control course-description'] ) }} 
	            		</td>
	            		<td>
	            		<a class="pull-right btn btn-success course-edit" data-code="{{ $course->code }}" data-collegecode="{{ $course->college_code }}" data-description="{{ $course->description }}">Edit</a>
	            		{{ Form::submit('Save', ['class' => 'pull-right btn btn-success course-save', 'onclick'=>'return confirm("Continue to save?")']) }}
	            		{{ Form::close() }}
	            		{{ Form::open(['method'=> 'DELETE','route'=>['deletecourse', $course->id]]) }}
	            		{{ Form::submit('Delete', ['class' => 'pull-right btn btn-danger','onclick'=>'return confirm("Continue to delete?")']) }}
	            		{{ Form::close() }}
	            		</td>
	            	</tr>
	                @endforeach
                @endif
                </tbody>
            </table>
            {{ $courses->links() }}
</div>
@stop


@section('styles')
{{ HTML::style('/css/bootstrap.min.css')}}
{{ HTML::style('/css/signin.min.css')}}

@stop

@section('scripts')
{{ HTML::script('/js/jquery.min.js')}}
<script type="text/javascript">
jQuery(document).ready(function(){jQuery(".course-save, .course-code, .course-collegecode, .course-description").hide();jQuery(".course-edit").click(function(){jQuery(this).hide();jQuery(this).parents("tr").find("span").hide();jQuery(this).parents("tr").find('input[type="text"]').show();jQuery(this).parents("tr").find(".course-save").show();jQuery(this).parents("tr").find(".course-code").val(jQuery(this).attr("data-code"));jQuery(this).parents("tr").find(".course-collegecode").val(jQuery(this).attr("data-collegecode"));jQuery(this).parents("tr").find(".course-description").val(jQuery(this).attr("data-description"))});jQuery("#show-create-form").click(function(){jQuery("#create-course-form").toggle();jQuery("#show-create-form").toggle();jQuery("#hide-create-form").toggle()});jQuery("#hide-create-form").click(function(){jQuery("#create-course-form").toggle();jQuery("#show-create-form").toggle();jQuery("#hide-create-form").toggle()})});

</script>
@stop