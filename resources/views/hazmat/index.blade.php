@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
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


    @endsection