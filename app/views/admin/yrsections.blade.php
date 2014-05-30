@extends('master')

@section('navs')
	@include('navs')
@stop

@section('content')
<div class="container text-center">


{{ Form::open(['route' => 'aaddyrsection', 'class' => 'form-signin']) }}

{{ Form::token() }}
<h2 class="form-signin-heading text-center">Yr / Sections</h2>
    @foreach($errors->all() as $error)
		{{ $error }}<br />
    @endforeach

    <a href="#" id="show-create-form"><i class="glyphicon glyphicon-plus-sign"></i> Create Room</a>
    <a href="#" style="display:none;" id="hide-create-form"><i class="glyphicon glyphicon-minus-sign"></i> Hide</a>


<div style="display:none;" id="create-yrsection-form">  


{{ Form::text('addyrsection', Input::old('addyrsection'), ['placeholder' => 'Add Yr/Section', 'class' => 'form-control', 'required', 'autofocus']) }}
{{ Form::submit('Add', ['class' => 'btn btn-lg btn-primary btn-block']) }}
{{ Form::close() }}
</div>

<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Yr/Section</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($yrsections))
	                @foreach ($yrsections as $yrsection)
	            	<tr>
	            		{{ Form::open(['method'=> 'PUT','route'=>['updateyrsection', $yrsection->id]]) }}
	               		<td>
	            		<span>
	            		{{{ $yrsection->yrsection }}}
	            		</span>
	            		{{ Form::text('yrsection_yrsection', $yrsection->yrsection, ['class' => 'form-control yrsection-yrsection'] ) }}       		
	            		</td>
	            		<td>
	            		<a class="pull-right btn btn-success yrsection-edit" data-yrsection="{{ $yrsection->yrsection }}">Edit</a>
	            		{{ Form::submit('Save', ['class' => 'pull-right btn btn-success yrsection-save', 'onclick'=>'return confirm("Continue to save?")']) }}
	            		{{ Form::close() }}
	            		{{ Form::open(['method'=> 'DELETE','route'=>['deleteyrsection', $yrsection->id]]) }}
	            		{{ Form::submit('Delete', ['class' => 'pull-right btn btn-danger','onclick'=>'return confirm("Continue to delete?")']) }}
	            		{{ Form::close() }}
	            		</td>
	            	</tr>
	                @endforeach
                @endif
                </tbody>
            </table>
            {{ $yrsections->links() }}
</div>
@stop

@section('styles')
{{ HTML::style('/css/bootstrap-select.min.css')}}
{{ HTML::style('/css/signin.min.css')}}

@stop

@section('scripts')
{{ HTML::script('/js/jquery.min.js')}}
<script type="text/javascript">
jQuery(document).ready(function(){jQuery(".yrsection-save").hide();jQuery(".yrsection-yrsection").hide();jQuery(".yrsection-edit").click(function(){jQuery(this).hide();jQuery(this).parents("tr").find("span").hide();jQuery(this).parents("tr").find('input[type="text"]').show();jQuery(this).parents("tr").find(".yrsection-save").show();jQuery(this).parents("tr").find(".yrsection-yrsection").val(jQuery(this).attr("data-yrsection"))});jQuery("#show-create-form").click(function(){jQuery("#create-yrsection-form").toggle();
jQuery("#show-create-form").toggle();jQuery("#hide-create-form").toggle()});jQuery("#hide-create-form").click(function(){jQuery("#create-yrsection-form").toggle();jQuery("#show-create-form").toggle();jQuery("#hide-create-form").toggle()})});
</script>
@stop