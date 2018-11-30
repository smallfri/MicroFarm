@extends('layouts.backend')

@section('title','Edit Setting')
@section('pageTitle','Edit Setting')


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Edit Setting </div>
                <div class="panel-body">
                    <a href="{{ URL::previous() }}" title="Back">
                        <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </button>
                    </a>
                    <br/>
                    <br/>

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::model($setting, [
                        'method' => 'PATCH',
                        'url' => ['/admin/setting', $setting->id],
                        'class' => 'form-horizontal',
                        'id'=>'formSetting',
                        'enctype'=>'multipart/form-data'
                    ]) !!}


                    @include ('admin.setting.form', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
