@extends('layouts.frontend')
@section('title','Home')

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
	<div class="banner-container">

        <div class="banner-vidoe-img-div">
            <img src="hero-img-2.jpg" alt="" class="mobile-hide">
        </div>

        <div class="banner-caption-div clearfix">
            <h2><span>Microgreens: Health Benefits, Nutrition and How to Grow Them</span></h2>
            <h3>
                <span>Use Our Super Convenient MicroFarmManager To Take Control of Your Garden.</span>
            </h3>
        </div>
    </div><!-- end of banner-container -->


    <div class="content-area clearfix">


		<section class="our-work-part-section" id="our-work-park-section">
            <div class="our-work-part-div">
                <div class="container">
                    <h2 class="title-part wow fadeInUp animated animation-name-1">lorem ipsum</h2>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp mob-work-part animated animation-name-1">
                            <div class="our-works-bg">
                            <div class="work-title-part">lorem ipsum</div>
                            <div class="our-work-block"><img class="img-responsive" src="{{ asset('frontend/images/feature1.jpg')}}" alt="Education"></div>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, molestias nulla at dolor qui ad voluptas ipsa inventore ratione eum commodi dolorum possimus nisi quia natus? Voluptas possimus iusto, veniam molestias animi labore quidem odio fugiat ratione, repudiandae, iure asperiores.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp mob-work-part animated animation-name-1">
                            <div class="our-works-bg">
                            <div class="work-title-part">lorem ipsum</div>
                            <div class="our-work-block"><img class="img-responsive" src="{{ asset('frontend/images/feature2.jpg')}}" alt="Inspiration"></div>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, molestias nulla at dolor qui ad voluptas ipsa inventore ratione eum commodi dolorum possimus nisi quia natus? Voluptas possimus iusto, veniam molestias animi labore quidem odio fugiat ratione, repudiandae, iure asperiores.</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp mob-work-part animated animation-name-1">
                            <div class="our-works-bg">
                            <div class="work-title-part">lorem ipsum</div>
                            <div class="our-work-block"><img class="img-responsive" src="{{ asset('frontend/images/feature3.jpg')}}" alt="Connection"></div>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, molestias nulla at dolor qui ad voluptas ipsa inventore ratione eum commodi dolorum possimus nisi quia natus? Voluptas possimus iusto, veniam molestias animi labore quidem odio fugiat ratione, repudiandae, iure asperiores.</p>
                            </div>
                        </div>
                    </div><!-- end of row -->
                </div><!-- end of container -->
            </div><!-- end of our-work-part-div -->
        </section><!-- end of our-work-part-section -->

         @include('include.frontend.page_bottom_content')
@endsection
