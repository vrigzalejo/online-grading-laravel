@extends('master')

@section('navs')
	@include('navs')
@stop

@section('content')
 <div class="container text-center">

{{ Form::open(['route' => 'aaddroom', 'class' => 'form-signin']) }}
{{ Form::token() }}

<h2 class="form-signin-heading text-center">Rooms</h2>


    @foreach($errors->all() as $error)
		{{ $error }}<br />
    @endforeach

    <a href="#" id="show-create-form"><i class="glyphicon glyphicon-plus-sign"></i> Create Room</a>
    <a href="#" style="display:none;" id="hide-create-form"><i class="glyphicon glyphicon-minus-sign"></i> Hide</a>


<div style="display:none;" id="create-room-form">

{{ Form::text('addroom', Input::old('addroom'), ['placeholder' => 'Add Room', 'class' => 'form-control', 'required', 'autofocus']) }}
{{ Form::submit('Add', ['class' => 'btn btn-lg btn-primary btn-block']) }}
{{ Form::close() }}
</div>


<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Room</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($rooms))
	                @foreach ($rooms as $room)
	            	<tr>
	            		{{ Form::open(['method'=> 'PUT','route'=>['updateroom', $room->id]]) }}
	               		<td>
	            		<span>
	            		{{{ $room->room }}}
	            		</span>
	            		{{ Form::text('room_room', $room->room, ['class' => 'form-control room-room'] ) }}       		
	            		</td>
	            		<td>
	            		<a class="pull-right btn btn-success room-edit" data-room="{{ $room->room }}">Edit</a>
	            		{{ Form::submit('Save', ['class' => 'pull-right btn btn-success room-save', 'onclick'=>'return confirm("Continue to save?")']) }}
	            		{{ Form::close() }}
	            		{{ Form::open(['method'=> 'DELETE','route'=>['deleteroom', $room->id]]) }}
	            		{{ Form::submit('Delete', ['class' => 'pull-right btn btn-danger','onclick'=>'return confirm("Continue to delete?")']) }}
	            		{{ Form::close() }}
	            		</td>
	            	</tr>
	                @endforeach
                @endif
                </tbody>
            </table>
            {{ $rooms->links() }}
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
	jQuery('.room-save').hide();
	jQuery('.room-room').hide();
	jQuery('.room-edit').click(function() {
		jQuery(this).hide();
		jQuery(this).parents('tr').find('span').hide();
		jQuery(this).parents('tr').find('input[type="text"]').show();
		jQuery(this).parents('tr').find('.room-save').show();
	
		// values
		jQuery(this).parents('tr').find('.room-room').val(jQuery(this).attr('data-room'));
	});

	jQuery('#show-create-form').click(function() {
		jQuery('#create-room-form').toggle();
		jQuery('#show-create-form').toggle();
		jQuery('#hide-create-form').toggle();
	});
	jQuery('#hide-create-form').click(function() {
		jQuery('#create-room-form').toggle();
		jQuery('#show-create-form').toggle();
		jQuery('#hide-create-form').toggle();
	});
});

</script>
@stop