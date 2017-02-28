@extends('layouts.app')
@section('content')
    {!! Form::open(['method' => 'POST', 'route' => ['biologicals.store'], 'files' => true,]) !!}
    <div class="container-fluid">

        <div class="jumbotron" style="margin-bottom: 5px; ">

            <div class="row">
                <div class="col-md-2">
                    <img src="{{asset('img/login.png')}}">
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="page-header1">
                            <h3><strong>Exposure Tracking Document OFD006B</strong></h3>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h6><i><strong>Issue Date: 8/17/16</strong></i></h6>
                    </div>
                    <div class="col-md-2">
                        <h6><i><strong>Effective Date: 8/17/16</strong></i></h6>
                    </div>
                    <div class="col-md-12">
                        <h6><i><strong>Amends, Replaces, Rescinds: Replaces OFD-6A (Rev. 05-15)</strong></i></h6>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-4 form-group">
                    {!! Form::label('station_name', 'Exposed Employee Name', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('exposedEmployeeName', old('station_name'), ['class' => 'form-control'])!!}
                        <p class="help-block"></p>
                        @if($errors->has('station_name'))
                            <p class="help-block">
                                {{ $errors->first('station_name') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('station_name', 'Date of Exposure', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('dateofExposure', old('station_name'), array('class'=>'datepicker form-control','placeholder'=>'MM/DD/YYYY'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('station_name'))
                            <p class="help-block">
                                {{ $errors->first('station_name') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('station_name', 'Employee ID#', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('employeeID_1', old('station_name'), ['class' => 'form-control'])!!}
                        <p class="help-block"></p>
                        @if($errors->has('station_name'))
                            <p class="help-block">
                                {{ $errors->first('station_name') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    {!! Form::label('station_name', 'Assignment', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('assignmentBiological', old('station_name'), ['class' => 'form-control'])!!}
                        <p class="help-block"></p>
                        @if($errors->has('station_name'))
                            <p class="help-block">
                                {{ $errors->first('station_name') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="col-sm-4 form-group">
                    {!! Form::label('station_name', 'Shift', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::select('shift',[
                      'A' => 'A',
                      'B' => 'B',
                      'C' => 'C',
                      'DIV' => 'DIV'], ['class' => 'form-control'])!!}
                        <p class="help-block"></p>
                        @if($errors->has('station_name'))
                            <p class="help-block">
                                {{ $errors->first('station_name') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('station_name', 'EPCR Incident#', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('epcrIncidentNum', old('station_name'), ['class' => 'form-control'])!!}
                        <p class="help-block"></p>
                        @if($errors->has('station_name'))
                            <p class="help-block">
                                {{ $errors->first('station_name') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
                    {!! Form::label('station_name', 'Primary IDCO', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('idconumber', old('station_name'), ['class' => 'form-control'])!!}
                        <p class="help-block"></p>
                        @if($errors->has('station_name'))
                            <p class="help-block">
                                {{ $errors->first('station_name') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    {!! Form::label('station_name', 'Date of Exposure', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-6 ">
                        {!! Form::text('dateofExposure', old('station_name'), array('class'=>'datepicker form-control','placeholder'=>'MM/DD/YYYY'))!!}
                        <p class="help-block"></p>
                        @if($errors->has('station_name'))
                            <p class="help-block">
                                {{ $errors->first('station_name') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <h4 style="padding-left:12px;"><u><strong>The following Checklist will follow:</strong></u></h4>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('decontaminate', 1, null, ['id'=>'decontaminate', 'class' => 'className' , 'required' => 'required']) }}
                        {{ Form::label('decontaminate', 'Decontaminate') }}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('callChi', 1, null, ['id'=>'callChi', 'class' => 'className' , 'required' => 'required']) }}
                        {{ Form::label('callChi', 'Call CHI OUCH Nurse to determine type of exposure') }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <h4> In Case of True Exposure Please Click Below</h4>
                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#id">True Exposure
                    </button>
                    <div id="id" class="collapse">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {{ Form::checkbox('confirmSource', 1, null, ['id'=>'confirmSource', 'class' => 'className' , 'required' => 'required']) }}
                                {{ Form::label('confirmSource', 'Confirm Source - Patient blood draw with OUCH Nurse') }}
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="checkbox-inline col-sm-6"><input type="checkbox"><strong>Complete OFD
                                        184</strong></label>
                                <div class="col-sm-2">
                                    <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                                       href="/download/a.txt">
                                        <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-info dropdown-toggle col-sm-12" type="button"
                                            data-toggle="modal"
                                            data-target="#myModal">
                                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload
                                    </button>
                                </div>
                                <div class="col-sm-2">
                                    <a href="uploads/OFD6a">Uploads/firefighters3/january/OFD6a.pdf </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="checkbox-inline col-sm-4"><input type="checkbox"><strong>Report for blood
                                        draw as directed by OUCH Nurse</strong></label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="checkbox-inline col-sm-4"><input type="checkbox"><strong>Complete Exposure
                                        tab in ePCR </strong></label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="checkbox-inline col-sm-4"><input type="checkbox"><strong>Bag & Tag
                                        clothing if applicable - send email to PSS with pick-up
                                        location</strong></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="checkbox-inline col-sm-4"><input type="checkbox"><strong>Notify the
                                        on-duty PSS via phone at 402-660-1060 </strong></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="checkbox-inline col-sm-4"><input type="checkbox"><strong>PPE has been
                                        cleaned per SOP SWD 1-0 </strong></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="checkbox-inline col-sm-4"><input type="checkbox"><strong>Document in
                                        Company Day Book and on your Personnel Record </strong></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <h4>In Case of Potential Exposure Please Click Below</h4>
                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#id1">Potential
                        Exposure
                    </button>
                    <div id="id1" class="collapse">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="checkbox-inline col-sm-4"><input type="checkbox"><strong>Decontaminate
                                        self- wash, flush as soon as possible</strong></label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="checkbox-inline col-sm-12"><input type="checkbox"><strong>Bag & Tag
                                        clothing if applicable - send email to PSS with pick-up
                                        location</strong></label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="checkbox-inline col-sm-6"><input type="checkbox"><strong>Complete OFD
                                        184</strong></label>
                                <div class="col-sm-2">
                                    <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                                       href="/download/a.txt">
                                        <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-info dropdown-toggle col-sm-12" type="button"
                                            data-toggle="modal"
                                            data-target="#myModal">
                                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload
                                    </button>
                                </div>
                                <div class="col-sm-2">
                                    <a href="uploads/OFD6a">Uploads/firefighters3/january/OFD6a.pdf </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="checkbox-inline col-sm-4"><input type="checkbox"><strong>PPE has been
                                        cleaned per SOP SWD 1-0 </strong></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="checkbox-inline col-sm-4"><input type="checkbox"><strong>Document in
                                        Company Day Book and on your Personnel Record </strong>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="col-sm-5"></label>
                        <div class="btn-bottom">
                            <div class="btn btn-primary">Save & Exit &raquo;</div>
                            <div class="btn btn-primary">Submit &raquo;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop