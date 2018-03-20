@extends('layouts.app')

@section('content')
<div class="container">

                    <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <h2 class="form-signin-heading">sign in now</h2>
                        <div class="login-wrap">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="email" type="email" class="form-control" placeholder="User ID" autofocus name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>
                       <label class="checkbox">
                <input type="checkbox" name="remember" value="remember-me"> Remember me
                <span class="pull-right">
                    <a class="btn btn-link" href="{{ url('/password/reset') }}">  Forgot Password?</a>

                </span>
            </label>

                                <button type="submit" class="btn btn-lg btn-login btn-block">
                                    Login
                                </button>



                             </div>
                    </form>
                </div>

@endsection
