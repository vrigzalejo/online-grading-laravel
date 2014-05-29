@extends('master')


@section('content')
<div class="content text-center">

	<a href="javascript:void(printSpecial())" id="print"><button class="btn btn-large btn-info" type="button"><i class="glyphicon glyphicon-print"></i> Print</button></a><br /><br />             
     <div id="printReady">   


	@foreach($students as $student)
					<strong>Student ID: </strong>{{{ $student->student_id }}}<br />
					<strong>Lastname: </strong>{{{ $student->lastname }}}<br />
					<strong>Firstname: </strong>{{{ $student->firstname }}}<br />
					<strong>M.I. : </strong>{{{ $student->middlename }}}<br />
					<strong>Birthday: </strong>{{{ date('M d, Y', strtotime($student->birthday)) }}}<br />
					<strong>Course: </strong>{{{ $student->course }}}<br />
					<strong>Yr/Section: </strong>{{{ $student->yrsection }}}<br />
				@endforeach
	
	<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Yr/Section</th>
                        <th>Subject</th>
 	                    <th>Sem Grade</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($results))
	                @foreach ($results as $result)
	            	<tr>
	            		<td>
	            			{{{ $result->course }}} 
	            		</td>
	            		<td>{{{ $result->yrsection }}}</td>
	            		<td>
		                  {{{ $result->subcode }}} ( {{{ $result->subdes }}} )
		                 
		                  </td>
	            		<td>{{{ $result->semgrade }}}</td>
	            		<td>{{{ $result->remarks }}}</td>

	            	</tr>
	                @endforeach
                @endif
                </tbody>
            </table>
            {{ $results->links() }}
</div>
</div>
@stop

@section('styles')
{{ HTML::style('/css/bootstrap-select.min.css')}}
{{ HTML::style('/css/signin.min.css')}}
@stop

@section('scripts')
{{ HTML::script('/js/print.min.js') }}
{{ HTML::script('/js/bootstrap-select.min.js')}}
<script>
$('select').selectpicker();
</script>
@stop


