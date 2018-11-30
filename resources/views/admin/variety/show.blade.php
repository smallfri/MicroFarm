@extends('layouts.backend')

@section('title',trans('variety.view_variety'))


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('variety.variety')</div>
                <div class="panel-body">

                    <a href="{{ URL::previous() }}" title="Back">
                        <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('user.back')
                        </button>
                    </a>
                   
                   
                    <br/>
                    <br/>
                   
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td>@lang('variety.id')</td>
                                <td>{{ $variety->id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('variety.name')</td>
                                <td>{{ $variety->name }}</td>
                            </tr>                      
                           
                                                     
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection