@extends('layouts.application')

@section('layout-content')
<!-- Layout wrapper -->
<div class="layout-wrapper layout-2">
    <div class="layout-inner">

        <!-- Layout sidenav -->
        @include('layouts.includes.layout-sidenav')

        <!-- Layout container -->
        <div class="layout-container">
            <!-- Layout navbar -->
            @include('layouts.includes.layout-navbar')

            <!-- Layout content -->
            <div class="layout-content">

                <!-- Content -->
                <div class="container-fluid flex-grow-1 container-p-y">
                    @include('flash-messages.flash-message')
                    @yield('content')
                </div>
                <!-- / Content -->

                {{--@include('layouts.includes.layout-footer')--}}

            </div> <!-- Layout footer -->
            <!-- Layout content -->

        </div>
        <!-- / Layout container -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-sidenav-toggle"></div>
</div>
<!-- / Layout wrapper -->
@endsection
