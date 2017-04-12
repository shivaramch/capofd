@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('adminpanel.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('adminpanel.index') }}">Admin panel</a></li>
        <li class="active">Admin Search</li>
    </ol>
@endsection

@section('content')
    @if(Auth::user()->roleid == 1)
        <div class="panel panel-default ">
            <div class="panel-heading">
                Search OFD Tracking Forms
            </div>
            <div class="panel-body">
                <div class="form-group" align="center">
                    <select class="form-control" id="assets">
                        <option selected="selected" disabled="disabled">Select Form Type</option>
                        <option id="1">OFD 6</option>
                        <option id="2">OFD 6A</option>
                        <option id="3">OFD 6B</option>
                        <option id="4">OFD 6C</option>
                    </select>
                </div>
            </div>
        </div>

        {{--start OFD 6a--}}
        <div class="panel panel-default Search" id="create-2" hidden>
            <div class="panel-heading">
                Previously filled OFD 6A
            </div>
            <div class="panel-body">
                <table data-toolbar="#toolbar"
                       data-toggle="table"
                       data-search="true"
                       data-cookie="true"
                       data-click-to-select="true"
                       data-cookie-id-table="station-index-v1.1-1"
                       data-show-columns="true"
                       class="table">
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
                            <tr>
                                <td>{{ $accident->ofd6aid }}</td>
                                <td>{{ $accident->drivername }}</td>
                                <td>{{ $accident->accidentdate }}</td>
                                <td>{{ $accident->assignmentaccident }}</td>
                                <td>{{ DB::table('status')->where('statusid',$accident->applicationstatus)->value('statustype')}}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('accidents.show',[$accident->ofd6aid]) }}"
                                           class="btn btn-xs btn-info btn-block"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                        <a href="{{ route('accidents.edit',[$accident->ofd6aid]) }}"
                                           class="btn btn-xs btn-warning btn-block"><i class="fa fa-pencil-square-o"
                                                                                       aria-hidden="true"></i> EDIT</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{--end OFD 6a--}}

        {{--start OFD 6b--}}
        <div class="panel panel-default panel-shadow Search" id="create-3" hidden>
            <div class="panel-heading">
                Previously filled OFD 6B
            </div>
            <div class="panel-body">
                <table data-toolbar="#toolbar"
                       data-toggle="table"
                       data-search="true"
                       data-cookie="true"
                       data-click-to-select="true"
                       data-cookie-id-table="station-index-v1.1-1"
                       data-show-columns="true"
                       class="table">
                    <thead>
                    <tr>
                        <th data-sortable="true">OFD 6B ID</th>
                        <th data-sortable="true">Date of Exposure</th>
                        <th data-sortable="true">Assignment</th>
                        <th data-sortable="true">Status</th>
                        <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($biologicals) > 0)
                        @foreach($biologicals as $biological)
                            <tr>
                                <td>{{ $biological->ofd6bid }}</td>
                                <td>{{ $biological->dateofexposure }}</td>
                                <td>{{ $biological->assignmentbiological }}</td>
                                <td>{{ DB::table('status')->where('statusid',$biological->applicationstatus)->value('statustype')}}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('biologicals.show',[$biological->ofd6bid]) }}"
                                           class="btn btn-xs btn-info btn-block"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                        <a href="{{ route('biologicals.edit',[$biological->ofd6bid]) }}"
                                           class="btn btn-xs btn-warning btn-block"><i class="fa fa-pencil-square-o"
                                                                                       aria-hidden="true"></i> EDIT</a>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{--end OFD 6b--}}

        {{--start OFD 6c--}}

        <div class="panel panel-default panel-shadow Search" id="create-4" hidden>
            <div class="panel-heading">
                Previously filled OFD 6C
            </div>
            <div class="panel-body">
                <table data-toolbar="#toolbar"
                       data-toggle="table"
                       data-search="true"
                       data-cookie="true"
                       data-click-to-select="true"
                       data-cookie-id-table="station-index-v1.1-1"
                       data-show-columns="true"
                       class="table">
                    <thead>
                    <tr>
                        <th data-sortable="true">OFD 6C ID</th>
                        <th data-sortable="true">Date of Exposure</th>
                        <th data-sortable="true">Assignment</th>

                        <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($hazmat) > 0)
                        @foreach($hazmat as $hazmats)
                            <tr>
                                <td>{{ $hazmats->ofd6cid }}</td>
                                <td>{{ $hazmats->dateofexposure }}</td>
                                <td>{{ $hazmats->assignment }}</td>
                                <td>{{ DB::table('status')->where('statusid',$hazmats->applicationstatus)->value('statustype')}}</td>

                                <td>
                                    <div>
                                        <a href="{{ route('hazmat.show',[$hazmats->ofd6cid]) }}"
                                           class="btn btn-xs btn-info btn-block"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                        <a href="{{ route('hazmat.edit',[$hazmats->ofd6cid]) }}"
                                           class="btn btn-xs btn-warning btn-block"><i class="fa fa-pencil-square-o"
                                                                                       aria-hidden="true"></i> EDIT</a>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{--end OFD 6c--}}

        {{-- start OFD 6--}}
        <div class="panel panel-default panel-shadow Search" id="create-1" hidden>
            <div class="panel-heading">
                Previously filled OFD 6
            </div>
            <div class="panel-body">
                <table data-toolbar="#toolbar"
                       data-toggle="table"
                       data-search="true"
                       data-cookie="true"
                       data-click-to-select="true"
                       data-cookie-id-table="station-index-v1.1-1"
                       data-show-columns="true"
                       class="table">
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
                    @if(count($injuries) > 0)
                        @foreach($injuries as $injury)
                            <tr>
                                <td>{{ $injury->ofd6id }}</td>
                                <td>{{ $injury->injurydate }}</td>
                                <td>{{ $injury->assignmentinjury }}</td>
                                <td>{{ DB::table('status')->where('statusid',$injury->applicationstatus)->value('statustype')}}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('injuries.show',[$injury->ofd6id]) }}"
                                           class="btn btn-xs btn-info btn-block"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                        <a href="{{ route('injuries.edit',[$injury->ofd6id]) }}"
                                           class="btn btn-xs btn-warning btn-block"><i class="fa fa-pencil-square-o"
                                                                                       aria-hidden="true"></i> EDIT</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{--END OFD 6--}}
    @else
        <div class="panel-body">
            <div class="form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger" align="center">
                            <label>
                                You are not authorized to view this Area.
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 panel-heading" align="center">
            <div class="btn-bottom ">
                <a href="{{ url('/') }}" class="btn btn-default">return</a>
            </div>
        </div>
    @endif
@stop
@section('javascript')
    <script src="{{ url('js/extensions/cookie') }}/bootstrap-table-cookie.js"></script>
    <script src="{{ url('js/extensions/mobile') }}/bootstrap-table-mobile.js"></script>

    <script src="{{ url('js/export') }}/bootstrap-table-export.js"></script>
    <script src="{{ url('js/export') }}/tableExport.js"></script>
    <script src="{{ url('js/export') }}/jquery.base64.js"></script>

    <script type="text/javascript">

        $('.table').bootstrapTable({
            classes: 'table table-responsive table-no-bordered table-striped table-hover',
            iconsPrefix: 'fa',
            cookie: true,
            cookieExpire: '2y',
            mobileResponsive: true,
            pagination: true,
            sortable: true,
            showExport: true,
            showColumns: true,
            exportTypes: ['csv', 'excel'],
            pageList: ['5', '10', '25', '50', '100', '150', '200', '500', '1000'],
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
        //        $(".panel").fadeIn("fast");

    </script>

    <script>
        $("#assets").change(function () {
            $(".Search").hide();
            var id = $(this).children(":selected").attr("id");
            $("#create-" + id).fadeIn(400);
        });
    </script>
@endsection