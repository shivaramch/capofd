@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ URL::previous() }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('hazmat.index') }}">OFD 6C Hazmat</a></li>
        <li class="active">View OFD 6C Form {{ $hazmat->ofd6cid }}</li>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-horizontal">
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('dateofexposure', 'Date of Exposure', array('style'=>'padding-top:7px;', 'class' => 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('dateofexposure', old('dateofexposure'), array('id'=>'datepicker1','class' => 'form-control datepicker','disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('dateofexposure'))
                                <p class="help-block">
                                    {{ $errors->first('dateofexposure') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('employeeid', 'Employee ID#', array('style'=>'padding-top:7px;', 'class' => 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('employeeid', old('employeeid'),array('class'=>'form-control','disabled'=>'disabled'))!!}
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
                            {!! Form::text('employeename', old('employeename'),array('class'=>'form-control','disabled'=>'disabled'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('employeename'))
                                <p class="help-block">
                                    {{ $errors->first('employeename') }}
                                </p>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('primaryidconumber', 'Primary IDCO ID#', array('style'=>'padding-top:7px;', 'class' => 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('primaryidconumber', old('primaryidconumber'),array('class'=>'form-control','disabled'=>'disabled'))!!}
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
                            {!! Form::text('epcrincidentnum', old('epcrincidentnum'),array('class'=>'form-control','disabled'=>'disabled'))!!}
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
                            {!! Form::text('frmsincidentnum', old('frmsincidentnum'),array('class'=>'form-control','disabled'=>'disabled'))!!}
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
                            {!! Form::text('assignment', old('assignment'),array('class'=>'form-control','disabled'=>'disabled'))!!}
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
                            {!! Form::text('shift', old('shift'), array('class'=>'form-control','disabled'=>'disabled'))!!}
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

    <div class="panel panel-default">
        <div class="panel-heading">
            <div><h4 style="padding-left:12px;"><strong>Please perform following steps in case of
                        Exposure</strong></h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12 form-group">
                    {{--{{ Form::checkbox('corvelid', 1, null,['disabled'], ['id' => 'corvelid', 'class'=>'className','readonly' => 'true']) }}--}}
                    {!! Form::label('corvelid', 'Once you have completed the call, record CorVel Claim #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-4">
                        {!! Form::text('corvelid', old('corvelid'), array('class'=>'form-control','disabled'=>'disabled'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('corvelid'))
                            <p class="help-block">
                                {{ $errors->first('corvelid') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-12 form-group">
                {{ Form::checkbox('contactcorvel', 1, null,['disabled'], ['id' => 'contactcorvel', 'class'=>'className','readonly' => 'true']) }}
                <label>
                    <strong>Contact CorVel Enterprise Comp @ 877-764-3574.
                        Tell them you have a Hazardous Material Exposure and the call is for reporting ONLY.
                    </strong>
                </label>
            </div>
            <div class="col-sm-12">
                {{ Form::checkbox('checkbox1', 1, null,['disabled'], ['id' => 'checkbox1', 'class'=>'className','readonly' => 'true']) }}
                {{Form::label('Checkbox1','Fill out OFD-025 Hazmat Exposure Report form')}}
                {{--}}<label class="checkbox-inline col-sm-12">
                    <strong>Fill out OFD-025 Hazmat Exposure Report form</strong>
                </label>--}}
            </div>
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
                                    @if($attachment->attachmenttype == '6c')
                                        <tr>
                                            <td>
                                                <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                            </td>
                                            <td>
                                                {{$attachment->created_at}}
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
                                    @if($attachment->attachmenttype == '6c1')
                                        <tr>
                                            <td>
                                                <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                            </td>
                                            <td>
                                                {{$attachment->created_at}}
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
                            <label>If an employee receives an injury or illness from this incident,
                                the employee shall complete an OFD6 and designate whether treatment is being
                                requested in the OFD-25 IOD.</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    {{Form::label('exposurehazmat','Do you have any symptoms of illness or injury and require
                       treatment?',['class'=> 'col-sm-10 control-label'] ) }}
                    <div class="col-sm-2">
                        {!! Form::text('exposurehazmat', old('exposurehazmat'),array('class'=>'form-control','disabled'=>'disabled'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('exposurehazmat'))
                            <p class="help-block">
                                {{ $errors->first('exposurehazmat') }}
                            </p>
                        @endif
                    </div>
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
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="titleBox">
                <label>Comments </label>
            </div>
            @if($hazmat->primaryidconumber == Auth::user()->id ||
    Auth::user()->roleid == 1)
                {!! Form::open(['method' => 'POST', 'route' => ['comments.store'],]) !!}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-group" style="width:100%; position:relative">
                                {{ Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Add your comment', 'rows' => '4']) }}
                            </div>
                            {{ Form::hidden('applicationtype', '6C') }}
                            {{ Form::hidden('applicationid', $hazmat->ofd6cid) }}
                            {{ Form::checkbox('isvisible', 1, null, ['id' => 'daybook', 'class'=>'className']) }}
                            <label><strong>
                                    Visible to applicant</strong></label>
                            <div class="col-sm-12" align="center">
                                <div class="col-sm-4">
                                    {{ Form::submit('Post Comment', array('class' => 'btn btn-block btn-primary')) }}
                                </div>
                                @if($hazmat->primaryidconumber == Auth::user()->id && $hazmat->applicationstatus == DB::table('status')->where('statustype','Application under Primary IDCO')->value('statusid'))
                                    <div class="col-sm-4">
                                        <a href="{{ url('/hazmat/'.$hazmat->ofd6cid.'/Approve') }}"
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
                            @if( $cm->applicationtype == '6C' &&
                            (($hazmat->employeeid == Auth::user()->id && $cm->isvisible == 1) ||
                            $hazmat->primaryidconumber == Auth::user()->id ||
                            Auth::user()->roleid == 1))
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
                                            <div class="pull-right meta">
                                                @if(Auth::user()->id == $cm->createdby )
                                                    {!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                'route' => ['comments.destroy', $cm->commentid])) !!}
                                                    {!! Form::button('<i class="fa fa-trash-o"></i>', array('type' => 'submit', 'class' => ''))!!}
                                                    {!! Form::close() !!}
                                                @endif

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
                    <a href="{{ url('/hazmat/'.$hazmat->ofd6cid.'/Reject') }}"
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


@endsection