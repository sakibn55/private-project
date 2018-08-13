@extends('layouts.app')

@section('content')
<div class="login-form">
<div class="col-md-6">
      <div class="login-left-area">
          <div class="text-area">
              <h2 class="heading">Login to Bakbakum</h2>
              <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          </div>
          <div class="activities">
              <ul>
                  <li>
                      <i class="fa fa-share-square"></i>
                      <h4>Start posting your own ads.</h4>
                  </li>
                  <li>
                      <i class="fa fa-edit"></i>
                      <h4>Edit your ads later</h4>
                  </li>
                  <li>
                      <i class="fa fa-comments"></i>
                      <h4>Live chat and more</h4>
                  </li>
              </ul>
          </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="login-right-area">
          <!-- <div class="fb-btn-area">
              <a href="" class="fb-login">
                  <i class="fa fa-facebook"></i>
                  Continue with Facebook
              </a>
              <p>or</p>
          </div> -->
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                  <input id="password" type="password" class="form-control" name="password"  placeholder="Enter password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="login-btn-area">
                    <a class="login"><button type="submit">Login</button></a>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
                </div>
                
                <hr>
                <p class="p-text">Don't have yoy any account yet</p>
                <div class="sign-up-btn-area">
                  <a href="" class="sign-up">Sign up</a>
                </div>
            </form>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- <div class="container">
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
</div> -->
@endsection
