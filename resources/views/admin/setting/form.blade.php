<div class="row">
    <div class="col-sm-12 floatLeft">
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                {!! Form::label('email', 'Email *', ['class' => 'col-sm-4 control-label required']) !!}
                <div class="col-sm-6">
                    {!! Form::email('email', null, ['class' => 'form-control']) !!} {!! $errors->first('email', '
                    <p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div> 
    </div>
    <div class="col-sm-12 floatLeft">
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('twitter') ? ' has-error' : ''}}">
                {!! Form::label('twitter', 'Twitter Url', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-6">
                       {!! Form::text('twitter', null, ['class' => 'form-control']) !!} 
                        {!! $errors->first('twitter', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div> 
    </div>
    <div class="col-sm-12 floatLeft">
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('facebook') ? ' has-error' : ''}}">
                {!! Form::label('facebook', 'Facebook Url ', ['class' => 'col-sm-4 control-label required']) !!}
                <div class="col-sm-6">
                    {!! Form::text('facebook', null, ['class' => 'form-control']) !!} 
                    {!! $errors->first('facebook', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div> 
    </div>

    <div class="col-sm-12 floatLeft">
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('youtube') ? ' has-error' : ''}}">
                {!! Form::label('youtube', 'Youtube Url ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('youtube', null, ['class' => 'form-control']) !!} 
                    {!! $errors->first('youtube', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div> 
    </div>

     <div class="col-sm-12 floatLeft">
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('googleplus') ? ' has-error' : ''}}">
                {!! Form::label('googleplus', 'GooglePlus Url ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('googleplus', null, ['class' => 'form-control']) !!} 
                    {!! $errors->first('googleplus', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div> 
    </div>

    <div class="col-sm-12 floatLeft">
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('address') ? ' has-error' : ''}}">
                {!! Form::label('address', 'Address ', ['class' => 'col-sm-4 control-label required']) !!}
                <div class="col-sm-6">
                    {!! Form::text('address', null, ['class' => 'form-control']) !!} 
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div> 
    </div>
    <div class="col-sm-12 floatLeft">
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('contactno') ? ' has-error' : ''}}">
                {!! Form::label('contactno', 'Contact No ', ['class' => 'col-sm-4 control-label required']) !!}
                <div class="col-sm-6">
                    {!! Form::text('contactno', null, ['class' => 'form-control']) !!} 
                    {!! $errors->first('contactno', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div> 
    </div>
    <div class="col-sm-12 floatLeft">
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('contactno1') ? ' has-error' : ''}}">
                {!! Form::label('contactno1', 'Tel No', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('contactno1', null, ['class' => 'form-control']) !!} 
                    {!! $errors->first('contactno1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div> 
    </div>
    <div class="col-sm-12 floatLeft">
        <div class="col-sm-6">  
            <div class="form-group">
                <div class="col-sm-offset-8 col-sm-4">
                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div> 
</div>                   