@extends('layouts.backend')


@section('title',trans('seed.add_seed'))



@section('pageTitle')
    <i class="icon-tint"></i>

    <span>@lang('seed.add_new_seed')</span>


    @endsection


@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('seed.add_new_seed')</div>
                    <div class="panel-body">
                        <a href="{{url('/admin/seeds')}}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('seed.back')</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/seeds', 'class' => 'form-horizontal','id'=>'formSeed','enctype'=>'multipart/form-data']) !!}

                        @include ('admin.seeds.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
@endsection