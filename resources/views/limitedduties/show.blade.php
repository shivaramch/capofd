@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('limitedduties.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('limitedduties.index') }}">Limited Duty Information</a></li>
        <li class="active">View Employee Limited Duty Information {{ $limitedduty->limiteddutyid }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($limitedduty,['method' => 'PUT', 'route' => ['limitedduties.update', $limitedduty->limiteddutyid], 'files' => true,])!!}
    <input type="hidden" name="_token" value="{!!  'csrf_token()' !!}">
    {{ csrf_field() }}
    <style>
        #padtop {
            padding-top: 7px;
        }

        table {
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
        }
    </style>
    {{--@if($limitedduty->employeeid == Auth::user()->id ||--}}
    {{--($limitedduty->primaryidconumber == Auth::user()->id && $biological->applicationstatus == 2) ||--}}
    {{--Auth::user()->roleid == 1)--}}
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
                                <h3><strong>Employee Limited Duty Information</strong></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="panel-body">
            <div class="form-horizontal">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        {!! Form::label('employeename', 'Employee Name',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('employeename', old('employeename'),['disabled'], array('class'=>'form-control'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('employeename'))
                                <p class="help-block">
                                    {{ $errors->first('employeename') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        {!! Form::label('employeeid', 'Employee ID#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('employeeid', old('employeeid'),['disabled'], array('class'=> 'form-control','placeholder'=>'Enter Badge ID'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('employeeid'))
                                <p class="help-block">
                                    {{ $errors->first('employeeid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        {!! Form::label('fromdate', 'From Date', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('fromdate', old('fromdate'),['disabled'], array('id'=>'datepicker','class' => 'form-control datepicker', 'placeholder' => 'MM-DD-YYYY','required' => 'required'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('fromdate'))
                                <p class="help-block">
                                    {{ $errors->first('fromdate') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        {!! Form::label('todate', 'To Date', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('todate', old('todate'),['disabled'], array('id'=>'datepicker','class' => 'form-control datepicker', 'placeholder' => 'MM-DD-YYYY','required' => 'required'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('todate'))
                                <p class="help-block">
                                    {{ $errors->first('todate') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('corvelid', 'CorVel ID', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('corvelid', old('corvelid'),['disabled'], array('class' => 'form-control', 'placeholder' => 'Enter CorVel ID Here'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('corvelid'))
                                <p class="help-block">
                                    {{ $errors->first('corvelid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('incidentid', 'EPCR Incident#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('incidentid', old('incidentid'),['disabled'], array('class' => 'form-control','placeholder'=>'Enter Incident Num'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('incidentid'))
                                <p class="help-block">
                                    {{ $errors->first('incidentid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('incidenttype', 'Incident Type', ['class'=> 'col-sm-4 control-label'] ) !!}
                        <div class="col-sm-6">
                            {!! Form::text('incidenttype',old('incidenttype'),['disabled'],
                            ['class' => 'form-control']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('incidenttype'))
                                <p class="help-block">
                                    {{ $errors->first('incidenttype') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div><h4 style="padding-left:12px;"><strong>Please Enter Additional Information Below</strong></h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-sm-12">
                <div class="form-group">
                    {{--{{ Form::checkbox('trueofd184', 1, null, ['id'=>'trueofd184', 'class' => 'className' ]) }}--}}
                    {{Form::label('limitedduty','Attachments')}}
                </div>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <label class="input-group-btn">
                                            <span class="btn btn-info"><i class="fa fa-cloud-upload"
                                                                          aria-hidden="true"></i> Upload<input
                                                        type="file" name="limitedduty"
                                                        style="display: none;"
                                                        multiple>
                                            </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                               data-target="#ltdduty"><i class="fa fa-eye" aria-hidden="true"></i> View
                                Previously
                                uploaded
                                file(s)
                            </a>

                            <div id="ltdduty" class="collapse">

                                <table class="table table-striped">
                                    <tr>
                                        <th> File Name</th>
                                        <th> File Uploaded At</th>
                                    </tr>

                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == 'ltdduty' && $attachment->createdby ==  Auth::user()->id && $attachment->limiteddutyid == $limitedduty->limiteddutyid )
                                                <tr>
                                                    <td>
                                                        <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                    </td>
                                                    <td>
                                                        <a>{{$attachment->created_at}}</a>
                                                    </td>
                                                </tr>@endif
                                        @endforeach
                                    @endif

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::label('comments', 'Comments', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                    </div>
                    <div class="col-sm-12 ">
                        {!! Form::textarea('comments', old('comments'), ['disabled'],array('class' => 'form-control','placeholder'=>'Enter Comments'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('comments'))
                            <p class="help-block">
                                {{ $errors->first('comments') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-sm-12 panel-heading" align="center">
                <div class="btn-bottom ">
                    <a href="{{ route('limitedduties.index') }}" class="btn btn-default">Return</a>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop