@extends('layouts.frontend')
@section('title','Resend Activation Mail - Farm House')
@section('body_class','login-banner-container')

@section('content')
<div class="login-area clearfix">

    <div class="login-card login-cardboard clearfix">

            <h3 class="txt-1 login-txt">Resend Activation Mail</h3>
            
            <div class="sign-up-form">
                    @if (session('flash_success'))
                    <div class="alert alert-success">
                        {{ session('flash_success') }}
                    </div>
                    @endif
                    @if (session('flash_error'))
                    <div class="alert alert-success">
                        {{ session('flash_error') }}
                    </div>
                    @endif
                <form class="form-horizontal" method="POST" action="{!! url('/resend-activation') !!}">
                        {{ csrf_field() }}
                    <div class="field-group top">
                        <input type="email" id="" name="email" class="input-field" placeholder="Email address" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                    
                    <div class="field-group">
                            <button type="submit" class="signup-btn btn-all">
                                    SEND
                            </button>
                    </div>

                    
                </form>
            </div>

    </div><!-- end login div -->




</div><!-- end of login-area -->

     
@endsection



