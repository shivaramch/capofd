@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ URL::previous() }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="active">OFD 6C Hazmat</li>
    </ol>
@endsection

@section('content')

    <div class="panel panel-default panel-shadow ">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <a class="btn btn-success btn-lg btn-block" href="{{ route('hazmat.create') }}">Fill a New OFD
                        6C</a>
                </div>
            </div>
        </div>
    </div>

    @if(count($hazmat) > 0)

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
                        <th data-sortable="true">OFD 6C ID</th>
                        <th data-sortable="true">Employee Name</th>
                        <th data-sortable="true">Date of Exposure</th>
                        <th data-sortable="true">Assignment</th>
                        <th data-sortable="true">Injured?</th>
                        <th data-sortable="true">EPCR Incident Number</th>
                        <th data-sortable="true">FRMS Incident Number</th>
                        <th data-sortable="true">Status</th>
                        <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hazmat as $hazmats)
                        @if($hazmats->employeeid == Auth::user()->id )
                            <tr>
                                <td>{{ $hazmats->ofd6cid }}</td>
                                <td>{{ $hazmats->employeename }}</td>
                                <td>{{ $hazmats->dateofexposure }}</td>
                                <td>{{ $hazmats->assignment }}</td>
                                <td>{{ $hazmats->exposurehazmat }}</td>
                                <td>{{$hazmats->epcrincidentnum}}</td>
                                <td>{{ $hazmats->frmsincidentnum }}</td>
                                <td>{{ DB::table('status')->where('statusid',$hazmats->applicationstatus)->value('statustype') }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('hazmat.show',[$hazmats->ofd6cid]) }}"
                                           class="btn btn-xs btn-info btn-block"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                        @if( $hazmats->applicationstatus == DB::table('status')->where('statustype','Draft')->value('statusid')
 || $hazmats->applicationstatus == DB::table('status')->where('statustype','Rejected')->value('statusid'))
                                        <a href="{{ route('hazmat.edit',[$hazmats->ofd6cid]) }}"
                                           class="btn btn-xs btn-warning btn-block"><i class="fa fa-pencil-square-o"
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
        <div class="panel panel-default panel-shadow " hidden>
            <div class="panel-heading">
                Assgined to Primary IDCO
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
                        <th data-sortable="true">OFD 6C ID</th>
                        <th data-sortable="true">Employee Name</th>
                        <th data-sortable="true">Date of Exposure</th>
                        <th data-sortable="true">Assignment</th>
                        <th data-sortable="true">Injured?</th>
                        <th data-sortable="true">EPCR Incident Number</th>
                        <th data-sortable="true">FRMS Incident Number</th>
                        <th data-sortable="true">Status</th>
                        <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hazmat as $hazmats)
                        @if($hazmats->primaryidconumber == Auth::user()->id  && $hazmats->applicationstatus==DB::table('status')->where('statustype','Application under Primary IDCO')->value('statusid'))
                            <tr>
                                <td>{{ $hazmats->ofd6cid }}</td>
                                <td>{{ $hazmats->employeename }}</td>
                                <td>{{ $hazmats->dateofexposure }}</td>
                                <td>{{ $hazmats->assignment }}</td>
                                <td>{{ $hazmats->exposurehazmat }}</td>
                                <td>{{$hazmats->epcrincidentnum}}</td>
                                <td>{{ $hazmats->frmsincidentnum }}</td>
                                <td>{{DB::table('status')->where('statusid',$hazmats->applicationstatus)->value('statustype')}}</td>

                                <td>
                                    <div>
                                        <a href="{{ route('hazmat.show',[$hazmats->ofd6cid]) }}"
                                           class="btn btn-xs btn-info btn-block"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                        @if( $hazmats->applicationstatus == DB::table('status')->where('statustype','Draft')->value('statusid')
|| $hazmats->applicationstatus ==   DB::table('status')->where('statustype','Rejected')->value('statusid'))
                                        <a href="{{ route('hazmat.edit',[$hazmats->ofd6cid]) }}"
                                           class="btn btn-xs btn-warning btn-block"><i class="fa fa-pencil-square-o"
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
@stop

@section('javascript')

    <script src="{{ url('js/extensions/cookie') }}/bootstrap-table-cookie.js"></script>
    <script src="{{ url('js/extensions/mobile') }}/bootstrap-table-mobile.js"></script>

    <script src="{{ url('js/export') }}/bootstrap-table-export.js"></script>
    <script src="{{ url('js/export') }}/tableExport.js"></script>
    <script src="{{ url('js/export') }}/jquery.base64.js"></script>

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