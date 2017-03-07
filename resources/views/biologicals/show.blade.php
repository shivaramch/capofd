@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('biologicals.index') }}">OFD 6B Biologicals</a></li>
        <li class="active">Edit OFD 6B Form {{ $biological->ofd6bID }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($biological,['method' => 'PUT', 'route' => ['biologicals.update', $biological->ofd6bID], 'files' => true,]) !!}

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
                                <h3><strong>Biological Exposure Reporting Instructions (OFD-6B)</strong></h3>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h5><i><strong>Issue Date: 9/1/16</strong></i></h5>
                        </div>
                        <div class="col-md-2">
                            <h5><i><strong>Effective Date: 9/1/16</strong></i></h5>
                        </div>
                        <div class="col-md-12">
                            <h5><i><strong>Amends, Replaces, Rescinds: Replaces OFD-6B (July 2016) </strong></i></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-horizontal">

                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('exposedEmployeeName', 'Exposed Employee Name:',array('style'=>'padding-top:7px;','class'=> 'col-sm-4 control-label') )!!}
                        <div class="col-sm-6 ">
                            {{ $biological->exposedEmployeeName }}
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('dateOfExposure', 'Date Of Exposure', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {{ $biological->dateOfExposure }}
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('employeeID_1', 'EmployeeID',array( 'style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {{ $biological->employeeID_1 }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('assignmentBiological', 'Assignment Biological', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {{ $biological->assignmentBiological }}
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('shift', 'Shift', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {{ $biological->shift }}
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('idcoNumber', 'Idco Number', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {{ $biological->idcoNumber }}
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('epcrIncidentNum', 'Epcr Incident Num', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                        <div class="col-sm-6 ">
                            {{ $biological->epcrIncidentNum }}
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('todaysDate', 'Todays Date', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                        <div class="col-sm-6 ">
                            {{ $biological->todaysDate }}
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
                    <h4 style="text-align:left;"><u><strong>BIOLOGICAL CHECKLIST :</strong></u></h4>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-sm-4 form-group">
                {!! Form::label('decontaminate', 'Decontaminate', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->decontaminate }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('callChi', 'Call Chi', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->callChi }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('confirmSource', 'Confirm Source', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->confirmSource }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('trueOFD184', 'True OFD184', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->trueOFD184 }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('bloodReport', 'Blood Report', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->bloodReport }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('exposureTab', 'Exposure Tab', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->exposureTab }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('trueBagTag', 'True Bag Tag', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->trueBagTag }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('notifyPSS', 'Notify PSS', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->notifyPSS }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('truePPE', 'True PPE', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->truePPE }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('trueDocumentDayBook', 'True Document Day Book', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->trueDocumentDayBook }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('potDecontaminate', 'Pot Decontaminate', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->potDecontaminate }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('potBagTag', 'Pot Bag Tag', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->potBagTag }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('potOFD184', 'Pot OFD184', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->potOFD184 }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('potPPE', 'pot PPE', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->potPPE }}
                </div>
            </div>
            <div class="col-sm-4 form-group">
                {!! Form::label('potDocumentDayBook', 'Pot Document DayBook', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                <div class="col-sm-6 ">
                    {{ $biological->potDocumentDayBook }}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    

    {!! Form::close() !!}
@stop
