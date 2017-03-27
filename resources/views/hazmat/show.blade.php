@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('hazmat.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('hazmat.index') }}">OFD 6C Hazmat</a></li>
        <li class="active">Edit OFD 6C Form {{ $hazmat->ofd6cid }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($hazmat,['method' => 'PUT']) !!}
    <style>
        table {
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
        }
    </style>

    @if($hazmat->employeeid == Auth::user()->id || ($hazmat->primaryidconumber == Auth::user()->id && $hazmat->applicationstatus == 2) || Auth::user()->roleid == 1)
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
                            {!! Form::label('employeeid', 'Employee ID#', array('style'=>'padding-top:7px;', 'class' => 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('employeeid', old('employeeid'), ['disabled'],array('class'=>'form-control'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('employeeid'))
                                    <p class="help-block">
                                        {{ $errors->first('employeeid') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('employeename', 'Exposed Employee Name', array('style'=>'padding-top:7px;', 'class' => 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('employeename', old('employeename'), ['disabled'],array('class'=>'form-control'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('employeename'))
                                    <p class="help-block">
                                        {{ $errors->first('employeename') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('dateofexposure', 'Date of Exposure', array('style'=>'padding-top:7px;', 'class' => 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('dateofexposure', old('dateofexposure'), ['disabled'],array('id'=>'datepicker1','class' => 'form-control datepicker', 'placeholder' => 'YYYY-MM-DD'))!!}
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
                            {!! Form::label('primaryidconumber', 'Primary IDCO OFD ID#', array('style'=>'padding-top:7px;', 'class' => 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('primaryidconumber', old('primaryidconumber'), ['disabled'],array('class'=>'form-control'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('primaryidconumber'))
                                    <p class="help-block">
                                        {{ $errors->first('primaryidconumber') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('epcrincidentnum', 'EPCR Incident#', array('style'=>'padding-top:7px;', 'class' => 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('epcrincidentnum', old('epcrincidentnum'), ['disabled'],array('class'=>'form-control'))!!}
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
                                {!! Form::text('frmsincidentnum', old('frmsincidentnum'), ['disabled'],array('class'=>'form-control'))!!}
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
                            {!! Form::label('assignment', 'Assignment', array('style'=>'padding-top:7px;', 'class' => 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('assignment', old('assignment'), ['disabled'],array('class'=>'form-control'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('assignment'))
                                    <p class="help-block">
                                        {{ $errors->first('assignment') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('shift', 'Shift', ['class'=> 'col-sm-4 control-label'] ) !!}
                            <div class="col-sm-6">
                                {!! Form::text('shift', old('shift'), ['disabled'],array('class'=>'form-control'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('shift'))
                                    <p class="help-block">
                                        {{ $errors->first('shift') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            {{ Form::checkbox('contactcorvel', 1, null,['disabled'], ['id' => 'contactcorvel', 'class'=>'className','readonly' => 'true']) }}
                            <label>
                                <strong>Contact CorVel Enterprise Comp @ 877-764-3574.
                                    Tell them you have a Hazardous Material Exposure and the call is for reporting ONLY.
                                </strong>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            {!! Form::label('corvelid', 'Once you have completed the call, record CorVel Claim #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                            <div class="col-sm-4">
                                {!! Form::text('corvelid', old('corvelid'), ['disabled'], array('class'=>'form-control'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('corvelid'))
                                    <p class="help-block">
                                        {{ $errors->first('corvelid') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        {{ Form::checkbox('checkbox1', 1, null,['disabled'], ['id' => 'checkbox1', 'class'=>'className','readonly' => 'true']) }}
                        {{Form::label('Checkbox1','Fill out OFD-025 Hazmat Exposure Report form')}}
                        {{--}}<label class="checkbox-inline col-sm-12">
                            <strong>Fill out OFD-025 Hazmat Exposure Report form</strong>
                        </label>--}}
                    </div>
                    <br>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                               data-target="#6c"><i class="fa fa-eye" aria-hidden="true"></i> View Previously
                                uploaded
                                file(s)
                            </a>

                            <div id="6c" class="collapse">

                                <table class="table table-striped">
                                    <tr>
                                        <th> File Name</th>
                                        <th> File Uploaded At</th>
                                    </tr>

                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '6c' && $attachment->ofd6cid == $hazmat->ofd6cid)
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
                    <div class="col-sm-12">
                        {{ Form::checkbox('checkbox2', 1, null,['disabled'], ['id' => 'checkbox2', 'class'=>'className','readonly' => 'true']) }}
                        {{Form::label('Checkbox2','Miscellaneous Documents')}}
                    </div>
                    <br>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                               data-target="#6c1"><i class="fa fa-eye" aria-hidden="true"></i> View Previously
                                uploaded
                                file(s)
                            </a>

                            <div id="6c1" class="collapse">

                                <table class="table table-striped">
                                    <tr>
                                        <th> File Name</th>
                                        <th> File Uploaded At</th>
                                    </tr>

                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '6c1' && $attachment->ofd6cid == $hazmat->ofd6cid)
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
                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger" align="left">
                                    {{Form::label('If an employee receives an injury or illness from this incident,
                            the employee shall complete an OFD6 and designate whether treatment is being requested in the OFD-25 IOD.')}}

                                    {{--{!! Form::text('exposurehazmat', old('exposurehazmat'), ['disabled'], array('class'=>'form-control'))!!}--}}
                                    {{--<p class="help-block"></p>--}}
                                    {{--@if($errors->has('exposurehazmat'))--}}
                                    {{--<p class="help-block">--}}
                                    {{--{{ $errors->first('exposurehazmat') }}--}}
                                    {{--</p>--}}
                                    {{--@endif--}}
                                </div>
                            </div>
                        </div>
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
                        <a href="{{ route('hazmat.index') }}" class="btn btn-default">Return</a>
                    </div>
                </div>

            </div>
        </div>
        </div>

        {!! Form::close() !!}

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-12">
                        @if($hazmat->primaryidconumber == Auth::user()->id && $hazmat->applicationstatus == 2 ||$hazmat->applicationstatus == 3 ||$hazmat->applicationstatus == 4)
                            <div class="col-sm-12 panel-heading" align="center">
                                <a href="{{ url('/hazmat/'. $hazmat->ofd6cid.'/Approve') }}"
                                   class="btn btn-success">Approve</a>
                                <a href="{{ url('/hazmat/'. $hazmat->ofd6cid.'/Reject') }}"
                                   class="btn btn-danger">Reject</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

@stop

