@extends('layouts.user-backend')

@section('title','Seed List')
@section('content')
    <!-- Main content -->
    <div class="white-box">
        <h3 class="box-title">Growing Journal</h3>
        <div class="vtabs">
            <ul class="nav tabs-vertical">
                @foreach($userseedlist as $key => $value)
                    <li class="tab {{ $key == 0 ? 'active' : '' }}">
                        <a data-toggle="tab" href="#li_{{$value->id}}" aria-expanded="true"> <span class="visible-xs"><i
                                        class="icon-direction"></i></span> <span class="hidden-xs">{{$value->seed_name}}</span>
                        </a>
                    </li>
                @endforeach

            </ul>
            <div class="tab-content" style="border-left:1px solid #2acb69;padding-top:0px;">
                @foreach($userseedlist as $key => $value)
                    <div id="li_{{$value->id}}" class="tab-pane {{ $key == 0 ? 'active' : '' }}">
                        <div class="col-md-6 white-box">
                            <form action="#" method="post" name="{{$value->variety_id}}">
                                <input type="hidden" value="{{$value->supplier_id}}" name="xyz" id="xyz">
                                {{csrf_field()}}
                                <div class="col-md-12 pt-10 pb-10">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="seed-name" class="label-1">SEED NAME</label>
                                        </div>
                                        <div class="col-md-12">
                                            @if(isset($value->seed_name))
                                                {!! Form::text('seed_name', $value->seed_name, ['class' => 'form-control','readonly'=>'readonly']) !!}
                                                <input type="hidden" name="variety_id"
                                                       value="{{$value->variety_id}}">
                                            @else
                                                {!! Form::text('seed_name', $value->seed_name, ['class' => 'form-control','readonly'=>'readonly']) !!}

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
                                            {!! Form::select('supplier_id',$suppliers ,[$value->supplier_id], ['class' => 'form-control']) !!}

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 pt-10 pb-10">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="supplier-1">SEED DENSITY</label>
                                        </div>
                                        <div class="col-md-6">
                                            @if(isset($value->density))
                                                {!! Form::text('density', $value->density, ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::text('density', $value->density, ['class' => 'form-control']) !!}
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            @if(isset($value->measurement))
                                                {!! Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->measurement) && $value->measurement != '' ) ? $value->measurement : '', ['class' => 'form-control']) !!}
                                            @else
                                                {!! Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->measurement) && $value->measurement != '' ) ? $value->measurement : '', ['class' => 'form-control']) !!}
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
                                                              @if(isset($userseeddetail->tray_size))
                                                                    {!! Form::select('tray_size',['10 X 20'=>'10 X 20','5 X 5'=>'5 X 5','18 X 26'=>'18 X 26'] ,(isset($userseeddetail->tray_size) && $userseeddetail->tray_size != '' ) ? $userseeddetail->tray_size : '', ['class' => 'form-control']) !!}
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
                                                    @if($note->seed_id == $userseedlist[0]->variety_id)
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
                                                    @endif
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


