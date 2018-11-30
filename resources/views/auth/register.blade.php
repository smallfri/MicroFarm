@extends('layouts.frontend_innerpage')
@section('title','Sign Up')
@section('content')
 @if (Session::has('flash_message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    @if (Session::has('flash_error'))
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                            {{ Session::get('flash_error') }}
                        </div>
                    @endif
                    @if (Session::has('flash_success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                            {{ Session::get('flash_success') }}
                        </div>
                    @endif

                    @include('flash::message')
<div class="login-area clearfix">

        <div class="login-card login-cardboard clearfix">

              <h2 class="title-part wow fadeInUp animated animation-name-1" >Sign up</h2>
                
                <div class="sign-up-form">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                        <div class="field-group top">
                                <input id="name" type="text" class="input-field" name="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="field-group">
                                <input id="email" type="email"  name="email" class="input-field" placeholder="Email address" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="field-group">
                                <input id="password" type="password"  name="password"  class="input-field" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="field-group">
                                <input id="password-confirm" type="password" class="input-field" placeholder="Confirm Password" name="password_confirmation" required>
                        </div>
                        
                        <div class="field-group pt-10">
                            <button type="submit" class="signup-btn">Submit</button>
                        </div>

                        
                    </form>
                </div>

        </div><!-- end login div -->



  
</div><!-- end of login-area -->
  @include('include.frontend.page_bottom_content')
@endsection
