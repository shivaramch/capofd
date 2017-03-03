@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="active">Users</li>
    </ol>
@endsection


@section('content')

    <div class="panel panel-default" hidden>
        <div class="panel-heading">
            Users
        </div>
        <div class="panel-body">

            <a id="toolbar" href="{{ route('users.create') }}" class="btn btn-new"><i class="fa fa-plus" aria-hidden="true"></i></a>


            <table  data-toolbar="#toolbar"
                    data-toggle="table"
                    data-search="true"
                    data-cookie="true"
                    data-click-to-select="true"
                    data-cookie-id-table="users-index-v1.1-1"
                    data-show-columns="true"
                    id="table">
                <thead>
                <tr>
                    {{--<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>--}}
                    <th data-sortable="true">Name</th>
                    <th data-sortable="true">Username</th>
                    <th data-sortable="true">Email</th>
                    <th data-sortable="true">Created</th>
                    <th data-switchable="false" data-searchable="false" data-sortable="false">&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at}}</td>
                            <td>
                                <div style="float: right;">
                                    <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a type="button" data-toggle="modal" data-target="#{{ $user->username }}" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>


                        <div class="modal fade" id="{{ $user->username }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Warning</h4>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete user {{ $user->username }}? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'route' => ['users.destroy', $user->id])) !!}
                                        {{Form::button('<i class="fa fa-trash"></i> DELETE', array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No entries in table</td>
                    </tr>
                @endif
                </tbody>
            </table>




        </div>
    </div>


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
            pageList: ['10','25','50','100','150','200','500','1000'],
            exportOptions: {
                fileName: 'assets-export-' + (new Date()).toISOString().slice(0,10),
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