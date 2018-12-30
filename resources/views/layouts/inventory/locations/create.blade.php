@extends('layouts.layout-2')

@section('content')
    <!-- begin page-header -->
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Home /</span> Create Location
    </h4>

    <hr class="border-light container-m--x mt-0 mb-5">
    <!-- Main content -->
    {!! Form::open(['url' => '/location/create', 'class' => 'form-horizontal','id'=>'location-create','enctype'=>'multipart/form-data']) !!}

    @include ('layouts.inventory.locations.form')

    {!! Form::close() !!}


    @include ('layouts.inventory.locations.table')
@endsection
