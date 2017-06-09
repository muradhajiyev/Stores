@extends('layouts.main')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="signup-form"><!--login form-->
                    <center> <h2>Sign Up As Store</h2></center>
                    <form action="{{ route('register') }}" method="post">
                        {{csrf_field()}}
                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input id="name" type="text" placeholder="Name" name="name" value="{{ old('name') }}"
                                   required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                                   required>
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
                        <div class="form-group">
                            <input id="password-confirm" type="password" placeholder="Confirm password"
                                   name="password_confirmation" required>
                        </div>
                        <div class="{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <input id="role_id" type="hidden" class="form-control" name="role_id" value="2" required
                                   autofocus>
                            @if ($errors->has('role_id'))
                                <span class="help-block">
                                                    <strong>{{ $errors->first('role_id') }}</strong>
                                                </span>
                            @endif
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-default">
                                Register
                            </button><br><br>
                        </div>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>



@endsection
