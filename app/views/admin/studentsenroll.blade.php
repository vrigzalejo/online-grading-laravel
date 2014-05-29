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

				@foreach($students as $student)
				<div class="stud-profile">
					{{ Form::open(['method'=> 'PUT','route'=>['updatestudent', $student->id]]) }}
					<strong>Student ID: </strong><span>{{{ $student->student_id }}}</span>
					{{ Form::text('student_id', $student->student_id, ['class' => 'form-control studenroll-studentid'] ) }}   
					<br />
					<strong>Lastname: </strong><span>{{{ $student->lastname }}}</span>
					{{ Form::text('lastname', $student->lastname, ['class' => 'form-control studenroll-lastname'] ) }}
					<br />
					<strong>Firstname: </strong><span>{{{ $student->firstname }}}</span>
					{{ Form::text('firstname', $student->firstname, ['class' => 'form-control studenroll-firstname'] ) }}
					<br />
					<strong>M.I. : </strong><span>{{{ $student->middlename }}}</span>
					{{ Form::text('mi', $student->middlename, ['class' => 'form-control studenroll-middlename'] ) }}					
					<br />
					<strong>Birthday: </strong><span>{{{ date('M d, Y', strtotime($student->birthday)) }}}</span>
					{{ Form::text('birthday', $student->birthday, ['class' => 'form-control datepicker studenroll-birthday'] ) }}						
					<br />
					<strong>Contact: </strong><span>{{{ $student->contact }}}</span>
					{{ Form::text('contact', $student->contact, ['class' => 'form-control studenroll-contact'] ) }}					
					<br />
					<strong>Course: </strong><span>{{{ $student->course }}}</span>
					<select name="course" class="btn btn-default studenroll-course">
						@foreach ($courses as $course) 
							<option value="{{ $course->code }}">{{ $course->code }}</option>
						@endforeach
					</select>
					<br />
					<strong>Yr/Section: </strong><span>{{{ $student->yrsection }}}</span>
					<select name="yrsection" class="btn btn-default studenroll-yrsection">
						@foreach ($yrsections as $yrsection) 
							<option value="{{ $yrsection->yrsection }}">{{ $yrsection->yrsection }}</option>
						@endforeach
					</select>
					<br />
					<strong>Address: </strong><span>{{{ $student->address }}}</span>
					{{ Form::text('address', $student->address, ['class' => 'form-control studenroll-address'] ) }}											
					<br />
					<strong>Registered: </strong><span>{{{ date('M d, Y', strtotime($student->created_at)) }}}</span><br />
					<br />
					<br />
					<a class="text-center btn btn-default studenroll-edit" data-studentid="{{ $student->student_id }}" data-lastname="{{ $student->lastname }}" data-firstname="{{ $student->firstname }}" data-middlename="{{ $student->middlename }}" data-contact="{{ $student->contact }}" data-birthday="{{ $student->birthday }}" data-address="{{ $student->address }}" data-course="{{ $student->course }}" data-yrsection="{{ $student->yrsection }}">Edit</a>
					{{ Form::submit('Save', ['class' => 'btn btn-success studenroll-save', 'onclick'=>'return confirm("Continue to save?")']) }}
	            	{{ Form::close() }}
					<br />
					<br />
				
				</div>
				@endforeach
			</div>
			{{ Form::open(['route' => ['aaddstudentenroll', $student->id]]) }}
			{{ Form::token() }}
     	<table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th class="text-center">Subjects</th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($students))
	                @foreach ($students as $student)
	            	<tr>
	            		<td>
							<select name="studentenroll" class="btn btn-default">
								@foreach ($profsubjects as $profsubject) 
									<option value="{{ $profsubject->profid }}"> {{ $profsubject->yrsection }} {{ $profsubject->code }} - [{{ $profsubject->subjectcode }} - {{ $profsubject->subjectdescription }}, {{ date('h:i A', strtotime($profsubject->timestarts_at)) }}-{{ date('h:i A', strtotime($profsubject->timeends_at)) }} Rm {{ $profsubject->room }}] - Prof. {{ $profsubject->firstname }} {{ $profsubject->lastname }}</option>
								@endforeach
							</select>
							{{ Form::submit('Add', ['class'=>'btn btn-default'])}}
							{{ Form::close() }}
						</td>

	            	</tr>
	                @endforeach
                @endif

                @if(!empty($studsubjects))
                	@foreach ($studsubjects as $studsubject)
                	<tr>
	            		<td>{{{ $studsubject->yrsection }}} {{{ $studsubject->code }}} - [{{{ $studsubject->subjectcode }}} - {{{ $studsubject->subjectdescription }}}, {{{ date('h:i A', strtotime($studsubject->timestarts_at))}}}-{{{ date('h:i A', strtotime($studsubject->timeends_at))}}} Rm {{{ $studsubject->room }}}] - Prof. {{{ $studsubject->firstname }}} {{{ $studsubject->lastname }}}

	            		{{ Form::open(['method'=> 'DELETE','route'=>['deletestudentenroll', $studsubject->studsub_id]]) }}
	            		{{ Form::submit('Delete', ['class' => ' btn btn-danger','onclick'=>'return confirm("Continue to delete?")']) }}
	            		{{ Form::close() }}
	            		</td>           		
	            	</tr>
                	@endforeach
                @endif
                </tbody>
            </table>
            {{ $studsubjects->links() }}
            
@stop



@section('styles')
{{ HTML::style('/css/bootstrap-select.min.css')}}
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
	jQuery('.studenroll-save, .studenroll-studentid, .studenroll-lastname, .studenroll-firstname, .studenroll-middlename, .studenroll-birthday, .studenroll-contact, .studenroll-email, .studenroll-address, .studenroll-course, .studenroll-yrsection').hide();
	jQuery('.studenroll-edit').click(function() {
		jQuery(this).hide();
		jQuery(this).parents('.stud-profile').find('span').hide();
		jQuery(this).parents('.stud-profile').find('input[type="text"], select').show();
		jQuery(this).parents('.stud-profile').find('.studenroll-save').show();
	
		jQuery(this).parents('.stud-profile').find('.studenroll-studentid').val(jQuery(this).attr('data-studentid'));
		jQuery(this).parents('.stud-profile').find('.studenroll-lastname').val(jQuery(this).attr('data-lastname'));
		jQuery(this).parents('.stud-profile').find('.studenroll-firstname').val(jQuery(this).attr('data-firstname'));
		jQuery(this).parents('.stud-profile').find('.studenroll-middlename').val(jQuery(this).attr('data-middlename'));
		jQuery(this).parents('.stud-profile').find('.studenroll-birthday').val(jQuery(this).attr('data-birthday'));
		jQuery(this).parents('.stud-profile').find('.studenroll-contact').val(jQuery(this).attr('data-contact'));
		jQuery(this).parents('.stud-profile').find('.studenroll-course').val(jQuery(this).attr('data-course'));
		jQuery(this).parents('.stud-profile').find('.studenroll-yrsection').val(jQuery(this).attr('data-yrsection'));
		jQuery(this).parents('.stud-profile').find('.studenroll-address').val(jQuery(this).attr('data-address'));
	});
});

    $('#timepicker1').timepicker();
    $('#timepicker2').timepicker();
</script>

@stop