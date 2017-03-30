@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('accidents.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('accidents.index') }}">OFD 6A Accidents</a></li>
        <li class="active">View OFD 6A Form {{ $accident->ofd6aid }}</li>
    </ol>
@endsection
@section('content')
    {!! Form::model($accident,['method' => 'put']) !!}
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
                                <h3><strong>Vehicle Accident Report Tracking Document (OFD-6A)</strong></h3>
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
                            <strong>
                                Complete all forms and forward via chain-of-command within 24 hours
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! form::label('accidentdate', 'Date of Accident:',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') )!!}
                        <div class="col-sm-6 ">
                            {!! form::text('accidentdate', old('accidentdate'), ['disabled'],array('id'=>'datepicker1','class' => 'form-control datepicker', 'placeholder' => 'yyyy-mm-dd'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('accidentdate'))
                                <p class="help-block">
                                    {{ $errors->first('accidentdate') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! form::label('driverid', 'Driver id#', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! form::text('driverid', old('driverid'), ['disabled'],array('class'=>'form-control'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('driverid'))
                                <p class="help-block">
                                    {{ $errors->first('driverid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! form::label('drivername', 'Driver name',array( 'style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! form::text('drivername', old('drivername'),['disabled'], array('class'=>'form-control'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('drivername'))
                                <p class="help-block">
                                    {{ $errors->first('drivername') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! form::label('frmsincidentnum', 'FRMS Incident #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! form::text('frmsincidentnum', old('frmsincidentnum'),['disabled'], ['class' => 'form-control'])!!}
                            <p class="help-block"></p>
                            @if($errors->has('frmsincidentnum'))
                                <p class="help-block">
                                    {{ $errors->first('frmsincidentnum') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! form::label('assignmentaccident', 'Assignment', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! form::text('assignmentaccident', old('assignmentaccident'),['disabled'], ['class' => 'form-control'])!!}
                            <p class="help-block"></p>
                            @if($errors->has('assignmentaccident'))
                                <p class="help-block">
                                    {{ $errors->first('assignmentaccident') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! form::label('apparatus', 'Apparatus', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! form::text('apparatus', old('apparatus'),['disabled'], ['class' => 'form-control'])!!}
                            <p class="help-block"></p>
                            @if($errors->has('apparatus'))
                                <p class="help-block">
                                    {{ $errors->first('apparatus') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! form::label('captainid', 'Captain #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! form::text('captainid', old('captainid'), ['disabled'],array('class' => 'form-control',))!!}
                            <p class="help-block"></p>
                            @if($errors->has('captainid'))
                                <p class="help-block">
                                    {{ $errors->first('captainid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! form::label('battalionchiefid', 'Battalion Chief #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! form::text('battalionchiefid', old('battalionchiefid'),['disabled'], array('class' => 'form-control'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('battalionchiefid'))
                                <p class="help-block">
                                    {{ $errors->first('battalionchiefid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! form::label('aconduty', 'Assistant Chief #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! form::text('aconduty', old('aconduty'), ['disabled'],array('class' => 'form-control'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('aconduty'))
                                <p class="help-block">
                                    {{ $errors->first('aconduty') }}
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
                                    <li>B/C shall ensure all reports are properly completed within 24 hours.</li>
                                    <li>If an employee receives an injury from this incident, the employee shall
                                        complete an OFD6 and designate whether treatment is being requested in the
                                        OFD-25 IOD.
                                    </li>
                                    <li>City of Omaha policy REQUIRES a Police Report and DR41 State Form on all
                                        City
                                        vehicles involved in an accident OR property damage whether on public
                                        streets,
                                        private property, or at the Fire Station.
                                    </li>
                                    <li>DR41 is also submitted to the State if damage is over $1000.00</li>
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
                    <h4 style="text-align:left;"><u><strong>Accident Checklist :</strong></u></h4>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ form::checkbox('commemail', 1, null,['disabled'], ['id' => 'commemail', 'class'=>'classname','readonly' => 'true']) }}
                        <label><strong>Generate OFD 025
                                Intradepartmental Communication</strong>-email to <a
                                    href="omafaccident_ofd25@cityofomaha.org"> omafaccident_ofd25@cityofomaha
                                .org </a>
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    {{ Form::checkbox('checkbox1', 1, null,['disabled'], ['id' => 'checkbox1', 'class'=>'className','readonly' => 'true']) }}
                    {{Form::label('Checkbox1','Complete lrs 101 city of omaha accident report-include rb#, officer name,
                        badge#')}}
                </div>
                {{--}} <label class="checkbox-inline col-sm-12">
                     <strong>complete lrs 101 city of omaha accident report-include rb#, officer name,
                         badge#</strong>
                 </label> --}}
                <br>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#611"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
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
                                        @if($attachment->attachmenttype == '6a1' && $attachment->ofd6aid == $accident->ofd6aid )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}</a>
                                                </td>
                                            <tr>@endif
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
                    {{Form::label('Checkbox2','Complete ofd 295
                            vehicle accident witness statement -this report is for civilian statements
                        only')}}
                </div>
                {{--}} <label class="col-sm-12"><strong><strong>complete ofd 295
                             vehicle accident witness statement</strong>-this report is for civilian statements
                         only</strong></label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a2"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                            file(s)
                        </a>
                        <div id="6a2" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a2' && $attachment->ofd6aid == $accident->ofd6aid )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}</a>
                                                </td>
                                            <tr>@endif
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
                    {{Form::label('Checkbox3','Complete ofd 25a accident
                        intradepartmental communication - driver')}}
                </div>

                {{--}}<label class="col-sm-12"><strong>complete ofd 25a accident
                        intradepartmental communication</strong>-driver</label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a3"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                            file(s)
                        </a>
                        <div id="6a3" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a3' && $attachment->ofd6aid == $accident->ofd6aid )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}</a>
                                                </td>
                                            <tr>@endif
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
                    {{Form::label('Checkbox4','Complete ofd 25b accident
                        intradepartmental communication - Supervisor')}}
                </div>
                {{--}}  <label class="checkbox-inline col-sm-12"><strong>complete ofd 25b accident
                          intradepartmental communication</strong>-supervisor</label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a4"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                            file(s)
                        </a>
                        <div id="6a4" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a4' && $attachment->ofd6aid == $accident->ofd6aid )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}</a>
                                                </td>
                                            <tr>@endif
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
                    {{Form::label('Checkbox5','Complete ofd 25b accident
                        intradepartmental communication - Other Personnel')}}
                </div>
                {{--}}<label class="checkbox-inline col-sm-12"><strong>complete ofd 25c accident
                        intradepartmental communication</strong>-other personnel</label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a5"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                            file(s)
                        </a>
                        <div id="6a5" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a5' && $attachment->ofd6aid == $accident->ofd6aid )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}</a>
                                                </td>
                                            <tr>@endif
                                                @endforeach
                                                @endif
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {{ Form::checkbox('checkbox6', 1, null,['disabled'], ['id' => 'checkbox6', 'class'=>'className','readonly' => 'true']) }}
                    {{Form::label('Checkbox6','Complete ofd 31-ofd
                        damaged, lost, stolen equipment report')}}
                </div>
                {{--}} <label class="checkbox-inline col-sm-12"><strong> complete ofd 31-ofd
                         damaged, lost, stolen equipment report</strong></label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a6"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                            file(s)
                        </a>
                        <div id="6a6" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a6' && $attachment->ofd6aid == $accident->ofd6aid )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}</a>
                                                </td>
                                            <tr>@endif
                                                @endforeach
                                                @endif
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {{ Form::checkbox('checkbox7', 1, null,['disabled'], ['id' => 'checkbox7', 'class'=>'className','readonly' => 'true']) }}
                    {{Form::label('Checkbox7','Complete ofd 127 request for
                        services form')}}
                </div>
                {{--}}  <label class="checkbox-inline col-sm-12"><strong> complete ofd 127 request for
                          services form</strong></label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a7"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                            file(s)
                        </a>
                        <div id="6a7" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a7' && $attachment->ofd6aid == $accident->ofd6aid )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}</a>
                                                </td>
                                            <tr>@endif
                                                @endforeach
                                                @endif
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {{ Form::checkbox('checkbox8', 1, null,['disabled'], ['id' => 'checkbox8', 'class'=>'className','readonly' => 'true']) }}
                    {{Form::label('Checkbox8','Complete dr 41 state
                            of nebraska dmv vehicle accident report')}}
                </div>
                {{--}} <label class="checkbox-inline col-sm-12"><strong><strong> complete dr 41 state
                             of nebraska dmv vehicle accident report</strong></strong></label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a8"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                            file(s)
                        </a>
                        <div id="6a8" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a8' && $attachment->ofd6aid == $accident->ofd6aid )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}</a>
                                                </td>
                                            <tr>@endif
                                                @endforeach
                                                @endif
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {{ Form::checkbox('checkbox9', 1, null,['disabled'], ['id' => 'checkbox9', 'class'=>'className','readonly' => 'true']) }}
                    {{Form::label('Checkbox9','Miscellaneous Documents')}}
                </div>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a9"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                            file(s)
                        </a>
                        <div id="6a9" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a9' && $attachment->ofd6aid == $accident->ofd6aid )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}</a>
                                                </td>
                                            <tr>@endif
                                                @endforeach
                                                @endif
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 form-group">
                    {{ form::checkbox('calllaw', 1, null, ['disabled'],['id' => 'calllaw', 'class'=>'classname', 'readonly' => 'true']) }}
                    <label><strong>
                            Call law department
                            investigator</strong>- call 444-5131- request report be faxed to
                        swd fax # 444-6378. you can
                        leave a message with rig # address of incident, date, time and
                        rb#</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    {{ form::checkbox('daybook', 1, null,['disabled'], ['id' => 'daybook', 'class'=>'classname']) }}
                    <label><strong>
                            Enter in company day
                            book</strong></label>
                </div>
            </div>
        </div>
    </div>

    {!! form::close() !!}
    <div class="panel panel-default">
        <div class="panel-body">
            @if($accident->captainid == Auth::user()->id ||
            $accident->battalionchiefid == Auth::user()->id ||
            $accident->aconduty == Auth::user()->id || Auth::user()->roleid == 1)
                <div class="titleBox">
                    <label>Comments </label>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => ['comments.store'],]) !!}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-group" style="width:100%; position:relative">
                                {{ Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Add your comment', 'rows' => '4']) }}
                            </div>
                            {{ Form::hidden('applicationtype', '6A') }}
                            {{ Form::hidden('applicationid', $accident->ofd6aid) }}
                            {{ Form::checkbox('isvisible', 1, null, ['id' => 'daybook', 'class'=>'className']) }}
                            <label>
                                <strong> Visible to applicant</strong>
                            </label>
                            <div class="col-sm-12" align="center">
                                <div class="col-sm-4">
                                    {{ Form::submit('Post Comment', array('class' => 'btn btn-block btn-primary')) }}
                                </div>
                                @if($accident->captainid == Auth::user()->id && $accident->applicationstatus == 2 ||
                                $accident->battalionchiefid == Auth::user()->id&&$accident->applicationstatus == 3 ||
                                $accident->aconduty == Auth::user()->id&&$accident->applicationstatus == 4 || Auth::user()->roleid == 1)
                                    <div class="col-sm-4">
                                        <a href="{{ url('/accidents/'.$accident->ofd6aid .'/Approve') }}"
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
                            @if(($cm->applicationid == $accident->ofd6aid && $cm->applicationtype == '6A')&&
                            (($accident->driverid == Auth::user()->id && $cm->isvisible == 1) ||
                            $accident->captainid == Auth::user()->id ||
                            $accident->battalionchiefid == Auth::user()->id ||
                            $accident->aconduty == Auth::user()->id || Auth::user()->roleid == 1))
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
                    <a href="{{ url('/accidents/'.$accident->ofd6aid .'/Reject') }}"
                       class="btn btn-success">Yes</a>
                    <button type="button" class=" btn btn-danger" data-dismiss="modal" aria-label="">No</button>


                </div>

            </div>
        </div>
    </div>

@stop
