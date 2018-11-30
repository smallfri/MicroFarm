
<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', trans('user.name'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


@if(!(Route::currentRouteName() == 'users.edit'))

<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
    {!! Form::label('email',trans('user.email'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
    {!! Form::label('password',trans('user.password'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@else
	<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
        {!! Form::label('email',trans('user.email'), ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::email('email', null, ['class' => 'form-control','readonly']) !!}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('user.create'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>

