@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ URL::previous() }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('adminpanel.index') }}">Admin panel</a></li>
        <li><a href="{{ route('fmlas.index') }}">FMLA Information</a></li>
        <li class="active">View Employee FMLA Information {{ $fmla->fmlaid }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($fmla,['method' => 'PUT', 'route' => ['fmlas.update', $fmla->fmlaid], 'files' => true,])!!}
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
                                <h3><strong>Employee FMLA Information</strong></h3>
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
                            {!! Form::text('employeename', old('employeename'), array('class'=>'form-control', 'disabled' => 'disabled'))!!}
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
                            {!! Form::text('employeeid', old('employeeid'),array('class'=>'form-control', 'disabled' => 'disabled'))!!}
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
                            {!! Form::text('fromdate', old('fromdate'), array('id'=>'datepicker','class' => 'form-control datepicker', 'disabled'=>'disabled'))!!}
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
                            {!! Form::text('todate', old('todate'),array('id'=>'datepicker','class' => 'form-control datepicker', 'disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('todate'))
                                <p class="help-block">
                                    {{ $errors->first('todate') }}
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
                    {{Form::label('fmla','Attachments')}}
                </div>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#fmla"><i class="fa fa-eye" aria-hidden="true"></i> View
                            Previously
                            uploaded
                            file(s)
                        </a>
                        <div id="fmla" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == 'fmla')
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}
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
                    {!! Form::label('comments', 'Notes', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                </div>
                <div class="col-sm-12 ">
                    {!! Form::textarea('comments', old('comments'),array('class' => 'form-control','disabled'=>'disabled'))!!}
                    <p class="help-block"></p>
                    @if($errors->has('comments'))
                        <p class="help-block">
                            {{ $errors->first('comments') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 panel-heading" align="center">
                <div class="btn-bottom ">
                    <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop