@extends('layouts.app')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>


<script>
    $(document).ready(function () {
        $(".datepicker1").datepicker({
            onClose: function () {
                var date2 = $('.datepicker1').datepicker('getDate');
                date2.setDate(date2.getDate() + 35)
                $(".datepicker2").datepicker("setDate", date2);

                var date3 = $('.datepicker1').datepicker('getDate');
                date3.setDate(date3.getDate() + 0)
                $("#datepicker32").datepicker("setDate", date3);
            }
        });
        $(".datepicker2").datepicker();
        $("#datepicker32").datepicker();


    });
</script>


@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('accidents.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('accidents.index') }}">OFD 6A Accidents</a></li>
        <li class="active">New Form</li>
    </ol>
@endsection
@section('content')
    {!! Form::open(['method' => 'POST', 'route' => ['accidents.store'], 'files' => true,]) !!}

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
                                <h3><strong>Vehicle Accident Report Tracking Document (OFD-6A)</strong></h3>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h5><i><strong>Issue Date: 9/1/16</strong></i></h5>
                        </div>
                        <div class="col-md-2">
                            <h5><i><strong>Effective Date: 9/1/16</strong></i></h5>
                        </div>
                        <div class="col-md-12">
                            <h5><i><strong>Amends, Replaces, Rescinds: Replaces OFD-6A (July 2016) </strong></i></h5>
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
                                Refer to SOP ADM 3-3 Fire Apparatur/Vehicle Accident Investigation
                                <br>
                                COMPLETE ALL FORMS AND FORWARD VIA CHAIN-OF-COMMAND WITHIN 48 HOURS
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('accidentDate', 'Date of Accident:',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') )!!}
                        <div class="col-sm-6 ">
                            {!! Form::text('accidentDate1', old('accidentDate1'), array('id'=>'datepicker12','class' => 'form-control datepicker1', 'placeholder' => 'YYYY-MM-DD','required' => 'required'))!!}

                            {!! Form::text('accidentDate', old('accidentDate'), array('style'=>'display:none;','id'=>'datepicker32','class' => 'form-control datepicker', 'placeholder' => 'YYYY-MM-DD','required' => 'required'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('accidentDate'))
                                <p class="help-block">
                                    {{ $errors->first('accidentDate') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('driverID', 'Driver ID#', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('driverID', old('driverID'), array('class'=>'form-control','placeholder'=>'Enter Driver ID'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('driverID'))
                                <p class="help-block">
                                    {{ $errors->first('driverID') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('driverName', 'Driver Name',array( 'style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('driverName', old('driverName'), array('class'=>'form-control','placeholder'=>'Enter Driver Name'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('driverName'))
                                <p class="help-block">
                                    {{ $errors->first('driverName') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('assignmentAccident', 'Assignment', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('assignmentAccident', old('station_name'), ['class' => 'form-control'])!!}
                            <p class="help-block"></p>
                            @if($errors->has('assignmentAccident'))
                                <p class="help-block">
                                    {{ $errors->first('assignmentAccident') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('appratus', 'Apparatus', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('appratus', old('station_name'), ['class' => 'form-control'])!!}
                            <p class="help-block"></p>
                            @if($errors->has('appratus'))
                                <p class="help-block">
                                    {{ $errors->first('appratus') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('captainID', 'Captain #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('captainID', old('captainID'), array('class' => 'form-control','placeholder'=>'Enter Badge Id'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('captainID'))
                                <p class="help-block">
                                    {{ $errors->first('captainID') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('battalionChiefID', 'Battalion Chief #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('battalionChiefID', old('battalionChiefID'), array('class' => 'form-control','placeholder'=>'Enter Badge Id'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('battalionChiefID'))
                                <p class="help-block">
                                    {{ $errors->first('battalionChiefID') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('acOnDutyID', 'Assistant Chief #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('acOnDutyID', old('assitantChiefID'), array('class' => 'form-control','placeholder'=>'Enter Badge Id'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('acOnDutyID'))
                                <p class="help-block">
                                    {{ $errors->first('acOnDutyID') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="alert alert-danger" align="center">
                    <div class="row">
                        <label>Please submit all the forms by:<input type="text" class="form-control datepicker2"
                                                                     id="datepicker12"
                                                                     disabled></label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <strong>
                                B/C shall ensure all reports are properly completed and forwarded to Safety Officer
                                within 24 hours of accident.
                                <br>
                                Police Report is REQUIRED on all City vehicles involved in an accident OR property
                                damage whether on public streets, private property, or at the Fire Station
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
                <div class="col-sm-12" form-group>
                    <label class="checkbox-inline col-sm-8"><input type="checkbox"><strong>Generate OFD 025
                            Intradepartmental Communication</strong>-Email to <a
                                href="omafaccident_ofd25@cityofomaha.org"> omafaccident_ofd25@cityofomaha.org </a>
                    </label>
                </div>
            </div>
            <br>
            <div class="row">
                <label class="checkbox-inline col-sm-12">
                    <strong>Complete LRS 101 City of Omaha Accident Report-Include RB#, Officer Name, Badge#</strong>
                </label>
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
                                                                                           name="LRS101"
                                                                                           style="display: none;">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-12"><strong><strong>Complete OFD 295
                            Vehicle Accident Witness Statement</strong>-This Report is for civilian statements
                        only</strong></label>
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
                                                                                           name="OFD295"
                                                                                           style="display: none;">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-12"><strong>Complete OFD 25a Accident
                        Intradepartmental Communication</strong>-Driver</label>
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
                                                                                           name="OFD025a"
                                                                                           style="display: none;">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="checkbox-inline col-sm-12"><strong>Complete OFD 25b Accident
                        Intradepartmental Communication</strong>-Supervisor</label>
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
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD025b"
                                                                                           style="display: none;">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="checkbox-inline col-sm-12"><strong>Complete OFD 25c Accident
                        Intradepartmental Communication</strong>-Other Personnel</label>
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
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD025c"
                                                                                           style="display: none;">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="checkbox-inline col-sm-12"><strong> Complete OFD 31-OFD
                        Damaged, Lost, Stolen Equipment Report</strong></label>
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
                                                                                           style="display: none;">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="checkbox-inline col-sm-12"><strong> Complete OFD 127 Request for
                        Services Form</strong></label>
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
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD127"
                                                                                           style="display: none;">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="checkbox-inline col-sm-12"><strong><strong> Complete DR 41 State
                            of Nebraska DMV Vehicle Accident Report</strong></strong></label>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) DR 41 State of Nebraska DMV Vehicle Accident Report.pdf') }}"
                           download="(Accident PDF) DR 41 State of Nebraska DMV Vehicle Accident Report.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="DR41"
                                                                                           style="display: none;">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label class="checkbox-inline col-sm-12"><input type="checkbox"><strong>
                            Call Law Department
                            Investigator</strong>- Call 444-5131- Request report be faxed to
                        SWD fax # 444-6378. You can
                        leave a message with rig # address of incident, date, time and
                        RB#</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label class="checkbox-inline col-sm-4"><input type="checkbox"><strong>
                            Enter in Company Day
                            Book</strong></label></div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="col-sm-12 panel-headinzzzzg">
            <label class="col-sm-5"></label>
            <div class="btn-bottom ">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    Save
                </button>

                <a href="{{ route('accidents.index') }}" class="btn btn-default">Cancel</a>
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
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Submit',['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop