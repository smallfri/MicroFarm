@extends('layouts.user-backend')

@section('title','Seeds')
@section('content')
    <!-- Main content -->
        {!! Form::open(['url' => '/seed/create', 'class' => 'form-horizontal','id'=>'formSeed','enctype'=>'multipart/form-data']) !!}

        @include ('user-backend.seed.form')

        {!! Form::close() !!}
@endsection


@push('js')
<script>
</script>
@endpush


