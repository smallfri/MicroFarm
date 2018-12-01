@extends('layouts.user-backend')

@section('title','Seed List')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    @foreach($userseedlist as $key => $value)
                        <li role="presentation" class="{{ $key == 0 ? 'active' : '' }}">
                            <a href="#li-{{$value->variety_id}}" aria-controls="messages"
                               role="tab" data-toggle="tab" aria-expanded="false">
                                <span class="visible-xs"><i class="ti-email"></i></span>
                                <span class="hidden-xs">{{$value->seed_name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <!-- Tab panes -->

                    <div class="tab-content">
                        @foreach($userseedlist as $key => $value)
                            <div role="tabpanel" class="tab-pane {{ $key == 0 ? 'active' : '' }}"
                                 id="li-{{$value->variety_id}}">
                                <form action="#" method="post" name="{{$value->variety_id}}">
                                    <input type="hidden" value="{{$value->variety_id}}" name="variety_id" id="xyz">
                                    {{csrf_field()}}
                                <div class="col-md-6">
                                    <label for="supplier-1">SEED NAME</label>
                                    @if(isset($value->seed_name))
                                        {!! Form::text('seed_name', $value->seed_name, ['class' => 'form-control','readonly'=>'readonly']) !!}

                                    @else
                                        {!! Form::text('seed_name', $value->seed_name, ['class' => 'form-control','readonly'=>'readonly']) !!}
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="supplier-1">SUPPLIER</label>
                                    {!! Form::select('supplier_id',$suppliers ,[$value->supplier_id], ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-6" style="margin-top:20px;">
                                    <label for="supplier-1">SEED DENSITY</label>
                                    {!! Form::text('density',(isset($value->density) && $value->density !='' ) ? $value->density : '', ['class' => 'form-control']) !!}

                                </div>
                                <div class="col-md-6" style="margin-top:20px;">
                                <label for="supplier-1">MEASUREMENT</label>
                                        {!! Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->measurement) && $value->measurement != '' ) ? $value->measurement : '', ['class' => 'form-control']) !!}
                                </div>

                                <div class="col-md-6" style="margin-top:20px;">
                                    <label for="supplier-1">TRAY SIZE</label>
                                        {!! Form::select('tray_size',['10 X 20'=>'10 X 20','5 X 5'=>'5 X 5','18 X 26'=>'18 X 26'] ,(isset($value->tray_size) && $value->tray_size != '' ) ? $value->tray_size : '', ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-6" style="margin-top:20px;">
                                    <label for="supplier-1">SOAK</label>
                                    <select class="select" name="soak_status">
                                    @if($value->soak_status=='1')
                                        <option value="1" selected>YES = 24 hr Max </option>
                                        <option value="2">NO</option>
                                    @else
                                        <option value="1">YES = 24 hr Max </option>
                                        <option value="2" selected>NO</option>
                                    @endif
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6" style="margin-top:20px;">
                                    <label for="supplier-1">GERMINATION DAYS</label>
                                    //TODO fix this
                                    {!! Form::select('germination',$days,(isset($value->germination) && $value->germination != '' ) ? $value->germination : '', ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-6" style="margin-top:20px;">
                                    <label for="supplier-1">SITUATION</label>
                                    {!! Form::select('situation',['IN DARKNESS'=>'IN DARKNESS ','IN LIGHT'=>'IN LIGHT','PLANT ON TOP (SOIL)'=>'PLANT ON TOP (SOIL)','COVER WITH SOIL (SOIL)'=>'COVER WITH SOIL (SOIL)'] ,(isset($value->situation) && $value->situation != '' ) ? $value->situation : '', ['class' => 'form-control']) !!}
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6" style="margin-top:20px;">
                                    <label for="supplier-1">MEDIUM</label>
                                    {!! Form::select('medium',['MAT'=>'MAT','SOIL'=>'SOIL'] ,(isset($value->medium) && $value->medium != '' ) ? $value->medium : '', ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-6" style="margin-top:20px;">
                                    <label for="supplier-1">DAYS TO MATURITY</label>
                                    {!! Form::select('maturity',$days,(isset($value->maturity) && $value->maturity != '' ) ? $value->maturity: '', ['class' => 'form-control']) !!}
                                </div>

                                <div class="clearfix"></div>
                                <div class="col-md-6" style="margin-top:20px;">
                                    <label for="supplier-1">YIELD</label>
                                    {!! Form::text('yield',(isset($value->yield) && $value->yield !='' ) ? $value->yield : '', ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-6" style="margin-top:20px;">
                                    <label for="supplier-1">MEASUREMENT</label>
                                    {!! Form::select('seeds_measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILO'=>'KILO'] ,(isset($value->seeds_measurement) && $value->seeds_measurement != '' ) ? $value->seeds_measurement : '', ['class' => 'form-control']) !!}
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12" style="margin-top:20px;">
                                    <label for="supplier-1">NOTES</label>
                                    {!! Form::textarea('notes', '' , ['class' => 'form-control','size' => '30x5','placeholder'=>'Add notes']) !!}
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12" style="margin-top:20px;">
                                    <button class="btn btn-block btn-success pull-left">UPDATE</button>
                                </div>
                                @if($notes != null)
                                    @foreach($notes as $note)
                                        @if($note->seed_id == $value->variety_id)
                                            <label for="supplier-1">NOTES</label>
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
                                <div class="clearfix"></div>
                            </div>

                        @endforeach
                    </div>

            </div>
        </div>
    </div>





@endsection