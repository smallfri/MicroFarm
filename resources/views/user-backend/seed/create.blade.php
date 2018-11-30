@extends('layouts.user-backend')

@section('title','Seed List')
@section('content')
<!-- Main content -->
				<div class="content-wrapper">
				
					<section class="top-section">
						<div class="page-header">
							<div class="page-header-content">
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12 clearfix">
										<div class="page-title">
											<h4><span class="text-semibold font-head"><a href="{{url('/Dashboard')}}">Dashboard</a> / Seed</h4>
										</div>
									</div>
									<div class="col-lg-8 col-md-8 col-sm-12 clearfix">
										
									</div>
								</div>
							</div>			
						</div><!-- /page header -->
	
					</section>

					 	
						
                        {!! Form::open(['url' => '/seed/create', 'class' => 'form-horizontal','id'=>'formSeed','enctype'=>'multipart/form-data']) !!}

                        @include ('user-backend.seed.form')

                        {!! Form::close() !!}
				</div>
@endsection


@push('js')
<script>
    </script>
@endpush


