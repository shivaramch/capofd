@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ URL::previous() }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('accidents.index') }}">OFD 6A Accidents</a></li>
        <li class="active">Edit OFD 6A Form {{ $accident->ofd6aid }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($accident,['method' => 'PUT', 'route' => ['accidents.update', $accident->ofd6aid], 'files' => true,'novalidate' => 'novalidate']) !!}
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
                                <h3><strong>Vehicle Accident Report Tracking Document (OFD-6A)</strong></h3>
                            </div>
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
                            <strong>
                                COMPLETE AND SUBMIT ALL FORMS WITHIN 24 HOURS
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('accidentdate', 'Date of Accident:',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') )!!}
                        <div class="col-sm-6 ">
                            {!! Form::text('accidentdate', old('accidentdate'), array('id'=>'datepicker1','class' => 'form-control datepicker', 'placeholder' => 'YYYY-MM-DD'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('accidentdate'))
                                <p class="help-block">
                                    {{ $errors->first('accidentdate') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('driverid', 'Driver ID#', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('driverid', old('driverid'), array('class'=>'form-control','placeholder'=>'Enter Driver ID'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('driverid'))
                                <p class="help-block">
                                    {{ $errors->first('driverid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('drivername', 'Driver Name',array( 'style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('drivername', old('drivername'), array('class'=>'form-control','placeholder'=>'Enter Driver Name'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('drivername'))
                                <p class="help-block">
                                    {{ $errors->first('drivername') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('frmsincidentnum', 'FRMS Incident #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('frmsincidentnum', old('frmsincidentnum'), ['class' => 'form-control'])!!}
                            <p class="help-block"></p>
                            @if($errors->has('frmsincidentnum'))
                                <p class="help-block">
                                    {{ $errors->first('frmsincidentnum') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('assignmentaccident', 'Assignment', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('assignmentaccident', old('assignmentaccident'), ['class' => 'form-control', 'id'=>'assignmentinjury', 'placeholder'=>'Enter Assignment'])!!}
                            <p class="help-block"></p>
                            @if($errors->has('assignmentaccident'))
                                <p class="help-block">
                                    {{ $errors->first('assignmentaccident') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('apparatus', 'Apparatus', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('apparatus', old('apparatus'), ['class' => 'form-control', 'placeholder'=>'Enter Apparatus'])!!}
                            <p class="help-block"></p>
                            @if($errors->has('apparatus'))
                                <p class="help-block">
                                    {{ $errors->first('apparatus') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('captainid', 'Captain #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('captainid', old('captainid'), array('class' => 'form-control','placeholder'=>'Enter Badge Id'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('captainid'))
                                <p class="help-block">
                                    {{ $errors->first('captainid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('battalionchiefid', 'Battalion Chief #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('battalionchiefid', old('battalionchiefid'), array('class' => 'form-control','placeholder'=>'Enter Badge Id'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('battalionchiefid'))
                                <p class="help-block">
                                    {{ $errors->first('battalionchiefid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('aconduty', 'Assistant Chief #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('aconduty', old('aconduty'), array('class' => 'form-control','placeholder'=>'Enter Badge Id'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('aconduty'))
                                <p class="help-block">
                                    {{ $errors->first('aconduty') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="alert alert-danger" align="center">
                    <div class="row">
                        <div class="col-md-12" style="text-align:left">
                            <strong>
                                If an employee receives an injury from this incident, the employee shall complete an
                                OFD6 and designate whether treatment is being requested in the OFD-25 IOD.
                            </strong>
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
                    <h4 style="text-align:left;"><u><strong>ACCIDENT CHECKLIST :</strong></u></h4>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('commemail', 1, null, ['id' => 'commemail', 'class'=>'className']) }}
                        {{Form::label('Checkbox5','Generate OFD 025 Intradepartmental Communication - Email to omafaccident_ofd25@cityofomaha.org')}}
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="form-group">
                        {{ Form::checkbox('checkbox1', 1, null, ['id'=>'checkbox1', 'class' => 'className', 'disabled' ]) }}
                        {{Form::label('Checkbox1','Complete LRS 101 City of Omaha Accident Report-Include RB#, Officer Name, Badge#')}}
                    </div>
                </div>
                {{--}}<label class="checkbox-inline col-sm-12">
                    <strong>Complete LRS 101 City of Omaha Accident Report-Include RB#, Officer Name, Badge#</strong>
                </label>--}}
                <br>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) LRS 101 City of Omaha Vehicle Accident Report.pdf') }}"
                           download="(Accident PDF) LRS 101 City of Omaha Vehicle Accident Report.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file"
                                                                                           name="LRS101"  id="lrsdownload"
                                                                                           style="display: none;"
																						   onchange="pressed()">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                        @if($errors->has('LRS101'))
                            <p class="help-block">
                                {{ $errors->first('LRS101') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a1"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="6a1" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a1')
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
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="form-group">
                        {{ Form::checkbox('checkbox2', 1, null, ['id'=>'checkbox2', 'class' => 'className', 'disabled' ]) }}
                        {{Form::label('Checkbox2','Complete OFD 295
                            Vehicle Accident Witness Statement -This Report is for civilian statements
                        only')}}
                    </div>
                </div>
                {{--}} <label class="col-sm-12"><strong><strong>Complete OFD 295
                             Vehicle Accident Witness Statement</strong>-This Report is for civilian statements
                         only</strong></label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) OFD 295 Vehicle Accident Witness Statement.pdf') }}"
                           download="(Accident PDF) OFD 295 Vehicle Accident Witness Statement.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file"
                                                                                           name="OFD295" id="295upload"
                                                                                           style="display: none;"
																						   onchange="pressed1()">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                        @if($errors->has('OFD295'))
                            <p class="help-block">
                                {{ $errors->first('OFD295') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a2"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="6a2" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a2')
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
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="form-group">
                        {{ Form::checkbox('checkbox3', 1, null, ['id'=>'checkbox3', 'class' => 'className' , 'disabled']) }}
                        {{Form::label('Checkbox3','Complete OFD 25a Accident
                        Intradepartmental Communication - Driver')}}
                    </div>
                </div>
                {{--}}    <label class="col-sm-12"><strong>Complete OFD 25a Accident
                            Intradepartmental Communication</strong>-Driver</label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) OFD 025a Accident Intradepartmental Communication - Driver.pdf') }}"
                           download="(Accident PDF) OFD 025a Accident Intradepartmental Communication - Driver.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file"
                                                                                           name="OFD025a" id="25aUpload"
                                                                                           style="display: none;"
																						   onchange="pressed2()">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                        @if($errors->has('OFD025a'))
                            <p class="help-block">
                                {{ $errors->first('OFD025a') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a3"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="6a3" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a3')
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
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="form-group">
                        {{ Form::checkbox('checkbox4', 1, null, ['id'=>'checkbox4', 'class' => 'className', 'disabled' ]) }}
                        {{Form::label('Checkbox4','Complete OFD 25b Accident
                        Intradepartmental Communication - Supervisor')}}
                    </div>
                </div>
                {{--}}  <label class="checkbox-inline col-sm-12"><strong>Complete OFD 25b Accident
                          Intradepartmental Communication</strong>-Supervisor</label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) OFD 025b Accident Intradepartmental Communication - Supervisor.pdf') }}"
                           download="(Accident PDF) OFD 025b Accident Intradepartmental Communication - Supervisor.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD025b" id="25bUpload"
                                                                                           style="display: none;"
																						   onchange="pressed3()">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                        @if($errors->has('OFD025b'))
                            <p class="help-block">
                                {{ $errors->first('OFD025b') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a4"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="6a4" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a4')
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
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="form-group">
                        {{ Form::checkbox('checkbox5', 1, null, ['id'=>'checkbox5', 'class' => 'className' , 'disabled']) }}
                        {{Form::label('Checkbox5','Complete OFD 25c Accident
                        Intradepartmental Communication - Other Personnel')}}
                    </div>
                </div>
                {{--}}  <label class="checkbox-inline col-sm-12"><strong>Complete OFD 25c Accident
                          Intradepartmental Communication</strong>-Other Personnel</label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) OFD 025c Accident Intradepartmental Communication - Other Personnel.pdf') }}"
                           download="(Accident PDF) OFD 025c Accident Intradepartmental Communication - Other Personnel.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD025c" id="25cUpload"
                                                                                           style="display: none;"
																						   onchange="pressed4()">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                        @if($errors->has('OFD025c'))
                            <p class="help-block">
                                {{ $errors->first('OFD025c') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a5"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="6a5" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a5')
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
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="form-group">
                        {{ Form::checkbox('checkbox6', 1, null, ['id'=>'checkbox5', 'class' => 'className', 'disabled' ]) }}
                        {{Form::label('Checkbox6','Complete OFD 31-OFD
                        Lost, Damaged or Stolen Equipment Report')}}
                    </div>
                </div>
                {{--}}<label class="checkbox-inline col-sm-12"><strong> Complete OFD 31-OFD
                        Damaged, Lost, Stolen Equipment Report</strong></label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) OFD 31 Lost, Damaged or Stolen Equipment Report.pdf') }}"
                           download="(Accident PDF) OFD 31 Lost, Damaged or Stolen Equipment Report.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD31"
						                                                                    id="31Upload"
                                                                                           style="display: none;"
																						   onchange="pressed5()">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                        @if($errors->has('OFD31'))
                            <p class="help-block">
                                {{ $errors->first('OFD31') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a6"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="6a6" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a6')
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
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="form-group">
                        {{ Form::checkbox('checkbox7', 1, null, ['id'=>'checkbox7', 'class' => 'className', 'disabled' ]) }}
                        {{Form::label('Checkbox7','Complete OFD 127 Request for
                        Services Form')}}
                    </div>
                </div>
                {{--}}   <label class="checkbox-inline col-sm-12"><strong> Complete OFD 127 Request for
                           Services Form</strong></label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) OFD 127 Request for Services.pdf') }}"
                           download="(Accident PDF) OFD 127 Request for Services.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD127" id="127Upload"
                                                                                           style="display: none;"
																						   onchange="pressed6()">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                        @if($errors->has('OFD127'))
                            <p class="help-block">
                                {{ $errors->first('OFD127') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a7"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="6a7" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a7')
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
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12 form-group">
                    {{ Form::checkbox('calllaw', 1, null, ['id' => 'calllaw', 'class'=>'className']) }}
                    <label><strong>
                            Call Law Department
                            Investigator</strong>- Call 444-5131- Request report be faxed to
                        SWD fax # 444-6378. You can
                        leave a message with rig # address of incident, date, time and
                        RB#</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    {{ Form::checkbox('daybook', 1, null, ['id' => 'daybook', 'class'=>'className']) }}
                    <label><strong>
                            Enter in Company Day
                            Book</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="form-group">
                        {{ Form::checkbox('checkbox8', 1, null, ['id'=>'checkbox8', 'class' => 'className', 'disabled' ]) }}
                        {{Form::label('checkbox8','State Law requires every operator of a motor vehicle involved in an accident
                        resulting in either injury, death, or damages over $1,000.00 to the property of any one person
                        ')}}
                        {{Form::label('checkbox8','(including the operator).')}}
                        {{Form::label('checkbox8','To complete the State of Nebraska "DR Form 41" and return within 10 days
                        following the accident to the State of Nebraska. Click on Download to access the document')}}
                    </div>
                </div>
                {{--}} <label class="checkbox-inline col-sm-12"><strong><strong> Complete DR 41 State
                             of Nebraska DMV Vehicle Accident Report</strong></strong></label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                           href="{{ url('http://roads.nebraska.gov/media/3337/dr41-no-fill.pdf') }}" target="blank">
                            {{--download="(Accident PDF) DR 41 State of Nebraska DMV Vehicle Accident Report.pdf">--}}
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="DR41" id="41Upload"
                                                                                           style="display: none;"
																						   onchange="pressed7()">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                        @if($errors->has('DR41'))
                            <p class="help-block">
                                {{ $errors->first('DR41') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a8"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="6a8" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a8')
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}
                                                </td>
                                            <tr>
                                                @endif
                                                @endforeach
                                                @endif
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="form-group">
                        {{ Form::checkbox('checkbox9', 1, null, ['id'=>'checkbox9', 'class' => 'className', 'disabled']) }}
                        {{Form::label('Checkbox9','Miscellaneous Documents - Upload any additional documents related to this incident if necessary.')}}
                    </div>
                </div>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="miscUplaods"
                                                                                           name="miscaccidents"
                                                                                           style="display: none;"
																						   onchange="pressed8()">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                        @if($errors->has('LRS101'))
                            <p class="help-block">
                                {{ $errors->first('LRS101') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#6a9"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>
                        <div id="6a9" class="collapse">
                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmenttype == '6a9')
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentname) }}"> {{$attachment->attachmentname}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_at}}
                                                </td>
                                            <tr>
                                                @endif
                                                @endforeach
                                                @endif
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <label class="col-sm-5"></label>

            {!! Form::submit('Save as Draft',['class' => 'btn btn-primary','name' => 'partialSave']) !!}

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                Submit
            </button>

            <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
            <br>

        </div>
    </div>

    @if (!empty($comments))
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="actionBox">
                    <ul class="commentList">
                        @foreach ($comments as $cm)
                            @if($cm->applicationtype == '6A'&&
                            ($accident->driverid == Auth::user()->id && $cm->isvisible == 1))
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
                    {!! Form::submit('Yes',['class' => 'btn btn-success','name'=> 'store']) !!}
                    <button type="button" class=" btn btn-danger" data-dismiss="modal" aria-label="">No</button>


                </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop
<script>
    window.pressed = function () {
        var a = document.getElementById('lrsdownload');
        if (a.value == "") {

        }
        else {
            document.getElementById("checkbox1").checked = true;
        }
    };
    window.pressed1 = function () {
        var a = document.getElementById('295upload');
        if (a.value == "") {

        }
        else {
            document.getElementById("checkbox2").checked = true;
        }
    };
    window.pressed2 = function () {
        var a = document.getElementById('25aUpload');
        if (a.value == "") {

        }
        else {
            document.getElementById("checkbox3").checked = true;
        }
    };
    window.pressed3 = function () {
        var a = document.getElementById('25bUpload');
        if (a.value == "") {

        }
        else {
            document.getElementById("checkbox4").checked = true;
        }
    };
    window.pressed4 = function () {
        var a = document.getElementById('25cUpload');
        if (a.value == "") {

        }
        else {
            document.getElementById("checkbox5").checked = true;
        }
    };
    window.pressed5 = function () {
        var a = document.getElementById('31Upload');
        if (a.value == "") {

        }
        else {
            document.getElementById("checkbox6").checked = true;
        }
    };
    window.pressed6 = function () {
        var a = document.getElementById('127Upload');
        if (a.value == "") {

        }
        else {
            document.getElementById("checkbox7").checked = true;
        }
    };
    window.pressed7 = function () {
        var a = document.getElementById('41Upload');
        if (a.value == "") {

        }
        else {
            document.getElementById("checkbox8").checked = true;
        }
    };
    window.pressed8 = function () {
        var a = document.getElementById('miscUplaods');
        if (a.value == "") {

        }
        else {
            document.getElementById("checkbox9").checked = true;
        }
    };
</script>