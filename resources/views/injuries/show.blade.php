@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('injuries.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('injuries.index') }}">OFD 6 Injuries</a></li>
        <li class="active">Show OFD 6 Form {{ $injury->ofd6ID }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($injury,['method' => 'PUT', 'route' => ['injuries.update', $injury->ofd6ID], 'files' => true,]) !!}
    <style>
        table {
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
        }
    </style>
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
                            {!! Form::text('reportnum', old('reportnum'), array('class' => 'form-control','style' =>'margin-left:-7px;','placeholder'=>'Enter Report Number','required' => 'required','disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('reportnum'))
                                <p class="help-block">
                                    {{ $errors->first('reportnum') }}
                                </p>
                            @endif
                        </div>
                        <div class='col-sm-7'>
                            {!! Form::label('reportnum ', '(Obtain from SWD Office)', array('class' => 'col-sm-8 control-label','style' =>'margin-left:-50px;')) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('createdate', 'Todays Date:', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('createdate', old('createdate'), array('class'=>'datepicker form-control','placeholder'=>'MM/DD/YYYY','required' => 'required','disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('createdate'))
                                <p class="help-block">
                                    {{ $errors->first('createdate') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('injurydate', 'Date of Injury:', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('injurydate', old('injurydate'), array('class'=>'datepicker form-control','placeholder'=>'MM/DD/YYYY','required' => 'required','disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('injurydate'))
                                <p class="help-block">
                                    {{ $errors->first('injurydate') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('assignmentinjury', 'Assignment', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('assignmentinjury', old('assignmentinjury'), array('class' => 'form-control','required' => 'required','disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('assignmentinjury'))
                                <p class="help-block">
                                    {{ $errors->first('assignmentinjury') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('injuredemployeename', 'Injured Name', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('injuredemployeename', old('injuredemployeename'), array('class' => 'form-control','placeholder'=>'Enter Injured Name','required' => 'required','disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('injuredemployeename'))
                                <p class="help-block">
                                    {{ $errors->first('injuredemployeename') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('injuredemployeeid', 'Personnel ID #', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('injuredemployeeid', old('injuredemployeeid'), array('class' => 'form-control','placeholder'=>'Enter Badge Id','required' => 'required','disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('injuredemployeeid'))
                                <p class="help-block">
                                    {{ $errors->first('injuredemployeeid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('shift', 'Shift', array('class' => 'col-sm-4 control-label','disabled'=>'disabled')) !!}
                        <div class="col-sm-6">
                            {!! Form::select('shift',[
                          'A' => 'A',
                          'B' => 'B',
                          'C' => 'C',
                          'DIV' => 'DIV'], array('class' => 'form-control','required' => 'required','disabled'=>'disabled'))!!}
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
                        {!! Form::label('captainid', 'Captain #', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('captainid', old('captainid'), array('class' => 'form-control','placeholder'=>'Enter Badge Id','required' => 'required','disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('captainid'))
                                <p class="help-block">
                                    {{ $errors->first('captainid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('battalionchiefid', 'Battalion Chief #', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('battalionchiefid', old('battalionchiefid'), array('class' => 'form-control','placeholder'=>'Enter Badge Id','required' => 'required','disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('battalionchiefid'))
                                <p class="help-block">
                                    {{ $errors->first('battalionchiefid') }}
                                </p>
                            @endif
                        </div>
                    </div><div class="col-sm-4 form-group">
                        {!! Form::label('aconduty', 'Assistant Chief #', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('aconduty', old('aconduty'), array('class' => 'form-control','placeholder'=>'Enter Badge Id','required' => 'required','disabled'=>'disabled'))!!}
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
                            {!! Form::text('frmsincidentnum', old('frmsIncidentNum'), array('class' => 'form-control','required' => 'required','disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('frmsincidentnum'))
                                <p class="help-block">
                                    {{ $errors->first('frmsincidentnum') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-8 form-group">
                        {!! Form::label('corvelid', 'Corvel ID #', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-3">
                            {!! Form::text('corvelid', old('corvelid'), array('class' => 'form-control','required' => 'required','style' =>'margin-left:-7px;','disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('corvelid'))
                                <p class="help-block">
                                    {{ $errors->first('corvelid') }}
                                </p>
                            @endif
                        </div>
                        <div class='col-sm-7'>
                            {!! Form::label('corvelid ', '(Corvel TMC will initiate at time of call)', array('class' => 'col-sm-7 control-label','style' =>'margin-left:-50px;')) !!}
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
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#611"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>

                        <div id="611" class="collapse">

                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '611' && $attachment->createdby ==  Auth::user()->id && $attachment->ofd6id == $injury->ofd6id )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                            <td>
                                                {{$attachment->created_at}}</a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </table>
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
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#612"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                <div id="612" class="collapse">

                    <table class="table table-striped">
                        <tr>
                            <th> File Name</th>
                            <th> File Uploaded At</th>
                        </tr>
                        @if(count($attachments) > 0)
                            @foreach($attachments as $attachment)
                                @if($attachment->attachmenttype == '612' && $attachment->createdby ==  Auth::user()->id && $attachment->ofd6id == $injury->ofd6id )
                                    <tr>
                                        <td>
                                            <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                        </td>
                                        <td>
                                            {{$attachment->created_at}}</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
                    </div>
                </div>
            <div class="row">

                <label class="col-sm-12"><strong>Statement of Witness of
                        Accident</strong></label>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#613"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="613" class="collapse">

                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '613' && $attachment->createdby ==  Auth::user()->id && $attachment->ofd6id == $injury->ofd6id )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </table>
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
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#614"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="614" class="collapse">

                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '614' && $attachment->createdby ==  Auth::user()->id && $attachment->ofd6id == $injury->ofd6id )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </table>
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
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#615"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="615" class="collapse">

                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '615' && $attachment->createdby ==  Auth::user()->id && $attachment->ofd6id == $injury->ofd6id )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
            </div>
</div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('captainid', 'Complete FRMS Casuality & Narrative Tab - Fire service and Fire Service Injury', ['class' => 'col-sm-6 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('captainid', old('captainid'), array('class' => 'form-control','placeholder'=>'Enter FRMS Number here','required' => 'required','disabled'=>'disabled'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('captainid'))
                            <p class="help-block">
                                {{ $errors->first('captainid') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('captainid', 'Complete in EPCR - All Cases', ['class' => 'col-sm-6 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('captainid', old('captainID'), array('class' => 'form-control','placeholder'=>'Enter EPCR Number here','required' => 'required','disabled'=>'disabled')) !!}
                        <p class="help-block"></p>
                        @if($errors->has('captainid'))
                            <p class="help-block">
                                {{ $errors->first('captainid') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('documentworkforce', 1, null, ['id' => 'documentworkforce', 'class'=>'className', 'readonly' => 'true','disabled'=>'disabled']) }}
                        <label><strong>Document IOD in
                                Workforce
                                - Only if seeking medical attention.</strong></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('documentoperationalday', 1, null, ['id' => 'documentoperationalday', 'class'=>'className', 'readonly' => 'true','disabled'=>'disabled']) }}
                        <label><strong>Document in Operational Day
                                Book and Personnel Record</strong></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label class="col-sm-4">In case attend Omaha Police Academy - Training Assigned</label>
                    <div class="col-sm-3">
                        {{ Form::select('shift', [
                        'yes' => 'YES',
                        'no' => 'NO']
                        ), array('class'=>'btn btn-primary dropdown-toggle col-sm-12') }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label class="checkbox-inline col-sm-12"><u>For Fire Omaha Police Recruits: Use normal Chain-of-Command for Tracking
                            Document</u></label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('policeofficercompletesign', 1, null, ['id' => 'policeofficercompletesign', 'class'=>'className', 'readonly' => 'true','disabled'=>'disabled' ]) }}
                        <label><strong>Have Police Supervisor Complete and Sign
                                Supervisor section on Investigation Report
                                and Witness Statement</strong></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('callsupervisor', 1, null, ['id' => 'callsupervisor', 'class'=>'className', 'readonly' => 'true','disabled'=>'disabled']) }}
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
                        <a href="{{ route('injuries.index') }}" class="btn btn-success">Back</a>
                    </div>
                    <br>
                </div>
            </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    Are you sure want to submit the form?
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Submit',['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop