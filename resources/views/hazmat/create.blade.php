@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li><a href="{{ route('hazmat.index') }}">OFD 6A Accidents</a></li>
        <li class="active">New Form</li>
    </ol>
@endsection
@section('content')

    {!! Form::open(['method' => 'POST', 'route' => ['hazmat.store'], 'files' => true,]) !!}
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
                                <h3><strong>HAZARDOUS MATERIAL EXPOSURE REPORTING INSTRUCTIONS</strong></h3>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6><i><strong>Used for future tracking purposes only</strong></i></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="panel-body">
            <form class="form-horizontal">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label class="checkbox-inline col-sm-4"><input type="checkbox"><strong>Contact CorVel Enterprise Comp @ 877-764-3574.
                                Tell them you have a Hazardous Material Exposure and the call is for reporting ONLY.</strong>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label class="checkbox-inline col-sm-4"><input type="checkbox">
                            <strong>Once you have completed the call, record CorVel Claim #</strong>
                        </label>
                        <div class="col-sm-4">
                            {!! Form::text('corvelID', '', array('class'=>'form-control', 'required'=>'required'))!!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label class="checkbox-inline col-sm-4"><input type="checkbox">
                            <strong>Fill out OFD-006d Hazmat Exposure Report form</strong></label>
                        <div class="col-sm-2">
                            <a class="btn btn-success dropdown-toggle col-sm-12" type="button" href="/download/a.txt">
                                <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>
                        <div class="col-sm-2">
                            <div class="fileUpload upload btn btn-success">
                                {!! Form::file('attachOFD6d', old('attachOFD6d'), ['id' => 'upload' ,'class' => 'form-control','required'=>'required']) !!}
                                {!! Form::hidden('attachOFD6d_max_size', 20) !!}
                                @if($errors->has('attachOFD6d'))
                                    <p class="help-block">
                                        {{ $errors->first('attachOFD6d') }}
                                    </p>
                                @endif
                            </div>
                            <button type="button" class="btn btn-info dropdown-toggle col-sm-12" data-toggle="modal"
                                    data-target="#myModal">
                                <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-4">Do you have any symptoms of illness or injury and require treatment</label>
                        <div class="col-sm-2">
                            <iframe src="http://localhost/OFDCap/public/injuries" height="500px" width="400px">
                                <p>Your browser does not support iframes.</p>
                            </iframe>
                            <form name="cityselect">
                                <select name="menu" onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="GO">
                                    <option selected="selected">Select One</option>
                                    <option value="http://localhost/OFDDEV/public/injuries">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                {!! Form::submit('Submit',['class' => 'btn btn-success']) !!}
                <a href="{{ route('hazmat.index') }}" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>