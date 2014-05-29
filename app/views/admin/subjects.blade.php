@extends('master')

@section('navs')
	@include('navs')
@stop

@section('content')
<div class="container text-center">
{{ Form::open(['route' => 'aaddsub', 'class' => 'form-signin']) }}
{{ Form::token() }}
<h2 class="form-signin-heading text-center">Subjects</h2>

    @foreach($errors->all() as $error)
		{{ $error }}<br />
    @endforeach

    <a href="#" id="show-create-form"><i class="glyphicon glyphicon-plus-sign"></i> Create Subject</a>
    <a href="#" style="display:none;" id="hide-create-form"><i class="glyphicon glyphicon-minus-sign"></i> Hide</a>


<div style="display:none;" id="create-subject-form">
{{ Form::text('add_code', Input::old('add_code'), ['placeholder' => 'Add Subject', 'class' => 'form-control', 'required', 'autofocus']) }}
{{ Form::text('add_description', Input::old('add_description'), ['placeholder' => 'Description', 'class' => 'form-control', 'required', 'autofocus']) }}
{{ Form::submit('Add', ['class' => 'btn btn-lg btn-primary btn-block']) }}
{{ Form::close() }}
</div>

<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($subjects))
	                @foreach ($subjects as $subject)
	            	<tr>
	            		{{ Form::open(['method'=> 'PUT','route'=>['updatesubject', $subject->id]]) }}
	               		{{ Form::token() }}
	               		<td>
	            		<span>
	            		{{{ $subject->code }}}
	            		</span>
	            		{{ Form::text('subject_code', $subject->code, ['class' => 'form-control subject-code'] ) }}       		
	            		</td>
	            		<td>
	            		<span>
	            		{{{ $subject->description }}}
	            		</span>
	            		{{ Form::text('subject_description', $subject->description, ['class' => 'form-control subject-description'] ) }} 
	            		</td>
	            		<td>
	            		<a class="pull-right btn btn-success subject-edit" data-code="{{ $subject->code }}" data-description="{{ $subject->description }}">Edit</a>
	            		{{ Form::submit('Save', ['class' => 'pull-right btn btn-success subject-save', 'onclick'=>'return confirm("Continue to save?")']) }}
	            		{{ Form::close() }}
	            		
	            		{{ Form::open(['method'=> 'DELETE','route'=>['deletesubject', $subject->id]]) }}
	            		{{ Form::token() }}
	            		{{ Form::submit('Delete', ['class' => 'pull-right btn btn-danger','onclick'=>'return confirm("Continue to delete?")']) }}
	            		{{ Form::close() }}
	            		</td>
	            	</tr>
	                @endforeach
                @endif
                </tbody>
            </table>
            {{ $subjects->links() }}

</div>

@stop

@section('styles')
{{ HTML::style('/css/bootstrap-select.min.css')}}
{{ HTML::style('/css/signin.min.css')}}

@stop

@section('scripts')
{{ HTML::script('/js/jquery.min.js')}}
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('.subject-save').hide();
	jQuery('.subject-code, .subject-description').hide();
	jQuery('.subject-edit').click(function() {
		jQuery(this).hide();
		jQuery(this).parents('tr').find('span').hide();
		jQuery(this).parents('tr').find('input[type="text"]').show();
		jQuery(this).parents('tr').find('.subject-save').show();
	
		// values
		jQuery(this).parents('tr').find('.subject-code').val(jQuery(this).attr('data-code'));
		jQuery(this).parents('tr').find('.subject-description').val(jQuery(this).attr('data-description'));
	});

	jQuery('#show-create-form').click(function() {
		jQuery('#create-subject-form').toggle();
		jQuery('#show-create-form').toggle();
		jQuery('#hide-create-form').toggle();
	});
	jQuery('#hide-create-form').click(function() {
		jQuery('#create-subject-form').toggle();
		jQuery('#show-create-form').toggle();
		jQuery('#hide-create-form').toggle();
	});
});

</script>
@stop