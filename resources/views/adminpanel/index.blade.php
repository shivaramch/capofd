@extends('layouts.app')
@section('crumbs')
    <ol class="breadcrumb">
        <li class="active">Admin Panel</li>
    </ol>
@endsection


@section('content')

        <!-- bottom navigation icons start here-->
        <div class="col-md-12">
            <div class="row" style="margin: inherit">

                <a href="{{ route('fmlas.index') }}">
                    <div class="col-md-4 large-category">
                        <div class="thumbnail">
                            <div class="thumbnail-dash" id="fmlaLink">
                                <i class="fa fa-upload fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="caption">
                                <h3>FMLA Uploads</h3>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('limitedduties.index') }}">
                    <div class="col-md-4 large-category">
                        <div class="thumbnail">
                            <div class="thumbnail-dash" id="limitedLink">
                                <i class="fa fa-calendar fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="caption">
                                <h3>Limited Duty</h3>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('search') }}">
                    <div class="col-md-4 large-category">
                        <div class="thumbnail">
                            <div class="thumbnail-dash" id="adminLink">
                                <i class="fa fa-search fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="caption">
                                <h3>Admin Search</h3>
                            </div>
                        </div>
                    </div>
                </a>



            </div>
        </div>
        <!-- Bottom navigation icons ends here-->
@endsection
