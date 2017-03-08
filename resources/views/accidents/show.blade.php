@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('accidents.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('accidents.index') }}">OFD 6A Accidents</a></li>
        <li class="active">Edit OFD 6A Form {{ $accident->ofd6aID }}</li>
    </ol>
@endsection

@section('content')
    {!! Form::model($accident,['method' => 'PUT', 'route' => ['accidents.update', $accident->ofd6aID], 'files' => true,]) !!}

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
                            {{ $accident->accidentDate }}
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('driverID', 'Driver ID#', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {{ $accident->driverID }}
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('driverName', 'Driver Name',array( 'style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {{ $accident->driverName }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('assignmentAccident', 'Assignment', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {{ $accident->assignmentAccident }}
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('appratus', 'Apparatus', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {{ $accident->appratus }}
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        {!! Form::label('captainID', 'Captain #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-6 ">
                            {{ $accident->captainID }}
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('battalionChiefID', 'Battalion Chief #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                        <div class="col-sm-6 ">
                            {{ $accident->battalionChiefID }}
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        {!! Form::label('assitantChiefID', 'Assistant Chief #', array('style'=>'padding-top:7px;','class' => 'col-sm-4 control-label','placeholder'=>'Enter Badge Id')) !!}
                        <div class="col-sm-6 ">
                            {{ $accident->assitantChiefID }}
                        </div>
                    </div>
                </div>
                <div class="alert alert-danger" align="center">
                    <div class="row">
                        <label>Please submit all the forms by:<input type="text" class="form-control" id="datepicker2"
                                                                     disabled></label>
                    </div>
                    <br>
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
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
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
                                        @if($attachment->attachmentType == 611 && $attachment->createdBy ==  Auth::user()->id && $attachment->Injury_ofd6ID == $accident->ofd6aID )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentName) }}"> {{$attachment->attachmentName}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_At}}</a>
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
                <label class="col-sm-12"><strong><strong>Complete OFD 295
                            Vehicle Accident Witness Statement</strong>-This Report is for civilian statements
                        only</strong></label>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
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
                                        @if($attachment->attachmentType == 612 && $attachment->createdBy ==  Auth::user()->id && $attachment->Injury_ofd6ID == $accident->ofd6aID )
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
            <div class="row">
                <label class="col-sm-12"><strong>Complete OFD 25a Accident
                        Intradepartmental Communication</strong>-Driver</label>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
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
                                        @if($attachment->attachmentType == 613 && $attachment->createdBy ==  Auth::user()->id && $attachment->Injury_ofd6ID == $accident->ofd6aID )
                                            <tr>
                                                <td>
                                                    <a href="{{ asset('uploads/'.$attachment->attachmentName) }}"> {{$attachment->attachmentName}}</a>
                                                </td>
                                                <td>
                                                    {{$attachment->created_At}}</a>
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
                <label class="checkbox-inline col-sm-12"><strong>Complete OFD 25b Accident
                        Intradepartmental Communication</strong>-Supervisor</label>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
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
                                        @if($attachment->attachmentType == 614 && $attachment->createdBy ==  Auth::user()->id && $attachment->Injury_ofd6ID == $accident->ofd6aID )
                                            <tr></tr>
                                            <td>
                                                <a href="{{ asset('uploads/'.$attachment->attachmentName) }}"> {{$attachment->attachmentName}}</a>
                                            </td>
                                            <td>
                                                {{$attachment->created_At}}</a>
                                            </td></tr>@endif
                                    @endforeach
                                @endif

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="checkbox-inline col-sm-12"><strong>Complete OFD 25c Accident
                        Intradepartmental Communication</strong>-Other Personnel</label>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#615"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>

                        <div id="615" class="collapse">

                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmentType == 615 && $attachment->createdBy ==  Auth::user()->id && $attachment->Injury_ofd6ID == $accident->ofd6aID )
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
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="checkbox-inline col-sm-12"><strong> Complete OFD 31-OFD
                        Damaged, Lost, Stolen Equipment Report</strong></label>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#616"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>

                        <div id="616" class="collapse">

                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmentType == 616 && $attachment->createdBy ==  Auth::user()->id && $attachment->Injury_ofd6ID == $accident->ofd6aID )
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
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="checkbox-inline col-sm-12"><strong> Complete OFD 127 Request for
                        Services Form</strong></label>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#617"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>

                        <div id="617" class="collapse">

                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmentType == 617 && $attachment->createdBy ==  Auth::user()->id && $attachment->Injury_ofd6ID == $accident->ofd6aID )
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
                                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="checkbox-inline col-sm-12"><strong><strong> Complete DR 41 State
                            of Nebraska DMV Vehicle Accident Report</strong></strong></label>
                <div class="col-sm-12 form-group well well-sm">
                    <div class="col-sm-4">
                        <a class="btn btn-primary dropdown-toggle col-sm-12" data-toggle="collapse"
                           data-target="#618"><i class="fa fa-eye" aria-hidden="true"></i> View Previously uploaded
                            file(s)
                        </a>

                        <div id="618" class="collapse">

                            <table class="table table-striped">
                                <tr>
                                    <th> File Name</th>
                                    <th> File Uploaded At</th>
                                </tr>
                                <tr>
                                @if(count($attachments) > 0)
                                    @foreach($attachments as $attachment)
                                        @if($attachment->attachmentType == 618 && $attachment->createdBy ==  Auth::user()->id && $attachment->Injury_ofd6ID == $accident->ofd6aID )
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
                                            </tr>
                            </table>
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
        <div class="col-sm-12 panel-heading">
            <label class="col-sm-5"></label>
            <div class="btn-bottom ">
                <a href="{{ route('accidents.index') }}" class="btn btn-default">Return</a>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@stop
