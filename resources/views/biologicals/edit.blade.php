@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('biologicals.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('biologicals.index') }}">OFD 6B Biologicals</a></li>
        <li class="active">Edit OFD 6B Form {{ $biological->ofd6bid }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($biological,['method' => 'PUT', 'route' => ['biologicals.update', $biological->ofd6bid], 'files' => true,]) !!}
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
    @if(($biological->employeeid == Auth::user()->id &&
    ($biological->applicationstatus == 1 || $biological->applicationstatus == 5)) ||
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
                            {!! Form::label('exposedemployeename', 'Exposed Employee Name',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('exposedemployeename', old('exposedemployeename'), array('class'=>'form-control'))!!}
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
                                {!! Form::text('dateofexposure', old('dateofexposure'), array('id'=>'datepicker','class' => 'form-control datepicker', 'placeholder' => 'YYYY-MM-DD','required' => 'required'))!!}
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
                        <div class="col-sm-4 form-group">
                            {!! Form::label('assignmentbiological', 'Assignment', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('assignmentbiological', old('assignmentbiological'), array('class' => 'form-control'))!!}
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
                                {!! Form::select('shift', ['A' => 'A',
                                'B' => 'B',
                                'C' => 'C',
                                'DIV' => 'DIV'], old('shift'),
                                ['class' => 'form-control']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('shift'))
                                    <p class="help-block">
                                        {{ $errors->first('shift') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('epcrincidentnum', 'EPCR Incident#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('epcrincidentnum', old('epcrincidentnum'), array('class' => 'form-control','placeholder'=>'Enter Incident Num'))!!}
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
                                {!! Form::text('primaryidconumber', old('primaryidconumber'), array('class' => 'form-control','placeholder'=>'Enter IDCO Badge ID'))!!}
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
                                {!! Form::text('frmsincidentnum', old('frmsincidentnum'), array('class' => 'form-control','placeholder'=>'Enter FRMS Num'))!!}
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
                            {{ Form::radio('exposure', 0 , null, ['id'=>'exposure', 'class' => 'className']) }}
                            {{ Form::label('exposure', 'True Exposure') }}

                            {{ Form::radio('exposure',1 , null, ['id'=>'exposure', 'class' => 'className']) }}
                            {{ Form::label('exposure', 'Potential Exposure') }}
                        </div>
                    </div>
                </div>
                <div id="Exposure0" class="desc" style="display: none;">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('truedecontaminate', 1, null, ['id' => 'truedecontaminate', 'class'=>'className']) }}
                            {{Form::label('truedecontaminate','Decontaminate self- wash, flush as soon as possible  ')}}
                            <div class="col-md-12">
                                <div class="alert alert-danger" align="left">
                                    Contamination might be due to soiling or pollution, as by the introduction of blood
                                    or body fluids onto:
                                    <ul type="Disc">
                                        <li>Equipment
                                        </li>
                                        <li>
                                            Clothing
                                        </li>
                                        <li>
                                            PPE
                                        </li>
                                        <li>
                                            Intact Skin
                                        </li>
                                        <li>
                                            Turnout gear
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('confirmsource', 1, null, ['id'=>'confirmsource', 'class' => 'className' ]) }}
                            {{ Form::label('confirmsource', 'Confirm Source - Patient blood draw with OUCH Nurse') }}
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('checkbox1', 1, null, ['id'=>'checkbox1', 'class' => 'className' ]) }}
                            {{Form::label('checkbox1','Complete OFD 184')}}
                        </div>
                        <div class="col-sm-12 form-group well well-sm">
                            <div class="col-sm-4">
                                <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                                   href="{{ asset('Fillable PDFs\Exposure Complete\(Exposure PDF) OFD 184 State Infectious Disease Exposure Report.pdf')}}"
                                   download="(Exposure PDF) OFD 184 State Infectious Disease Exposure Report.pdf">
                                    <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <label class="input-group-btn">
                                            <span class="btn btn-info"><i class="fa fa-cloud-upload"
                                                                          aria-hidden="true"></i> Upload<input
                                                        type="file" name="trueofd184"
                                                        style="display: none;"
                                                        multiple>
                                            </span>
                                    </label>
                                    <input type="text" id="upload-file-info" class="form-control" readonly>
                                </div>
                            </div>
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
                            {{ Form::checkbox('checkbox2', 1, null, ['id'=>'checkbox2', 'class' => 'className' ]) }}
                            {{Form::label('checkbox2','Miscellaneous Documents')}}
                        </div>
                        <div class="col-sm-12 form-group well well-sm">
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <label class="input-group-btn">
                                            <span class="btn btn-info"><i class="fa fa-cloud-upload"
                                                                          aria-hidden="true"></i> Upload<input
                                                        type="file" name="miscbiological1"
                                                        style="display: none;"
                                                        multiple>
                                            </span>
                                    </label>
                                    <input type="text" id="upload-file-info" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                                   data-target="#6b3"><i class="fa fa-eye" aria-hidden="true"></i> View
                                    Previously
                                    uploaded
                                    file(s)
                                </a>

                                <div id="6b3" class="collapse">

                                    <table class="table table-striped">
                                        <tr>
                                            <th> File Name</th>
                                            <th> File Uploaded At</th>
                                        </tr>

                                        @if(count($attachments) > 0)
                                            @foreach($attachments as $attachment)
                                                @if($attachment->attachmenttype == '6b3' && $attachment->createdby ==  Auth::user()->id && $attachment->ofd6bid == $biological->ofd6bid )
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
                            {{ Form::checkbox('bloodreport', 1, null, ['id' => 'bloodreport', 'class'=>'className']) }}
                            {{Form::label('bloodreport','Report for blood draw as directed by OUCH Nurse')}}

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('exposuretab', 1, null, ['id' => 'exposuretab', 'class'=>'className']) }}
                            {{Form::label('exposuretab','Complete Exposure tab in ePCR ')}}

                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('truebagtag', 1, null, ['id' => 'truebagtag', 'class'=>'className']) }}
                            {{Form::label('truebagtag','Bag & Tag clothing if applicable - send email to PSS with pick-up location ')}}

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('notifypss', 1, null, ['id' => 'notifypss', 'class'=>'className']) }}
                            {{Form::label('notifypss','Notify the on-duty PSS via phone at 402-660-1060 ')}}

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('trueppe', 1, null, ['id' => 'trueppe', 'class'=>'className']) }}
                            {{Form::label('trueppe','PPE has been cleaned per SOP SWD 1-0  ')}}

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('truedocumentdaybook', 1, null, ['id' => 'truedocumentdaybook', 'class'=>'className']) }}
                            {{Form::label('truedocumentdaybook','Document in Company Day Book and on your Personnel Record')}}
                        </div>
                    </div>
                </div>
                <div id="Exposure1" class="desc" style="display: none;">

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('potdecontaminate', 1, null, ['id' => 'potdecontaminate', 'class'=>'className']) }}
                            {{Form::label('potdecontaminate','Decontaminate self- wash, flush as soon as possible')}}
                            <div class="col-md-12">
                                <div class="alert alert-danger" align="left">
                                    Contamination might be due to soiling or pollution, as by the introduction of blood
                                    or body fluids onto:
                                    <ul type="Disc">
                                        <li>Equipment
                                        </li>
                                        <li>
                                            Clothing
                                        </li>
                                        <li>
                                            PPE
                                        </li>
                                        <li>
                                            Intact Skin
                                        </li>
                                        <li>
                                            Turnout gear
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('potbagtag', 1, null, ['id' => 'potbagtag', 'class'=>'className']) }}
                            {{Form::label('potbagtag','Bag & Tag clothing if applicable - send email to PSS with pick-up location')}}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('checkbox3', 1, null, ['id'=>'checkbox3', 'class' => 'className' ]) }}
                            {{Form::label('checkbox3','Complete OFD 184')}}
                        </div>
                        <div class="col-sm-12 form-group well well-sm">
                            <div class="col-sm-4">
                                <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                                   href="{{ asset('Fillable PDFs\Exposure Complete\(Exposure PDF) OFD 184 State Infectious Disease Exposure Report.pdf')}}"
                                   download="(Exposure PDF) OFD 184 State Infectious Disease Exposure Report.pdf">
                                    <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <label class="input-group-btn">
                                            <span class="btn btn-info"><i class="fa fa-cloud-upload"
                                                                          aria-hidden="true"></i> Upload<input
                                                        type="file" name="potofd184"
                                                        style="display: none;"
                                                        multiple>
                                            </span>
                                    </label>
                                    <input type="text" id="upload-file-info" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                                   data-target="#6b2"><i class="fa fa-eye" aria-hidden="true"></i> View
                                    Previously
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
                            {{ Form::checkbox('checkbox4', 1, null, ['id'=>'checkbox4', 'class' => 'className' ]) }}
                            {{Form::label('checkbox4','Miscellaneous Documents')}}
                        </div>
                        <div class="col-sm-12 form-group well well-sm">
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <label class="input-group-btn">
                                            <span class="btn btn-info"><i class="fa fa-cloud-upload"
                                                                          aria-hidden="true"></i> Upload<input
                                                        type="file" name="miscbiological2"
                                                        style="display: none;"
                                                        multiple>
                                            </span>
                                    </label>
                                    <input type="text" id="upload-file-info" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                                   data-target="#6b4"><i class="fa fa-eye" aria-hidden="true"></i> View
                                    Previously
                                    uploaded
                                    file(s)
                                </a>

                                <div id="6b4" class="collapse">

                                    <table class="table table-striped">
                                        <tr>
                                            <th> File Name</th>
                                            <th> File Uploaded At</th>
                                        </tr>

                                        @if(count($attachments) > 0)
                                            @foreach($attachments as $attachment)
                                                @if($attachment->attachmenttype == '6b4' && $attachment->createdby ==  Auth::user()->id && $attachment->ofd6bid == $biological->ofd6bid )
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
                            {{ Form::checkbox('potppe', 1, null, ['id' => 'potppe', 'class'=>'className']) }}
                            {{Form::label('potppe','PPE has been cleaned per SOP SWD 1-0')}}

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('potdocumentdaybook', 1, null, ['id' => 'potdocumentdaybook', 'class'=>'className']) }}
                            {{Form::label('potdocumentdaybook','Document in Company Day Book and on your Personnel Record   ')}}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger form-group" align="center">
                                    <div class="col-md-9">
                                        <label>If an employee receives an injury or illness from this incident,
                                            the employee shall complete an OFD6 and designate whether treatment is being
                                            requested in the OFD-25 IOD.</label>
                                    </div>
                                    {{--<div class="col-md-1">--}}
                                    {{--{!! Form::select('exposureinjury',--}}
                                    {{--['Yes' => 'Yes',--}}
                                    {{--'No' => 'No'], old('exposureinjury'),--}}
                                    {{--['class' => 'form-control']) !!}--}}
                                    {{--<p class="help-block"></p>--}}
                                    {{--@if($errors->has('exposureinjury'))--}}
                                    {{--<p class="help-block">--}}
                                    {{--{{ $errors->first('exposureinjury') }}--}}
                                    {{--</p>--}}
                                    {{--@endif--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
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
                        <a href="{{ route('biologicals.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>

            @if (!empty($comments))
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="actionBox">
                            <ul class="commentList">
                                @foreach ($comments as $cm)
                                    @if(($cm->applicationid == $biological->ofd6bid && $cm->applicationtype == '6B')&&
                                        ($biological->employeeid == Auth::user()->id && $cm->isvisible == 1))
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
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

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
                <div class="col-sm-12 panel-heading" align="center">
                    <div class="btn-bottom ">
                        <a href="{{ route('hazmat.index') }}" class="btn btn-default">return</a>
                    </div>
                </div>
                @endif
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
                                <button type="button" class=" btn btn-danger" data-dismiss="modal" aria-label="">No
                                </button>


                            </div>

                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
                @stop
        </div>
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
@endsection