@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ url('/') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="active">OFD 6A Accidents</li>
    </ol>
@endsection
@section('content')
    <div class="panel panel-default panel-shadow ">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <a class="btn btn-success btn-lg btn-block" href="{{ route('accidents.create') }}">Fill a New OFD
                        6A</a>
                </div>
            </div>
        </div>
    </div>

    @foreach($accidents as $accident)
        @endforeach
        @if($accident->driverid == Auth::user()->id)
        <div class="panel panel-default panel-shadow " hidden>
            <div class="panel-heading">
                Search Previously filled
            </div>
            <div class="panel-body">
                <table data-toolbar="#toolbar"
                       data-toggle="table"
                       data-search="true"
                       data-cookie="true"
                       data-click-to-select="true"
                       data-cookie-id-table="station-index-v1.1-1"
                       data-show-columns="true"
                       id="table">
                    <thead>
                    <tr>
                        <th data-sortable="true">OFD 6A ID</th>
                        <th data-sortable="true">Driver Name</th>
                        <th data-sortable="true">Date of Accident</th>
                        <th data-sortable="true">Assignment</th>
                        <th data-sortable="true">Status</th>
                        <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($accidents) > 0)
                        @foreach($accidents as $accident)
                            @if($accident->driverid == Auth::user()->id)
                            <tr>
                                <td>{{ $accident->ofd6aid }}</td>
                                <td>{{ $accident->drivername }}</td>
                                <td>{{ $accident->accidentdate }}</td>
                                <td>{{ $accident->assignmentaccident }}</td>
                                <td>{{ $accident->applicationstatus }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('accidents.show',[$accident->ofd6aid]) }}"
                                           class="btn btn-xs btn-info btn-block"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                        @if( $accident->applicationstatus == 1)
                                            <a href="{{ route('accidents.edit',[$accident->ofd6aid]) }}"
                                           class="btn btn-xs btn-warning btn-block"><i class="fa fa-pencil-square-o"
                                                                                       aria-hidden="true"></i> EDIT</a>
                                            @endif
                                    </div>
                                </td>
                            </tr>
                            @endif
                                @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endif


    @if($accident->captainid == Auth::user()->id && $accident->applicationstatus == 2)
        <div class="panel panel-default panel-shadow " hidden>
            <div class="panel-heading">
                In your Queue For Approval as Captain
            </div>
            <div class="panel-body">
                <table data-toolbar="#toolbar"
                       data-toggle="table"
                       data-search="true"
                       data-cookie="true"
                       data-click-to-select="true"
                       data-cookie-id-table="station-index-v1.1-1"
                       data-show-columns="true"
                       id="table">
                    <thead>
                    <tr>
                        <th data-sortable="true">OFD 6A ID</th>
                        <th data-sortable="true">Driver Name</th>
                        <th data-sortable="true">Date of Accident</th>
                        <th data-sortable="true">Assignment</th>
                        <th data-sortable="true">Status</th>
                        <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($accidents) > 0)
                        @foreach($accidents as $accident)
                            @if($accident->captainid == Auth::user()->id && $accident->applicationstatus == 2)
                            <tr>
                                <td>{{ $accident->ofd6aid }}</td>
                                <td>{{ $accident->drivername }}</td>
                                <td>{{ $accident->accidentdate }}</td>
                                <td>{{ $accident->assignmentaccident }}</td>
                                <td>{{ $accident->applicationstatus }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('accidents.show',[$accident->ofd6aid]) }}"
                                           class="btn btn-xs btn-info btn-block"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                            @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endif


    @if($accident->battalionchiefid == Auth::user()->id && $accident->applicationstatus == 3)
        <div class="panel panel-default panel-shadow " hidden>
            <div class="panel-heading">
                In your Queue For Approval as battalion chief
            </div>
            <div class="panel-body">
                <table data-toolbar="#toolbar"
                       data-toggle="table"
                       data-search="true"
                       data-cookie="true"
                       data-click-to-select="true"
                       data-cookie-id-table="station-index-v1.1-1"
                       data-show-columns="true"
                       id="table">
                    <thead>
                    <tr>
                        <th data-sortable="true">OFD 6A ID</th>
                        <th data-sortable="true">Driver Name</th>
                        <th data-sortable="true">Date of Accident</th>
                        <th data-sortable="true">Assignment</th>
                        <th data-sortable="true">Status</th>
                        <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($accidents) > 0)
                        @foreach($accidents as $accident)
                            @if($accident->battalionchiefid == Auth::user()->id && $accident->applicationstatus == 3)
                            <tr>
                                <td>{{ $accident->ofd6aid }}</td>
                                <td>{{ $accident->drivername }}</td>
                                <td>{{ $accident->accidentdate }}</td>
                                <td>{{ $accident->assignmentaccident }}</td>
                                <td>{{ $accident->applicationstatus }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('accidents.show',[$accident->ofd6aid]) }}"
                                           class="btn btn-xs btn-info btn-block"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                            @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    @endif

    @if($accident->aconduty == Auth::user()->id && $accident->applicationstatus == 4)
        <div class="panel panel-default panel-shadow " hidden>
            <div class="panel-heading">
                In your Queue For Approval as Assistant chief
            </div>
            <div class="panel-body">
                <table data-toolbar="#toolbar"
                       data-toggle="table"
                       data-search="true"
                       data-cookie="true"
                       data-click-to-select="true"
                       data-cookie-id-table="station-index-v1.1-1"
                       data-show-columns="true"
                       id="table">
                    <thead>
                    <tr>
                        <th data-sortable="true">OFD 6A ID</th>
                        <th data-sortable="true">Driver Name</th>
                        <th data-sortable="true">Date of Accident</th>
                        <th data-sortable="true">Assignment</th>
                        <th data-sortable="true">Status</th>
                        <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($accidents) > 0)
                        @foreach($accidents as $accident)
                            @if($accident->aconduty == Auth::user()->id && $accident->applicationstatus == 4)
                            <tr>
                                <td>{{ $accident->ofd6aid }}</td>
                                <td>{{ $accident->drivername }}</td>
                                <td>{{ $accident->accidentdate }}</td>
                                <td>{{ $accident->assignmentaccident }}</td>
                                <td>{{ $accident->applicationstatus }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('accidents.show',[$accident->ofd6aid]) }}"
                                           class="btn btn-xs btn-info btn-block"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                            @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    @endif

