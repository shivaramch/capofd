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
                        <div class="col-md-12">
                            <h6><i><strong>Used for future tracking purposes only</strong></i></h6>
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
                        <div class='col-sm-6'>
                            {!! Form::label('reportnum ', '(Obtain from SWD Office)', array('class' => 'col-sm-8 control-label','style' =>'margin-left:-70px;')) !!}
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
                            {!! Form::text('shift',$injury->shift ,['disabled'],array('class' => 'form-control'))!!}
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
                    </div>
                    <div class="col-sm-4 form-group">
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
                <div class="col-sm-12">
                    {{ Form::checkbox('checkbox1', 1, null,['disabled'], ['id' => 'checkbox1', 'class'=>'className','readonly' => 'true']) }}
                    {{Form::label('Checkbox1','CorVel Work Ability- Only if seeking medical attention. Complete "Employee Section" and sign at bottom.')}}
                    {{--}}  <label class="col-sm-12"><strong>CorVel Work Ability
                              Report</strong>
                          - Only if seeking medical attention. Complete "Employee Section" and sign at bottom.</label> --}}
                </div>
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
                                        @if($attachment->attachmenttype == '611' && $attachment->ofd6id == $injury->ofd6id )
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
                <div class="col-sm-12">
                    {{ Form::checkbox('checkbox2', 1, null,['disabled'], ['id' => 'checkbox2', 'class'=>'className','readonly' => 'true']) }}
                    {{Form::label('Checkbox2','Investigation Report for
                    Occupational Injury or Illness- Both employee and supervisor must complete and sign.')}}
                    {{--}}<label class="col-sm-12"><strong>Investigation Report for
                        Occupational Injury or Illness</strong>
                    - Both employee and supervisor must complete and sign.</label> --}}
                </div>
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
                                        @if($attachment->attachmenttype == '612' && $attachment->ofd6id == $injury->ofd6id )
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
                <div class="col-sm-12">
                    {{ Form::checkbox('checkbox3', 1, null,['disabled'], ['id' => 'checkbox3', 'class'=>'className','readonly' => 'true']) }}
                    {{Form::label('Checkbox3','Statement of Witness of
                        Accident')}}
                </div>
                {{--}} <label class="col-sm-12"><strong>Statement of Witness of
                         Accident</strong></label> --}}
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
                                        @if($attachment->attachmenttype == '613' && $attachment->ofd6id == $injury->ofd6id )
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
                <div class="col-sm-12">
                    {{ Form::checkbox('checkbox4', 1, null,['disabled'], ['id' => 'checkbox4', 'class'=>'className','readonly' => 'true']) }}
                    {{Form::label('Checkbox4','Employees Choice of
                        Physician or Doctor Form - Two signatures required - both section A & B.')}}
                    {{--}} <label class="col-sm-12"><strong>Employee's Choice of
                             Physician or Doctor Form</strong>
                         - Two signatures required - both section A & B.</label> --}}
                </div>
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
                                        @if($attachment->attachmenttype == '614' && $attachment->ofd6id == $injury->ofd6id )
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
                <div class="col-sm-12">
                    {{ Form::checkbox('checkbox5', 1, null,['disabled'], ['id' => 'checkbox5', 'class'=>'className','readonly' => 'true']) }}
                    {{Form::label('Checkbox5','OFD - 25 Injury on
                        Job - Send an attachment electronically to OmafIOD@cityofomaha.org')}}
                    {{--}}  <label class="col-sm-12"><strong>OFD - 25 Injury on
                              Job</strong>
                          - Send an attachment electronically to OmafIOD@cityofomaha.org</label> --}}
                </div>
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
                                        @if($attachment->attachmenttype == '615' && $attachment->ofd6id == $injury->ofd6id )
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
                <div class="col-sm-12">
                    {{ Form::checkbox('checkbox6', 1, null,['disabled'], ['id' => 'checkbox6', 'class'=>'className','readonly' => 'true']) }}
                    {{Form::label('Checkbox6','Miscellaneous Documents')}}
                </div>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#616"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="616" class="collapse">

                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '616' && $attachment->ofd6id == $injury->ofd6id )
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
                    {!! Form::label('trainingassigned', 'In case attend Omaha Police Academy - Training Assigned', array('class' => 'col-sm-4 control-label','disabled'=>'disabled')) !!}
                    <div class="col-sm-6">
                        {!! Form::text('trainingassigned',$injury->trainingassigned ,['disabled'],array('class' => 'form-control'))!!}
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
                <div class="col-sm-12 form-group">
                    <label class="checkbox-inline col-sm-12"><u>For Fire Omaha Police Recruits: Use normal
                            Chain-of-Command for Tracking
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
            <div class="col-sm-12 panel-heading" align="center">
                <div class="btn-bottom ">
                    <a href="{{ route('injuries.index') }}" class="btn btn-default">return</a>
                </div>
            </div>
        </div>

        {!! form::close() !!}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="titleBox">
                    <label>Comments </label>
                </div>
                @if($injury->captainid == Auth::user()->id ||
                $injury->battalionchiefid == Auth::user()->id ||
                $injury->aconduty == Auth::user()->id ||
                Auth::user()->roleid == 1)
                    {!! Form::open(['method' => 'POST', 'route' => ['comments.store'],]) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-group" style="width:100%; position:relative">
                                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Add your comment', 'rows' => '4']) }}
                                </div>
                                {{ Form::hidden('applicationtype', '6') }}
                                {{ Form::hidden('applicationid', $injury->ofd6id) }}
                                {{ Form::checkbox('isvisible', 1, null, ['id' => 'daybook', 'class'=>'className']) }}
                                <label><strong>
                                        Visible to applicant</strong></label>
                                <div class="col-sm-12" align="center">
                                    <div class="col-sm-4">
                                        {{ Form::submit('Post Comment', array('class' => 'btn btn-block btn-primary')) }}
                                    </div>
                                    @if($injury->captainid == Auth::user()->id && $injury->applicationstatus == 2 ||
                                    $injury->battalionchiefid == Auth::user()->id&&$injury->applicationstatus == 3 ||
                                    $injury->aconduty == Auth::user()->id&&$injury->applicationstatus == 4)
                                        <div class="col-sm-4">
                                            <a href="{{ url('/injuries/'.$injury->ofd6id .'/Approve') }}"
                                               class="btn btn-block btn-success">Approve</a>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-block btn-danger" data-toggle="modal"
                                                    data-target="#myModal">
                                                Reject
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! form::close() !!}
                @endif

                <div class="actionBox">
                    <ul class="commentList">
                        @if (!empty($comments))
                            @foreach ($comments as $cm)
                                @if(($cm->applicationid == $injury->ofd6id && $cm->applicationtype == '6')&&
                                (($injury->injuredemployeeid == Auth::user()->id && $cm->isvisible == 1)  ||
                                $injury->captainid == Auth::user()->id ||
                                $injury->battalionchiefid == Auth::user()->id ||
                                $injury->aconduty == Auth::user()->id ||
                                Auth::user()->roleid == 1))
                                    <div class="col-sm-8">
                                        <div class="panel panel-white post panel-shadow">
                                            <div class="post-heading">
                                                <div class="pull-left meta">
                                                    <div class="title h5">
                                                        @foreach ($users as $user)
                                                            @if($user->id == $cm->createdby )
                                                                <b><i class="fa fa-user"></i> {{$user->name}}
                                                                </b>
                                                            @endif
                                                        @endforeach
                                                        made a Comment.
                                                    </div>
                                                    <time class="comment-date text-muted time"
                                                          datetime="{{$cm->created_at}}"><i
                                                                class="fa fa-clock-o"></i> {{$cm->created_at}}
                                                    </time>
                                                </div>
                                            </div>
                                            <div class="post-description">
                                                <p>{{$cm->comment}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to <strong>Reject</strong> this application? If, <strong>Yes</strong> please
                    include a comment for the applicant if not done already!
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/injuries/'.$injury->ofd6id .'/Reject') }}"
                       class="btn btn-success">Yes</a>
                    <button type="button" class=" btn btn-danger" data-dismiss="modal" aria-label="">No</button>


                </div>

            </div>
        </div>
    </div>
@stop