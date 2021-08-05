
<!doctype html>
<!--
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Bootstrap Simple Admin Template</title>
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/auth.css')}}" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="card-body text-center">
                <div class="mb-4">
                    <img class="brand" src="{{asset('assets/img/bootstraper-logo.png')}}" alt="bootstraper logo">
                </div>
                <h6 class="mb-4 text-muted">Login to your account</h6>
                @error('email')
                <label for="email" style="color: red;" class="form-label">{{$message}}</label>
                @enderror
                <form  action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">Email adress</label>
                        <input type="email" name="email" :value="old('email')"  autofocus  class="form-control" placeholder="Enter Email" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"
                               name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="mb-3 text-start">
                        <div class="form-check">
                            <input class="form-check-input" name="remember" type="checkbox" value="" id="check1">
                            <label class="form-check-label" for="check1">
                                Remember me on this device
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary shadow-2 mb-4">Login</button>
                </form>
                <p class="mb-2 text-muted">Forgot password? <a href="{{route('password.request')}}">Reset</a></p>
                <p class="mb-0 text-muted">Don't have account yet? <a href="{{route('register')}}">Signup</a></p>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
