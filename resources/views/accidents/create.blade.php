@extends('layouts.app')

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
    {!! Form::open(['method' => 'POST', 'url' => '/accidents/save', 'files' => true,]) !!}
    <input type="hidden" name="_token" value="{!!  'csrf_token()' !!}">
    {{ csrf_field() }}

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
                        <div class="col-md-12">
                            <h5><i><strong>Used for future tracking purposes only</strong></i></h5>
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
                                COMPLETE ALL FORMS AND FORWARD VIA CHAIN-OF-COMMAND WITHIN 24 HOURS
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('accidentdate', 'Date of Accident:',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') )!!}
                        <div class="col-sm-6 ">
                            {!! Form::text('accidentdate', old('accidentdate'), array('class' => 'form-control datepicker', 'id' => 'accidentdate','placeholder' => 'MM-DD-YYYY'))!!}

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
                            {!! Form::text('driverid', old('driverid'), array('class'=>'form-control','id' => 'driverid', 'placeholder'=>'Enter Driver ID'))!!}
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
                            {!! Form::text('drivername', old('drivername'), array('class'=>'form-control','id' => 'drivername', 'placeholder'=>'Enter Driver Name'))!!}
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
                            {!! Form::text('frmsincidentnum12', old('frmsincidentnum12'), array('id'=>'text1', 'class' => 'form-control','id' => 'incidentnum', 'placeholder'=>'Enter FRMS Number'))!!}
                            {!! Form::text('frmsincidentnum', old('frmsincidentnum'), array('id'=>'text2', 'class' => 'form-control', 'id' => 'incidentnum', 'placeholder'=>'Enter FRMS Number', 'style'=>'display:none;'))!!}
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
                            {!! Form::text('assignmentaccident', old('assignmentaccident'), ['class' => 'form-control', 'id' => 'assignmentaccident'])!!}
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
                            {!! Form::text('apparatus', old('apparatus'), ['class' => 'form-control', 'id' => 'apparatus'])!!}
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
                            {!! Form::text('captainid', old('captainid'), array('class' => 'form-control','id' => 'captainid', 'placeholder'=>'Enter Badge Id'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('captainid'))
                                <p class="help-block">
                                    {{ $errors->first('captainid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('battalionchiefid', 'Battalion Chief #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('battalionchiefid', old('battalionchiefid'), array('class' => 'form-control','id' => 'bchiefid', 'placeholder'=>'Enter Badge Id'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('battalionchiefid'))
                                <p class="help-block">
                                    {{ $errors->first('battalionchiefid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('aconduty', 'Assistant Chief #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('aconduty', old('aconduty'), array('class' => 'form-control','id' => 'achiefid', 'placeholder'=>'Enter Badge Id'))!!}
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
                                Please Follow These Instructions:
                                <ol start="1">
                                    <li>B/C shall ensure all reports are properly completed within 24 hours.</li>
                                    <li>If an employee receives an injury from this incident, the employee shall
                                        complete an OFD6 and designate whether treatment is being requested in the
                                        OFD-25 IOD.
                                    </li>
                                    <li>City of Omaha policy REQUIRES a Police Report and DR41 State Form on all City
                                        vehicles involved in an accident OR property damage whether on public streets,
                                        private property, or at the Fire Station.
                                    </li>
                                    <li>DR41 is also submitted to the State if damage is over $1000.00</li>
                                </ol>
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
                        {{Form::label('commemail','Generate OFD 025 Intradepartmental Communication - Email to omafaccident_ofd25@cityofomaha.org')}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="form-group">
                        {{ Form::checkbox('checkbox1', 1, null, ['id'=>'checkbox1', 'class' => 'className' ]) }}
                        {{Form::label('checkbox1','Complete LRS 101 City of Omaha Accident Report-Include RB#, Officer Name, Badge#')}}
                    </div>
                </div>
                {{--}} <label class="checkbox-inline col-sm-12">
                     <strong>Complete LRS 101 City of Omaha Accident Report-Include RB#, Officer Name, Badge#</strong>
                 </label> --}}

                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" id="lrsdownload" type="button"
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
                                                                                           id="lrsdownload"
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
                    <div class="form-group">
                        {{ Form::checkbox('checkbox2', 1, null, ['id'=>'checkbox2', 'class' => 'className' ]) }}
                        {{Form::label('checkbox2','Complete OFD 295
                            Vehicle Accident Witness Statement -This Report is for civilian statements
                        only')}}
                    </div>
                </div>
                {{--}} <label class="col-sm-12"><strong><strong>Complete OFD 295
                             Vehicle Accident Witness Statement</strong>-This Report is for civilian statements
                         only</strong></label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button" id="295download"
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
                                                                                           id="295upload"
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
                    <div class="form-group">
                        {{ Form::checkbox('checkbox3', 1, null, ['id'=>'checkbox3', 'class' => 'className' ]) }}
                        {{Form::label('checkbox3','Complete OFD 25a Accident
                        Intradepartmental Communication - Driver')}}
                    </div>
                </div>
                {{--}} <label class="col-sm-12"><strong>Complete OFD 25a Accident
                         Intradepartmental Communication</strong>-Driver</label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button" id="25aDownload"
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
                                                                                           id="25aUpload"
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
                    <div class="form-group">
                        {{ Form::checkbox('checkbox4', 1, null, ['id'=>'checkbox4', 'class' => 'className' ]) }}
                        {{Form::label('checkbox4','Complete OFD 25b Accident
                        Intradepartmental Communication - Supervisor')}}
                    </div>
                </div>

                {{--}}<label class="checkbox-inline col-sm-12"><strong>Complete OFD 25b Accident
                        Intradepartmental Communication</strong>-Supervisor</label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button" id="25bDownload"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) OFD 025b Accident Intradepartmental Communication - Supervisor.pdf') }}"
                           download="(Accident PDF) OFD 025b Accident Intradepartmental Communication - Supervisor.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD025b" id="25bUpload"
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
                    <div class="form-group">
                        {{ Form::checkbox('checkbox5', 1, null, ['id'=>'checkbox5', 'class' => 'className' ]) }}
                        {{Form::label('checkbox5','Complete OFD 25b Accident
                        Intradepartmental Communication - Other Personnel')}}
                    </div>
                </div>

                {{--}}  <label class="checkbox-inline col-sm-12"><strong>Complete OFD 25c Accident
                          Intradepartmental Communication</strong>-Other Personnel</label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button" id="25cDownload"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) OFD 025c Accident Intradepartmental Communication - Other Personnel.pdf') }}"
                           download="(Accident PDF) OFD 025c Accident Intradepartmental Communication - Other Personnel.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD025c" id="25cUpload"
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
                    <div class="form-group">
                        {{ Form::checkbox('checkbox6', 1, null, ['id'=>'checkbox6', 'class' => 'className' ]) }}
                        {{Form::label('checkbox6','Complete OFD 31-OFD
                            Lost, Damaged or Stolen Equipment Report')}}
                    </div>
                </div>
                {{--}}<label class="checkbox-inline col-sm-12"><strong> Complete OFD 31-OFD
                        Damaged, Lost, Stolen Equipment Report</strong></label>--}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button" id="31Download"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) OFD 31 Lost, Damaged or Stolen Equipment Report.pdf') }}"
                           download="(Accident PDF) OFD 31 Lost, Damaged or Stolen Equipment Report.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD31" id="31Upload"
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
                    <div class="form-group">
                        {{ Form::checkbox('checkbox7', 1, null, ['id'=>'checkbox7', 'class' => 'className' ]) }}
                        {{Form::label('checkbox7','Complete OFD 127 Request for
                            Services Form')}}
                    </div>
                </div>
                {{--}}   <label class="checkbox-inline col-sm-12"><strong> Complete OFD 127 Request for
                           Services Form</strong></label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button" id="127Download"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) OFD 127 Request for Services.pdf') }}"
                           download="(Accident PDF) OFD 127 Request for Services.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="OFD127" id="127Upload"
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
                    {{ Form::checkbox('calllaw', 1, null, ['id' => 'calllaw', 'class'=>'className']) }}
					{{Form::label('calllaw','Call Law Department
                            Investigator - Call 444-5131- Request report be faxed to
                        SWD fax # 444-6378. You can
                        leave a message with rig # address of incident, date, time and
                        RB#')}}
                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    {{ Form::checkbox('daybook', 1, null, ['id' => 'daybook', 'class'=>'className']) }}
                    {{Form::label('daybook','Enter in Company Day
                            Book')}}
					
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <div class="form-group">
                        {{ Form::checkbox('checkbox8', 1, null, ['id'=>'checkbox8', 'class' => 'className' ]) }}
                        {{Form::label('checkbox8','Complete DR 41 State
                                of Nebraska DMV Vehicle Accident Report')}}
                    </div>
                </div>
                {{--}} <label class="checkbox-inline col-sm-12"><strong><strong> Complete DR 41 State
                             of Nebraska DMV Vehicle Accident Report</strong></strong></label> --}}
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-success dropdown-toggle col-sm-12" type="button" id="41Download"
                           href="{{ asset('Fillable PDFs\Accident Module\(Accident PDF) DR 41 State of Nebraska DMV Vehicle Accident Report.pdf') }}"
                           download="(Accident PDF) DR 41 State of Nebraska DMV Vehicle Accident Report.pdf">
                            <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" name="DR41" id="41Upload"
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
                    <div class="form-group">
                        {{ Form::checkbox('checkbox9', 1, null, ['id'=>'checkbox9', 'class' => 'className' ]) }}
                        {{Form::label('checkbox9','Miscellaneous Documents')}}
                    </div>
                </div>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-3">
                        <div class="input-group">
                            <label class="input-group-btn">
                    <span class="btn btn-info">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload<input type="file" id="miscUplaods"
                                                                                           name="miscaccidents"
                                                                                           style="display: none;">
                    </span>
                            </label>
                            <input type="text" id="upload-file-info" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <label class="col-sm-5"></label>
            {!! Form::submit('Save as Draft',['class' => 'btn btn-primary','name' => 'partialSave', 'id' => 'submitButton']) !!}
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                Submit
            </button>

            <a href="{{ route('accidents.index') }}" id="cancelButton" class="btn btn-danger">Cancel</a>
            <br>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" id="closeModal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to Submit?
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Yes',['class' => 'btn btn-success','name'=> 'store', 'id' => 'modalSubmit']) !!}
                    <button type="button" class=" btn btn-danger" data-dismiss="modal" id="modalDismiss" aria-label="">No</button>


                </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop