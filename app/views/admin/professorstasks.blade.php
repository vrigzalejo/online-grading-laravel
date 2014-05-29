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

				@foreach($professors as $professor)
				 <div class="prof-profile">
					{{ Form::open(['method'=> 'PUT','route'=>['updateprof', $professor->id]]) }}
					<strong>Employee ID: </strong>
					<span>{{{ $professor->employee_id }}}
					</span>
					{{ Form::text('employee_id', $professor->employee_id, ['class' => 'form-control proftask-employeeid'] ) }}   
					<br />
					<strong>Lastname: </strong>
					<span>{{{ $professor->lastname }}}
					</span>
					{{ Form::text('lastname', $professor->lastname, ['class' => 'form-control proftask-lastname'] ) }}
					<br />
					<strong>Firstname: </strong>
					<span>{{{ $professor->firstname }}}
					</span>
					{{ Form::text('firstname', $professor->firstname, ['class' => 'form-control proftask-firstname'] ) }}
					<br />
					<strong>M.I. : </strong>
					<span>{{{ $professor->middlename }}}
					</span>
					{{ Form::text('mi', $professor->middlename, ['class' => 'form-control proftask-middlename'] ) }}					
					<br />
					<strong>Birthday: </strong>
					<span>{{{ date('M d, Y', strtotime($professor->birthday)) }}}
					</span>
					{{ Form::text('birthday', $professor->birthday, ['class' => 'form-control datepicker proftask-birthday'] ) }}						
					<br />
					<strong>Contact: </strong>
					<span>
					{{{ $professor->contact }}}
					</span>
					{{ Form::text('contact', $professor->contact, ['class' => 'form-control proftask-contact'] ) }}					
					<br />
					<strong>Email: </strong>
					<span>
					{{{ $professor->email }}}
					</span>
					{{ Form::text('email', $professor->email, ['class' => 'form-control proftask-email'] ) }}									
					<br />
					<strong>Address: </strong>
					<span>
					{{{ $professor->address }}}
					</span>
					{{ Form::text('address', $professor->address, ['class' => 'form-control proftask-address'] ) }}											
					<br />
					<strong>Registered: </strong>
					{{{ $professor->created_at }}}
					<br />
					<br />
					@if(Auth::user()->type == 1)
					<a class="text-center btn btn-default proftask-edit" data-employeeid="{{ $professor->employee_id }}" data-lastname="{{ $professor->lastname }}" data-firstname="{{ $professor->firstname }}" data-middlename="{{ $professor->middlename }}" data-contact="{{ $professor->contact }}" data-email="{{ $professor->email }}" data-birthday="{{ $professor->birthday }}" data-address="{{ $professor->address }}">Edit</a>
					{{ Form::submit('Save', ['class' => 'btn btn-success proftask-save', 'onclick'=>'return confirm("Continue to save?")']) }}
	            	{{ Form::close() }}
	            	@endif
					<br />
					<br />
				</div>
				@endforeach
			
			</div>

		
     	<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Yr / Section</th>
                        <th>Subject</th>
                        <th>Room</th>
                        <th>Time</th>
                    @if(Auth::user()->type == 1) 
                        <th></th>
                    @endif
                    </tr>
                </thead>
                <tbody>
                @if(!empty($professors) && Auth::user()->type == 1)
	                @foreach ($professors as $professor)
	            	
						
	            	<tr>
	               		<td>
	               		{{ Form::open(['route' => ['aaddprofessortask', $professor->id]]) }}
						{{ Form::token() }}
						
							<select name="course" class="btn btn-default">
								@foreach ($courses as $course) 
									<option value="{{ $course->id }}">{{ $course->code }}</option>
								@endforeach
							</select>
						</td>
						<td>
							<select name="yrsection" class="btn btn-default">
								@foreach ($yrsections as $yrsection) 
									<option value="{{ $yrsection->id }}">{{ $yrsection->yrsection }}</option>
								@endforeach
							</select>
						</td>
						<td>
							<select name="subject" class="btn btn-default">
								@foreach ($subjects as $subject) 
									<option value="{{ $subject->id }}">{{ $subject->code }} - {{ $subject->description }}</option>
								@endforeach
							</select>
						</td>
	            		<td>
							<select name="room" class="btn btn-default">
								@foreach ($rooms as $room) 
									<option value="{{ $room->id }}">{{ $room->room }}</option>
								@endforeach
							</select>
						</td> 
						<td>
	            			<input id="timepicker1" type="text" class="input-sm" name="timestart"> - <input id="timepicker2" type="text" class="input-sm" name="timeends">
	            			
	            		</td>        
	            		<td>
	            		{{ Form::submit('Add', ['class'=>'btn btn-default'])}}
	            		{{ Form::close() }}
	            		</td>
	            	</tr>
	                @endforeach
                @endif
                @if(!empty($profsubjects))
                	@foreach ($profsubjects as $profsubject)
                	<tr>
	            		<td>{{{ $profsubject->code }}}</td>
	            		<td>{{{ $profsubject->yrsection }}}</td>
	            		<td>{{{ $profsubject->subjectcode }}} - {{{ $profsubject->subjectdescription }}}</td>
	            		<td>{{{ $profsubject->room }}}</td>
	            		<td>

	            			{{{ date('h:i A', strtotime($profsubject->timestarts_at)) }}} - {{{ date('h:i A', strtotime($profsubject->timeends_at)) }}}</td>
	            		
	            		@if(Auth::user()->type == 1)
	            		<td>
	            		{{ Form::open(['method'=> 'DELETE','route'=>['deleteproftasks', $profsubject->profsub_id]]) }}
	            		{{ Form::submit('Delete', ['class' => 'btn btn-danger','onclick'=>'return confirm("Continue to delete?")']) }}
	            		{{ Form::close() }}
	            		</td>
	            		@endif
	            		

	            	</tr>
                	@endforeach
                @endif
                </tbody>
            </table>
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
jQuery(document).ready(function() {
	jQuery('.proftask-save, .proftask-employeeid, .proftask-lastname, .proftask-firstname, .proftask-middlename, .proftask-birthday, .proftask-contact, .proftask-email, .proftask-address').hide();
	jQuery('.proftask-edit').click(function() {
		jQuery(this).hide();
		jQuery(this).parents('.prof-profile').find('span').hide();
		jQuery(this).parents('.prof-profile').find('input[type="text"]').show();
		jQuery(this).parents('.prof-profile').find('.proftask-save').show();
	
		jQuery(this).parents('.prof-profile').find('.proftask-employeeid').val(jQuery(this).attr('data-employeeid'));
		jQuery(this).parents('.prof-profile').find('.proftask-lastname').val(jQuery(this).attr('data-lastname'));
		jQuery(this).parents('.prof-profile').find('.proftask-firstname').val(jQuery(this).attr('data-firstname'));
		jQuery(this).parents('.prof-profile').find('.proftask-middlename').val(jQuery(this).attr('data-middlename'));
		jQuery(this).parents('.prof-profile').find('.proftask-birthday').val(jQuery(this).attr('data-birthday'));
		jQuery(this).parents('.prof-profile').find('.proftask-contact').val(jQuery(this).attr('data-contact'));
		jQuery(this).parents('.prof-profile').find('.proftask-email').val(jQuery(this).attr('data-email'));
		jQuery(this).parents('.prof-profile').find('.proftask-address').val(jQuery(this).attr('data-address'));
	});
});

    $('#timepicker1').timepicker();
    $('#timepicker2').timepicker();
</script>

@stop