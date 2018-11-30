@extends('layouts.backend')

@section('title',trans('supplier.view_supplier'))


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('supplier.supplier')</div>
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
                                <td>@lang('supplier.id')</td>
                                <td>{{ $supplier->id }}</td>
                            </tr>
                            <tr>
                                <td>@lang('supplier.name')</td>
                                <td>{{ $supplier->name }}</td>
                            </tr>                      
                           
                                                     
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection