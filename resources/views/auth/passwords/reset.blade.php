@extends('layouts.frontend_innerpage')
@section('title','Change Password - Farm House')
@section('body_class','login-banner-container')

@section('content')
<div class="login-area margin-area clearfix">

        <div class="login-card login-cardboard clearfix">

                <h3 class="txt-1 login-txt">Change Password</h3>
                
                <div class="sign-up-form">
                        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="token" value="{{ $token }}">
                               
                         <div class="field-group">
                                <input value="" placeholder="E-mail" class="input-field" data-rule-required="true"
                                name="email" type="text" value="{{ old('email') }}"/>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                 @endif
                        </div>

                        <div class="field-group">
                            <input type="password" name="password" id="new-password" class="input-field" placeholder="New Password">
                                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                     
                        <div class="field-group">
                                <input type="password" id="confirm-password" class="input-field" placeholder="Confirm Password" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
                         
                        <div class="field-group">
                            <button type="submit" class="signup-btn">Change Password</button>
                        </div>

                        
                    </form>
                </div>

        </div><!-- end login div -->



  
</div><!-- end of login-area -->
  @include('include.frontend.page_bottom_content')
     
@endsection

