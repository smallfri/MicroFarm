
<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', trans('seed.type'), ['class' => 'col-md-4 control-label required']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="form-group {{ $errors->has('variety') ? 'has-error' : ''}}">
     {!! Form::label('variety', trans('seed.variety'), ['class' => 'col-sm-4 control-label required']) !!}
        <div class="col-sm-6">
         @if(Route::currentRouteName() == 'seeds.edit')
                <select id="variety" class="form-control" name="variety[]" multiple>
                    @foreach($variety as $varieties)
                    
                        <option value="{{$varieties->id}}"   @foreach($seedvariety as $seedvarieties) @if($varieties->id == $seedvarieties->variety_id)selected="selected"@endif @endforeach>{{$varieties->name}}</option>
                    @endforeach
                </select>
           @else
            <select id="variety" class="form-control" name="variety[]" multiple>
                <option disabled>Select Variety</option>
                @foreach($variety as $varieties)                      
                    <option value="{{$varieties->id}}">{{$varieties->name}}</option>
                @endforeach
            </select>
                
        @endif
        {!! $errors->first('variety','<p class="help-block with-errors">:message</p>') !!}
        </div>
</div> --}}
<div class="form-group{{ $errors->has('supplier_id') ? ' has-error' : ''}}">
   {!! Form::label('supplier_id', trans('seed.supplier_id'), ['class' => 'col-md-4 control-label required']) !!}
    <div class="col-md-6">     
    
         {!! Form::select('supplier_id',$supplier, (isset($seedsupplier->supplier_id) && $seedsupplier->supplier_id != '' ) ? $seedsupplier->supplier_id : '', ['class' => 'form-control']) !!}
          {!! $errors->first('supplier_id', '<p class="help-block with-errors">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('density') ? ' has-error' : ''}}">
    {!! Form::label('density', trans('seed.amount'), ['class' => 'col-md-4 control-label required']) !!}
    <div class="col-md-6">
        {!! Form::text('density', null, ['class' => 'form-control']) !!}
        {!! $errors->first('density', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('measurement') ? 'has-error' : ''}}">
     {!! Form::label('measurement', trans('seed.measurement'), ['class' => 'col-sm-4 control-label required']) !!}
        <div class="col-sm-6">
                {!! Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML'] ,null, ['class' => 'form-control']) !!} 
                {!! $errors->first('measurement','<p class="help-block with-errors">:message</p>') !!}
        </div>
</div>
<div class="form-group {{ $errors->has('tray_size') ? 'has-error' : ''}}">
     {!! Form::label('tray_size', trans('seed.tray_size'), ['class' => 'col-sm-4 control-label required']) !!}
        <div class="col-sm-6">
                {!! Form::select('tray_size',['10 X 20'=>'10 X 20','5 X 5'=>'5 X 5','18 X 26'=>'18 X 26'] ,null, ['class' => 'form-control']) !!} 
                {!! $errors->first('tray_size','<p class="help-block with-errors">:message</p>') !!}
        </div>
</div>
<div class="form-group {{ $errors->has('soak_status') ? 'has-error' : ''}}">
     {!! Form::label('soak_status', trans('seed.soak_status'), ['class' => 'col-sm-4 control-label required']) !!}
        <div class="col-sm-6">
                {!! Form::select('soak_status',[''=>'Select Soak Status','1'=>'YES','2'=>'No'] ,(isset($seedsdetail->soak_status) && $seedsdetail->soak_status != '' ) ? $seedsdetail->soak_status : '', ['class' => 'form-control']) !!} 
                {!! $errors->first('soak_status','<p class="help-block with-errors">:message</p>') !!}
        </div>
</div>
<div class="form-group{{ $errors->has('germination') ? ' has-error' : ''}}">
   {!! Form::label('germination', trans('seed.germination'), ['class' => 'col-md-4 control-label required']) !!}
    <div class="col-md-6">       
         {!! Form::select('germination',$days, (isset($seedsdetail->germination) && $seedsdetail->soak_status != '' ) ? $seedsdetail->germination : '', ['class' => 'form-control']) !!}
          {!! $errors->first('germination', '<p class="help-block with-errors">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('situation') ? 'has-error' : ''}}">
     {!! Form::label('situation', trans('seed.situation'), ['class' => 'col-sm-4 control-label required']) !!}
        <div class="col-sm-6">
                {!! Form::select('situation',[''=>'Select Situation','IN DARKNESS'=>'IN DARKNESS ','IN LIGHT'=>'IN LIGHT','PLANT ON TOP (SOIL)'=>'PLANT ON TOP (SOIL)','COVER WITH SOIL (SOIL)'=>'COVER WITH SOIL (SOIL)'] ,(isset($seedsdetail->situation) && $seedsdetail->situation != '' ) ? $seedsdetail->situation : '', ['class' => 'form-control']) !!} 
                {!! $errors->first('situation','<p class="help-block with-errors">:message</p>') !!}
        </div>
</div>
<div class="form-group {{ $errors->has('medium') ? 'has-error' : ''}}">
     {!! Form::label('medium', trans('seed.medium'), ['class' => 'col-sm-4 control-label required']) !!}
        <div class="col-sm-6">
                {!! Form::select('medium',[''=>'Select Medium','MAT'=>'MAT','SOIL'=>'SOIL'] ,(isset($seedsdetail->medium) && $seedsdetail->medium != '' ) ? $seedsdetail->medium : '', ['class' => 'form-control']) !!} 
                {!! $errors->first('medium','<p class="help-block with-errors">:message</p>') !!}
        </div>
</div>
<div class="form-group{{ $errors->has('maturity') ? ' has-error' : ''}}">
    {!! Form::label('maturity', trans('seed.maturity'), ['class' => 'col-md-4 control-label required']) !!}
    <div class="col-md-6">
        {!! Form::select('maturity',$days, (isset($seedsdetail->maturity) && $seedsdetail->soak_status != '' ) ? $seedsdetail->maturity : '', ['class' => 'form-control']) !!}
        {!! $errors->first('maturity', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('yield') ? ' has-error' : ''}}">
    {!! Form::label('yield', trans('seed.yield'), ['class' => 'col-md-4 control-label required']) !!}
    <div class="col-md-6">
        {!! Form::text('yield',(isset($seedsdetail->yield) && $seedsdetail->yield !='' ) ? $seedsdetail->yield : '', ['class' => 'form-control']) !!}
        {!! $errors->first('yield', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if(!(Route::currentRouteName() == 'seeds.edit'))
<div class="form-group {{ $errors->has('seeds_measurement') ? 'has-error' : ''}}">
     {!! Form::label('seeds_measurement', trans('seed.seeds_measurement'), ['class' => 'col-sm-4 control-label required']) !!}
        <div class="col-sm-6">
                {!! Form::select('seeds_measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML'] ,null, ['class' => 'form-control']) !!} 
                {!! $errors->first('seeds_measurement', '<p class="help-block">:message</p>') !!}
        </div>
</div>
@else
    <div class="form-group {{ $errors->has('seeds_measurement') ? 'has-error' : ''}}">
     {!! Form::label('seeds_measurement', trans('seed.seeds_measurement'), ['class' => 'col-sm-4 control-label required']) !!}
        <div class="col-sm-6">
                {!! Form::select('seeds_measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML'] ,(isset($seedsdetail->seeds_measurement) && $seedsdetail->soak_status != '' ) ? $seedsdetail->seeds_measurement : '', ['class' => 'form-control']) !!} {!! $errors->first('status','<p class="help-block with-errors">:message</p>') !!}
        </div>
</div>

@endif
<div class="form-group{{ $errors->has('notes') ? ' has-error' : ''}}">
    {!! Form::label('notes', trans('seed.notes'), ['class' => 'col-md-4 control-label required']) !!}
    <div class="col-md-6">
        {!! Form::textarea('notes', (isset($seedsdetail->notes) && $seedsdetail->notes !='' ) ? $seedsdetail->notes : '', ['class' => 'form-control','size' => '30x5']) !!}
        {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('user.create'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>

