@extends('layouts.layout-2')
<script type="application/javascript">
    $(document).ready(function() {
        $('#summary-table').DataTable();
    } );
</script>
@section('content')
    <!-- begin page-header -->
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Home /</span> Seed Selection
    </h4>

    <hr class="border-light container-m--x mt-0 mb-5">
    <!-- Main content -->
    {!! Form::open(['url' => '/seed/create', 'class' => 'form-horizontal','id'=>'formSeed','enctype'=>'multipart/form-data']) !!}

    @include ('layouts.seed.form')

    {!! Form::close() !!}
@endsection
