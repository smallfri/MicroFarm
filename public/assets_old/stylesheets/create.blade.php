@extends('layouts.backend')


@section('title',trans('goal.add_goal'))



@section('pageTitle')
    <i class="icon-tint"></i>

    <span>@lang('goal.add_new_goal')</span>


    @endsection


@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('goal.add_new_goal')</div>
                    <div class="panel-body">
                        <a href="{{ URL::previous() }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('goal.back')</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/goals', 'class' => 'form-horizontal','id'=>'formGoal','enctype'=>'multipart/form-data']) !!}

                        @include ('admin.goals.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
@endsection

