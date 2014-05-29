@extends('master')

@section('navs')
	@include('navs')
@stop

@section('content')
<div class="content text-center">
			<br />
			<br />
			<div>
				{{ ( Auth::user()->type == 1 ? Form::select('filter_by', [
					    'admins' 		=> 'Admins', 
						'professors'	=> 'Professors',
						'students'		=> 'Students'
				], Input::old('filter_by')) :  Form::select('filter_by', [ 
						'professors'	=> 'Professors',
						'students'		=> 'Students'
				], Input::old('filter_by'))) }}


				{{ ( Auth::user()->type==1 ? Form::open(['route' => 'asearchresults']) :  Form::open(['route' => 'psearchresults'])) }}

				{{ Form::token() }}
				

				{{ Form::text('keyword', NULL, array('placeholder'	=> 'Search Here' )) }}

				{{ Form::submit('Search', ['class' => 'btn btn-default']) }}

				
				{{ Form::close() }}
			</div><!-- end searchbar -->


			<table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($results))
	                @foreach ($results as $result)
	            	<tr>
	            		<td>
	            		@if(!empty($result->employee_id))     	
	            			{{{ $result->employee_id }}} (Employee)
	            		@else
	            			{{{ $result->student_id }}} ( Student )
	            		@endif
	            		</td>
	            		<td>{{{ $result->lastname }}}</td>
	            		<td>{{{ $result->firstname }}}</td>
	            		<td>{{{ $result->middlename }}}</td>
	            		<td></td>
	            	</tr>
	                @endforeach
                @endif
                </tbody>
            </table>
</div>

@stop

@section('styles')
{{ HTML::style('/css/bootstrap-select.min.css')}}
{{ HTML::style('/css/signin.min.css')}}
@stop

@section('scripts')
{{ HTML::script('/js/bootstrap-select.min.js')}}
<script>
$('select').selectpicker();
</script>
@stop


