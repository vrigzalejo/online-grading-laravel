@extends('master')

@section('navs')
  @include('navs')
@stop

@section('content')
      <div class="text-center">
        <br />
        <br />

        @foreach($errors->all() as $error)
          {{ $error }}<br />
          @endforeach

            {{ Form::open(['route' => ['psectionstoencode']]) }}
            {{ Form::token() }}
            <select name="courseyrsection" class="btn btn-default">
                @foreach ($yrsections as $yrsection) 
                  <option value="{{ $yrsection->yrsection_id }}">{{ $yrsection->code }} {{ $yrsection->yrsection }}</option>
                @endforeach
            </select>
            {{ Form::submit('Search', ['class'=>'btn btn-default']) }}
            {{ Form::close() }}

            
      <table class="table table-bordered table-hover">
                <thead>

                    <tr>
                        <th>Student No.</th>
                        <th>Surname</th>
                        <th>Firstname</th>
                        <th>M.I.</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Midterm Grade</th>
                        <th>Finals Grade</th>
                        <th>Sem Grade</th>
                        <th>Remarks</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                
                @if(!empty($studsubjects))
                  @foreach ($studsubjects as $studsubject)

                 <tr>      

                  <td>{{{ $studsubject->studid }}}</td>
                  <td>{{{ $studsubject->lastname }}}</td>
                  <td>{{{ $studsubject->firstname }}}</td>
                  <td>{{{ $studsubject->middlename }}}</td>
                  <td>{{{ $studsubject->course }}}</td>  
                  <td>
                  {{{ $studsubject->subcode }}} ( {{{ $studsubject->subdes }}} )
                 
                  </td>
                  {{ Form::open(['name' => 'encodeEncode', 'route' => ['paddstudentgrade', $studsubject->profid]]) }}
                  {{ Form::token() }}
                  {{ Form::text('stdid', $studsubject->stdid, ['style' => 'display:none;']) }}
                   
                  <td>
                  @if(!empty(Semgrade::gradeOfStudents($studsubject->stdid, $studsubject->profid)->first()))
                  <span>{{{ Semgrade::gradeOfStudents($studsubject->stdid, $studsubject->profid)->first()->midtermgrades }}}</span>
                  @else
                  @if(Lock::first()->lock == 1)
                  <select name="midterm" class="selectpicker form-control encode-midterm" >
                  <option value="N/A">N/A</option>
                       @foreach ($gradeequivs as $gradeequiv)
                      <option value="{{ $gradeequiv->gradeequiv }}">{{ $gradeequiv->gradeequiv }}</option>
                    @endforeach 
                  </select>
                  @else
                  <select disabled name="midterm" class="selectpicker form-control encode-midterm" >
                  <option value="N/A">N/A</option>
                       @foreach ($gradeequivs as $gradeequiv)
                      <option value="{{ $gradeequiv->gradeequiv }}">{{ $gradeequiv->gradeequiv }}</option>
                    @endforeach 
                  </select>
                  @endif
                  @endif


                  </td>

                  <td>

                  @if(!empty(Semgrade::gradeOfStudents($studsubject->stdid, $studsubject->profid)->first()))
                  <span>{{{ Semgrade::gradeOfStudents($studsubject->stdid, $studsubject->profid)->first()->finalgrades }}}</span>
                   @else
                  @if(Lock::first()->lock == 1)
                  <select name="finals" class="selectpicker form-control encode-finals" onchange="OnChange(this.value)">
                  <option value="N/A">N/A</option>
                       @foreach ($gradeequivs as $gradeequiv)
                      <option value="{{ $gradeequiv->gradeequiv}}">{{ $gradeequiv->gradeequiv }}</option>
                       @endforeach 
                  </select>
                  @else
                  <select disabled name="finals" class="selectpicker form-control encode-finals" onchange="OnChange(this.value)">
                  <option value="N/A">N/A</option>
                       @foreach ($gradeequivs as $gradeequiv)
                      <option value="{{ $gradeequiv->gradeequiv}}">{{ $gradeequiv->gradeequiv }}</option>
                       @endforeach 
                  </select>
                  @endif
                 @endif
                  </td>
                  <td>

                  @if(!empty(Semgrade::gradeOfStudents($studsubject->stdid, $studsubject->profid)->first()))
                  <span>{{{ Semgrade::gradeOfStudents($studsubject->stdid, $studsubject->profid)->first()->semgrade }}}</span>
                   @else
                   @if(Lock::first()->lock == 1)
                   <select name="semgrade" class="selectpicker form-control encode-semgrade">
                       <option value="N/A">N/A</option>
                       @foreach ($gradings as $grading)
                       <option value="{{ $grading->grade }}">{{ $grading->grade }}</option>
                    @endforeach 
                  </select>
                  @else
                  <select disabled name="semgrade" class="selectpicker form-control encode-semgrade">
                       <option value="N/A">N/A</option>
                       @foreach ($gradings as $grading)
                       <option value="{{ $grading->grade }}">{{ $grading->grade }}</option>
                    @endforeach 
                  </select>
                  @endif
                 @endif
                  </td>
                  <td>
                  @if(!empty(Semgrade::gradeOfStudents($studsubject->stdid, $studsubject->profid)->first()))
                  <span>{{{ Semgrade::gradeOfStudents($studsubject->stdid, $studsubject->profid)->first()->remarks }}}</span>
                   @else
                   @if(Lock::first()->lock == 1)

                  <select name="remarks" class="selectpicker form-control encode-remarks">
                  <option value="N/A">N/A</option>
                   <option value="Passed">Passed</option>
                   <option value="Failed">Failed</option>
                   <option value="OD">OD (Officially Dropped)</option>
                   <option value="UD">UD (Unofficially Dropped)</option>
                   <option value="INC">INC (Incomplete)</option>   
                  </select>
                  @else
                   <select disabled name="remarks" class="selectpicker form-control encode-remarks">
                  <option value="N/A">N/A</option>
                   <option value="Passed">Passed</option>
                   <option value="Failed">Failed</option>
                   <option value="OD">OD (Officially Dropped)</option>
                   <option value="UD">UD (Unofficially Dropped)</option>
                   <option value="INC">INC (Incomplete)</option>   
                  </select>
                  @endif
                    
                 @endif
                  </td>
                  
                  @if(empty(Semgrade::gradeOfStudents($studsubject->stdid, $studsubject->profid)->first()) && Lock::first()->lock == 1)
                    <td>
                    {{ Form::submit('Add', ['class'=>'btn btn-default encode-add','onclick'=>'return confirm("Continue to add grade?")']) }}
                    </td>
                    {{ Form::close() }}
                  @else
                    <td>
                    {{ Form::submit('Add', [
                    'disabled', 'class'=>'btn btn-default encode-add','onclick'=>'return confirm("Continue to add grade?")']) }}
                    </td>
                    {{ Form::close() }}
                  @endif
                
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

{{ HTML::script('/js/jquery.min.js')}}
{{ HTML::script('/js/encode.min.js')}}


<script type="text/javascript">

 

/*
jQuery(document).ready(function() {
  jQuery('.encode-midterm').hide();
  jQuery('.encode-finals').hide();
  jQuery('.encode-semgrade').hide();
  jQuery('.encode-remarks').hide();
  jQuery('.encode-save').hide();
  
  jQuery('.encode-edit').click(function() {
    jQuery(this).hide();
    jQuery(this).parents('tr').find('span').hide();
    jQuery(this).parents('tr').find('input[type="text"],select').show();
    jQuery(this).parents('tr').find('.room-save').show();
  
    // values
    jQuery(this).parents('tr').find('.encode-midterm').val(jQuery(this).attr('data-midterm'));
    jQuery(this).parents('tr').find('.encode-finals').val(jQuery(this).attr('data-finals'));
    jQuery(this).parents('tr').find('.encode-semgrade').val(jQuery(this).attr('data-semgrade'));
    jQuery(this).parents('tr').find('.encode-remarks').val(jQuery(this).attr('data-remarks'));
  });

});
*/
</script>
@stop