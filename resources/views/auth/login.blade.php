@extends('layouts.frontend_innerpage')
@section('title','Login')
@section('body_class','login-banner-container')

@section('content')
<div class="login-area clearfix">

    <div class="login-card login-cardboard clearfix">

            <h2 class="title-part wow fadeInUp animated animation-name-1" >Login</h2>
            
            <div class="sign-up-form">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="field-group top">
                        <input type="email" id="" name="email" class="input-field" placeholder="Email address">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                    
                    <div class="field-group">
                        <input type="password" name="password" id="password" class="input-field" placeholder="Password">
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="forget-pass">
                        <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                    </div>
                    <div class="field-group">
                        <button class="signup-btn">login</button>
                    </div>

                    
                </form>
            </div>

    </div><!-- end login div -->




</div><!-- end of login-area -->
  @include('include.frontend.page_bottom_content')
     
@endsection

