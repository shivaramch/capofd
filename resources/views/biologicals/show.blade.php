@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('biologicals.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('biologicals.index') }}">OFD 6B Biologicals</a></li>
        <li class="active">View OFD 6B Form {{ $biological->ofd6bid }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($biological,['method' => 'PUT', 'route' => ['biologicals.update', $biological->ofd6bid], 'files' => true,])!!}
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
    @if($biological->employeeid == Auth::user()->id ||
    ($biological->primaryidconumber == Auth::user()->id && $biological->applicationstatus == 2) ||
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
                                    <h3><strong>Biological Exposure Tracking Document (OFD-006B)</strong></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-4 form-group">
                    {!! Form::label('exposedemployeename', 'Exposed Employee Name',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('exposedemployeename', old('exposedemployeename'),['disabled'], array('class'=>'form-control', 'readonly' => 'true'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('exposedemployeename'))
                            <p class="help-block">
                                {{ $errors->first('exposedemployeename') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('dateofexposure', 'Date of Exposure', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('dateofexposure', old('dateofexposure'),['disabled'], array('id'=>'datepicker', 'placeholder' => 'YYYY-MM-DD','required' => 'required'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('dateofexposure'))
                            <p class="help-block">
                                {{ $errors->first('dateofexposure') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('employeeid', 'Employee ID#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('employeeid', old('employeeid'), ['disabled'], array('class'=> 'form-control','placeholder'=>'Enter Badge ID', 'readonly' => 'true'))!!}
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
                <div class="col-sm-4 form-group">
                    {!! Form::label('assignmentbiological', 'Assignment', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('assignmentbiological', old('assignmentbiological'),['disabled'],array('class' => 'form-control', 'readonly' => 'true'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('assignmentbiological'))
                            <p class="help-block">
                                {{ $errors->first('assignmentbiological') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="col-sm-4 form-group">
                    {!! Form::label('shift', 'Shift', ['class'=> 'col-sm-4 control-label'] ) !!}
                    <div class="col-sm-6">
                        {!! Form::text('shift', old('shift'),['disabled'],array('class' => 'form-control', 'readonly' => 'true'))!!}

                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('epcrincidentnum', 'EPCR Incident#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('epcrincidentnum', old('epcrincidentnum'),['disabled'], array('class' => 'form-control','placeholder'=>'Enter Incident Num', 'readonly' => 'true'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('epcrincidentnum'))
                            <p class="help-block">
                                {{ $errors->first('epcrincidentnum') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    {!! Form::label('primaryidconumber', 'Primary IDCO #', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('primaryidconumber', old('primaryidconumber'),['disabled'], array('class' => 'form-control','placeholder'=>'Enter IDCO Badge ID', 'readonly' => 'true'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('primaryidconumber'))
                            <p class="help-block">
                                {{ $errors->first('primaryidconumber') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('frmsincidentnum', 'FRMS Incident #', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('frmsincidentnum', old('frmsincidentnum'),['disabled'], array('class' => 'form-control','placeholder'=>'Enter FRMS Num', 'readonly' => 'true'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('frmsincidentnum'))
                            <p class="help-block">
                                {{ $errors->first('frmsincidentnum') }}
                            </p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div><h4 style="padding-left:12px;"><strong>Please Select the Type of Exposure</strong></h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-6">
                            {{ Form::radio('exposure', 0 , null, ['id'=>'exposure', 'class' => 'className' ]) }}
                            {{ Form::label('exposure', 'True Exposure') }}

                            {{ Form::radio('exposure',1 , null, ['id'=>'exposure', 'class' => 'className' ]) }}
                            {{ Form::label('exposure', 'Potential Exposure') }}
                        </div>
                    </div>
                </div>
                <div id="Exposure0" class="desc" style="display: none;">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('truedecontaminate', 1, null, ['id' => 'truedecontaminate', 'class'=>'className' , 'disabled' => "disabled"]) }}
                            {{Form::label('truedecontaminate','Decontaminate self- wash, flush as soon as possible  ')}}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('confirmsource', 1, null, ['id'=>'confirmsource', 'class' => 'className','disabled' => "disabled" ]) }}
                            {{ Form::label('confirmsource', 'Confirm Source - Patient blood draw with OUCH Nurse') }}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{Form::label('trueofd184','Complete OFD 184')}}
                        </div>
                        <div class="col-sm-12 form-group well well-sm">
                            <div class="col-sm-4">
                                <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                                   data-target="#6b1"><i class="fa fa-eye" aria-hidden="true"></i> View
                                    Previously
                                    uploaded
                                    file(s)
                                </a>

                                <div id="6b1" class="collapse">

                                    <table class="table table-striped">
                                        <tr>
                                            <th> File Name</th>
                                            <th> File Uploaded At</th>
                                        </tr>
                                        @if(count($attachments) > 0)
                                            @foreach($attachments as $attachment)
                                                @if($attachment->attachmenttype == '6b1' && $attachment->createdby ==  Auth::user()->id && $attachment->ofd6bid == $biological->ofd6bid )
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
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('bloodreport', 1, null, ['id' => 'bloodreport', 'class'=>'className','disabled' => "disabled" ]) }}
                            {{Form::label('bloodreport','Report for blood draw as directed by OUCH Nurse')}}

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('exposuretab', 1, null, ['id' => 'exposuretab', 'class'=>'className','disabled' => "disabled" ]) }}
                            {{Form::label('exposuretab','Complete Exposure tab in ePCR ')}}

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('truebagtag', 1, null, ['id' => 'truebagtag', 'class'=>'className','disabled' => "disabled" ]) }}
                            {{Form::label('truebagtag','Bag & Tag clothing if applicable - send email to PSS with pick-up location ')}}

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('notifypss', 1, null, ['id' => 'notifypss', 'class'=>'className','disabled' => "disabled" ]) }}
                            {{Form::label('notifypss','Notify the on-duty PSS via phone at 402-660-1060 ')}}

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('trueppe', 1, null, ['id' => 'trueppe', 'class'=>'className','disabled' => "disabled" ]) }}
                            {{Form::label('trueppe','PPE has been cleaned per SOP SWD 1-0  ')}}

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('truedocumentdaybook', 1, null, ['id' => 'truedocumentdaybook', 'class'=>'className','disabled' => "disabled" ]) }}
                            {{Form::label('truedocumentdaybook','Document in Company Day Book and on your Personnel Record')}}

                        </div>
                    </div>

                </div>

                <div id="Exposure1" class="desc" style="display: none;">

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('potdecontaminate', 1, null, ['id' => 'potdecontaminate', 'class'=>'className','disabled' => "disabled" ]) }}
                            {{Form::label('potdecontaminate','Decontaminate self- wash, flush as soon as possible  ')}}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('potbagtag', 1, null, ['id' => 'potbagtag', 'class'=>'className','disabled' => "disabled" ]) }}
                            {{Form::label('potbagtag','Bag & Tag clothing if applicable - send email to PSS with pick-up location')}}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{Form::label('potofd184','Complete OFD 184')}}
                        </div>
                        <div class="col-sm-12 form-group well well-sm">

                            <div class="col-sm-4">
                                <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                                   data-target="#6b2"><i class="fa fa-eye" aria-hidden="true"></i> View Previously
                                    uploaded
                                    file(s)
                                </a>

                                <div id="6b2" class="collapse">

                                    <table class="table table-striped">
                                        <tr>
                                            <th> File Name</th>
                                            <th> File Uploaded At</th>
                                        </tr>

                                        @if(count($attachments) > 0)
                                            @foreach($attachments as $attachment)
                                                @if($attachment->attachmenttype == '6b2' && $attachment->createdby ==  Auth::user()->id && $attachment->ofd6bid == $biological->ofd6bid )
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

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('potppe', 1, null, ['id' => 'potppe', 'class'=>'className','disabled' => "disabled" ]) }}
                            {{Form::label('potppe','PPE has been cleaned per SOP SWD 1-0')}}

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('potdocumentdaybook', 1, null, ['id' => 'potdocumentdaybook', 'class'=>'className','disabled' => "disabled" ]) }}
                            {{Form::label('potdocumentdaybook','Document in Company Day Book and on your Personnel Record   ')}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger" align="left">
                                {{Form::label('exposureinjury','Do you have any symptoms of illness or injury and require
                                   treatment? (In case of Injury, please fill OFD - 6 IOD Application)  :  ')}}

                                <strong> {{ $biological->exposureinjury}} </strong>

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
                        <a href="{{ route('biologicals.index') }}" class="btn btn-default">Return</a>
                    </div>
                </div>
            </div>
            @if($biological->primaryidconumber == Auth::user()->id && $biological->applicationstatus == 2)
                <div class="col-sm-12 panel-heading" align="center">
                    {!! Form::submit('Approve',['class' => 'btn btn-success']) !!}
                    {!! Form::submit('Reject',['class' => 'btn btn-danger']) !!}
                </div>
            @endif


            {!! Form::close() !!}
            @stop

            @section('javascript')

                <script src="{{ ('js/extensions/cookie') }}/bootstrap-table-cookie.js"></script>
                <script src="{{ ('js/extensions/mobile') }}/bootstrap-table-mobile.js"></script>

                <script src="{{ ('js/export') }}/bootstrap-table-export.js"></script>
                <script src="{{ ('js/export') }}/tableExport.js"></script>
                <script src="{{ ('js/export') }}/jquery.base64.js"></script>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $("input[name$='exposure']").click(function () {
                            var test = $(this).val();

                            $("div.desc").hide();
                            $("#Exposure" + test).show();
                        });
                    });
                </script>
        </div>

@endsection