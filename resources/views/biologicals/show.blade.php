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
    @if($biological->employeeid == Auth::user()->id || ($biological->primaryidconumber == Auth::user()->id && $biological->applicationstatus == 7) || Auth::user()->roleid == 1)
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
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            {!! Form::label('dateofexposure', 'Date of Exposure', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('dateofexposure', old('dateofexposure'), array('id'=>'datepicker','class' => 'form-control', 'placeholder' => 'MM-DD-YYYY','disabled' => "disabled"))!!}
                                <p class="help-block"></p>
                                @if($errors->has('dateofexposure'))
                                    <p class="help-block">
                                        {{ $errors->first('dateofexposure') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('exposedemployeename', 'Exposed Employee Name',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('exposedemployeename', old('exposedemployeename'), array('class'=>'form-control','disabled' => "disabled"))!!}
                                <p class="help-block"></p>
                                @if($errors->has('exposedemployeename'))
                                    <p class="help-block">
                                        {{ $errors->first('exposedemployeename') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('employeeid', 'Employee ID#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('employeeid', old('employeeid'), array('class'=> 'form-control','placeholder'=>'Enter Badge ID','disabled' => "disabled"))!!}
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
                            {!! Form::label('assignmentbiological', 'Assignment', array('style'=>'padding-top:7px;', 'class' => 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('assignmentbiological', old('assignmentbiological'), array('class'=>'form-control','disabled'=>'disabled'))!!}
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
                                {!! Form::text('shift',old('shift'),array('class'=>'form-control','disabled'=>'disabled',))!!}
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
                        <div class="col-sm-4 form-group">
                            {!! Form::label('epcrincidentnum', 'EPCR Incident#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('epcrincidentnum', old('epcrincidentnum'), array('class' => 'form-control','placeholder'=>'Enter Incident Num','disabled' => "disabled"))!!}
                                <p class="help-block"></p>
                                @if($errors->has('epcrincidentnum'))
                                    <p class="help-block">
                                        {{ $errors->first('epcrincidentnum') }}
                                    </p>
                                @endif
                            </div>
                        </div>


                        <div class="col-sm-4 form-group">
                            {!! Form::label('primaryidconumber', 'Primary IDCO#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('primaryidconumber', old('primaryidconumber'), array('class' => 'form-control','placeholder'=>'Enter IDCO Badge ID','disabled' => "disabled"))!!}
                                <p class="help-block"></p>
                                @if($errors->has('primaryidconumber'))
                                    <p class="help-block">
                                        {{ $errors->first('primaryidconumber') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('frmsincidentnum', 'FRMS Incident#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('frmsincidentnum', old('frmsincidentnum'), array('class' => 'form-control','placeholder'=>'Enter FRMS Num','disabled' => "disabled"))!!}
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
                            {{ Form::checkbox('trueofd184', 1, null, ['id'=>'trueofd184', 'class' => 'className','disabled' => "disabled" ]) }}
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
                                                @if($attachment->attachmenttype == '6b1' && $attachment->ofd6bid == $biological->ofd6bid )
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
                            {{ Form::checkbox('miscbiological1', 1, null, ['id'=>'miscbiological1', 'class' => 'className','disabled'=>'disabled' ]) }}
                            {{Form::label('miscbiological1','Miscellaneous Documents')}}
                        </div>
                        <div class="col-sm-12 form-group well well-sm">
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
                            {{ Form::checkbox('potofd184', 1, null, ['id' => 'potofd184', 'class'=>'className','disabled' => "disabled" ]) }}
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
                                                @if($attachment->attachmenttype == '6b2' && $attachment->ofd6bid == $biological->ofd6bid )
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
                            {{ Form::checkbox('miscbiological2', 1, null, ['id'=>'miscbiological2', 'class' => 'className','disabled'=>'disabled' ]) }}
                            {{Form::label('miscbiological2','Miscellaneous Documents')}}
                        </div>
                        <div class="col-sm-12 form-group well well-sm">
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
                <div class="form-horizontal">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger" align="left">
                                <label>If an employee receives an injury or illness from this incident,
                                    the employee shall complete an OFD6 and designate whether treatment is being
                                    requested in the OFD-25 IOD.</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    {{Form::label('exposureinjury','Do you have any symptoms of illness or injury and require
                       treatment?',['class'=> 'col-sm-10 control-label'] ) }}
                    <div class="col-sm-2">
                        {!! Form::text('exposureinjury', old('exposureinjury'),array('class'=>'form-control','disabled'=>'disabled'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('exposureinjury'))
                            <p class="help-block">
                                {{ $errors->first('exposureinjury') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 panel-heading" align="center">
                    <div class="btn-bottom ">
                        <a href="{{ route('biologicals.index') }}" class="btn btn-warning">Return</a>
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
    {!! Form::close() !!}
    <div class="panel panel-default">
        {{--<div class="panel-heading">
            <div class="row">
                <div class="col-sm-12">
                    @if($biological->primaryidconumber == Auth::user()->id && $biological->applicationstatus == DB::table('status')->where('statustype','Application under Primary IDCO')->value('statusid'))
                       --}}{{-- <div class="col-sm-12 panel-heading" align="center">
                            <a href="{{ url('/biologicals/'.$biological->ofd6bid.'/Approve') }}"
                               class="btn btn-success">Approve</a>
                            <a href="{{ url('/biologicals/'.$biological->ofd6bid.'/Reject') }}"
                               class="btn btn-danger">Reject</a>--}}{{--
                        </div>
                    @endif
                </div>
            </div>
        </div>--}}
        <!--comment section-->
        @if($biological->primaryidconumber == Auth::user()->id ||
        Auth::user()->roleid == 1)
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="titleBox">
                        <label>Comments </label>
                    </div>
                    @if($biological->primaryidconumber == Auth::user()->id ||
                    Auth::user()->roleid == 1)
                        {!! Form::open(['method' => 'POST', 'route' => ['comments.store'],]) !!}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group" style="width:100%; position:relative">
                                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Add your comment', 'rows' => '4']) }}
                                    </div>
                                    {{ Form::hidden('applicationtype', '6') }}
                                    {{ Form::hidden('applicationid', $biological->ofd6bid ) }}
                                    {{ Form::checkbox('isvisible', 1, null, ['id' => 'daybook', 'class'=>'className']) }}
                                    <label><strong>
                                            Visible to applicant</strong></label>
                                    <div class="col-sm-12" align="center">
                                        <div class="col-sm-4">
                                            {{ Form::submit('Post Comment', array('class' => 'btn btn-block btn-primary')) }}
                                        </div>
                                        @if(($biological->primaryidconumber == Auth::user()->id && $biological->applicationstatus == DB::table('status')->where('statustype','Application under Primary IDCO')->value('statusid')) ||
                                        Auth::user()->roleid == 1)
                                            @if($biological->applicationstatus != 6)
                                                <div class="col-sm-4">
                                                    <a href="{{ url('/biologicals/'.$biological->ofd6bid .'/Approve') }}"
                                                       class="btn btn-block btn-success">Approve</a>
                                                </div>
                                            @endif
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-block btn-danger"
                                                        data-toggle="modal"
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
                    @endif
                    <div class="actionBox">
                        <ul class="commentList">
                            @if (!empty($comments))
                                @foreach ($comments as $cm)
                                    @if(($cm->applicationid == $biological->ofd6bid && $cm->applicationtype == '6B')&&
                                    (($biological->employeeid == Auth::user()->id && $cm->isvisible == 1) ||
                                    $biological->primaryidconumber == Auth::user()->id || Auth::user()->roleid == 1))
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
                            Are you sure you want to <strong>Reject</strong> this application? If, <strong>Yes</strong>
                            please
                            include a comment for the applicant if not done already!
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('/biologicals/'.$biological->ofd6bid  .'/Reject') }}"
                               class="btn btn-success">Yes</a>
                            <button type="button" class=" btn btn-danger" data-dismiss="modal" aria-label="">No</button>
                        </div>

                    </div>
                </div>
            </div>
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