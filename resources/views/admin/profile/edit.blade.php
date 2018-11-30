@extends('layouts.backend')

@section('title',__('Update Profile'))

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('Update Profile')}}</div>
                <div class="panel-body">

                    <a href="{{ URL::previous() }}" title="Back">
                        <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            @lang('profile.back')
                        </button>

                    </a>

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::model($user,[
                        'method' => 'PATCH',
                        'class' => 'form-horizontal',
                        'files'=>true
                    ]) !!}


                    <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                        {!! Form::label('name', trans('profile.name'), ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                        {!! Form::label('email', trans('profile.email'), ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {{--<p style="border: 1px solid #d0d0d0; padding: 5px">{{$user->email}}</p>--}}
                            {!! Form::email('email', isset($user->email)?$user->email:old('email'), ['class' => 'form-control', 'required' => 'required','disabled'=>true]) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>





                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('profile.update_profile'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
@endsection