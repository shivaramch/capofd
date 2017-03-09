@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('biologicals.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('biologicals.index') }}">OFD 6B Biologicals</a></li>
        <li class="active">Edit OFD 6B Form {{ $biological->ofd6bID }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($biological,['method' => 'PUT', 'route' => ['biologicals.update', $biological->ofd6bID], 'files' => true,]) !!}

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
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
                {!! Form::label('exposedEmployeeName', 'Exposed Employee Name',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                <div class="col-sm-6 ">
                    {!! Form::text('exposedEmployeeName', old('exposedEmployeeName'), array('class'=>'form-control'))!!}
                    <p class="help-block"></p>
                    @if($errors->has('exposedEmployeeName'))
                        <p class="help-block">
                            {{ $errors->first('exposedEmployeeName') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('dateOfExposure', 'Date of Exposure', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                <div class="col-sm-6 ">
                    {!! Form::text('dateOfExposure', old('dateOfExposure'), array('id'=>'datepicker','class' => 'form-control datepicker', 'placeholder' => 'YYYY-MM-DD','required' => 'required'))!!}
                    <p class="help-block"></p>
                    @if($errors->has('dateOfExposure'))
                        <p class="help-block">
                            {{ $errors->first('dateOfExposure') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('employeeID_1', 'Employee ID#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                <div class="col-sm-6 ">
                    {!! Form::text('employeeID_1', old('employeeID_1'), array('class'=> 'form-control','placeholder'=>'Enter Badge ID'))!!}
                    <p class="help-block"></p>
                    @if($errors->has('employeeID_1'))
                        <p class="help-block">
                            {{ $errors->first('employeeID_1') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-group">
                {!! Form::label('assignmentBiological', 'Assignment', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                <div class="col-sm-6 ">
                    {!! Form::text('assignmentBiological', old('assignmentBiological'), array('class' => 'form-control'))!!}
                    <p class="help-block"></p>
                    @if($errors->has('assignmentBiological'))
                        <p class="help-block">
                            {{ $errors->first('assignmentBiological') }}
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
                  'DIV' => 'DIV'], ['class' => 'form-control'])!!}
                    <p class="help-block"></p>
                    @if($errors->has('shift'))
                        <p class="help-block">
                            {{ $errors->first('shift') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('epcrIncidentNum', 'EPCR Incident#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                <div class="col-sm-6 ">
                    {!! Form::text('epcrIncidentNum', old('epcrIncidentNum'), array('class' => 'form-control','placeholder'=>'Enter Incident Num'))!!}
                    <p class="help-block"></p>
                    @if($errors->has('epcrIncidentNum'))
                        <p class="help-block">
                            {{ $errors->first('epcrIncidentNum') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-group">
                {!! Form::label('idcoNumber', 'Primary IDCO #', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                <div class="col-sm-6 ">
                    {!! Form::text('idcoNumber', old('idcoNumber'), array('class' => 'form-control','placeholder'=>'Enter IDCO Badge ID'))!!}
                    <p class="help-block"></p>
                    @if($errors->has('idcoNumber'))
                        <p class="help-block">
                            {{ $errors->first('idcoNumber') }}
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
            <div class="col-sm-4 form-group">
                {!! Form::label('todaysDate', 'Date', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                <div class="col-sm-6 ">
                    {!! Form::text('todaysDate', old('todaysDate'), array('class'=>'datepicker form-control','placeholder'=>'MM/DD/YYYY'))!!}
                    <p class="help-block"></p>
                    @if($errors->has('todaysDate'))
                        <p class="help-block">
                            {{ $errors->first('todaysDate') }}
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
                        {{ Form::checkbox('trueDecontaminate', 1, null, ['id' => 'trueDecontaminate', 'class'=>'className']) }}
                        {{Form::label('trueDecontaminate','Decontaminate self- wash, flush as soon as possible  ')}}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('confirmSource', 1, null, ['id'=>'confirmSource', 'class' => 'className' ]) }}
                        {{ Form::label('confirmSource', 'Confirm Source - Patient blood draw with OUCH Nurse') }}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('trueOFD184', 1, null, ['id'=>'trueOFD184', 'class' => 'className' ]) }}
                        {{Form::label('trueOFD184','Complete OFD 184')}}
                    </div>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                               href="{{ asset('Fillable PDFs\Exposure Complete\(Exposure PDF) OFD 184 State Infectious Disease Exposure Report.pdf')}}"
                               download="(Exposure PDF) OFD 184 State Infectious Disease Exposure Report.pdf">
                                <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <label class="input-group-btn">
                                            <span class="btn btn-info"><i class="fa fa-cloud-upload"
                                                                          aria-hidden="true"></i> Upload<input
                                                        type="file" name="trueOFD184"
                                                        style="display: none;"
                                                        multiple>
                                            </span>
                                </label>
                                <input type="text" id="upload-file-info" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                               data-target="#619"><i class="fa fa-eye" aria-hidden="true"></i> View
                                Previously
                                uploaded
                                file(s)
                            </a>

                            <div id="619" class="collapse">

                                <table class="table table-striped">
                                    <tr>
                                        <th> File Name</th>
                                        <th> File Uploaded At</th>
                                    </tr>

                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmentType == 619 && $attachment->createdBy ==  Auth::user()->id && $attachment->ofd6bID == $biological->ofd6bID )
                                                <tr>
                                                    <td>
                                                        <a href="{{ asset('uploads/'.$attachment->attachmentName) }}"> {{$attachment->attachmentName}}</a>
                                                    </td>
                                                    <td>
                                                        {{$attachment->created_At}}</a>
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
                        {{ Form::checkbox('bloodReport', 1, null, ['id' => 'bloodReport', 'class'=>'className']) }}
                        {{Form::label('bloodReport','Report for blood draw as directed by OUCH Nurse')}}

                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('exposureTab', 1, null, ['id' => 'exposureTab', 'class'=>'className']) }}
                        {{Form::label('exposureTab','Complete Exposure tab in ePCR ')}}

                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('trueBagTag', 1, null, ['id' => 'trueBagTag', 'class'=>'className']) }}
                        {{Form::label('trueBagTag','Bag & Tag clothing if applicable - send email to PSS with pick-up location ')}}

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('notifyPSS', 1, null, ['id' => 'notifyPSS', 'class'=>'className']) }}
                        {{Form::label('notifyPSS','Notify the on-duty PSS via phone at 402-660-1060 ')}}

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('truePPE', 1, null, ['id' => 'truePPE', 'class'=>'className']) }}
                        {{Form::label('truePPE','PPE has been cleaned per SOP SWD 1-0  ')}}

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('trueDocumentDayBook', 1, null, ['id' => 'trueDocumentDayBook', 'class'=>'className']) }}
                        {{Form::label('trueDocumentDayBook','Document in Company Day Book and on your Personnel Record')}}

                    </div>
                </div>

            </div>

            <div id="Exposure1" class="desc" style="display: none;">

                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('potDecontaminate', 1, null, ['id' => 'potDecontaminate', 'class'=>'className']) }}
                        {{Form::label('potDecontaminate','Decontaminate self- wash, flush as soon as possible  ')}}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('potBagTag', 1, null, ['id' => 'potBagTag', 'class'=>'className']) }}
                        {{Form::label('potBagTag','Bag & Tag clothing if applicable - send email to PSS with pick-up location')}}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('potOFD184', 1, null, ['id'=>'potOFD184', 'class' => 'className' ]) }}
                        {{Form::label('potOFD184','Complete OFD 184')}}
                    </div>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                               href="{{ asset('Fillable PDFs\Exposure Complete\(Exposure PDF) OFD 184 State Infectious Disease Exposure Report.pdf')}}"
                               download="(Exposure PDF) OFD 184 State Infectious Disease Exposure Report">
                                <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="postOFD184"
                                                                                           style="display: none;"
                                                                                           multiple>
                    </span>
                                </label>
                                <input type="text" id="upload-file-info" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                               data-target="#620"><i class="fa fa-eye" aria-hidden="true"></i> View Previously
                                uploaded
                                file(s)
                            </a>

                            <div id="620" class="collapse">

                                <table class="table table-striped">
                                    <tr>
                                        <th> File Name</th>
                                        <th> File Uploaded At</th>
                                    </tr>

                                    @if(count($attachments) > 0)
                                        @foreach($attachments as $attachment)
                                            @if($attachment->attachmentType == 620 && $attachment->createdBy ==  Auth::user()->id && $attachment->ofd6bID == $biological->ofd6bID )
                                                <tr>
                                                    <td>
                                                        <a href="{{ asset('uploads/'.$attachment->attachmentName) }}"> {{$attachment->attachmentName}}</a>
                                                    </td>
                                                    <td>
                                                        {{$attachment->created_At}}</a>
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
                        {{ Form::checkbox('potPPE', 1, null, ['id' => 'potPPE', 'class'=>'className']) }}
                        {{Form::label('potPPE','PPE has been cleaned per SOP SWD 1-0')}}

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('potDocumentDayBook', 1, null, ['id' => 'potDocumentDayBook', 'class'=>'className']) }}
                        {{Form::label('potDocumentDayBook','Document in Company Day Book and on your Personnel Record   ')}}
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger" align="left">
                            {{Form::label('exposureInjury','Do you have any symptoms of illness or injury and require
                               treatment? (In case of Injury, please fill OFD - 6 IOD Application)     ')}}

                            {!! Form::select('exposureInjury',[
                              'Yes' => 'Yes',
                              'No' => 'No'],
                            array('class' => 'form-control'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('exposureInjury'))
                                <p class="help-block">
                                    {{ $errors->first('exposureInjury') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label class="col-sm-5"></label>
                <div class="btn-bottom">
                    {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
                    <a href="{{ route('biologicals.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>


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
@endsection