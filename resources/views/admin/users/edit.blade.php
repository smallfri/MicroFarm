@extends('layouts.backend')

@section('title',trans('user.edit_user'))
@section('pageTitle',trans('user.edit_user'))


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('user.edit_user')</div>
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

                    {!! Form::model($user, [
                        'method' => 'PATCH',
                        'url' => ['/admin/users', $user->id],
                        'class' => 'form-horizontal',
                        'id'=>'formUser',
                        'enctype'=>'multipart/form-data'
                    ]) !!}


                    @include ('admin.users.form', ['submitButtonText' => trans('user.update')])

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
                url: "{{ url('/admin/users/') }}/{{$user->id}}/{{'edit'}}?role=" + role,
                success: function (res) {
                    if (res) {
                        
                        console.log(res);
                        $("#related").prop('disabled', false);
                        jQuery("#related").empty();
                        jQuery.each(res, function (key, value) {


                            jQuery("#related").append('<option value="' + key + '">' + value + '</option>');
                        });

                    } else {
                        jQuery("#related").empty();
                    }
                }
            });
        } else {
            jQuery("#related").empty();
        }

    });
</script>
@endpush