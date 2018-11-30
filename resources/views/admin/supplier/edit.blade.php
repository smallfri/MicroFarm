@extends('layouts.backend')

@section('title',trans('supplier.edit_supplier'))
@section('pageTitle',trans('supplier.edit_supplier'))


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('supplier.edit_supplier')</div>
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

                    {!! Form::model($supplier, [
                        'method' => 'PATCH',
                        'url' => ['/admin/supplier', $supplier->id],
                        'class' => 'form-horizontal',
                        'id'=>'formSupplier',
                        'enctype'=>'multipart/form-data'
                    ]) !!}


                    @include ('admin.supplier.form', ['submitButtonText' => trans('supplier.update')])

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