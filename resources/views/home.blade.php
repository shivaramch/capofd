@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <li class="active">Dashboard</li>
    </ol>
@endsection


@section('content')

    <!-- top navigation icons starting here-->
    <div class="col-md-12">
        <div class="row" style="margin: inherit">
            <a href="{{ route('injuries.index') }}">
                <div class="col-md-3 large-category">
                    <div class="thumbnail">
                        <div class="thumbnail-dash">
                            <i class="fa fa-medkit fa-4x" aria-hidden="true"></i>
                        </div>
                        <div class="caption">
                            <h3>OFD 6</h3>
                            <h4 align="center">Injury On Duty</h4>

                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('accidents.index') }}">
                <div class="col-md-3 large-category">
                    <div class="thumbnail">
                        <div class="thumbnail-dash">
                            <i class="fa fa-ambulance fa-4x" aria-hidden="true"></i>
                        </div>
                        <div class="caption">
                            <h3>OFD 6A</h3>
                            <h4 align="center">Vehicle Accident</h4>

                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('biologicals.index') }}">
                <div class="col-md-3 large-category">
                    <div class="thumbnail">
                        <div class="thumbnail-dash">
                            <i class="fa fa-exclamation-triangle fa-4x" aria-hidden="true"></i>
                        </div>
                        <div class="caption">
                            <h3>OFD 6B</h3>
                            <h4 align="center">Biological Exposure</h4>

                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('hazmat.index') }}">
                <div class="col-md-3 large-category">
                    <div class="thumbnail">
                        <div class="thumbnail-dash">
                            <i class="fa fa-plus-square fa-4x" aria-hidden="true"></i>
                        </div>
                        <div class="caption">
                            <h3>OFD 6C</h3>
                            <h4 align="center">HazMat Exposure</h4>
                        </div>
                    </div>
                </div>
            </a>

        </div>
    </div>
    <!-- top navigation icons ends here-->

    @if(Auth::user()->role == 1)
    <!-- bottom navigation icons start here-->
    <div class="col-md-12">
        <div class="row" style="margin: inherit">
            {{--<a href="{{ route('repairs.index') }}">--}}
            <div class="col-md-4 large-category">
                <div class="thumbnail">
                    <div class="thumbnail-dash">
                        <i class="fa fa-upload fa-4x" aria-hidden="true"></i>
                    </div>
                    <div class="caption">
                        <h3>CorVel Uploads</h3>
                    </div>
                </div>
            </div>
            </a>

            {{--<a href="{{ route('repairs.index') }}">--}}
            <div class="col-md-4 large-category">
                <div class="thumbnail">
                    <div class="thumbnail-dash">
                        <i class="fa fa-upload fa-4x" aria-hidden="true"></i>
                    </div>
                    <div class="caption">
                        <h3>FMLA Uploads</h3>
                    </div>
                </div>
            </div>
            </a>

            {{--<a href="{{ route('repairs.index') }}">--}}
            <div class="col-md-4 large-category">
                <div class="thumbnail">
                    <div class="thumbnail-dash">
                        <i class="fa fa-upload fa-4x" aria-hidden="true"></i>
                    </div>
                    <div class="caption">
                        <h3>Limited Duty</h3>
                    </div>
                </div>
            </div>
            </a>


        </div>
    </div>
    <!-- Bottom navigation icons ends here-->
    @endif

@endsection
