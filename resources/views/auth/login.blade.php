@extends('layouts.main')

@section('content')

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="{{ route('login') }}" method="post">
                            {{csrf_field()}}
                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                       placeholder="Email" required
                                       autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" name="password" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <span>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
							</span>
                            <button type="submit" class="btn btn-default">Login</button>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </form>
                    </div><!--/login form-->


                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Name"
                                       required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                       placeholder="Email" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" placeholder="Password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input id="password-confirm" type="password" name="password_confirmation"
                                   placeholder="Confirm Password" required>
                            <div class="{{ $errors->has('role_id') ? ' has-error' : '' }}">
                                <input id="role_id" type="hidden" name="role_id" value="1" required autofocus>
                                @if ($errors->has('role_id'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('role_id') }}</strong>
                                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-default">
                                Register
                            </button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
