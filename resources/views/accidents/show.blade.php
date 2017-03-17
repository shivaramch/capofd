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
    @if($accident->driverid == Auth::user()->id ||
    ($accident->captainid == Auth::user()->id && $accident->applicationstatus == 2) ||
    ($accident->battalionchiefid == Auth::user()->id && $accident->applicationstatus == 3) ||
    ($accident->aconduty == Auth::user()->id && $accident->applicationstatus == 4) ||
    Auth::user()->roleid == 1)
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
                                    <h3><strong>vehicle accident report tracking document (ofd-6a)</strong></h3>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h5><i><strong>issue date: 9/1/16</strong></i></h5>
                            </div>
                            <div class="col-md-2">
                                <h5><i><strong>effective date: 9/1/16</strong></i></h5>
                            </div>
                            <div class="col-md-12">
                                <h5><i><strong>amends, replaces, rescinds: replaces ofd-6a (july 2016) </strong></i>
                                </h5>
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
                                    refer to sop adm 3-3 fire apparatur/vehicle accident investigation
                                    <br>
                                    complete all forms and forward via chain-of-command within 48 hours
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            {!! form::label('accidentdate', 'date of accident:',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') )!!}
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
                            {!! form::label('driverid', 'driver id#', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
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
                            {!! form::label('drivername', 'driver name',array( 'style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
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
                            {!! form::label('frmsincidentnum', 'frms incident #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
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
                            {!! form::label('assignmentaccident', 'assignment', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
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
                            {!! form::label('apparatus', 'apparatus', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
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
                            {!! form::label('captainid', 'captain #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
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
                            {!! form::label('battalionchiefid', 'battalion chief #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
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
                            {!! form::label('aconduty', 'assistant chief #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
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
                            <div class="col-md-12">
                                <strong>
                                    b/c shall ensure all reports are properly completed and forwarded to safety officer
                                    within 24 hours of accident.
                                    <br>
                                    police report is required on all city vehicles involved in an accident or property
                                    damage whether on public streets, private property, or at the fire station
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
                        <h4 style="text-align:left;"><u><strong>accident checklist :</strong></u></h4>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ form::checkbox('commemail', 1, null,['disabled'], ['id' => 'commemail', 'class'=>'classname','readonly' => 'true']) }}
                            <label><strong>generate ofd 025
                                    intradepartmental communication</strong>-email to <a
                                        href="omafaccident_ofd25@cityofomaha.org"> omafaccident_ofd25@cityofomaha
                                    .org </a>
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="checkbox-inline col-sm-12">
                        <strong>complete lrs 101 city of omaha accident report-include rb#, officer name,
                            badge#</strong>
                    </label>
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
                                        <th> file name</th>
                                        <th> file uploaded at</th>
                                    </tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '6a1' && $attachment->createdby ==  auth::user()->id && $attachment->ofd6aid == $accident->ofd6aid )
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
                    <label class="col-sm-12"><strong><strong>complete ofd 295
                                vehicle accident witness statement</strong>-this report is for civilian statements
                            only</strong></label>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                               data-target="#6a2"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                                file(s)
                            </a>
                            <div id="6a2" class="collapse">
                                <table class="table table-striped">
                                    <tr>
                                        <th> file name</th>
                                        <th> file uploaded at</th>
                                    </tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '6a2' && $attachment->createdby ==  auth::user()->id && $attachment->ofd6aid == $accident->ofd6aid )
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
                    <label class="col-sm-12"><strong>complete ofd 25a accident
                            intradepartmental communication</strong>-driver</label>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                               data-target="#6a3"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                                file(s)
                            </a>
                            <div id="6a3" class="collapse">
                                <table class="table table-striped">
                                    <tr>
                                        <th> file name</th>
                                        <th> file uploaded at</th>
                                    </tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '6a3' && $attachment->createdby ==  auth::user()->id && $attachment->ofd6aid == $accident->ofd6aid )
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
                    <label class="checkbox-inline col-sm-12"><strong>complete ofd 25b accident
                            intradepartmental communication</strong>-supervisor</label>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                               data-target="#6a4"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                                file(s)
                            </a>
                            <div id="6a4" class="collapse">
                                <table class="table table-striped">
                                    <tr>
                                        <th> file name</th>
                                        <th> file uploaded at</th>
                                    </tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '6a4' && $attachment->createdby ==  auth::user()->id && $attachment->ofd6aid == $accident->ofd6aid )
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
                    <label class="checkbox-inline col-sm-12"><strong>complete ofd 25c accident
                            intradepartmental communication</strong>-other personnel</label>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                               data-target="#6a5"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                                file(s)
                            </a>
                            <div id="6a5" class="collapse">
                                <table class="table table-striped">
                                    <tr>
                                        <th> file name</th>
                                        <th> file uploaded at</th>
                                    </tr>
                                    <tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '6a5' && $attachment->createdby ==  auth::user()->id && $attachment->ofd6aid == $accident->ofd6aid )
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
                    <label class="checkbox-inline col-sm-12"><strong> complete ofd 31-ofd
                            damaged, lost, stolen equipment report</strong></label>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                               data-target="#6a6"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                                file(s)
                            </a>
                            <div id="6a6" class="collapse">
                                <table class="table table-striped">
                                    <tr>
                                        <th> file name</th>
                                        <th> file uploaded at</th>
                                    </tr>
                                    <tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '6a6' && $attachment->createdby ==  auth::user()->id && $attachment->ofd6aid == $accident->ofd6aid )
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
                    <label class="checkbox-inline col-sm-12"><strong> complete ofd 127 request for
                            services form</strong></label>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                               data-target="#6a7"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                                file(s)
                            </a>
                            <div id="6a7" class="collapse">
                                <table class="table table-striped">
                                    <tr>
                                        <th> file name</th>
                                        <th> file uploaded at</th>
                                    </tr>
                                    <tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '6a7' && $attachment->createdby ==  auth::user()->id && $attachment->ofd6aid == $accident->ofd6aid )
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
                    <label class="checkbox-inline col-sm-12"><strong><strong> complete dr 41 state
                                of nebraska dmv vehicle accident report</strong></strong></label>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                               data-target="#6a8"><i class="fa fa-eye" aria-hidden="true"></i> view previously uploaded
                                file(s)
                            </a>
                            <div id="6a8" class="collapse">
                                <table class="table table-striped">
                                    <tr>
                                        <th> file name</th>
                                        <th> file uploaded at</th>
                                    </tr>
                                    <tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '6a8' && $attachment->createdby ==  auth::user()->id && $attachment->ofd6aid == $accident->ofd6aid )
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
                                call law department
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
                                enter in company day
                                book</strong></label>
                    </div>
                </div>
                @else
                    <div class="panel-body">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger" align="center">
                                        <label>
                                            You are not authorized to view this form
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-sm-12 panel-heading" align="center">
                    <div class="btn-bottom ">
                        <a href="{{ route('accidents.index') }}" class="btn btn-default">return</a>
                    </div>
                </div>
            </div>
        </div>

        {!! form::close() !!}
@stop