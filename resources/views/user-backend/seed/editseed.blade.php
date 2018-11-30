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
											<h4><span class="text-semibold font-head"><a href="{{url('/Dashboard')}}">Dashboard</a> / GROWING SUMMARY</h4>
										</div>
									</div>
									<div class="col-lg-8 col-md-8 col-sm-12 clearfix">
										
									</div>
								</div>
							</div>			
						</div><!-- /page header -->
	
					</section>


				<!-- Content area -->
				<div class="content">

				
					<!-- Form horizontal -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">GROWING SUMMARY</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                	</ul>
		                	</div>
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
						<div class="panel-body">
                            @if ($errors->any())
								<ul class="alert alert-danger">
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							@endif
         
							<div class="col-md-12 col-sm-12 no-padding border-1">
								<div class="col-md-3 col-sm-3 no-padding">
									<div class="panel-1">
										<div class="panel-body no-padding">
                                            <div class="scrollbar-y">
                                                <div class="tabbable">
                                                    <ul class="nav nav-tabs nav-tabs-solid nav-justified">                                                      
                                                        @foreach($userseedlist as $key => $value)
                                                        <li class="{{ ($value->userseedname[0]->id == $id) ? 'active' : '' }}" id="li_{{$value->userseedname[0]->id}}"><a href="{{url('seed/edit/'.$value->userseedname[0]->id)}}" aria-expanded="true">{{$value->userseedname[0]->name}}</a></li>
                                                       
                                                        @endforeach
                                                    </ul>
                                                </div>	
                                            </div>
										</div>	
									</div>	
								</div>	
                                
								<div class="col-md-9 col-sm-9 no-padding">
									<div class="tab-content">    
                                                                             
                                           
										<div class="tab-pane active" id="solid-justified-tab">
                                        
                                            <div class="col-md-6">
                                                
                                                <form action="#" method="post">
                                                    {{csrf_field()}}
                                                    <div class="col-md-12 pt-10 pb-10">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="seed-name" class="label-1">SEED NAME</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                @if(isset($userseeddetail->userseedName[0]->name))
                                                                {!! Form::text('seed_name', $userseeddetail->userseedName[0]->name, ['class' => 'form-control','readonly'=>'readonly']) !!}
                                                                <input type="hidden" name="seed_id" value="{{$userseeddetail->userseedName[0]->id}}">
                                                                @else
                                                                {!! Form::text('seed_name', $userseeddetail->seed_name, ['class' => 'form-control','readonly'=>'readonly']) !!}
															
                                                                @endif
                                                            </div>    
                                                        </div>
                                                    </div>    

                                                   <div class="col-md-12 pt-10 pb-10">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="supplier-1">SUPPLIER</label>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                {!! Form::text('supplier_name',(isset($userseeddetail->seedsupplierName[0]->name) && $userseeddetail->seedsupplierName[0]->name !='' ) ? $userseeddetail->seedsupplierName[0]->name : '', ['class' => 'form-control','readonly'=>'readonly']) !!}
                                                             <input type="hidden" name="supplier_id" value="{{$userseeddetail->seedsupplierName[0]->id}}">
                                                            </div>    
                                                        </div>
                                                    </div>    
    
                                                    <div class="col-md-12 pt-10 pb-10">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="supplier-1">SEED DENSITY</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                @if(isset($userseeddetail->userseedName[0]->density))
                                                                 {!! Form::text('density', $userseeddetail->userseedName[0]->density, ['class' => 'form-control','readonly'=>'readonly']) !!}
                                                                @else
                                                                {!! Form::text('density', $userseeddetail->density, ['class' => 'form-control','readonly'=>'readonly']) !!}
                                                                @endif
                                                            </div>    
                                                            <div class="col-md-6"> 
                                                                @if(isset($userseeddetail->userseedName[0]->measurement))                               
                                                                 {!! Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML'] ,(isset($userseeddetail->userseedName[0]->measurement) && $userseeddetail->userseedName[0]->measurement != '' ) ? $userseeddetail->userseedName[0]->measurement : '', ['class' => 'form-control']) !!} 
                                                                @else
                                                                {!! Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML'] ,(isset($userseeddetail->measurement) && $userseeddetail->measurement != '' ) ? $userseeddetail->measurement : '', ['class' => 'form-control']) !!} 
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>    

                                                   <div class="col-md-12 pt-10 pb-10">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="supplier-1">TRAY SIZE</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                              @if(isset($userseeddetail->userseedName[0]->tray_size))
                                                                    {!! Form::select('tray_size',['10 X 20'=>'10 X 20','5 X 5'=>'5 X 5','18 X 26'=>'18 X 26'] ,(isset($userseeddetail->userseedName[0]->tray_size) && $userseeddetail->userseedName[0]->tray_size != '' ) ? $userseeddetail->userseedName[0]->tray_size : '', ['class' => 'form-control']) !!} 
                                                             @else
                                                                   {!! Form::select('tray_size',['10 X 20'=>'10 X 20','5 X 5'=>'5 X 5','18 X 26'=>'18 X 26'] ,(isset($userseeddetail->tray_size) && $userseeddetail->tray_size != '' ) ? $userseeddetail->tray_size : '', ['class' => 'form-control']) !!} 
                                                             @endif 
                                                              
                                                            </div>    
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 pt-10 pb-10">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="supplier-1">SOAK</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="select" name="soak_status">
                                                                   
                                                                    @if($userseeddetail->soak_status=='1')
                                                                    <option value="1" selected>YES = 24 hr Max </option>
                                                                    <option value="2">NO</option>
                                                                    @else
                                                                    <option value="1">YES = 24 hr Max </option>
                                                                    <option value="2" selected>NO</option>
                                                                    @endif
                                                                </select>
                                                            </div>    
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 pt-10 pb-10">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="supplier-1">GERMINATION DAYS</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                {!! Form::select('germination',$days,(isset($userseeddetail->germinationDays[0]->id) && $userseeddetail->germinationDays[0]->id != '' ) ? $userseeddetail->germinationDays[0]->id : '', ['class' => 'form-control']) !!}
                                                            </div>    
                                                            <div class="col-md-6">
                                                                {!! Form::select('situation',['IN DARKNESS'=>'IN DARKNESS ','IN LIGHT'=>'IN LIGHT','PLANT ON TOP (SOIL)'=>'PLANT ON TOP (SOIL)','COVER WITH SOIL (SOIL)'=>'COVER WITH SOIL (SOIL)'] ,(isset($userseeddetail->situation) && $userseeddetail->situation != '' ) ? $userseeddetail->situation : '', ['class' => 'form-control']) !!} 
                                                            </div>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-12 pt-10 pb-10">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="supplier-1">BEST MEDIUM</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                {!! Form::select('medium',['MAT'=>'MAT','SOIL'=>'SOIL'] ,(isset($userseeddetail->medium) && $userseeddetail->medium != '' ) ? $userseeddetail->medium : '', ['class' => 'form-control']) !!} 
                                                            </div>    
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 pt-10 pb-10">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="supplier-1">DAYS TO MATURITY</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                            
                                                                  {!! Form::select('maturity',$days,(isset($userseeddetail->maturityDays[0]->id) && $userseeddetail->maturityDays[0]->id != '' ) ? $userseeddetail->maturityDays[0]->id : '', ['class' => 'form-control']) !!}
                                                            </div>    
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 pt-10 pb-10">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="supplier-1">YIELD</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                   {!! Form::text('yield',(isset($userseeddetail->yield) && $userseeddetail->yield !='' ) ? $userseeddetail->yield : '', ['class' => 'form-control']) !!}
                                                            </div>    
                                                            <div class="col-md-6">
                                                                 {!! Form::select('seeds_measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML'] ,(isset($userseeddetail->seeds_measurement) && $userseeddetail->seeds_measurement != '' ) ? $userseeddetail->seeds_measurement : '', ['class' => 'form-control']) !!} 
                                                            </div>
                                                        </div>
                                                    </div> 

                                                    <div class="col-md-12 pt-10 pb-10">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="supplier-1">GROW NOTES</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                {!! Form::textarea('notes', '' , ['class' => 'form-control','size' => '30x5','placeholder'=>'Add notes']) !!}
                                                            </div>
                                                              
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-12 pt-10 pb-10">
                                                        <button type="submit" class="btn btn-3 pull-left"><div class="ladda-progress">Edit</div></button>
                                                       
                                                    </div>
                                                    
                                                    @if($notes != null)
                                                    @foreach($notes as $note)
                                                    <div class="col-md-12">
                                                            <div class="comment">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p class="p-small"><small>{{ $note->created_at }} </small></p>
                                                                    </div>
                                                                </div>	
                                                                <div class="border-div">
                                                                <p> {{ ((isset($note->notes) && $note->notes != '' ) ? $note->notes : '') }}</p>
                                                            </div>
                                                        </div>	
                                                    </div>
                                                    @endforeach
                                                    @endif

                                                </form>
                                            </div>

										</div>	
										      	
										
									</div><!-- end - tab - pane -->
								</div>	
							</div>

                            
                            <div class="col-md-12">
								<div class="panel-1">
									
									<div class="panel-body">
										<div class="tabbable">
											<!--<ul class="nav nav-tabs nav-tabs-solid nav-justified">
												<li class="dropdown active">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">SUPPLIER <span class="caret"></span></a>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="#solid-justified-tab1-1" data-toggle="tab">TRUE LEAF</a></li>
														<li><a href="#solid-justified-tab1-2" data-toggle="tab">JOHNNY SEEDS</a></li>
														<li><a href="#solid-justified-tab1-3" data-toggle="tab">TODD'S SEED</a></li>
													</ul>
												</li>
												<li><a href="#solid-justified-tab2" data-toggle="tab" aria-expanded="true">INVENTORY</a></li>
												<li><a href="#solid-justified-tab3" data-toggle="tab" aria-expanded="false">PRODUCTION</a></li>
												<li><a href="#solid-justified-tab4" data-toggle="tab" aria-expanded="false">SALES</a></li>
												<li><a href="#solid-justified-tab5" data-toggle="tab" aria-expanded="false">GROUP BUYS</a></li>
												<li><a href="#solid-justified-tab6" data-toggle="tab" aria-expanded="false">LEARNING CENTER</a></li>
											</ul>-->

											
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-3">
								
								
								
								
                            </div>

							<!--<div class="col-md-3">
								<form action="#">
									<div class="form-group">
										<label for="name">Name *</label>
										<input type="text" class="form-control" id="name">
									</div>
									
									<div class="form-group">
										<label for="email">Email *</label>
										<input type="email" class="form-control" id="email">
									</div>
									
									<div class="form-group">
										<label for="phone">Phone *</label>
										<input type="text" class="form-control" id="phone">
									</div>

									
									<div class="text-right">
										<button type="submit" class="btn btn-1 pull-left"><div class	="ladda-progress">Update</div></button>
									</div>
								</form>
							</div>-->
						</div>
					</div>
@endsection


@push('js')
<script>
    </script>
@endpush


