@extends('layouts.app')


@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ url('/') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="active">OFD 6 Injuries</li>
    </ol>
@endsection


@section('content')




    <div class="panel panel-default panel-shadow ">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <a class="btn btn-success btn-lg btn-block" href="{{ route('injuries.create') }}">Fill a New OFD
                        6</a>
                </div>
            </div>
        </div>
    </div>


    @if(count($injuries) > 0)

        @foreach($injuries as $injury)
        @endforeach

        @if($injury->injuredemployeeid == Auth::user()->id)
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
                            <th data-sortable="true">OFD 6 ID</th>
                            <th data-sortable="true">Date of Injury</th>
                            <th data-sortable="true">Assignment</th>
                            <th data-sortable="true">Status</th>
                            <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($injuries as $injury)
                            @if($injury->injuredemployeeid == Auth::user()->id)
                                <tr>
                                    <td>{{ $injury->ofd6id }}</td>
                                    <td>{{ $injury->injurydate }}</td>
                                    <td>{{ $injury->assignmentinjury }}</td>
                                    <td>{{ $injury->status1 }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('injuries.show',[$injury->ofd6id]) }}"
                                               class="btn btn-xs btn-info btn-block"><i
                                                        class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                            @if($injury->applicationstatus == 1 || $injury->applicationstatus == 5)<a
                                                    href="{{ route('injuries.edit',[$injury->ofd6id]) }}"
                                                    class="btn btn-xs btn-warning btn-block"><i
                                                        class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i> EDIT</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif



        @if($injury->captainid == Auth::user()->id && $injury->applicationstatus == 2)
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
                            <th data-sortable="true">OFD 6 ID</th>
                            <th data-sortable="true">Date of Injury</th>
                            <th data-sortable="true">Assignment</th>
                            <th data-sortable="true">Status</th>
                            <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($injuries as $injury)
                            @if($injury->captainid == Auth::user()->id && $injury->applicationstatus == 2)
                                <tr>
                                    <td>{{ $injury->ofd6id }}</td>
                                    <td>{{ $injury->injurydate }}</td>
                                    <td>{{ $injury->assignmentinjury }}</td>
                                    <td>{{ $injury->status1 }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('injuries.show',[$injury->ofd6id]) }}"
                                               class="btn btn-xs btn-info btn-block"><i
                                                        class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if($injury->battalionchiefid == Auth::user()->id && $injury->applicationstatus == 3)
            <div class="panel panel-default panel-shadow " hidden>
                <div class="panel-heading">
                    Search Previously filled as Battalion Chief
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
                            <th data-sortable="true">OFD 6 ID</th>
                            <th data-sortable="true">Date of Injury</th>
                            <th data-sortable="true">Assignment</th>
                            <th data-sortable="true">Status</th>
                            <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($injuries as $injury)
                            @if($injury->battalionchiefid == Auth::user()->id && $injury->applicationstatus == 3)
                                <tr>
                                    <td>{{ $injury->ofd6id }}</td>
                                    <td>{{ $injury->injurydate }}</td>
                                    <td>{{ $injury->assignmentinjury }}</td>
                                    <td>{{ $injury->status1 }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('injuries.show',[$injury->ofd6id]) }}"
                                               class="btn btn-xs btn-info btn-block"><i
                                                        class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if($injury->aconduty == Auth::user()->id && $injury->applicationstatus == 4)
            <div class="panel panel-default panel-shadow " hidden>
                <div class="panel-heading">
                    Search Previously filled as Assistant chief
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
                            <th data-sortable="true">OFD 6 ID</th>
                            <th data-sortable="true">Date of Injury</th>
                            <th data-sortable="true">Assignment</th>
                            <th data-sortable="true">Status</th>
                            <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($injuries as $injury)
                            @if($injury->aconduty == Auth::user()->id && $injury->applicationstatus == 4)
                                <tr>
                                    <td>{{ $injury->ofd6id }}</td>
                                    <td>{{ $injury->injurydate }}</td>
                                    <td>{{ $injury->assignmentinjury }}</td>
                                    <td>{{ $injury->status1 }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('injuries.show',[$injury->ofd6id]) }}"
                                               class="btn btn-xs btn-info btn-block"><i
                                                        class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        @endif
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