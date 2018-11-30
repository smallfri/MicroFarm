@extends('layouts.master')
@section('title','Contact Us')

@section('content')

<div class="page-header contact padT100 padB70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Theme Heading -->
                        <div class="theme-heading">
                            <h1>Contact us</h1>
                            <h3><span class="heading-shape">Contact <strong>us</strong></span></h3>
                        </div>
                        <!-- Theme Heading -->
                        <div class="breadcrumb-box">
                            <ul class="breadcrumb text-center colorW marB0">
                                <li>
                                     <a href="{{url('/')}}">Home</a>
                                </li>
                                <li class="active">Contact us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <!--//================Contact start==============//-->
        <div class="padB100 padT100">
            <div class="container">
                <!-- Theme Heading -->
                <div class="theme-heading">
                    <h1>Contact us</h1>
                    <h3><span class="heading-shape">Contact <strong>us</strong></span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <!-- Theme Heading -->
            </div>
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
            <div class="contact-us padT100 padB100">
                <div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="address">
								<h3>Contact</h3>
								<ul>
									<li><span>Address:</span>{{$setting->address}}</li>
									<li><span>Contact no:</span>{{$setting->contactno}}</li>
									<li><span>Email:</span>{{$setting->email}}</li>
								</ul>
							</div>
							
						</div>

                    <div class="col-md-8 col-sm-6 col-xs-12">
						 {!! Form::open(['url' => '/contact', 'class' => 'theme-form','id'=>'formContact','enctype'=>'multipart/form-data']) !!}
                             @include ('contact.form')
                         {!! Form::close() !!}
                    </div>
					</div>
                </div>
            </div>
			<div class="contact-map">
				<div class="container">						
					<div class="map-area">
					   <!--<div id="gmap_canvas" class="maps open"></div>-->
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.599814479989!2d76.043710415513!3d22.96496078498227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3963179b9e77a2a7%3A0x885ddeaea6ed6c72!2s12%2C+Civil+Lines+Rd%2C+Sadashiv+Nagar%2C+Pachunkar+Colony%2C+Itawa%2C+Dewas%2C+Madhya+Pradesh+455001!5e0!3m2!1sen!2sin!4v1521798540615" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
            <div class="clear"></div>
        </div>
        <!--//================Contact end==============//-->
@endsection