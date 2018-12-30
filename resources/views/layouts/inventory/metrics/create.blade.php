@extends('layouts.layout-2')

@section('content')
    <!-- begin page-header -->
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Home /</span> Create Inventory Metric
    </h4>

    <hr class="border-light container-m--x mt-0 mb-5">
    <!-- Main content -->
    {!! Form::open(['url' => '/metrics/create', 'class' => 'form-horizontal','id'=>'inventory-create','enctype'=>'multipart/form-data']) !!}

    @include ('layouts.inventory.metrics.form')

    {!! Form::close() !!}


    @include ('layouts.inventory.metrics.table')
@endsection
