@extends('layouts.backend')

@section('title',trans('variety.edit_variety'))
@section('pageTitle',trans('variety.edit_variety'))


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('variety.edit_variety')</div>
                <div class="panel-body">
                    <a href="{{url('/admin/variety')}}" title="Back">
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

                    {!! Form::model($variety, [
                        'method' => 'PATCH',
                        'url' => ['/admin/variety', $variety->id],
                        'class' => 'form-horizontal',
                        'id'=>'formVariety',
                        'enctype'=>'multipart/form-data'
                    ]) !!}


                    @include ('admin.variety.form', ['submitButtonText' => trans('variety.update')])

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