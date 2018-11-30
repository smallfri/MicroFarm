@extends('layouts.backend')


@section('title',trans('profile.my_profile'))

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('profile.my_profile')</div>
                <div class="panel-body">
                    <div class="row">


                        <div class="col-md-6">

                            <a href="{{ route('profile.edit') }}" class="btn btn-info btn-sm"
                               title="Edit Profile">
                                <i class="fa fa-edit" aria-hidden="true"></i> @lang('profile.edit_profile')
                            </a>
                            <a href="{{ route('profile.changepassword') }}" class="btn btn-info btn-sm"
                               title="Change Password">
                                <i class="fa fa-lock" aria-hidden="true"></i> @lang('profile.change_password')
                            </a>
                        </div>

                        <div class="col-md-6">
                        </div>
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-borderless">

                            <tr>
                                <td >@lang('profile.name')</td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>@lang('profile.email')</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>@lang('profile.joined')</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                            </tr>


                        </table>
                    </div>


                    @if($user->people)
                        <h2>Person details</h2>
                        <div class="table-responsive">
                            <table class="table table-borderless">

                                <tr>
                                    <td class="col-md-2">First Name</td>
                                    <td>{{$user->people->first_name}}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-2">Last Name</td>
                                    <td>{{$user->people->last_name}}</td>
                                </tr>

                                <tr>
                                    <td>Phone number 1</td>
                                    <td>{{$user->people->phone_number_1}}</td>
                                </tr>

                                <tr>
                                    <td>Phone type 1</td>
                                    <td>{{$user->people->phone_type_1}}</td>
                                </tr>


                                <tr>
                                    <td>Phone number 2</td>
                                    <td>{{$user->people->phone_number_2 or null}}</td>
                                </tr>

                                <tr>
                                    <td>Phone type 2</td>
                                    <td>{{$user->people->phone_type_2 or null}}</td>
                                </tr>


                                <tr>
                                    <td>photo</td>
                                    <td>
                                        @if($user->photo)
                                            <img src="{!! asset('uploads/'.$user->photo) !!}" alt="" width="150">
                                        @endif
                                    </td>
                                </tr>


                            </table>
                        </div>

                    @endif

                    {{--<pre>--}}
                    {{--{!! json_encode(Auth::user(),JSON_PRETTY_PRINT) !!}--}}
                    {{--</pre>--}}

                </div>
            </div>
        </div>
    </div>
@endsection