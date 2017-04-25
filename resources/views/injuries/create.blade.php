@extends('layouts.app')
@section('content')
    <script>
        $(document).ready(function() {
            src = "{{ route('searchajax') }}";
            $("#assignmentinjury").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        dataType: "json",
                        data: {
                            term : request.term
                        },
                        success: function(data) {
                            response(data);

                        }
                    });
                },
                minLength: 1,
            });
        });
    </script>
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('injuries.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('injuries.index') }}">OFD 6 Injuries</a></li>
        <li class="active">New Form</li>
    </ol>
@endsection
{!! Form::open(['method' => 'POST', 'url' => '/injuries/save', 'files' => true,]) !!}
<input type="hidden" name="_token" value="{!!  'csrf_token()' !!}">
{{ csrf_field() }}
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="jumbotron" style="margin-bottom: 5px; ">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{asset('img/login.png')}}">
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="page-header1">
                            <h3><strong>I.O.D. Report Tracking Document (OFD-6)</strong></h3>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h5><i><strong>Used for future tracking purposes only</strong></i></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <div class="form-horizontal">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" align="center">
                        <strong>COMPLETE ALL FORMS AND SUBMIT WITHIN 24 HOURS
                        </strong>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    {!! Form::label('injuryDate', 'Date of Injury:', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('injurydate', old('injurydate'), array('class'=>'datepicker form-control','id' => 'injurydate','placeholder'=>'MM/DD/YYYY'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('injuryDate'))
                            <p class="help-block">
                                {{ $errors->first('injuryDate') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('assignmentInjury', 'Assignment', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('assignmentinjury', old('assignmentinjury'), array('class' => 'form-control', 'id' => 'assignmentinjury','placeholder'=>'Enter Assignment'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('assignmentInjury'))
                            <p class="help-block">
                                {{ $errors->first('assignmentInjury') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    {!! Form::label('injuredEmployeeName', 'Injured Name', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('injuredemployeename', old('injuredemployeename'), array('class' => 'form-control','id' => 'injuredemployeename','placeholder'=>'Enter Injured Name'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('injuredEmployeeName'))
                            <p class="help-block">
                                {{ $errors->first('injuredEmployeeName') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('injuredEmployeeID', 'Personnel ID #', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('injuredemployeeid', old('injuredemployeeid'), array('class' => 'form-control','id' => 'injuredemployeeid','placeholder'=>'Enter Badge Id'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('injuredEmployeeID'))
                            <p class="help-block">
                                {{ $errors->first('injuredEmployeeID') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    <label class="col-sm-4 control-label">Shift</label>
                    <div class="col-sm-6">
                        {!! Form::select('shift',[
                      'A' => 'A',
                      'B' => 'B',
                      'C' => 'C',
                      'DIV' => 'DIV'],null,
                                ['placeholder' => 'Choose one'], array('class' => 'form-control','id' => 'shift'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('shift'))
                            <p class="help-block">
                                {{ $errors->first('shift') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    {!! Form::label('captainID', 'Captain #', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('captainid', old('captainid'), array('class' => 'form-control','id' => 'captainid', 'placeholder'=>'Enter Badge Id'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('captainID'))
                            <p class="help-block">
                                {{ $errors->first('captainID') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('battalionchiefid', 'Battalion Chief #', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('battalionchiefid', old('battalionchiefid'), array('class' => 'form-control','id' => 'battalionchiefid','placeholder'=>'Enter Badge Id'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('battalionchiefid'))
                            <p class="help-block">
                                {{ $errors->first('battalionchiefid') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('aconduty', 'Assistant Chief #', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('aconduty', old('aconduty'), array('class' => 'form-control','id' => 'aconduty','placeholder'=>'Enter Badge Id'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('aconduty'))
                            <p class="help-block">
                                {{ $errors->first('aconduty') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    {!! Form::label('frmsincidentnum', 'FRMS Incident #', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
					{!! Form::text('frmsincidentnum1', old('frmsincidentnum1'), array('id'=>'text1', 'class' => 'form-control','placeholder'=>'Enter FRMS Number'))!!}
                        {!! Form::text('frmsincidentnum', old('frmsincidentnum'), array('id'=>'text2', 'class' => 'form-control','placeholder'=>'Enter FRMS Number', 'style'=>'display:none;'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('frmsincidentnum'))
                            <p class="help-block">
                                {{ $errors->first('frmsincidentnum') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-8 form-group">
                    {!! Form::label('corvelid', 'CorVel ID #', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-3">
                        {!! Form::text('corvelid', old('corvelid'), array('id'=>'corvelid', 'class' => 'form-control','style' =>'margin-left:-7px;','placeholder'=>'Enter Corvel ID'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('corvelid'))
                            <p class="help-block">
                                {{ $errors->first('corvelid') }}
                            </p>
                        @endif
                    </div>
                    <div class='col-sm-7'>
                        {!! Form::label('corVelID ', '(Corvel TMC will initiate at time of call)', array('class' => 'col-sm-8 control-label','style' =>'margin-left:-50px;')) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 form-group">
                    {!! Form::label('captainID', 'Enter EPCR #', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-3">
                        {!! Form::text('captainID', old('captainID'), array('class' => 'form-control','id'=>'captainID', 'placeholder'=>'Enter EPCR Number'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('captainID'))
                            <p class="help-block">
                                {{ $errors->first('captainID') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="alert alert-danger" align="center">
                <div class="row">
                    <div class="col-md-12" style="text-align:left">
                        <strong>
                            Please Follow These Instructions:
                            <ol start="1">
                                <li>All injuries must have an FRMS and ePCR incident ID#.</li>
                                <li>If your injury is not related to an incident, the Captain shall call dispatch,
                                    explain that an injury
                                    has occurred and request an FRMS ID#. The FRMS will automatically generate an ePCR#.
                                </li>
                                <li>The employee shall designate whether treatment is being requested in the OFD-25 IOD.
                                </li>
                            </ol>
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-sm-12" form-group>
                <h4 style="text-align:left"><strong>Injury Checklist:
                    </strong></h4>
            </div>
        </div>
    </div>

    <div class="panel-body">


        <div class="row">
            <div class="col-sm-12 form-group">
                <div class="form-group">
                    {{ Form::checkbox('checkbox1', 1, null, ['id' => 'corvelAbilityReport', 'class' => 'className' , 'disabled']) }}
                    {{Form::label('corvelAbilityReport','Complete CorVel Work Ability Report Form - Only if seeking medical attention. Complete "Employee Section" and sign at bottom.')}}
					
					
                </div>
            </div>
            <div class="col-sm-12 form-group well well-sm">
                <div class="col-sm-4">
                    <a class="btn btn-success dropdown-toggle col-sm-12" id="corvelDownload" type="button"
                       href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) CorVel Work Ability Report.pdf') }}"
                       download="(Injury PDF) CorVel Work Ability Report.pdf">
                        <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="corvelUpload"
                                                                                           name="CorvelAttachmentName"
                                                                                           style="display: none;"
																						   onchange="pressed()"
																						   >
                    </span>
                        </label>
                        <input type="text" id="upload-file-info1" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 form-group">
                <div class="form-group">
                    {{ Form::checkbox('checkbox2', 1, null, ['id'=>'investigationReport', 'class' => 'className' , 'disabled']) }}
                    {{Form::label('investigationReport','Complete Investigation Report for
                    Occupational Injury or Illness Form - Both employee and supervisor must complete and sign.')}}
                </div>
            </div>
            {{-- <label class="col-sm-12"><strong>Investigation Report for
                     Occupational Injury or Illness</strong>
                 - Both employee and supervisor must complete and sign.</label> --}}
            <div class="col-sm-12 form-group well well-sm">
                <div class="col-sm-4">
                    <a class="btn btn-success dropdown-toggle col-sm-12" id="reportDownload" type="button"
                       href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) OFD Investigation Report for Occupational Injury or Illness.pdf') }}"
                       download="(Injury PDF) OFD Investigation Report for Occupational Injury or Illness.pdf">
                        <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="reportUpload"
                                                                                           name="InvestigationAttachment"
                                                                                           style="display: none;"
																						   onchange="pressed1()">
                    </span>
                        </label>
                        <input type="text" id="upload-file-info" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 form-group">
                <div class="form-group">
                    {{ Form::checkbox('checkbox3', 1, null, ['id'=>'witnessStatement', 'class' => 'className' , 'disabled']) }}
                    {{Form::label('witnessStatement','Complete OFD 295a Injury Witness Statement Form')}}
                </div>
            </div>
            <div class="col-sm-12 form-group well well-sm">
                <div class="col-sm-4">
                    <a class="btn btn-success dropdown-toggle col-sm-12" id="witnessDownload" type="button"
                       href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) OFD 295a Injury Witness Statement.pdf') }}"
                       download="(Injury PDF) OFD 295a Injury Witness Statement.pdf">
                        <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                </div>

                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="witnessUpload"
                                                                                           name="StatementAttachment"
                                                                                           style="display: none;"
																						   onchange="pressed2()">
                    </span>
                        </label>
                        <input type="text" id="upload-file-info" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <div class="form-group">
                    {{ Form::checkbox('checkbox4', 1, null, ['id'=>'employeeChoice', 'class' => 'className' , 'disabled']) }}
                    {{Form::label('employeeChoice','Complete Employee’s Choice of Physician or Doctor Form - Two signatures required - both section A & B')}}
                </div>
            </div>


            {{--   <label class="col-sm-12"><strong>Employee's Choice of
                   Physician or Doctor Form</strong>
               - Two signatures required - both section A & B.</label> --}}
            <div class="col-sm-12 form-group well well-sm">
                <div class="col-sm-4">
                    <a class="btn btn-success dropdown-toggle col-sm-12" type="button" id="employeeDownload"
                       href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) OFD Employee\'s Choice of Physician or Doctor.pdf') }}"
                       download="(Injury PDF) OFD Employee's Choice of Physician or Doctor.pdf">
                        <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="employeeUpload"
                                                                                           name="EmployeeAttachment"
                                                                                           style="display: none;"
																						   onchange="pressed3()">
                    </span>
                        </label>
                        <input type="text" id="upload-file-info" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <div class="form-group">
                    {{ Form::checkbox('checkbox5', 1, null, ['id'=>'ofd25', 'class' => 'className', 'disabled']) }}
                    {{Form::label('ofd25','Complete OFD 25 Injury Intradepartmental Communication Form - Send an attachment electronically to OmafIOD@cityofomaha.org')}}
                </div>
            </div>
            <div class="col-sm-12 form-group well well-sm">
                <div class="col-sm-4">
                    <a class="btn btn-success dropdown-toggle col-sm-12" type="button" id="ofd25Download"
                       href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) OFD 025 Injury Intradepartmental Communication.pdf') }}"
                       download="(Injury PDF) OFD 025 Injury Intradepartmental Communication.pdf">
                        <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="ofd25Upload"
                                                                                           name="Ofd25Attachment"
                                                                                           style="display: none;"
																						   onchange="pressed4()">
                    </span>
                        </label>
                        <input type="text" id="upload-file-info" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 form-group">
                <div class="form-group">
                    {{ Form::checkbox('checkbox6', 1, null, ['id'=>'miscDocs', 'class' => 'className', 'disabled' ]) }}
                    {{Form::label('miscDocs','Miscellaneous Documents')}}
                </div>
            </div>
            <div class="col-sm-12 form-group well well-sm">
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="miscDocsUpload"
                                                                                           name="miscinjuries"
                                                                                           style="display: none;"
																						   onchange="pressed5()">
                    </span>
                        </label>
                        <input type="text" id="upload-file-info" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::checkbox('documentworkforce', 1, null, ['id' => 'documentworkforce', 'class'=>'className']) }}
                                        {{Form::label('documentworkforce','Document IOD in Workforce - Only if seeking medical attention.')}}

					
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::checkbox('documentoperationalday', 1, null, ['id' => 'documentoperationalday', 'class'=>'className']) }}
					{{Form::label('documentoperationalday','Document in Operational Day Book and Personnel Record')}}
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <label class="col-sm-4">In case attend Omaha Police Academy - Training Assigned</label>
                <div class="col-sm-3">
                    {{ Form::select('trainingassigned', [
                    'yes' => 'YES',
                    'no' => 'NO'],null,
                                ['placeholder' => 'Choose one', 'id' => 'trainingassigned'],
                     array('class'=>'btn btn-primary dropdown-toggle col-sm-12')) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <label class="checkbox-inline col-sm-12"><em>For Fire Omaha Police Recruits: Use normal Chain-of-Command
                        for Tracking
                        Document</em></label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::checkbox('policeofficercompletesign', 1, null, ['id' => 'policeofficercompletesign', 'class'=>'className']) }}
                    {{Form::label('policeofficercompletesign','Have Police Supervisor Complete and Sign Supervisor section on Investigation Report and Witness Statement')}}
					
					
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::checkbox('callsupervisor', 1, null, ['id' => 'callsupervisor', 'class'=>'className']) }}
					{{Form::label('callsupervisor','Call Fire Supervisor or SWD B/C immediately and notify CorVel by phone')}}
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 panel-headinzzzzg">
                <br>
                <label class="col-sm-5"></label>
                <div class="btn-bottom ">
                    {!! Form::submit('Save as Draft',['class' => 'btn btn-primary','name' => 'partialSave', 'id' => 'save']) !!}
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="submit">
                        Submit
                    </button>
                    <a href="{{ route('injuries.index') }}" class="btn btn-danger" id="cancel">Cancel</a>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                Are you sure want to submit the form?
            </div>
            <div class="modal-footer">
                {!! Form::submit('Yes',['class' => 'btn btn-success','name'=> 'store', 'id' => 'modalSubmit']) !!}
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="modalNo">No</button>
            </div>
        </div>
    </div>
</div>
<script>
window.pressed = function(){
    var a = document.getElementById('corvelUpload');
    if(a.value == "")
    {
        
    }
    else
    {
       document.getElementById("corvelAbilityReport").checked = true;
    }
};
window.pressed1 = function(){
    var a = document.getElementById('reportUpload');
    if(a.value == "")
    {
        
    }
    else
    {
       document.getElementById("investigationReport").checked = true;
    }
};
window.pressed2 = function(){
    var a = document.getElementById('witnessUpload');
    if(a.value == "")
    {
        
    }
    else
    {
       document.getElementById("witnessStatement").checked = true;
    }
};
window.pressed3 = function(){
    var a = document.getElementById('employeeUpload');
    if(a.value == "")
    {
        
    }
    else
    {
       document.getElementById("employeeChoice").checked = true;
    }
};
window.pressed4 = function(){
    var a = document.getElementById('ofd25Upload');
    if(a.value == "")
    {
        
    }
    else
    {
       document.getElementById("ofd25").checked = true;
    }
};
window.pressed5 = function(){
    var a = document.getElementById('miscDocsUpload');
    if(a.value == "")
    {
        
    }
    else
    {
       document.getElementById("miscDocs").checked = true;
    }
};
</script>
@stop