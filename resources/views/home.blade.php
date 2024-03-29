@extends('layouts.layout-2')

@section('scripts')

@endsection

@section('content')
    <h4 class="media align-items-center font-weight-bold py-3 mb-4">
        @if (Auth::check())
        <img src="{{ Gravatar::image(Auth::user()->email) }}">
        @endif
        <div class="media-body ml-3">
            Welcome back
            @if (Auth::check())
                , {{ Auth::user()->name }}
            @endif
            <div class="text-muted text-tiny mt-1"><small class="font-weight-normal"><?php echo date_format(now(), 'g:ia \o\n l jS F Y');?></small></div>
        </div>
    </h4>

    {{--<hr class="container-m--x mt-0 mb-4">--}}

    {{--<div class="row">--}}
        {{--<div class="d-flex col-xl-6 align-items-stretch">--}}

            {{--<!-- Stats + Links -->--}}
            {{--<div class="card d-flex w-100 mb-4">--}}
                {{--<div class="row no-gutters row-bordered row-border-light h-100">--}}
                    {{--<div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">--}}

                        {{--<a href="javascript:void(0)" class="card-body media align-items-center text-dark">--}}
                            {{--<i class="lnr lnr-chart-bars display-4 d-block text-primary"></i>--}}
                            {{--<span class="media-body d-block ml-3">--}}
                                {{--<span class="text-big font-weight-bolder">$1,342.11</span><br>--}}
                                {{--<small class="text-muted">Earned this month</small>--}}
                            {{--</span>--}}
                        {{--</a>--}}

                    {{--</div>--}}
                    {{--<div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">--}}

                        {{--<a href="javascript:void(0)" class="card-body media align-items-center text-dark">--}}
                            {{--<i class="lnr lnr-hourglass display-4 d-block text-primary"></i>--}}
                            {{--<span class="media-body d-block ml-3">--}}
                                {{--<span class="text-big"><span class="font-weight-bolder">152</span> Working Hours</span><br>--}}
                                {{--<small class="text-muted">Spent this month</small>--}}
                            {{--</span>--}}
                        {{--</a>--}}

                    {{--</div>--}}
                    {{--<div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">--}}

                        {{--<a href="javascript:void(0)" class="card-body media align-items-center text-dark">--}}
                            {{--<i class="lnr lnr-checkmark-circle display-4 d-block text-primary"></i>--}}
                            {{--<span class="media-body d-block ml-3">--}}
                                {{--<span class="text-big"><span class="font-weight-bolder">54</span> Tasks</span><br>--}}
                                {{--<small class="text-muted">Completed this month</small>--}}
                            {{--</span>--}}
                        {{--</a>--}}

                    {{--</div>--}}
                    {{--<div class="d-flex col-sm-6 col-md-4 col-lg-6 align-items-center">--}}

                        {{--<a href="javascript:void(0)" class="card-body media align-items-center text-dark">--}}
                            {{--<i class="lnr lnr-license display-4 d-block text-primary"></i>--}}
                            {{--<span class="media-body d-block ml-3">--}}
                                {{--<span class="text-big"><span class="font-weight-bolder">6</span> Projects</span><br>--}}
                                {{--<small class="text-muted">Done this month</small>--}}
                            {{--</span>--}}
                        {{--</a>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- / Stats + Links -->--}}

        {{--</div>--}}
        {{--<div class="d-flex col-xl-6 align-items-stretch">--}}

            {{--<!-- Daily progress chart -->--}}
            {{--<div class="card w-100 mb-4">--}}
                {{--<div class="card-body">--}}
                    {{--<button type="button" class="btn btn-sm btn-outline-primary icon-btn float-right"><i class="ion ion-md-sync"></i></button>--}}
                    {{--<div class="text-muted small">Working hours</div>--}}
                    {{--<div class="text-big">Daily Progress</div>--}}
                {{--</div>--}}
                {{--<div class="px-2 mt-4">--}}
                    {{--<div class="w-100" style="height: 120px;">--}}
                        {{--<canvas id="statistics-chart-1"></canvas>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- / Daily progress chart -->--}}

        {{--</div>--}}

        {{--<div class="col-xl-5">--}}

            {{--<!-- Tasks -->--}}
            {{--<div class="card mb-4">--}}
                {{--<h6 class="card-header with-elements">--}}
                    {{--<div class="card-header-title">Tasks</div>--}}
                    {{--<div class="card-header-elements ml-auto">--}}
                        {{--<button type="button" class="btn btn-default btn-xs md-btn-flat">Show more</button>--}}
                    {{--</div>--}}
                {{--</h6>--}}
                {{--<div class="card-body">--}}
                    {{--<p class="text-muted small">Today</p>--}}
                    {{--<div class="custom-controls-stacked">--}}
                        {{--<label class="ui-todo-item custom-control custom-checkbox">--}}
                            {{--<input type="checkbox" class="custom-control-input">--}}
                            {{--<span class="custom-control-label">Buy products</span>--}}
                            {{--<span class="ui-todo-badge badge badge-outline-default font-weight-normal ml-2">58 mins left</span>--}}
                        {{--</label>--}}
                        {{--<label class="ui-todo-item custom-control custom-checkbox">--}}
                            {{--<input type="checkbox" class="custom-control-input">--}}
                            {{--<span class="custom-control-label">Reply to emails</span>--}}
                        {{--</label>--}}
                        {{--<label class="ui-todo-item custom-control custom-checkbox">--}}
                            {{--<input type="checkbox" class="custom-control-input">--}}
                            {{--<span class="custom-control-label">Write blog post</span>--}}
                            {{--<span class="ui-todo-badge badge badge-outline-default font-weight-normal ml-2">20 hours left</span>--}}
                        {{--</label>--}}
                        {{--<label class="ui-todo-item custom-control custom-checkbox">--}}
                            {{--<input type="checkbox" class="custom-control-input" checked>--}}
                            {{--<span class="custom-control-label">Wash my car</span>--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<hr class="m-0">--}}
                {{--<div class="card-body">--}}
                    {{--<p class="text-muted small">Tomorrow</p>--}}
                    {{--<div class="custom-controls-stacked">--}}
                        {{--<label class="ui-todo-item custom-control custom-checkbox">--}}
                            {{--<input type="checkbox" class="custom-control-input">--}}
                            {{--<span class="custom-control-label">Buy antivirus</span>--}}
                        {{--</label>--}}
                        {{--<label class="ui-todo-item custom-control custom-checkbox">--}}
                            {{--<input type="checkbox" class="custom-control-input">--}}
                            {{--<span class="custom-control-label">Jane's Happy Birthday</span>--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="card-footer">--}}
                    {{--<div class="input-group">--}}
                        {{--<input type="text" class="form-control" placeholder="Type your task">--}}
                        {{--<div class="input-group-append">--}}
                            {{--<button type="button" class="btn btn-primary">Add</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- / Tasks -->--}}

        {{--</div>--}}
        {{--<div class="col-xl-7">--}}

            {{--<!-- Stats -->--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6">--}}

                    {{--<div class="card mb-4">--}}
                        {{--<h6 class="card-header with-elements border-0 pr-0 pb-0">--}}
                            {{--<div class="card-header-title">Revenue</div>--}}
                            {{--<div class="card-header-elements ml-auto">--}}
                                {{--<div class="btn-group mr-3">--}}
                                    {{--<button type="button" class="btn btn-sm btn-default icon-btn borderless btn-round md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">--}}
                                        {{--<i class="ion ion-ios-more"></i>--}}
                                    {{--</button>--}}
                                    {{--<div class="dropdown-menu dropdown-menu-right" id="revenue-dropdown-menu">--}}
                                        {{--<a class="dropdown-item" href="javascript:void(0)">Action 1</a>--}}
                                        {{--<a class="dropdown-item" href="javascript:void(0)">Action 2</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</h6>--}}
                        {{--<div class="mt-5">--}}
                            {{--<div style="height:120px;">--}}
                                {{--<canvas id="statistics-chart-2"></canvas>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="card-footer text-center py-3">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col">--}}
                                    {{--<div class="text-muted small">Target</div>--}}
                                    {{--<strong class="text-big">$2,000.00</strong>--}}
                                {{--</div>--}}
                                {{--<div class="col">--}}
                                    {{--<div class="text-muted small">Last month</div>--}}
                                    {{--<strong class="text-big">$2,835.22</strong>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--<div class="col-md-6">--}}

                    {{--<div class="card pt-2 mb-4">--}}
                        {{--<div class="d-flex align-items-center position-relative mt-4" style="height:110px;">--}}
                            {{--<div class="w-100 position-absolute" style="height:110px;top:0;">--}}
                                {{--<canvas id="statistics-chart-3"></canvas>--}}
                            {{--</div>--}}
                            {{--<div class="w-100 text-center text-large">54</div>--}}
                        {{--</div>--}}
                        {{--<div class="text-center pb-2 my-3">--}}
                            {{--Tasks completed--}}
                        {{--</div>--}}
                        {{--<div class="card-footer text-center py-3">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col">--}}
                                    {{--<div class="text-muted small">Target</div>--}}
                                    {{--<strong class="text-big">100</strong>--}}
                                {{--</div>--}}
                                {{--<div class="col">--}}
                                    {{--<div class="text-muted small">Last month</div>--}}
                                    {{--<strong class="text-big">85</strong>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--<div class="col-md-6">--}}

                    {{--<div class="card mb-4">--}}
                        {{--<h6 class="card-header with-elements">--}}
                            {{--<div class="card-header-title">Task to Do</div>--}}
                            {{--<div class="card-header-elements ml-auto">--}}
                                {{--<button type="button" class="btn btn-outline-secondary btn-xs icon-btn borderless">→</button>--}}
                            {{--</div>--}}
                        {{--</h6>--}}
                        {{--<div class="card-body d-flex justify-content-between">--}}
                            {{--<div class="text-large">14</div>--}}
                            {{--<div class="text-right small">--}}
                                {{--10%<br>Last week: 12--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--<div class="col-md-6">--}}

                    {{--<div class="card mb-4">--}}
                        {{--<h6 class="card-header with-elements">--}}
                            {{--<div class="card-header-title">Overdue tasks</div>--}}
                            {{--<div class="card-header-elements ml-auto">--}}
                                {{--<button type="button" class="btn btn-outline-secondary btn-xs icon-btn borderless">→</button>--}}
                            {{--</div>--}}
                        {{--</h6>--}}
                        {{--<div class="card-body d-flex justify-content-between">--}}
                            {{--<div class="text-large">5</div>--}}
                            {{--<div class="text-right small">--}}
                                {{--10%<br>Last week: 12--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- / Stats -->--}}

        {{--</div>--}}
    {{--</div>--}}

    {{--<hr class="container-m--x mt-0 mb-4">--}}

    {{--<h6 class="font-weight-semibold mb-4">Current Progress</h6>--}}

    {{--<!-- Project progress -->--}}

    {{--<div class="card pb-4 mb-2">--}}
        {{--<div class="row no-gutters align-items-center">--}}
            {{--<div class="col-12 col-md-5 px-4 pt-4">--}}
                {{--<a href="javascript:void(0)" class="text-dark font-weight-semibold">Project Title</a><br>--}}
                {{--<small class="text-muted">Create the new product design</small>--}}
            {{--</div>--}}
            {{--<div class="col-4 col-md-2 text-muted small px-4 pt-4">--}}
                {{--<strong>In Progress</strong> <br> 3D modeling--}}
            {{--</div>--}}
            {{--<div class="col-4 col-md-2 text-muted small px-4 pt-4">--}}
                {{--12 Jan 2018 <br> 4:45--}}
            {{--</div>--}}
            {{--<div class="col-4 col-md-3 px-4 pt-4">--}}
                {{--<div class="text-right text-muted small">60%</div>--}}
                {{--<div class="progress" style="height: 6px;">--}}
                    {{--<div class="progress-bar" style="width: 60%;"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="card pb-4 mb-2">--}}
        {{--<div class="row no-gutters align-items-center">--}}
            {{--<div class="col-12 col-md-5 px-4 pt-4">--}}
                {{--<a href="javascript:void(0)" class="text-dark font-weight-semibold">Project Title</a><br>--}}
                {{--<small class="text-muted">Design and development</small>--}}
            {{--</div>--}}
            {{--<div class="col-4 col-md-2 text-muted small px-4 pt-4">--}}
                {{--<strong>In Progress</strong> <br> Coding--}}
            {{--</div>--}}
            {{--<div class="col-4 col-md-2 text-muted small px-4 pt-4">--}}
                {{--19 Jan 2018 <br> 8:44--}}
            {{--</div>--}}
            {{--<div class="col-4 col-md-3 px-4 pt-4">--}}
                {{--<div class="text-right text-muted small">84%</div>--}}
                {{--<div class="progress" style="height: 6px;">--}}
                    {{--<div class="progress-bar" style="width: 84%;"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="card pb-4 mb-2">--}}
        {{--<div class="row no-gutters align-items-center">--}}
            {{--<div class="col-12 col-md-5 px-4 pt-4">--}}
                {{--<a href="javascript:void(0)" class="text-dark font-weight-semibold">Project Title</a><br>--}}
                {{--<small class="text-muted">Create the concept</small>--}}
            {{--</div>--}}
            {{--<div class="col-4 col-md-2 text-muted small px-4 pt-4">--}}
                {{--<strong>Done</strong>--}}
            {{--</div>--}}
            {{--<div class="col-4 col-md-2 text-muted small px-4 pt-4">--}}
                {{--1 Feb 2018--}}
            {{--</div>--}}
            {{--<div class="col-4 col-md-3 px-4 pt-4">--}}
                {{--<div class="text-right text-muted small">100%</div>--}}
                {{--<div class="progress" style="height: 6px;">--}}
                    {{--<div class="progress-bar" style="width: 100%;"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="card pb-4 mb-4">--}}
        {{--<div class="row no-gutters align-items-center">--}}
            {{--<div class="col-12 col-md-5 px-4 pt-4">--}}
                {{--<a href="javascript:void(0)" class="text-dark font-weight-semibold">Project Title</a><br>--}}
                {{--<small class="text-muted">SEO enchantsment</small>--}}
            {{--</div>--}}
            {{--<div class="col-4 col-md-2 text-muted small px-4 pt-4">--}}
                {{--<strong>In Progress</strong> <br> Optimizing markup--}}
            {{--</div>--}}
            {{--<div class="col-4 col-md-2 text-muted small px-4 pt-4">--}}
                {{--12 Jan 2018 <br> 10:21--}}
            {{--</div>--}}
            {{--<div class="col-4 col-md-3 px-4 pt-4">--}}
                {{--<div class="text-right text-muted small">23%</div>--}}
                {{--<div class="progress" style="height: 6px;">--}}
                    {{--<div class="progress-bar" style="width: 23%;"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<!-- / Project progress -->--}}

    {{--<hr class="container-m--x mt-0 mb-4">--}}

    {{--<div class="row">--}}
        {{--<div class="col-md-6">--}}

            {{--<!-- Messages -->--}}
            {{--<div class="card mb-4">--}}
                {{--<h6 class="card-header">Messages</h6>--}}
                {{--<div class="card-body">--}}
                    {{--<div class="media pb-1 mb-3">--}}
                        {{--<img src="/img/avatars/6-small.png" class="d-block ui-w-40 rounded-circle" alt>--}}
                        {{--<div class="media-body ml-3">--}}
                            {{--<div class="mb-1">--}}
                                {{--<strong class="font-weight-semibold">Mae Gibson</strong> &nbsp;--}}
                                {{--<small class="text-muted">58m ago</small>--}}
                            {{--</div>--}}
                            {{--<a href="javascript:void(0)" class="text-dark">Sit meis deleniti eu, pri vidit meliore docendi ut.</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="media pb-1 mb-3">--}}
                        {{--<img src="/img/avatars/4-small.png" class="d-block ui-w-40 rounded-circle" alt>--}}
                        {{--<div class="media-body ml-3">--}}
                            {{--<div class="mb-1">--}}
                                {{--<strong class="font-weight-semibold">Kenneth Frazier</strong> &nbsp;--}}
                                {{--<small class="text-muted">1h ago</small>--}}
                            {{--</div>--}}
                            {{--<a href="javascript:void(0)" class="text-dark">Mea et legere fuisset, ius amet purto luptatum te.</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="media pb-1 mb-3">--}}
                        {{--<img src="/img/avatars/5-small.png" class="d-block ui-w-40 rounded-circle" alt>--}}
                        {{--<div class="media-body ml-3">--}}
                            {{--<div class="mb-1">--}}
                                {{--<strong class="font-weight-semibold">Nelle Maxwell</strong> &nbsp;--}}
                                {{--<small class="text-muted">2h ago</small>--}}
                            {{--</div>--}}
                            {{--<a href="javascript:void(0)" class="text-dark">Sit meis deleniti eu, pri vidit meliore docendi ut.</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="media">--}}
                        {{--<img src="/img/avatars/1-small.png" class="d-block ui-w-40 rounded-circle" alt>--}}
                        {{--<div class="media-body ml-3">--}}
                            {{--<div class="mb-1">--}}
                                {{--<strong class="font-weight-semibold">Mike Greene</strong> &nbsp;--}}
                                {{--<small class="text-muted">1d ago</small>--}}
                            {{--</div>--}}
                            {{--<a href="javascript:void(0)" class="text-dark">Lorem ipsum dolor sit amet, vis erat denique in.</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<a href="javascript:void(0)" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a>--}}
            {{--</div>--}}
            {{--<!-- / Messages -->--}}

        {{--</div>--}}
        {{--<div class="col-md-6">--}}

            {{--<!-- Feed -->--}}
            {{--<div class="card mb-4">--}}
                {{--<h6 class="card-header">Feed</h6>--}}
                {{--<div class="card-body">--}}
                    {{--<div class="media pb-1 mb-3">--}}
                        {{--<div class="ui-feed-icon-container">--}}
                            {{--<span class="ui-icon ui-feed-icon ion ion-ios-thumbs-up bg-success text-white"></span>--}}
                            {{--<img src="/img/avatars/7-small.png" class="ui-w-40 rounded-circle" alt>--}}
                        {{--</div>--}}
                        {{--<div class="media-body align-self-center ml-3">--}}
                            {{--<a href="javascript:void(0)">Alice Hampton</a> liked--}}
                            {{--<a href="javascript:void(0)">Article Name</a>--}}
                            {{--<div class="text-muted small">2 hours ago</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="media pb-1 mb-3">--}}
                        {{--<div class="ui-feed-icon-container">--}}
                            {{--<span class="ui-icon ui-feed-icon ion ion-ios-text bg-secondary text-white"></span>--}}
                            {{--<img src="/img/avatars/8-small.png" class="ui-w-40 rounded-circle" alt>--}}
                        {{--</div>--}}
                        {{--<div class="media-body align-self-center ml-3">--}}
                            {{--<a href="javascript:void(0)">Hallie Lewis</a> commented on--}}
                            {{--<a href="javascript:void(0)">Article Name</a>--}}
                            {{--<div class="my-1">--}}
                                {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.--}}
                            {{--</div>--}}
                            {{--<div class="text-muted small">2 hours ago</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="media pb-1 mb-3">--}}
                        {{--<div class="ui-feed-icon-container">--}}
                            {{--<span class="ui-icon ui-feed-icon ion ion-ios-thumbs-down bg-danger text-white"></span>--}}
                            {{--<img src="/img/avatars/9-small.png" class="ui-w-40 rounded-circle" alt>--}}
                        {{--</div>--}}
                        {{--<div class="media-body align-self-center ml-3">--}}
                            {{--<a href="javascript:void(0)">Amanda Warner</a> disliked--}}
                            {{--<a href="javascript:void(0)">Article Name</a>--}}
                            {{--<div class="text-muted small">2 hours ago</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="media">--}}
                        {{--<div class="ui-feed-icon-container">--}}
                            {{--<span class="ui-icon ui-feed-icon ion ion-md-checkmark bg-primary text-white"></span>--}}
                            {{--<img src="/img/avatars/11-small.png" class="ui-w-40 rounded-circle" alt>--}}
                        {{--</div>--}}
                        {{--<div class="media-body align-self-center ml-3">--}}
                            {{--<a href="javascript:void(0)">Belle Ross</a> followed--}}
                            {{--<a href="javascript:void(0)">Nelle Maxwell</a>--}}
                            {{--<div class="text-muted small">2 hours ago</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<a href="javascript:void(0)" class="card-footer d-block text-center text-dark small font-weight-semibold">SHOW MORE</a>--}}
            {{--</div>--}}
            {{--<!-- / Feed -->--}}

        {{--</div>--}}
    {{--</div>--}}
@endsection