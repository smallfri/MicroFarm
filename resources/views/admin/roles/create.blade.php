@extends('layouts.backend')


@section('title','Create Role')


@section('content')
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Role</div>
                    <div class="panel-body">
                        <a href="{{ URL::previous() }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <a href="javascript:document.getElementById('module_form').submit();" title="Update" class="navbar-right btn btn-primary"> Create</a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/roles', 'class' => 'form-horizontal','id' => 'module_form','enctype' => 'multipart/data','files'=>'true']) !!}

                        @include ('admin.roles.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
    </div>
@endsection