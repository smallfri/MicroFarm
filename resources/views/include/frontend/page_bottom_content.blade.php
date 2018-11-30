<section class="contactus-section" id="contactus">
            <div class="contactus-div">
                <div class="container">
                    
                    <div class="row">
                            
                        <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp mob-work-part animated animation-name-1">
                            <div class="footer-bottom-bg p-10">
                                <a href="{{url('/')}}"><img class="img-responsive footer-img" src="{{ asset('frontend/images/logo.png')}}" alt="logo" class="img-center" /></a>
                                <p class="p-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis sit obcaecati consectetur ex officiis similique nihil odit placeat ut iste esse consequatur earum eum rerum ea ipsa quae, saepe qui unde fugit corporis molestias voluptatibus. Tempore eos fuga excepturi quo natus vitae corporis harum sequi pariatur, quae, deleniti reprehenderit suscipit.</p>
                            </div>
                        </div>



                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <section class="single-contact_us">
                                <div class="left_contact">
                                    <ul class="list catagories">
                                        <li><a><i class="fa fa-home color1"></i>{{$_setting->address}}</a></li>
                                        <li><a><i class="fa fa-envelope color1"></i><span>{{$_setting->email}}</span></a></li>
                                        <li><a><i class="fa fa-phone color1"></i>{{$_setting->contactno}}<br>{{$_setting->contactno1}}</a></li>
                                    </ul>
                                </div>
                            </section>    
                        </div>
                       
                        <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp mob-work-part animated animation-name-1">
                            <div class="contactus-bg">
                                <div class="form-div">
                                   {!! Form::open(['url' => '/contact', 'class' => 'theme-form','id'=>'formContact','enctype'=>'multipart/form-data']) !!}
                                        @include ('frontend.contact.form')
                                    {!! Form::close() !!}
                                </div>
                            </div>    
                        </div>
                       
                    </div><!-- end of row -->
                </div><!-- end of container -->
            </div><!-- end of our-work-part-div -->
        </section><!-- end of our-work-part-section -->   