@extends('layouts.user-backend')

@section('title','Seed List')
@section('content')
    <!-- Main content -->

    <div class="row">


        {!! Form::open(['url' => '/seed/create', 'class' => 'form-horizontal','id'=>'formSeed','enctype'=>'multipart/form-data']) !!}

        @include ('user-backend.seed.form')

        {!! Form::close() !!}
    </div>
@endsection


@push('js')
<script>
</script>
@endpush


