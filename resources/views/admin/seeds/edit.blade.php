@extends('layouts.backend')

@section('title',trans('seed.edit_seed'))
@section('pageTitle',trans('seed.edit_seed'))


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('seed.edit_seed')</div>
                <div class="panel-body">
                    <a href="{{ URL::previous() }}" title="Back">
                        <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('user.back')
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

                    {!! Form::model($seeds, [
                        'method' => 'PATCH',
                        'url' => ['/admin/seeds', $seeds->id],
                        'class' => 'form-horizontal',
                        'id'=>'formSeed',
                        'enctype'=>'multipart/form-data'
                    ]) !!}


                    @include ('admin.seeds.form', ['submitButtonText' => trans('seed.update')])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

