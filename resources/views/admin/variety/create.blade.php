@extends('layouts.backend')


@section('title',trans('variety.add_variety'))



@section('pageTitle')
    <i class="icon-tint"></i>

    <span>@lang('variety.add_new_variety')</span>


    @endsection


@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('variety.add_new_variety')</div>
                    <div class="panel-body">
                        <a href="{{url('admin/variety')}}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('user.back')</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/variety', 'class' => 'form-horizontal','id'=>'formVariety','enctype'=>'multipart/form-data']) !!}

                        @include ('admin.variety.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
@endsection

@push('script-head')
<script !src="">
   
</script>
@endpush