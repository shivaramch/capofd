@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <a class="btn btn-default" type="button"
           href="{{ route('adminpanel.index') }}">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('adminpanel.index') }}">Admin panel</a></li>
        <li class="active">FMLA</li>
    </ol>
@endsection
@section('content')
    @if(Auth::user()->roleid == 1)
    <div class="panel panel-default panel-shadow ">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <a class="btn btn-success btn-lg btn-block" href="{{ route('fmlas.create') }}">Enter New
                        FMLA Information</a>
                </div>
            </div>
        </div>
    </div>

    @if(count($fmlas) > 0)
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
                            <th data-sortable="true">FMLA ID</th>
                            <th data-sortable="true">Employee ID</th>
                            <th data-sortable="true">Employee Name</th>
                            <th data-sortable="true">From Date</th>
                            <th data-sortable="true">To Date</th>
                            <th data-switchable="false" data-searchable="false" data-sortable="false">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($fmlas as $fmla)

                                    <tr>
                                        <td>{{ $fmla->fmlaid }}</td>
                                        <td>{{ $fmla->employeeid }}</td>
                                        <td>{{ $fmla->employeename }}</td>
                                        <td>{{ $fmla->fromdate }}</td>
                                        <td>{{ $fmla->todate }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('fmlas.show',[$fmla->fmlaid]) }}"
                                                   class="btn btn-xs btn-info btn-block"><i
                                                            class="fa fa-eye" aria-hidden="true"></i> VIEW</a>
                                                <a href="{{ route('fmlas.edit',[$fmla->fmlaid]) }}"
                                                   class="btn btn-xs btn-warning btn-block"><i
                                                            class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i> EDIT</a>
                                            </div>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
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
            }
        });
        $(".panel").fadeIn("fast");
    </script>
@endsection