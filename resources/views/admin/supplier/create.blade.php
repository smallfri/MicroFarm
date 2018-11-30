@extends('layouts.backend')


@section('title',trans('supplier.add_supplier'))



@section('pageTitle')
    <i class="icon-tint"></i>

    <span>@lang('supplier.add_new_supplier')</span>


    @endsection


@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('supplier.add_new_supplier')</div>
                    <div class="panel-body">
                        <a href="{{url('admin/supplier')}}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>@lang('user.back')</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/supplier', 'class' => 'form-horizontal','id'=>'formSupplier','enctype'=>'multipart/form-data']) !!}

                        @include ('admin.supplier.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
@endsection

@push('script-head')
<script !src="">
    jQuery('#role').on('change', function () {

        var role = jQuery(this).val();
        if (role) {
            jQuery.ajax({
                type: "GET",
                url: "{{ url('/admin/users/create/') }}?role=" + role,
                success: function (res) {
                    if (res) {
                        
                        //console.log(role);
                        $("#role_related").prop('disabled', false);
                        jQuery("#role_related").empty();
                        jQuery.each(res, function (key, value) {


                            jQuery("#role_related").append('<option value="' + key + '">' + value + '</option>');
                        });

                    } else {
                        jQuery("#role_related").empty();
                    }
                }
            });
        } else {
            jQuery("#role_related").empty();
        }

    });
</script>
@endpush