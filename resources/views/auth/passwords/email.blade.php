<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - HRMS admin template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('ar/plugins/bootstrap-rtl/css/bootstrap.min.css')}}">


    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('ar/css/font-awesome.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('ar/css/style.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="{{asset('ar/assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('ar/assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body class="account-page">

<!-- Main Wrapper -->
<div class="main-wrapper">
           <div class="container-fluid">
              <div class="col-6 offset-3">
                  <div class="account-logo">
                      <a href="{{trans('/home')}}"><img  src="{{asset('img/ArSoftware..gif')}}" alt="Arabian Software Technologies" style="border-radius: 100%"></a>
                  </div>
                  <div class="card">
                      <div class="card-header text-center text-secondary">{{ __('auth.reset_pass') }}</div>
                      <div class="card-body">
                          @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif

                          <form method="POST" action="{{ route('password.email') }}">
                              @csrf

                              <div class="form-group row">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.email') }}</label>

                                  <div class="col-md-7">
                                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                      @error('email')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-5">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('auth.Send Password Reset Link') }}
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
           </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{asset('ar/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('ar/js/popper.min.js')}}"></script>
<script src="{{asset('ar/plugins/bootstrap-rtl/js/bootstrap.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('ar/js/app.js')}}"></script>
</body>
</html>

