@include('partials.header')
<link rel="stylesheet" href="{{ url('css') }}/login.css"/>

<body>
<div class="wrapper">

    <form class="form-signin" role="form" method="POST" action="{{ url('login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div>
            <img src="img/login.png" height="125" width="125" style="display:block; margin: auto;" >
        </div>
        <h2 class="form-signin-heading" style="text-align:center;">OFD AMS</h2>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were problems with input:
                <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input type="text" class="form-control" name="username" value="{{ old('username') }}"  placeholder="Username">
        <input type="password"  style="margin-top:15px;" class="form-control" name="password" placeholder="Password">

        <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: #1976d2; border: 1px solid #1565c0; margin-top: 10px;">Login</button>
    </form>
</div>
</body>