@stop
@section('javascript')
    <script src="{{ ('js/extensions/cookie') }}/bootstrap-table-cookie.js"></script>
    <script src="{{ ('js/extensions/mobile') }}/bootstrap-table-mobile.js"></script>
    <script src="{{ ('js/export') }}/bootstrap-table-export.js"></script>
    <script src="{{ ('js/export') }}/tableExport.js"></script>
    <script src="{{ ('js/export') }}/jquery.base64.js"></script>
    <script type="text/javascript">
        $('#table').bootstrapTable({
            classes: 'table table-responsive table-no-bordered table-striped table-hover',
            iconsPrefix: 'fa',
            cookie: true,
            cookieExpire: '2y',
            mobileResponsive: true,
            sortable: true,
            showExport: true,
            showColumns: true,
            exportTypes: ['csv', 'excel'],
            pageList: ['10', '25', '50', '100', '150', '200', '500', '1000'],
            exportOptions: {
                fileName: 'assets-export-' + (new Date()).toISOString().slice(0, 10),
            },
            icons: {
                paginationSwitchDown: 'fa-caret-square-o-down',
                paginationSwitchUp: 'fa-caret-square-o-up',
                sort: 'fa fa-sort-amount-desc',
                plus: 'fa fa-plus',
                minus: 'fa fa-minus',
                columns: 'fa-columns',
                refresh: 'fa-refresh'
            },
        });
        $(".panel").fadeIn("fast");
    </script>
@endsection