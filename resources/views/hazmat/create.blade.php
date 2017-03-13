@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('hazmat.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('hazmat.create') }}">OFD 6C Hazmat</a></li>
        <li class="active">New Form</li>
    </ol>
@endsection
@section('content')
    {!! Form::open(['method' => 'POST', 'route' => ['hazmat.store'], 'files' => true,]) !!}

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
    <div class="navya">
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
                                    <h3><strong>HAZARDOUS MATERIAL EXPOSURE REPORTING INSTRUCTIONS</strong></h3>
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
                        <div class="col-sm-4 form-group">
                            {!! Form::label('employeeid', 'Employee ID #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('employeeid', old('employeeid'), ['class' => 'form-control', 'placeholder'=>'Enter Employee ID', 'required'=>'required'])!!}
                                <p class="help-block"></p>
                                @if($errors->has('employeeid'))
                                    <p class="help-block">
                                        {{ $errors->first('employeeid') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('employeename', 'Exposed Employee Name', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('employeename', old('employeename'), ['class' => 'form-control', 'placeholder'=>'Enter Employee Name', 'required'=>'required'])!!}
                                <p class="help-block"></p>
                                @if($errors->has('employeename'))
                                    <p class="help-block">
                                        {{ $errors->first('employeename') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('dateofexposure', 'Date of Exposure',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') )!!}
                            <div class="col-sm-6 ">
                                {!! Form::text('dateofexposure', old('dateofexposure'), array('id'=>'datepicker12','class' => 'form-control datepicker1', 'placeholder' => 'YYYY-MM-DD','required' => 'required'))!!}
                                {!! Form::text('dateofexposure', old('dateofexposure'), array('style'=>'display:none;','id'=>'datepicker32','class' => 'form-control datepicker', 'placeholder' => 'YYYY-MM-DD','required' => 'required'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('dateofexposure'))
                                    <p class="help-block">
                                        {{ $errors->first('dateofexposure') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            {!! Form::label('primaryidconumber', 'Primary IDCO OFD ID#', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('primaryidconumber', old('primaryidconumber'), ['class' => 'form-control','placeholder'=>'Enter IDCO Badge ID', 'required'=>'required'])!!}
                                <p class="help-block"></p>
                                @if($errors->has('primaryidconumber'))
                                    <p class="help-block">
                                        {{ $errors->first('primaryidconumber') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('epcrincidentnum', 'EPCR Incident#', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('epcrincidentnum', old('epcrincidentnum'), ['class' => 'form-control','placeholder'=>'Enter EPCR Incident Num', 'required'=>'required'])!!}
                                <p class="help-block"></p>
                                @if($errors->has('epcrincidentnum'))
                                    <p class="help-block">
                                        {{ $errors->first('epcrincidentnum') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('frmsincidentnum', 'FRMS Incident#', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('frmsincidentnum', old('frmsincidentnum'), ['class' => 'form-control','placeholder'=>'Enter FRMS Incident Num', 'required'=>'required'])!!}
                                <p class="help-block"></p>
                                @if($errors->has('frmsincidentnum'))
                                    <p class="help-block">
                                        {{ $errors->first('frmsincidentnum') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            {!! Form::label('assignment', 'Assignment', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('assignment', old('assignment'), ['class' => 'form-control', 'required'=>'required'])!!}
                                <p class="help-block"></p>
                                @if($errors->has('assignment'))
                                    <p class="help-block">
                                        {{ $errors->first('assignment') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('shift', 'Shift', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                            <div class="col-sm-6">
                                {!! Form::select('shift',
                                ['A' => 'A',
                                 'B' => 'B',
                                 'C' => 'C',
                                 'DIV' => 'DIV'],
                                 ['class' => 'form-control', 'required'=>'required'])!!}
                                <p class="help-block"></p>
                                @if($errors->has('shift'))
                                    <p class="help-block">
                                        {{ $errors->first('shift') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div><h4 style="padding-left:12px;"><strong>Please perform following steps in case of Exposure</strong></h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-12">
                        {{ Form::checkbox('contactcorvel', 1, null, ['id' => 'contactcorvel', 'class'=>'className']) }}
                        {{Form::label('contactcorvel','Contact CorVel Enterprise Comp @ 877-764-3574.
                                Tell them you have a Hazardous Material Exposure and the call is for reporting ONLY.')}}
                    </div>
                </div>
            </div>
            <div class="col-sm-12 form-group">
                {!! Form::label('corvelid', 'Once you have completed the call, record CorVel Claim #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-4">
                    {!! Form::text('corvelid', old('corvelid'), ['class' => 'form-control','placeholder'=>'Enter Corvel Claim ID', 'required'=>'required'])!!}
                    <p class="help-block"></p>
                    @if($errors->has('corvelid'))
                        <p class="help-block">
                            {{ $errors->first('corvelid') }}
                        </p>
                    @endif
                </div>
            </div>


            <div class="col-sm-12 form-group">
                <label class="col-sm-4">
                    <strong>Fill out OFD-025 Hazmat Exposure Report form</strong>
                </label>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                           href="{{asset('Fillable PDFs\Hazmat Module\(Exposure PDF - Updated OFD 006d) OFD 025 - HazMat Exposure Report.pdf')}}"
                           download="(Exposure PDF - Updated OFD 006d) OFD 025 - HazMat Exposure Report">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD025"
                                                                                           style="display: none;">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger" align="left">
                                {{Form::label('exposurehazmat','Do you have any symptoms of illness or injury and require
                                   treatment? (In case of Injury, please fill OFD - 6 IOD Application)     ')}}

                                {!! Form::select('exposurehazmat',[
                                  'No' => 'No',
                                  'Yes' => 'Yes'],
                                array('class' => 'form-control'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('exposurehazmat'))
                                    <p class="help-block">
                                        {{ $errors->first('exposurehazmat') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <label class="col-sm-5"></label>
            <div class="btn-bottom ">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    Submit
                </button>

                <a href="{{ route('hazmat.index') }}" class="btn btn-danger">Cancel</a>
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