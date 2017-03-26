@extends('layouts.app')
@section('content')

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
{!! Form::open(['method' => 'POST', 'route' => ['injuries.store'], 'files' => true,]) !!}
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
                    <div class="col-md-2">
                        <h5><i><strong>Issue Date: 8/17/16</strong></i></h5>
                    </div>
                    <div class="col-md-2">
                        <h5><i><strong>Effective Date: 8/17/16</strong></i></h5>
                    </div>
                    <div class="col-md-12">
                        <h5><i><strong>Amends, Replaces, Rescinds: Replaces OFD-6 (Rev. 05-15)</strong></i></h5>
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
                        <strong>COMPLETE ALL FORMS AND FORWARD VIA CHAIN-OF-COMMAND WITHIN 48 HOURS
                        </strong>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 form-group">
                    {!! Form::label('reportnum', 'Report #', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-3">
                        {!! Form::text('reportnum', old('reportnum'), array('class' => 'form-control','style' =>'margin-left:-7px;','placeholder'=>'Enter Report Number'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('reportnum'))
                            <p class="help-block">
                                {{ $errors->first('reportnum') }}
                            </p>
                        @endif
                    </div>
                    <div class='col-sm-7'>
                        {!! Form::label('reportnum ', '(Obtain from SWD Office)', array('class' => 'col-sm-6 control-label','style' =>'margin-left:-70px;')) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    {!! Form::label('createdate', 'Todays Date:', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('createdate', old('createdate'), array('class'=>'datepicker form-control','placeholder'=>'MM/DD/YYYY'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('createDate'))
                            <p class="help-block">
                                {{ $errors->first('createDate') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('injuryDate', 'Date of Injury:', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('injurydate', old('injurydate'), array('class'=>'datepicker form-control','placeholder'=>'MM/DD/YYYY'))!!}
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
                        {!! Form::text('assignmentinjury', old('assignmentinjury'), array('class' => 'form-control'))!!}
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
                        {!! Form::text('injuredemployeename', old('injuredemployeename'), array('class' => 'form-control','placeholder'=>'Enter Injured Name'))!!}
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
                        {!! Form::text('injuredemployeeid', old('injuredemployeeid'), array('class' => 'form-control','placeholder'=>'Enter Badge Id'))!!}
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
                                ['placeholder' => 'Choose one'], array('class' => 'form-control'))!!}
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
                        {!! Form::text('captainid', old('captainid'), array('class' => 'form-control','placeholder'=>'Enter Badge Id'))!!}
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
                        {!! Form::text('battalionchiefid', old('battalionchiefid'), array('class' => 'form-control','placeholder'=>'Enter Badge Id'))!!}
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
                        {!! Form::text('aconduty', old('aconduty'), array('class' => 'form-control','placeholder'=>'Enter Badge Id'))!!}
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
                        {!! Form::text('frmsincidentnum', old('frmsincidentnum'), array('class' => 'form-control','placeholder'=>'Enter FRMS Number'))!!}
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
                        {!! Form::text('corvelid', old('corvelid'), array('class' => 'form-control','style' =>'margin-left:-7px;','placeholder'=>'Enter Corvel ID'))!!}
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
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-sm-12" form-group>
                <h4 style="text-align:center;"><strong>All injuries must have FRMS incident ID#- if non-incident
                        related,inform dispatch of your injury
                        and need for an FRMS ID#</strong></h4>
            </div>
        </div>
    </div>

    <div class="panel-body">


        <div class="row">

            <label class="col-sm-12"><strong>CorVel Work Ability
                    Report</strong>
                - Only if seeking medical attention. Complete "Employee Section" and sign at bottom.</label>

            <div class="col-sm-12 form-group well well-sm">
                <div class="col-sm-4">
                    <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                       href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) CorVel Work Ability Report.pdf') }}"
                       download="(Injury PDF) CorVel Work Ability Report.pdf">
                        <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file"
                                                                                           name="CorvelAttachmentName"
                                                                                           style="display: none;">
                    </span>
                        </label>
                        <input type="text" id="upload-file-info" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <label class="col-sm-12"><strong>Investigation Report for
                    Occupational Injury or Illness</strong>
                - Both employee and supervisor must complete and sign.</label>
            <div class="col-sm-12 form-group well well-sm">
                <div class="col-sm-4">
                    <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                       href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) OFD Investigation Report for Occupational Injury or Illness.pdf') }}"
                       download="(Injury PDF) OFD Investigation Report for Occupational Injury or Illness.pdf">
                        <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file"
                                                                                           name="InvestigationAttachment"
                                                                                           style="display: none;">
                    </span>
                        </label>
                        <input type="text" id="upload-file-info" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <label class="col-sm-12"><strong>Statement of Witness of
                    Accident</strong></label>
            <div class="col-sm-12 form-group well well-sm">
                <div class="col-sm-4">
                    <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                       href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) OFD 295a Injury Witness Statement.pdf') }}"
                       download="(Injury PDF) OFD 295a Injury Witness Statement.pdf">
                        <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                </div>

                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file"
                                                                                           name="StatementAttachment"
                                                                                           style="display: none;">
                    </span>
                        </label>
                        <input type="text" id="upload-file-info" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <label class="col-sm-12"><strong>Employee's Choice of
                    Physician or Doctor Form</strong>
                - Two signatures required - both section A & B.</label>
            <div class="col-sm-12 form-group well well-sm">
                <div class="col-sm-4">
                    <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                       href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) OFD Employee Choice of Physician or Doctor.pdf') }}"
                       download="(Injury PDF) OFD Employee Choice of Physician or Doctor.pdf">
                        <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file"
                                                                                           name="EmployeeAttachment"
                                                                                           style="display: none;">
                    </span>
                        </label>
                        <input type="text" id="upload-file-info" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <label class="col-sm-12"><strong>OFD - 25 Injury on
                    Job</strong>
                - Send an attachment electronically to OmafIOD@cityofomaha.org</label>
            <div class="col-sm-12 form-group well well-sm">
                <div class="col-sm-4">
                    <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                       href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) OFD 025 Injury Intradepartmental Communication.pdf') }}"
                       download="(Injury PDF) OFD 025 Injury Intradepartmental Communication.pdf">
                        <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file"
                                                                                           name="Ofd25Attachment"
                                                                                           style="display: none;">
                    </span>
                        </label>
                        <input type="text" id="upload-file-info" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <label class="col-sm-12">
                <strong>Miscellaneous Documents</strong>
            </label>
            <div class="col-sm-12 form-group well well-sm">
                <div class="col-sm-4">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file"
                                                                                           name="miscinjuries"
                                                                                           style="display: none;">
                    </span>
                        </label>
                        <input type="text" id="upload-file-info" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6 form-group">
                {!! Form::label('captainID', 'Complete FRMS Casuality & Narrative Tab - Fire service and Fire Service Injury', ['class' => 'col-sm-6 control-label']) !!}
                <div class="col-sm-6 ">
                    {!! Form::text('captainID', old('captainID'), array('class' => 'form-control','placeholder'=>'Enter FRMS Number here'))!!}
                    <p class="help-block"></p>
                    @if($errors->has('captainID'))
                        <p class="help-block">
                            {{ $errors->first('captainID') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 form-group">
                {!! Form::label('captainID', 'Complete in EPCR - All Cases', ['class' => 'col-sm-6 control-label']) !!}
                <div class="col-sm-6 ">
                    {!! Form::text('captainID', old('captainID'), array('class' => 'form-control','placeholder'=>'Enter EPCR Number here'))!!}
                    <p class="help-block"></p>
                    @if($errors->has('captainID'))
                        <p class="help-block">
                            {{ $errors->first('captainID') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::checkbox('documentworkforce', 1, null, ['id' => 'documentworkforce', 'class'=>'className']) }}
                    <label><strong>Document IOD in
                            Workforce
                        - Only if seeking medical attention.</strong></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::checkbox('documentoperationalday', 1, null, ['id' => 'documentoperationalday', 'class'=>'className']) }}
                    <label><strong>Document in Operational Day
                            Book and Personnel Record</strong></label>
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
                                ['placeholder' => 'Choose one'],
                     array('class'=>'btn btn-primary dropdown-toggle col-sm-12')) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <label class="checkbox-inline col-sm-12"><u>For Fire Omaha Police Recruits: Use normal Chain-of-Command
                        for Tracking
                        Document</u></label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::checkbox('policeofficercompletesign', 1, null, ['id' => 'policeofficercompletesign', 'class'=>'className']) }}
                    <label><strong>Have Police Supervisor Complete and Sign
                            Supervisor section on Investigation Report
                            and Witness Statement</strong></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::checkbox('callsupervisor', 1, null, ['id' => 'callsupervisor', 'class'=>'className']) }}
                    <label><strong>Call Fire Supervisor or SWD B/C immediately
                            and notify CorVel by phone</strong></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 panel-headinzzzzg">
                <br>
                <label class="col-sm-5"></label>
                <div class="btn-bottom ">

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        Submit
                    </button>
                    <a href="{{ route('injuries.index') }}" class="btn btn-danger">Cancel</a>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                Are you sure want to submit the form?
            </div>
            <div class="modal-footer">
                {!! Form::submit('Yes',['class' => 'btn btn-success']) !!}
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

@stop