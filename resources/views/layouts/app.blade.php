@include('partials.header')
@include('partials.navbar')


<div class="sub-nav row" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="col-md-12">
        <span class="nav-view">@yield('crumbs')</span>
        <span class="nav-user">
    </span>
    </div>
</div>

@if(isset($siteTitle))
    <h3 class="page-title">
        {{ $siteTitle }}
    </h3>
@endif


@if (Session::has('message'))
    <div class="note note-info">
        <div class="alert-success  flash" style=" font-size: 24px;height:50px;">
        <p style="text-align: center;padding-top: 10px;">{{ Session::get('message') }}</p>
        </div>
    </div>
@endif

@if ($errors->count() > 0)

    <div class="alert alert-danger" style="margin:10px;">
        {{--<h3>Error! It will be better with the next Capstone :).</h3>--}}
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@yield('content')

@include('partials.javascripts')

@yield('javascript')

@include('partials.footer')


