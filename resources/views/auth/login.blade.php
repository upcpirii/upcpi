<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - UPC Portal</title>

    <link rel="stylesheet" href="{!! mix('css/vendor.css') !!}"/>
    <link rel="stylesheet" href="{!! mix('css/app.css') !!}"/>

</head>

<body class="gray-bg">


<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <br />
            <br />
            {!! media('login-logo.png', '170px') !!}
            <br />
            <br />
        </div>
        <h3>Welcome to UPCWeb</h3>
        <p>
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            {!! csrf_field() !!}
            @if($errors->has('email'))
                <span class="help-block has-error text-danger">The email "{{ old('email') }}" is not registered for a UPCPI Account. Please login with another email.</span>
            @endif
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{old('email')}}" required="">
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="{{ old('password') }}" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="#">
                <small>Forgot password?</small>
            </a>
            <p class="text-muted text-center">
                <small>Do not have an account?</small>
            </p>
            <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
        </form>
        <p class="m-t">
            <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
        </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ mix('js/app.js') }}"></script>

</body>

</html>
