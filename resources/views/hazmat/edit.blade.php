@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ URL::previous() }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('hazmat.index') }}">OFD 6C Hazmat Exposure</a></li>
        <li class="active">Edit OFD 6C Form {{ $hazmat->ofd6cid }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($hazmat,['method' => 'PUT', 'route' => ['hazmat.update', $hazmat->ofd6cid], 'files' => true,'novalidate' => 'novalidate']) !!}
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
                            {!! Form::label('dateofexposure', 'Date of Exposure', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('dateofexposure', old('dateofexposure'), array('id'=>'datepicker1','class' => 'form-control datepicker','placeholder'=>'YYYY-MM-DD', 'required'=>'required'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('dateofexposure'))
                                    <p class="help-block">
                                        {{ $errors->first('dateofexposure') }}
                                    </p>
                                @endif
                            </div>
                        </div>
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
                                {!! Form::text('employeename', old('employeename'), ['class' => 'form-control', 'placeholder'=>'Enter Driver ID', 'required'=>'required'])!!}
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
                                {!! Form::text('epcrincidentnum', old('epcrincidentnum'), ['class' => 'form-control','placeholder'=>'Enter Incident Num', 'required'=>'required'])!!}
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
                                {!! Form::text('assignment', old('assignment'), array('class' => 'form-control', 'id' => 'assignmentinjury','placeholder'=>'Enter Assignment'))!!}
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

                                {!! Form::select('shift',[
                              'A' => 'A',
                              'B' => 'B',
                              'C' => 'C',
                              'DIV' => 'DIV'],old('shift'), ['class' => 'form-control'])!!}

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
                <div><h4 style="padding-left:12px;"><strong>Please perform following steps in case of Exposure</strong>
                    </h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        {{--{{ Form::checkbox('corvelid', 1, null,['disabled'], ['id' => 'corvelid', 'class'=>'className','readonly' => 'true']) }}--}}
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
                </div>
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
                    <div class="form-group">
                        {{ Form::checkbox('checkbox1', 1, null, ['id'=>'checkbox1', 'class' => 'className', 'disabled']) }}
                        {{Form::label('Checkbox1','Fill out OFD-025 Hazmat Exposure Report form')}}
                    </div>
                </div>

                {{-- <label class="col-sm-4">
                      <strong>Fill out OFD-025 Hazmat Exposure Report form</strong></label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                           href="{{ asset('Fillable PDFs\Hazmat Module\(Exposure PDF - Updated OFD 006d) OFD 025 - HazMat Exposure Report.pdf') }}"
                           download="(Exposure PDF - Updated OFD 006d) OFD 025 - HazMat Exposure Report.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD025"
                                                                                           id="ofd25Upload"
                                                                                           style="display: none;"
                                                                                           onchange="pressed()">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                        @if($errors->has('OFD025'))
                            <p class="help-block">
                                {{ $errors->first('OFD025') }}
                            </p>
                        @endif
                    </div>
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
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 form-group">
                    <div class="form-group">
                        {{ Form::checkbox('checkbox2', 1, null, ['id'=>'checkbox2', 'class' => 'className', 'disabled' ]) }}
                        {{Form::label('Checkbox2','Miscellaneous Documents')}}
                    </div>
                </div>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="mischazmat"
                                                                                           id="miscUpload"
                                                                                           style="display: none;"
                                                                                           onchange="pressed1()">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                    </div>
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
                                            </tr>
                                        @endif
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
                            <div class="alert alert-danger" align="center">
                                <label>If an employee receives an injury or illness from this incident,
                                    the employee shall complete an OFD6 and designate whether treatment is being
                                    requested in the OFD-25 IOD.</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 form-group">
                {{Form::label('exposurehazmat','Do you have any symptoms of illness or injury and require
                   treatment?',['class'=> 'col-sm-10 control-label'] ) }}
                <div class="col-sm-4">
                    {!! Form::select('exposurehazmat',[
                      'Yes' => 'Yes',
                      'No' => 'No'],old('exposurehazmat'),
                    array('placeholder'=>'Select one','id'=>'exposurehazmat','class' => 'form-control','required'=>'required')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('exposurehazmat'))
                        <p class="help-block">
                            {{ $errors->first('exposurehazmat') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <label class="col-sm-5"></label>
                    <div class="btn-bottom">
                        {!! Form::submit('Save as Draft',['class' => 'btn btn-primary','name' => 'partialSave']) !!}
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            Submit
                        </button>
                        <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>

            @if (!empty($comments))
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="actionBox">
                            <ul class="commentList">
                                @foreach ($comments as $cm)
                                    @if($cm->applicationtype == '6C' &&
                                    ($hazmat->employeeid == Auth::user()->id && $cm->isvisible == 1))
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
                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                Are you sure you want to Submit?
                            </div>
                            <div class="modal-footer">
                                {!! Form::submit('Yes',['class' => 'btn btn-success','name' => 'store']) !!}
                                <button type="button" class=" btn btn-danger" data-dismiss="modal" aria-label="">No
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
				<script>
        window.pressed = function () {
            var a = document.getElementById('ofd25Upload');
            if (a.value == "") {

            }
            else {
                document.getElementById("checkbox1").checked = true;
            }
        };
        window.pressed1 = function () {
            var a = document.getElementById('miscUpload');
            if (a.value == "") {

            }
            else {
                document.getElementById("checkbox2").checked = true;
            }
        };
    </script>
                @stop
        </div>


