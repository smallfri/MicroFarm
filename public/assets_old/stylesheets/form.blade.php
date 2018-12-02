
<div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
    {!! Form::label('title', trans('goal.title'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
    {!! Form::label('details', trans('goal.details'), ['class' => 'col-md-4 control-label']) !!}
     <div class="col-md-6">
    {!! Form::textarea('details', null, ['class' => 'form-control','size' => '30x5']) !!}
    {!! $errors->first('details', '<p class="help-block with-errors">:message</p>') !!}
    </div>
</div>
<!--<div class="form-group{{ $errors->has('start_date') ? ' has-error' : ''}}">
    {!! Form::label('start_date', trans('goal.start_date'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('start_date', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD','required' => 'required','id' => 'start_date']) !!}
        {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('due_date') ? ' has-error' : ''}}">
    {!! Form::label('due_date', trans('goal.due_date'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('due_date', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD','required' => 'required','id' => 'due_date']) !!}
        {!! $errors->first('due_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>-->
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('goal.create'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@push('script-head')

<script type="text/javascript">
 
    $('#start_date').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#due_date').datetimepicker({
        format: 'YYYY-MM-DD',
    });
   
</script>
@endpush

