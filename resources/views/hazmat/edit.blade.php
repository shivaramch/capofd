@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('hazmat.index') }}">OFD 6C Hazmat Exposure</a></li>
        <li class="active">Edit OFD 6C Form {{ $hazmat->ofd6cID }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($hazmat,['method' => 'PUT', 'route' => ['hazmat.update', $hazmat->ofd6cID], 'files' => true,]) !!}

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#datepicker1").datepicker({
                onClose: function () {
                    var date2 = $('#datepicker1').datepicker('getDate');
                    date2.setDate(date2.getDate() + 35)
                    $("#datepicker2").datepicker("setDate", date2);

                }
            });
            $("#datepicker2").datepicker();
        });
    </script>
    <style>
        #padtop {
            padding-top: 7px;
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
                        {!! Form::label('employeeID', 'Employee ID #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('employeeID', old('employeeID'), ['class' => 'form-control', 'placeholder'=>'Enter Employee ID', 'required'=>'required'])!!}
                            <p class="help-block"></p>
                            @if($errors->has('employeeID'))
                                <p class="help-block">
                                    {{ $errors->first('employeeID') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('exposedEmployeeName', 'Exposed Employee Name', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('exposedEmployeeName', old('exposedEmployeeName'), ['class' => 'form-control', 'placeholder'=>'Enter Driver ID', 'required'=>'required'])!!}
                            <p class="help-block"></p>
                            @if($errors->has('exposedEmployeeName'))
                                <p class="help-block">
                                    {{ $errors->first('exposedEmployeeName') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('dateOfExposure', 'Date of Exposure', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('dateOfExposure', old('dateOfExposure'), array('class'=>'datepicker form-control','placeholder'=>'MM/DD/YYYY', 'required'=>'required'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('dateOfExposure'))
                                <p class="help-block">
                                    {{ $errors->first('dateOfExposure') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('idconumber', 'Primary IDCO #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('idconumber', old('idconumber'), ['class' => 'form-control','placeholder'=>'Enter IDCO Badge ID', 'required'=>'required'])!!}
                            <p class="help-block"></p>
                            @if($errors->has('idconumber'))
                                <p class="help-block">
                                    {{ $errors->first('idconumber') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('epcrIncidentNum', 'EPCR Incident#', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('epcrIncidentNum', old('epcrIncidentNum'), ['class' => 'form-control','placeholder'=>'Enter Incident Num', 'required'=>'required'])!!}
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
                        {!! Form::label('assignmentHazmat', 'Assignment', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('assignmentHazmat', old('assignmentHazmat'), ['class' => 'form-control', 'required'=>'required'])!!}
                            <p class="help-block"></p>
                            @if($errors->has('assignmentHazmat'))
                                <p class="help-block">
                                    {{ $errors->first('assignmentHazmat') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('shift', 'Shift', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6">
                            {!! Form::select('shift',
                            ['A' => 'A',
                             'B' => 'B',
                             'C' => 'C',
                             'DIV' => 'DIV'],
                             ['class' => 'form-control', 'required'=>'required'])!!}
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
                        <label class="checkbox-inline col-sm-4"><input type="checkbox" >
                            <strong>Contact CorVel Enterprise Comp @ 877-764-3574.
                                Tell them you have a Hazardous Material Exposure and the call is for reporting ONLY.
                            </strong>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label class="checkbox-inline col-sm-4"><input type="checkbox">
                            <strong>Once you have completed the call, record CorVel Claim #</strong>
                        </label>
                        <div class="col-sm-4">
                            {!! Form::text('corvelID', '', array('class'=>'form-control', 'required'=>'required'))!!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="checkbox-inline col-sm-12">
                        <strong>Fill out OFD-025 Hazmat Exposure Report form</strong>
                    </label>
                    <br>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                               href="{{ asset('Fillable PDFs\Hazmat Module\(Exposure PDF - Updated OFD 006d) OFD 025 - HazMat Exposure Report.pdf') }}">
                                <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-info dropdown-toggle col-sm-12" data-toggle="modal"
                                    data-target="#myModal">
                                <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload
                            </button>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label class="col-sm-4">Do you have any symptoms of illness or injury and require treatment</label>
                            <div class="col-sm-2">
                                <form name="cityselect">
                                    <select name="menu" onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="GO">
                                        <option selected="selected">Select One</option>
                                        <option value="http://localhost/capstoneGR/public/injuries">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>


                <div class="panel panel-default">
                    <div class="col-sm-12 panel-heading">
                        <label class="col-sm-5"></label>
                        <div class="btn-bottom ">
                            {!! Form::submit('Submit',['class' => 'btn btn-success']) !!}
                            <a href="{{ route('hazmat.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>





    {!! Form::close() !!}
@stop
