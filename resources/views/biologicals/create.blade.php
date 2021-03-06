@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ URL::previous() }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('biologicals.index') }}">OFD 6B Biologicals</a></li>
        <li class="active">New Form</li>
    </ol>
@endsection

@section('content')
    {!! Form::open(['method' =>'POST', 'url' => '/biologicals/save', 'files' => true,]) !!}
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
                            {!! Form::text('dateofexposure', old('dateofexposure'), array('id'=>'datepicker','class' => 'form-control datepicker', 'placeholder' => 'YYYY-MM-DD'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('dateofexposure'))
                                <p class="help-block">
                                    {{ $errors->first('dateofexposure') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('employeeid', 'Employee ID #', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('employeeid', old('employeeid'), array('class'=> 'form-control','placeholder'=>'Enter Badge ID'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('employeeid'))
                                <p class="help-block">
                                    {{ $errors->first('employeeid') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('exposedemployeename', 'Exposed Employee Name',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('exposedemployeename', old('exposedemployeename'), array('class'=>'form-control','placeholder'=>'Employee Name'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('exposedemployeename'))
                                <p class="help-block">
                                    {{ $errors->first('exposedemployeename') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('assignmentbiological', 'Assignment', ['class'=> 'col-sm-4 control-label'] ) !!}
                        <div class="col-sm-6">
                            {!! Form::text('assignmentbiological', old('assignmentbiological'), array('class' => 'form-control', 'id' => 'assignmentinjury','placeholder'=>'Enter Assignment'))!!}
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
                            {!! Form::select('shift', ['A' => 'A',
                            'B' => 'B',
                            'C' => 'C',
                            'DIV' => 'DIV'],
                            'required',
                            array('placeholder'=>'Select one','id'=>'shift','class' => 'form-control')) !!}
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
                        {!! Form::label('primaryidconumber', 'Primary IDCO#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('primaryidconumber', old('primaryidconumber'), array('class' => 'form-control','placeholder'=>'Enter IDCO Badge ID'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('primaryidconumber'))
                                <p class="help-block">
                                    {{ $errors->first('primaryidconumber') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('epcrincidentnum', 'EPCR Incident#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6">
                            {!! Form::text('epcrincidentnum', old('epcrincidentnum'), array('class' => 'form-control','placeholder'=>'Enter Incident Num'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('epcrincidentnum'))
                                <p class="help-block">
                                    {{ $errors->first('epcrincidentnum') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('frmsincidentnum', 'FRMS Incident#', array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') ) !!}
                        <div class="col-sm-6 ">
                            {!! Form::text('frmsincidentnum1', old('frmsincidentnum1'), array('id'=>'text1', 'class' => 'form-control','placeholder'=>'Enter FRMS Number'))!!}
                            {!! Form::text('frmsincidentnum', old('frmsincidentnum'), array('id'=>'text2', 'class' => 'form-control','placeholder'=>'Enter FRMS Number', 'style'=>'display:none;'))!!}
                            <p class="help-block"></p>
                            @if($errors->has('frmsincidentnum1'))
                                <p class="help-block">
                                    {{ $errors->first('frmsincidentnum1') }}
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
                        {{ Form::radio('exposure', 0 , null, ['id'=>'exposure', 'class' => 'className']) }}
                        {{ Form::label('exposure', 'True Exposure') }}

                        {{ Form::radio('exposure',1 , null, ['id'=>'exposure1', 'class' => 'className']) }}
                        {{ Form::label('exposure1', 'Contamination') }}
                    </div>
                </div>
            </div>
            <div id="Exposure0" class="desc" style="display: none;">
                <div class="col-md-12">
                    <div class="alert alert-danger" align="left">
                        Definition of True Exposure:
                        <ul type="Disc">
                            <li>Eye, mouth, other mucous membrane, non-related skin or parenteral contact with
                                blood,
                                other body fluids or other potentially infectious material.
                            </li>
                            <li>
                                Inhalation of potentially contagious microbes.
                            </li>
                            <li>
                                Contact with an infected patient’s skin lesions or body fluids that can cause
                                infectious disease that require preventative treatment or quarantine.
                            </li>
                        </ul>
                        Parenteral Exposure :
                        <ul type="Disc">
                            <li>Occurs through a break in the skin barrier, this includes injections, needle sticks,
                                human/ animal bites, abrasions and cuts that become contaminated with blood.
                            </li>
                            <li>
                                For human/animal bites, the clinical evaluation must include the possibility that
                                both
                                the person bitten and the person/animal that inflicted the bite were exposed to
                                bloodborne pathogens.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('truedecontaminate', 1, null, ['id' => 'truedecontaminate', 'class'=>'className']) }}
                        {{Form::label('truedecontaminate','Decontaminate self- wash, flush as soon as possible  ')}}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('confirmsource', 1, null, ['id'=>'confirmsource', 'class' => 'className' ]) }}
                        {{ Form::label('confirmsource', 'Confirm Source - Patient blood draw with OUCH Nurse') }}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('trueofd184', 1, null, ['id'=>'trueofd184', 'class' => 'className',  'disabled']) }}
                        {{Form::label('trueofd184','Complete OFD 184')}}
                    </div>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                               href="{{ asset('Fillable PDFs\Biological Module\(Exposure PDF) OFD 184 State Infectious Disease Exposure Report.pdf')}}"
                               download="(Exposure PDF) OFD 184 State Infectious Disease Exposure Report.pdf">
                                <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <label class="input-group-btn">
                                            <span class="btn btn-info"><i class="fa fa-cloud-upload"
                                                                          aria-hidden="true"></i> Upload<input
                                                        type="file" name="trueofd184"
                                                        id="trueofd184"
                                                        style="display: none;"
                                                        onchange="pressed()"
                                                        multiple>
                                            </span>
                                </label>
                                <input type="text" id="upload-file-info" class="form-control" readonly>
                            </div>
                            @if($errors->has('trueofd184'))
                                <p class="help-block">
                                    {{ $errors->first('trueofd184') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('miscbiological1', 1, null, ['id'=>'miscbiological1', 'class' => 'className', 'disabled']) }}
                        {{Form::label('miscbiological1','Miscellaneous Documents - Upload any additional documents related to this incident if necessary.')}}
                    </div>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <div class="input-group">
                                <label class="input-group-btn">
                                            <span class="btn btn-info"><i class="fa fa-cloud-upload"
                                                                          aria-hidden="true"></i> Upload<input
                                                        type="file" name="miscbiological1"
                                                        id="miscbiological1"
                                                        style="display: none;"
                                                        onchange="pressed3()"
                                                        multiple>
                                            </span>
                                </label>
                                <input type="text" id="upload-file-info" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('bloodreport', 1, null, ['id' => 'bloodreport', 'class'=>'className']) }}
                        {{Form::label('bloodreport','Report for blood draw as directed by OUCH Nurse')}}

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('exposuretab', 1, null, ['id' => 'exposuretab', 'class'=>'className']) }}
                        {{Form::label('exposuretab','Complete Exposure tab in ePCR ')}}

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('truebagtag', 1, null,  ['id' => 'truebagtag', 'class'=>'className']) }}
                        {{Form::label('truebagtag','Bag & Tag clothing if applicable - send email to PSS with pick-up location ')}}

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('notifypss', 1, null, ['id' => 'notifypss', 'class'=>'className']) }}
                        {{Form::label('notifypss','Notify the on-duty PSS via phone at 402-660-1060 ')}}

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('trueppe', 1, null, ['id' => 'trueppe', 'class'=>'className']) }}
                        {{Form::label('trueppe','PPE has been cleaned per SOP SWD 1-0  ')}}

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('truedocumentdaybook', 1, null, ['id' => 'truedocumentdaybook', 'class'=>'className']) }}
                        {{Form::label('truedocumentdaybook','Document in Company Day Book and on your Personnel Record')}}
                    </div>
                </div>
            </div>
            <div id="Exposure1" class="desc" style="display: none;">
                <div class="col-md-12">
                    <div class="alert alert-danger" align="left">
                        Contamination might be due to soiling or pollution, as by the introduction of blood or
                        body fluids onto:
                        <ul type="Disc">
                            <li>Equipment
                            </li>
                            <li>
                                Clothing
                            </li>
                            <li>
                                PPE
                            </li>
                            <li>
                                Intact Skin
                            </li>
                            <li>
                                Turnout gear
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('potdecontaminate', 1, null, ['id' => 'potdecontaminate', 'class'=>'className']) }}
                        {{Form::label('potdecontaminate','Decontaminate by self- wash, flush as soon as possible')}}

                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('potbagtag', 1, null, ['id' => 'potbagtag', 'class'=>'className']) }}
                        {{Form::label('potbagtag','Bag & Tag clothing if applicable - send email to PSS with pick-up location')}}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('potofd184', 1, null, ['id'=>'potofd184', 'class' => 'className', 'disabled' ]) }}
                        {{Form::label('potofd184','Complete OFD 184')}}
                    </div>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <a class="btn btn-success dropdown-toggle col-sm-12" type="button"
                               href="{{ asset('Fillable PDFs\Biological Module\(Exposure PDF) OFD 184 State Infectious Disease Exposure Report.pdf')}}"
                               download="(Exposure PDF) OFD 184 State Infectious Disease Exposure Report.pdf">
                                <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <label class="input-group-btn">
                                            <span class="btn btn-info"><i class="fa fa-cloud-upload"
                                                                          aria-hidden="true"></i> Upload<input
                                                        type="file" name="potofd184"
                                                        id="potofd184"
                                                        style="display: none;"
                                                        onchange="pressed1()"
                                                        multiple>
                                            </span>
                                </label>
                                <input type="text" id="upload-file-info" class="form-control" readonly>
                            </div>
                            @if($errors->has('potofd184'))
                                <p class="help-block">
                                    {{ $errors->first('potofd184') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('miscbiological2', 1, null, ['id'=>'miscbiological2', 'class' => 'className', 'disabled' ]) }}
                        {{Form::label('miscbiological2','Miscellaneous Documents')}}
                    </div>
                    <div class="col-sm-12 form-group well well-sm">
                        <div class="col-sm-4">
                            <div class="input-group">
                                <label class="input-group-btn">
                                            <span class="btn btn-info"><i class="fa fa-cloud-upload"
                                                                          aria-hidden="true"></i> Upload<input
                                                        type="file" name="miscbiological2"
                                                        id="miscbiological2"
                                                        style="display: none;"
                                                        onchange="pressed2()"

                                                        multiple>
                                            </span>
                                </label>
                                <input type="text" id="upload-file-info" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="col-sm-12">--}}
                {{--<div class="form-group">--}}
                {{--{{ Form::checkbox('potbagtag', 1, null, ['id' => 'potbagtag', 'class'=>'className']) }}--}}
                {{--{{Form::label('potbagtag','Bag & Tag clothing if applicable - send email to PSS with pick-up location ')}}--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('potppe', 1, null, ['id' => 'potppe', 'class'=>'className']) }}
                        {{Form::label('potppe','PPE has been cleaned per SOP SWD 1-0')}}
                    </div>
                </div>
                {{ Form::hidden('applicationstatus', '2') }}
                <div class="col-sm-12">
                    <div class="form-group">
                        {{ Form::checkbox('potdocumentdaybook', 1, null, ['id' => 'potdocumentdaybook', 'class'=>'className']) }}
                        {{Form::label('potdocumentdaybook','Document in Company Day Book and on your Personnel Record   ')}}
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
                {{Form::label('exposureinjury','Do you have any symptoms of illness or injury and require
                   treatment?',['class'=> 'col-sm-10 control-label'] ) }}
                <div class="col-sm-4">
                    {!! Form::select('exposureinjury',[
                      'Yes' => 'Yes',
                      'No' => 'No'],'required',
                    array('placeholder'=>'Select one','id'=>'exposureinjury','class' => 'form-control')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('exposureinjury'))
                        <p class="help-block">
                            {{ $errors->first('exposureinjury') }}
                        </p>
                    @endif
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
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
    <script>
        window.pressed = function () {
            var a = document.getElementById('trueofd184');
            if (a.value == "") {

            }
            else {
                document.getElementById("trueofd184").checked = true;
            }
        };
        window.pressed1 = function () {
            var a = document.getElementById('potofd184');
            if (a.value == "") {

            }
            else {
                document.getElementById("potofd184").checked = true;
            }
        };
        window.pressed2 = function () {
            var a = document.getElementById('miscbiological2');
            if (a.value == "") {

            }
            else {
                document.getElementById("miscbiological2").checked = true;
            }
        };
        window.pressed3 = function () {
            var a = document.getElementById('miscbiological1');
            if (a.value == "") {

            }
            else {
                document.getElementById("miscbiological1").checked = true;
            }
        };
    </script>
@endsection
