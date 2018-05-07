@extends('layouts.website.main')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span></li>
            <li><strong>My Account</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <section class="main-container col1-layout">
    <div class="main container">
        <div class="page-content">
            <div class="account-login">
              <div class="box-authentication">
                <h4>Login</h4>
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                     <p class="before-login-text">Welcome back! Sign in to your account</p>
                      <label for="emmail_login">Email address<span class="required">*</span></label>
                      <input id="emmail_login" type="email" name="email" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" value="{{ old('email') }}" required>
                      <label for="password_login">Password<span class="required">*</span></label>
                      <input id="password_login" type="password" name="password" class="form-control{{ $errors->has('email') ? ' has-error' : '' }} value="{{ old('password') }}" required ">
                      <p class="forgot-pass"><a href="{{ route('password.request') }}">Lost your password?</a></p>
                      <button class="button" type="submit"><i class="fa fa-lock"></i>&nbsp; <span>Login</span></button><label class="inline" for="rememberme">
											<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
										</label>
                  </form>
              </div>
              <div class="box-authentication">
                <h4>Register</h4><p>Create your very own account</p>
                <form method="POST" action="{{ route('register') }}">
                  {{ csrf_field() }}
                <label for="name_register">Name<span class="required">*</span></label>
                <input id="name_register" type="text" name="name" class="form-control{{ $errors->has('name') ? ' has-error' : '' }}" value="{{ old('name') }}" required>
                <label for="emmail_register">Email address<span class="required">*</span></label>
                <input id="emmail_register" type="text" name="email" class=class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" value="{{ old('email') }}" required>
                <label for="password_register">Password<span class="required">*</span></label>
                <input id="password_register" type="password" name="password" class=class="form-control{{ $errors->has('password') ? ' has-error' : '' }}" value="{{ old('password') }}" required>
                <label for="emmail_register">Confirm Password<span class="required">*</span></label>
                <input id="emmail_register" type="password" name="password_confirmation" class=class="form-control{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" value="{{ old('email') }}" required>
                <button class="button" type="submit"><i class="fa fa-user"></i>&nbsp; <span>Register</span></button>

                <div class="register-benefits">
												<h5>Sign up today and you will be able to :</h5>
												<ul>
													<li>Speed your way through checkout</li>
													<li>Track your orders easily</li>
													<li>Keep a record of all your purchases</li>
												</ul>
											</div>
              </div>


        </div>
      </div>

    </div>
  </section>

@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
