@extends('master')

@section('navs')
	@include('navs')
@stop

@section('content')
			<div class="container text-center">
				<br />
	  			<br />
	  			<br />
				@foreach($errors->all() as $error)
					{{ $error }}<br />
			    @endforeach

			     <a href="javascript:void(printSpecial())"><img src="{{ asset('img/print.png')}}" id='print'></a>              
     			 <div id="printReady">   

				@foreach($professors as $professor)
					<strong>Employee ID: </strong>{{{ $professor->employee_id }}}<br />
					<strong>Lastname: </strong>{{{ $professor->lastname }}}<br />
					<strong>Firstname: </strong>{{{ $professor->firstname }}}<br />
					<strong>M.I. : </strong>{{{ $professor->middlename }}}<br />
					<strong>Birthday: </strong>{{{ date('M d, Y', strtotime($professor->birthday)) }}}<br />
					<strong>Contact: </strong>{{{ $professor->contact }}}<br />
					<strong>Email: </strong>{{{ $professor->email }}}<br />
					<strong>Address: </strong>{{{ $professor->address }}}<br />
					<strong>Registered: </strong>{{{ $professor->created_at }}}<br />

				@endforeach
			
     	<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Yr / Section</th>
                        <th>Subject</th>
                        <th>Room</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($profsubjects))
                	@foreach ($profsubjects as $profsubject)
                	<tr>
	            		<td>{{{ $profsubject->code }}}</td>
	            		<td>{{{ $profsubject->yrsection }}}</td>
	            		<td>{{{ $profsubject->subjectcode }}} - {{{ $profsubject->subjectdescription }}}</td>
	            		<td>{{{ $profsubject->room }}}</td>
	            		<td>

	            			{{{ date('h:i A', strtotime($profsubject->timestarts_at)) }}} - {{{ date('h:i A', strtotime($profsubject->timeends_at)) }}}</td>


	            	</tr>
                	@endforeach
                @endif
                </tbody>
            </table>
            {{ $profsubjects->links() }}
            </div>
           </div>

@stop



@section('styles')
{{ HTML::style('/css/signin.min.css') }}
{{ HTML::style('/css/bootstrap-timepicker.min.css') }}
@stop


@section('scripts')
{{ HTML::script('/js/print.min.js')}}
{{ Html::script('/js/bootstrap-timepicker.min.js') }}
<script type="text/javascript">
    $('#timepicker1').timepicker();
    $('#timepicker2').timepicker();
</script>
@stop