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

      
      <a href="javascript:void(printSpecial())" id="print" class="btn"><i class="icon-print"></i></a>               
      <div id="printReady">   

      <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Student No.</th>
                        <th>Surname</th>
                        <th>Firstname</th>
                        <th>M.I.</th>
                        <th>Course</th>
                        <th>Yr/Section</th>
                        <th>Subject</th>
                        <th>Midterm Grade</th>
                        <th>Finals Grade</th>
                        <th>Sem Grade</th>
                        <th>Remarks</th>
                        <th>Date Submitted</th>
                    </tr>
                </thead>
                <tbody>
                
                @if(!empty($submittedgrades))
                  @foreach ($submittedgrades as $submittedgrade)

                  <tr>
                
                  <td>{{{ $submittedgrade->student_id }}}</td>
                  <td>{{{ $submittedgrade->lastname }}}</td>
                  <td>{{{ $submittedgrade->firstname }}}</td>
                  <td>{{{ $submittedgrade->middlename }}}</td>
                  <td>{{{ $submittedgrade->course }}}</td>  
                                  
                  <td>
                  {{{ $submittedgrade->yrsection }}}
                 
                  </td>
                  <td>
                  {{{ $submittedgrade->subcode }}} ( {{{ $submittedgrade->subdes }}} )
                 
                  </td>
                  <td>
                  {{{ $submittedgrade->midtermgrades }}}
                 
                  </td>
                  <td>
                  {{{ $submittedgrade->finalgrades }}}
                
                  </td>
                  <td>
                  {{{ $submittedgrade->semgrade }}}
              
                  </td>
                  <td>
                  {{{ $submittedgrade->remarks }}}
              
                  </td>
                  <td>
                  {{{ $submittedgrade->semgradeupdate }}}
              
                  </td>
                </tr>

                  @endforeach
                @endif
                
                </tbody>
            </table>
            {{ $submittedgrades->links() }}
            </div>
        </div>
@stop



@section('styles')
{{ HTML::style('/css/bootstrap-timepicker.min.css') }}
@stop


@section('scripts')
{{ HTML::script('/js/print.min.js') }}
@stop

@section('styles')
{{ HTML::style('/css/datepicker/metallic.min.css')}}
{{ HTML::style('/css/signin.min.css')}}
@stop
