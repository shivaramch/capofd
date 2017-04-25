@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ URL::previous() }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('injuries.index') }}">OFD 6 Injuries</a></li>
        <li class="active">Edit OFD 6 Form {{ $injury->ofd6ID }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($injury,['method' => 'PUT', 'route' => ['injuries.update', $injury->ofd6id], 'files' => true,'novalidate' => 'novalidate']) !!}
    <input type="hidden" name="_token" value="{!!  'csrf_token()' !!}">
    {{ csrf_field() }}
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
                                    <h3><strong>I.O.D. Report Tracking Document (OFD-6)</strong></h3>
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
                        <div class="col-md-12">
                            <div class="alert alert-danger" align="center">
                                <strong>COMPLETE ALL FORMS AND SUBMIT WITHIN 24 HOURS
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            {!! Form::label('injurydate', 'Date of Injury:', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('injurydate', old('injurydate'), array('class'=>'datepicker form-control','id' => 'injurydate','placeholder'=>'MM/DD/YYYY','required' => 'required'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('injurydate'))
                                    <p class="help-block">
                                        {{ $errors->first('injurydate') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('assignmentinjury', 'Assignment', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('assignmentinjury', old('assignmentinjury'), array('class' => 'form-control','id' => 'assignmentinjury', 'required' => 'required'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('assignmentinjury'))
                                    <p class="help-block">
                                        {{ $errors->first('assignmentinjury') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            {!! Form::label('injuredemployeename', 'Injured Name', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('injuredemployeename', old('injuredemployeename'), array('class' => 'form-control','id' => 'injuredemployeename', 'placeholder'=>'Enter Injured Name','required' => 'required'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('injuredemployeename'))
                                    <p class="help-block">
                                        {{ $errors->first('injuredemployeename') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('injuredemployeeid', 'Personnel ID #', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('injuredemployeeid', old('injuredemployeeid'), array('class' => 'form-control','id' => 'injuredemployeeid', 'placeholder'=>'Enter Badge Id','required' => 'required'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('injuredemployeeid'))
                                    <p class="help-block">
                                        {{ $errors->first('injuredemployeeid') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('shift', 'Shift', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::select('shift',[
                              'A' => 'A',
                              'B' => 'B',
                              'C' => 'C',
                              'DIV' => 'DIV'], array('class' => 'form-control','id' => 'shift', 'required' => 'required'))!!}
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
                            {!! Form::label('captainid', 'Captain #', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('captainid', old('captainid'), array('class' => 'form-control','id' => 'captainid', 'placeholder'=>'Enter Badge Id','required' => 'required'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('captainid'))
                                    <p class="help-block">
                                        {{ $errors->first('captainid') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('battalionchiefid', 'Battalion Chief #', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('battalionchiefid', old('battalionchiefid'), array('class' => 'form-control','id' => 'battalionchiefid', 'placeholder'=>'Enter Badge Id','required' => 'required'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('battalionchiefid'))
                                    <p class="help-block">
                                        {{ $errors->first('battalionchiefid') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            {!! Form::label('aconduty', 'Assistant Chief #', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('aconduty', old('aconduty'), array('class' => 'form-control','id' => 'aconduty', 'placeholder'=>'Enter Badge Id','required' => 'required'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('aconduty'))
                                    <p class="help-block">
                                        {{ $errors->first('aconduty') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            {!! Form::label('frmsincidentnum', 'FRMS Incident #', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-6 ">
                                {!! Form::text('frmsincidentnum', old('frmsIncidentNum'), array('class' => 'form-control','id' => 'frmsID', 'required' => 'required'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('frmsincidentnum'))
                                    <p class="help-block">
                                        {{ $errors->first('frmsincidentnum') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-8 form-group">
                            {!! Form::label('corvelid', 'CorVel ID #', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-3">
                                {!! Form::text('corvelid', old('corVelID'), array('class' => 'form-control','id' => 'corvelID','required' => 'required','style' =>'margin-left:-7px;'))!!}
                                <p class="help-block"></p>
                                @if($errors->has('corvelid'))
                                    <p class="help-block">
                                        {{ $errors->first('corvelid') }}
                                    </p>
                                @endif
                            </div>
                            <div class='col-sm-7'>
                                {!! Form::label('corvelid ', '(Corvel TMC will initiate at time of call)', array('class' => 'col-sm-7 control-label','style' =>'margin-left:-50px;')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-12" form-group>
                        <h4><strong>Injury Checklist:</strong></h4>
                    </div>
                </div>
            </div>

            <div class="panel-body">


                <div class="row">
                    <div class="col-sm-12 form-group">
                        <div class="form-group">
                            {{ Form::checkbox('checkbox1', 1, null, ['id'=>'checkbox1', 'class' => 'className' ]) }}
                            {{Form::label('Checkbox1','Complete CorVel Work Ability Report Form - Only if seeking medical attention. Complete "Employee Section" and sign at bottom.')}}
                        </div>
                    </div>

                    {{--}}<label class="col-sm-12"><strong>CorVel Work Ability
                            Report</strong>
                        - Only if seeking medical attention. Complete "Employee Section" and sign at bottom.</label> --}}

                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-success dropdown-toggle col-sm-12" id="corvelDownload" type="button"
                               href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) CorVel Work Ability Report.pdf') }}"
                               download="(Injury PDF) CorVel Work Ability Report.pdf">
                                <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="corvelUpload"
                                                                                           name="CorvelAttachmentName"
                                                                                           style="display: none;">
                    </span>
                                </label>
                                <input type="text" id="upload-file-info" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse" id="corvelPrevious"
                               data-target="#611"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                                file(s)
                            </a>
                            <div id="611" class="collapse">

                                <table class="table table-striped">
                                    <tr>
                                        <th> File Name</th>
                                        <th> File Uploaded At</th>
                                    </tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '611')
                                                <tr>
                                                    <td>
                                                        <a href="{{ asset('uploads/'.$attachment->attachmentname) }}" id="corvelAttachment"> {{$attachment->attachmentname}}</a>
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

                <div class="row">
                    <div class="col-sm-12 form-group">
                        <div class="form-group">
                            {{ Form::checkbox('checkbox2', 1, null, ['id'=>'checkbox2', 'class' => 'className' ]) }}
                            {{Form::label('Checkbox2','Complete Investigation Report for
                    Occupational Injury or Illness Form - Both employee and supervisor must complete and sign.')}}
                        </div>
                    </div>
                   {{--}} <label class="col-sm-12"><strong>Investigation Report for
                            Occupational Injury or Illness</strong>
                        - Both employee and supervisor must complete and sign.</label> --}}
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-success dropdown-toggle col-sm-12" type="button" id="reportDownload"
                               href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) OFD Investigation Report for Occupational Injury or Illness.pdf') }}"
                               download="(Injury PDF) OFD Investigation Report for Occupational Injury or Illness.pdf">
                                <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="reportUpload"
                                                                                           name="InvestigationAttachment"
                                                                                           style="display: none;">
                    </span>
                                </label>
                                <input type="text" id="upload-file-info" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse" id="reportPrevious"
                               data-target="#612"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                                file(s)
                            </a>
                            <div id="612" class="collapse">

                                <table class="table table-striped">
                                    <tr>
                                        <th> File Name</th>
                                        <th> File Uploaded At</th>
                                    </tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '612')
                                                <tr>
                                                    <td>
                                                        <a href="{{ asset('uploads/'.$attachment->attachmentname) }}" id="reportAttachment"> {{$attachment->attachmentname}}</a>
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
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <div class="form-group">
                            {{ Form::checkbox('checkbox3', 1, null, ['id'=>'checkbox3', 'class' => 'className' ]) }}
                            {{Form::label('Checkbox3','Complete OFD 295a Injury Witness Statement Form')}}
                        </div>
                    </div>

                   {{--}} <label class="col-sm-12"><strong>Statement of Witness of
                            Accident</strong></label> --}}
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-success dropdown-toggle col-sm-12" type="button"  id="witnessDownload"
                               href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) OFD 295a Injury Witness Statement.pdf') }}"
                               download="(Injury PDF) OFD 295a Injury Witness Statement.pdf">
                                <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="witnessUpload"
                                                                                           name="StatementAttachment"
                                                                                           style="display: none;">
                    </span>
                                </label>
                                <input type="text" id="upload-file-info" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse" id="witnessPrevious"
                               data-target="#613"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                                file(s)
                            </a>
                            <div id="613" class="collapse">

                                <table class="table table-striped">
                                    <tr>
                                        <th> File Name</th>
                                        <th> File Uploaded At</th>
                                    </tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '613')
                                                <tr>
                                                    <td>
                                                        <a href="{{ asset('uploads/'.$attachment->attachmentname) }}" id="witnessAttachment"> {{$attachment->attachmentname}}</a>
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
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <div class="form-group">
                            {{ Form::checkbox('checkbox4', 1, null, ['id'=>'checkbox4', 'class' => 'className' ]) }}
                            {{Form::label('Checkbox4','Complete Employee’s Choice of Physician or Doctor Form - Two signatures required - both section A & B.')}}
                        </div>
                    </div>
                  {{--}}  <label class="col-sm-12"><strong>Employee's Choice of
                            Physician or Doctor Form</strong>
                        - Two signatures required - both section A & B.</label> --}}
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-success dropdown-toggle col-sm-12" type="button" id="employeeDownload"
                               href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) OFD Employee Choice of Physician or Doctor.pdf') }}"
                               download="(Injury PDF) OFD Employee Choice of Physician or Doctor.pdf">
                                <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="employeeUpload"
                                                                                           name="EmployeeAttachment"
                                                                                           style="display: none;">
                    </span>
                                </label>
                                <input type="text" id="upload-file-info" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse" id="employeePrevious"
                               data-target="#614"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                                file(s)
                            </a>
                            <div id="614" class="collapse">

                                <table class="table table-striped">
                                    <tr>
                                        <th> File Name</th>
                                        <th> File Uploaded At</th>
                                    </tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '614')
                                                <tr>
                                                    <td>
                                                        <a href="{{ asset('uploads/'.$attachment->attachmentname) }}" id="employeeAttachment"> {{$attachment->attachmentname}}</a>
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
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <div class="form-group">
                            {{ Form::checkbox('checkbox5', 1, null, ['id'=>'checkbox5', 'class' => 'className' ]) }}
                            {{Form::label('Checkbox5','Complete OFD 25 Injury Intradepartmental Communication Form - Send an attachment electronically to OmafIOD@cityofomaha.org')}}
                        </div>
                    </div>

                    {{--}}<label class="col-sm-12"><strong>OFD - 25 Injury on
                            Job</strong>
                        - Send an attachment electronically to OmafIOD@cityofomaha.org</label> --}}
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-success dropdown-toggle col-sm-12" type="button" id="ofd25Download"
                               href="{{ asset('Fillable PDFs\Injury Module\(Injury PDF) OFD 025 Injury Intradepartmental Communication.pdf') }}"
                               download="(Injury PDF) OFD 025 Injury Intradepartmental Communication.pdf">
                                <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="ofd25Upload"
                                                                                           name="Ofd25Attachment"
                                                                                           style="display: none;">
                    </span>
                                </label>
                                <input type="text" id="upload-file-info" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse" id="ofd25Previous"
                               data-target="#615"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                                file(s)
                            </a>
                            <div id="615" class="collapse">

                                <table class="table table-striped">
                                    <tr>
                                        <th> File Name</th>
                                        <th> File Uploaded At</th>
                                    </tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '615')
                                                <tr>
                                                    <td>
                                                        <a href="{{ asset('uploads/'.$attachment->attachmentname) }}" id="ofd25Attachment"> {{$attachment->attachmentname}}</a>
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

                <div class="row">
                    <div class="col-sm-12 form-group">
                        <div class="form-group">
                            {{ Form::checkbox('checkbox6', 1, null, ['id'=>'checkbox6', 'class' => 'className' ]) }}
                            {{Form::label('Checkbox5','Miscellaneous Documents')}}
                        </div>
                    </div>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <div class="input-group">
                                <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="miscDocsUpload"
                                                                                           name="miscinjuries"
                                                                                           style="display: none;">
                    </span>
                                </label>
                                <input type="text" id="upload-file-info" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse" id="miscDocsPrevious"
                               data-target="#616"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                                file(s)
                            </a>
                            <div id="616" class="collapse">

                                <table class="table table-striped">
                                    <tr>
                                        <th> File Name</th>
                                        <th> File Uploaded At</th>
                                    </tr>
                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmenttype == '616')
                                                <tr>
                                                    <td>
                                                        <a href="{{ asset('uploads/'.$attachment->attachmentname) }}" id="miscAttachments"> {{$attachment->attachmentname}}</a>
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

                <div class="row">
                    <div class="col-sm-6 form-group">
                        {!! Form::label('captainid', 'Complete FRMS Casuality & Narrative Tab - Fire service and Fire Service Injury', ['class' => 'col-sm-6 control-label']) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('captainid', old('captainid'), array('class' => 'form-control','id'=>'narrativeId', 'placeholder'=>'Enter FRMS Number here','required' => 'required'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('captainid'))
                                <p class="help-block">
                                    {{ $errors->first('captainid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        {!! Form::label('captainid', 'Complete in EPCR - All Cases', ['class' => 'col-sm-6 control-label']) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('captainid', old('captainid'), array('class' => 'form-control','id'=>'allcasesId', 'placeholder'=>'Enter EPCR Number here','required' => 'required'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('captainid'))
                                <p class="help-block">
                                    {{ $errors->first('captainid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('documentworkforce', 1, null, ['id' => 'documentworkforce', 'class'=>'className']) }}
                            <label><strong>Document IOD in
                                    Workforce
                                    - Only if seeking medical attention.</strong></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('documentoperationalday', 1, null, ['id' => 'documentoperationalday', 'class'=>'className']) }}
                            <label><strong>Document in Operational Day
                                    Book and Personnel Record</strong></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-4">In case attend Omaha Police Academy - Training Assigned</label>
                        <div class="col-sm-3">
                            {{ Form::select('trainingassigned', [
                            'yes' => 'YES',
                            'no' => 'NO']
                            ), array('class'=>'btn btn-primary dropdown-toggle col-sm-12', 'id'=>'trainingId') }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label class="checkbox-inline col-sm-12"><u>For Fire Omaha Police Recruits: Use normal
                                Chain-of-Command for Tracking
                                Document</u></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('policeofficercompletesign', 1, null, ['id' => 'policeofficercompletesign', 'class'=>'className']) }}
                            <label><strong>Have Police Supervisor Complete and Sign
                                    Supervisor section on Investigation Report
                                    and Witness Statement</strong></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {{ Form::checkbox('callsupervisor', 1, null, ['id' => 'callsupervisor', 'class'=>'className']) }}
                            <label><strong>Call Fire Supervisor or SWD B/C immediately
                                    and notify CorVel by phone</strong></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 panel-headinzzzzg">
                        <br>
                        <label class="col-sm-5"></label>
                        <div class="btn-bottom ">
                            {!! Form::submit('Save as Draft',['class' => 'btn btn-primary','id'=>'draftButton', 'name' => 'partialSave']) !!}
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                Submit
                            </button>
                            <a href="{{ URL::previous() }}" class="btn btn-danger" id="cancelButton">Cancel</a>
                        </div>
                        <br>
                    </div>
                </div>

            </div>
        </div>


    @if (!empty($comments))
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="actionBox">
                        <ul class="commentList">
                            @foreach ($comments as $cm)
                                @if($cm->applicationtype == '6' &&
                                    ($injury->injuredemployeeid == Auth::user()->id && $cm->isvisible == 1))
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
                    <button type="button" class="close" data-dismiss="modal" id="closeButton" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                    Are you sure want to submit the form?
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Yes',['class' => 'btn btn-success','name'=> 'store', 'id'=>'submitButton']) !!}
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelButton">No</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    @stop
