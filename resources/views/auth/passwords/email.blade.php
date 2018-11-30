@extends('layouts.frontend_innerpage')
@section('title','Forget Password')

@section('body_class','login-banner-container')
@section('content')
<div class="login-area clearfix">

    <div class="login-card login-cardboard clearfix">

           <h2 class="title-part wow fadeInUp animated animation-name-1" >Forgot Password</h2>
            
            <div class="sign-up-form">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
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
                            <button type="submit" class="signup-btn">
                                    submit
                            </button>
                    </div>

                    
                </form>
            </div>

    </div><!-- end login div -->




</div><!-- end of login-area -->

   @include('include.frontend.page_bottom_content')    
@endsection



