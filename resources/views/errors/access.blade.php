@extends('layouts.app')

@section('content')
    <div class="panel panel-default panel-shadow ">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-offset-3 col-md-6"><img src="{{asset('img/login.png')}}" height="125" width="125"
                                                           style="display:block; margin: auto;">

                    <h2 class="form-signin-heading" style="text-align:center;">Unauthorized User Access</h2>
                    <div align="center">
                        <div class="btn-bottom ">
                            <a href="{{ url('/') }}" class="btn btn-default">Return</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop