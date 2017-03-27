@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('limitedduties.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('limitedduties.index') }}">Employee Limited Duty</a></li>
        <li class="active">New Request</li>
    </ol>
@endsection

@section('content')
    {!! Form::open(['method' => 'POST', 'route' => ['limitedduties.store'], 'files' => true,]) !!}
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
                    <div class="col-sm-6 form-group">
                        {!! Form::label('employeename', 'Employee Name',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('employeename', old('employeename'), array('class'=>'form-control'))!!}
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
                            {!! Form::text('employeeid', old('employeeid'), array('class'=> 'form-control','placeholder'=>'Enter Badge ID'))!!}
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
                            {!! Form::text('fromdate', old('fromdate'), array('class' => 'form-control datepicker', 'placeholder' => 'MM-DD-YYYY','required' => 'required'))!!}
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
                            {!! Form::text('todate', old('todate'), array('class' => 'form-control datepicker', 'placeholder' => 'MM-DD-YYYY','required' => 'required'))!!}
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
                            {!! Form::text('corvelid', old('corvelid'), array('class' => 'form-control', 'placeholder' => 'Enter CorVel ID Here'))!!}
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
                            {!! Form::text('incidentid', old('incidentid'), array('class' => 'form-control','placeholder'=>'Enter Incident Num'))!!}
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
                            {!! Form::select('incidenttype', ['ofd6' => 'IOD',
                            'ofd6a' => 'Accident',
                            'ofd6b' => 'Biological Exposure',
                            'ofd6c' => 'HazMat Exposure'], null,
                            ['placeholder' => 'Select One'],'required',
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
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {!! Form::label('comments', 'Comments', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                </div>
                <div class="col-sm-12 ">
                    {!! Form::textarea('comments', old('comments'), array('class' => 'form-control','placeholder'=>'Enter Comments'))!!}
                    <p class="help-block"></p>
                    @if($errors->has('comments'))
                        <p class="help-block">
                            {{ $errors->first('comments') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="col-sm-5"></label>
                <div class="btn-bottom">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        Save
                    </button>
                    <a href="{{ route('limitedduties.index') }}" class="btn btn-danger">Cancel</a>
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
                        Are you sure you want to Submit?
                    </div>
                    <div class="modal-footer">
                        {!! Form::submit('Yes',['class' => 'btn btn-success']) !!}
                        <button type="button" class=" btn btn-danger" data-dismiss="modal" aria-label="">No</button>


                    </div>

                </div>
            </div>
        </div>

        {!! Form::close() !!}
        @stop
    </div>