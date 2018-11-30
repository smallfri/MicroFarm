@extends('layouts.backend')

@section('title',trans('user.view_user'))


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('user.user')</div>
                <div class="panel-body">

                    <a href="{{ URL::previous() }}" title="Back">
                        <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('user.back')
                        </button>
                    </a>
                   
                   
                    <br/>
                    <br/>


                    <?php
                    $role = join(' + ', $user->roles()->pluck('label')->toArray());
                    $rolename = join(' + ', $user->roles()->pluck('name')->toArray());
                    ?>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td>@lang('user.id')</td>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('user.name')</td>
                                <td>{{ $user->name }}</td>
                            </tr>                      
                            <tr>
                                <td>@lang('user.email')</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                                                     
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection