@extends('layouts.layout-2')

@section('scripts')
    <!-- Dependencies -->
    <script src="{{ mix('/vendor/libs/chartjs/chartjs.js') }}"></script>
    
    <script src="{{ mix('/js/dashboards_dashboard-4.js') }}"></script>
@endsection

@section('content')
    <!-- Head block -->
    <div class="bg-white container-p-x py-5 container-m--x container-m--y mb-0">

        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="font-weight-light mb-2">Server Statistics</h2>
                <div class="badge badge-success font-weight-bold">RUNNING</div>
            </div>
            <button class="btn btn-lg btn-default">
                <i class="ion ion-md-power text-danger"></i>&nbsp;
                Shut Down
            </button>
        </div>

        <!-- Stats -->
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">

                <div class="border-light ui-bordered p-3 mt-2">
                    <div class="media align-items-center">
                        <div class="media-body small mr-3">
                            <div class="font-weight-semibold mb-3">NETWORK</div>
                            <div class="mb-1">Transfer/mo: 1000GB</div>
                            <div class="mb-1">Incoming: 5.3GB</div>
                            <div>Outgoing: 243.2GB</div>
                        </div>
                        <div class="d-flex align-items-center position-relative" style="height:60px;width: 60px;">
                            <div class="w-100 position-absolute" style="height:60px;top:0;">
                                <canvas id="statistics-chart-1"></canvas>
                            </div>
                            <div class="w-100 text-center font-weight-bold">24%</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">

                <div class="border-light ui-bordered p-3 mt-2">
                    <div class="media align-items-center">
                        <div class="media-body small mr-3">
                            <div class="font-weight-semibold mb-3">STORAGE</div>
                            <div class="mb-1">Total: 500GB</div>
                            <div class="mb-1">Used: 429GB</div>
                            <div>Free: 71GB</div>
                        </div>
                        <div class="d-flex align-items-center position-relative" style="height:60px;width: 60px;">
                            <div class="w-100 position-absolute" style="height:60px;top:0;">
                                <canvas id="statistics-chart-2"></canvas>
                            </div>
                            <div class="w-100 text-center font-weight-bold">86%</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">

                <div class="border-light ui-bordered p-3 mt-2">
                    <div class="media align-items-center">
                        <div class="media-body small mr-3">
                            <div class="font-weight-semibold mb-3">MEMORY</div>
                            <div class="mb-1">Total: 32GB</div>
                            <div class="mb-1">Used: 20.4GB</div>
                            <div>Free: 11.6GB</div>
                        </div>
                        <div class="d-flex align-items-center position-relative" style="height:60px;width: 60px;">
                            <div class="w-100 position-absolute" style="height:60px;top:0;">
                                <canvas id="statistics-chart-3"></canvas>
                            </div>
                            <div class="w-100 text-center font-weight-bold">63%</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- / Stats -->

    </div>
    <!-- / Head block -->

    <hr class="border-light container-m--x mt-0 mb-4">

    <!-- Traffic chart -->
    <div class="card mb-4">
        <h5 class="card-header with-elements border-0 pb-0">
            <span class="card-header-title">Traffic</span>

            <div class="card-header-elements ml-auto">
                <div class="btn-group btn-group-xs btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default borderless md-btn-flat">
                        <input type="radio" name="btn-radio"> Month
                    </label>
                    <label class="btn btn-default borderless md-btn-flat active">
                        <input type="radio" name="btn-radio" checked> 3 Months
                    </label>
                    <label class="btn btn-default borderless md-btn-flat">
                        <input type="radio" name="btn-radio"> 6 Months
                    </label>
                </div>
            </div>
        </h5>
        <div class="mt-5">
            <div style="height:150px;">
                <canvas id="statistics-chart-4"></canvas>
            </div>
        </div>
        <div class="card-footer text-center py-3">
            <div class="row row-bordered row-border-light">
                <div class="col">
                    <div class="text-muted small">Incoming</div>
                    <strong>5.3GB</strong>
                </div>
                <div class="col">
                    <div class="text-muted small">Outgoing</div>
                    <strong>243.2GB</strong>
                </div>
                <div class="col">
                    <div class="text-muted small">Total</div>
                    <strong>248.5GB</strong>
                </div>
            </div>
        </div>
    </div>
    <!-- / Traffic chart -->

    <div class="row">

        <!-- Charts -->
        <div class="col-sm-6 col-xl-3">

            <div class="card bg-success border-0 text-white mb-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xlarge">99.9%</div>
                        <div class="small opacity-75">SERVER UP TIME</div>
                    </div>
                    <i class="ion ion-md-time text-xlarge opacity-25"></i>
                </div>
            </div>

        </div>
        <div class="col-sm-6 col-xl-3">

            <div class="card mb-4">
                <div class="card-body pb-3">
                    <strong class="text-big">2366</strong>
                    <small class="text-muted">VIEWS</small>
                </div>
                <div class="px-2">
                    <div class="w-100" style="height: 35px;">
                        <canvas id="statistics-chart-5"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-6 col-xl-3">

            <div class="card mb-4">
                <div class="card-body d-flex justify-content-between align-items-center" style="height:98px">
                    <div>
                        <div class="text-large">+39%</div>
                        <div class="text-muted text-tiny">VIEWS</div>
                    </div>
                    <div class="w-50" style="height: 35px;">
                        <canvas id="statistics-chart-6"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-6 col-xl-3">

            <div class="card mb-4">
                <div class="card-body d-flex justify-content-between align-items-center" style="height:98px">
                    <div>
                        <div class="text-muted small">View depth</div>
                        <strong class="text-large font-weight-normal">4.23</strong>
                        <sup class="text-success small">+ 12%</sup>
                    </div>
                    <div class="w-50">
                        <div style="height: 35px;">
                            <canvas id="statistics-chart-7"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-6 col-xl-4">

            <div class="card mb-4">
                <h6 class="card-header with-elements border-0 pr-0 pb-0">
                    <div class="card-header-title">Type gadgets</div>
                    <div class="card-header-elements ml-auto">
                        <div class="btn-group mr-3">
                            <button type="button" class="btn btn-sm btn-default icon-btn borderless btn-round md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                                <i class="ion ion-ios-more"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" id="type-gadgets-dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0)">Action 1</a>
                                <a class="dropdown-item" href="javascript:void(0)">Action 2</a>
                            </div>
                        </div>
                    </div>
                </h6>
                <div class="py-4 px-3">
                    <div style="height:120px;">
                        <canvas id="statistics-chart-8"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-6 col-xl-4">

            <div class="card mb-4">
                <h6 class="card-header with-elements border-0 pr-0 pb-0">
                    <div class="card-header-title">New users</div>
                    <div class="card-header-elements ml-auto">
                        <div class="btn-group mr-3">
                            <button type="button" class="btn btn-sm btn-default icon-btn borderless btn-round md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                                <i class="ion ion-ios-more"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" id="new-users-dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0)">Action 1</a>
                                <a class="dropdown-item" href="javascript:void(0)">Action 2</a>
                            </div>
                        </div>
                    </div>
                </h6>
                <div class="pt-4">
                    <div style="height:144px;">
                        <canvas id="statistics-chart-9"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-6 col-xl-4">

            <div class="card mb-4">
                <h6 class="card-header with-elements border-0 pr-0 pb-0">
                    <div class="card-header-title">Age users</div>
                    <div class="card-header-elements ml-auto">
                        <div class="btn-group mr-3">
                            <button type="button" class="btn btn-sm btn-default icon-btn borderless btn-round md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                                <i class="ion ion-ios-more"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" id="age-users-dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0)">Action 1</a>
                                <a class="dropdown-item" href="javascript:void(0)">Action 2</a>
                            </div>
                        </div>
                    </div>
                </h6>
                <div class="py-4 px-3">
                    <div style="height:120px;">
                        <canvas id="statistics-chart-10"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <!-- / Charts -->

        <div class="col-sm-6 col-xl-5">

            <!-- Traffic sources -->
            <div class="card mb-4">
                <h6 class="card-header with-elements">
                    <div class="card-header-title">Traffic sources</div>
                    <div class="card-header-elements ml-auto">
                        <button type="button" class="btn btn-default btn-xs md-btn-flat">More</button>
                    </div>
                </h6>
                <div class="table-responsive">
                    <table class="table card-table m-0">
                        <tbody>
                            <tr>
                                <td class="border-top-0 text-nowrap align-middle">
                                    <a href="http://www.google.com" class="text-dark">www.google.com</a>
                                </td>
                                <td class="w-100 border-top-0 align-middle">
                                    <div class="progress" style="height: 4px;">
                                        <div class="progress-bar" style="width: 29.77%;"></div>
                                    </div>
                                </td>
                                <td class="border-top-0 text-nowrap align-middle">
                                    11,963&nbsp;
                                    <span class="text-muted small">29.77%</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap align-middle">
                                    <a href="http://www.google.de" class="text-dark">www.google.de</a>
                                </td>
                                <td class="align-middle">
                                    <div class="progress" style="height: 4px;">
                                        <div class="progress-bar bg-success" style="width: 28.39%;"></div>
                                    </div>
                                </td>
                                <td class="text-nowrap align-middle">
                                    11,963&nbsp;
                                    <span class="text-muted small">28.39%</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap align-middle">
                                    <a href="http://www.twitter.com" class="text-dark">www.twitter.com</a>
                                </td>
                                <td class="align-middle">
                                    <div class="progress" style="height: 4px;">
                                        <div class="progress-bar bg-info" style="width: 23.65%;"></div>
                                    </div>
                                </td>
                                <td class="text-nowrap align-middle">
                                    9,965&nbsp;
                                    <span class="text-muted small">23.65%</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap align-middle">
                                    <a href="http://www.facebook.com" class="text-dark">www.facebook.com</a>
                                </td>
                                <td class="align-middle">
                                    <div class="progress" style="height: 4px;">
                                        <div class="progress-bar bg-warning" style="width: 10.02%;"></div>
                                    </div>
                                </td>
                                <td class="text-nowrap align-middle">
                                    4,223&nbsp;
                                    <span class="text-muted small">10.02%</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap align-middle">
                                    <a href="http://www.yahoo.com" class="text-dark">www.yahoo.com</a>
                                </td>
                                <td class="align-middle">
                                    <div class="progress" style="height: 4px;">
                                        <div class="progress-bar bg-danger" style="width: 8.15%;"></div>
                                    </div>
                                </td>
                                <td class="text-nowrap align-middle">
                                    3,437&nbsp;
                                    <span class="text-muted small">8.15%</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- / Traffic sources -->

        </div>
        <div class="col-xl-7">

            <!-- Latest events -->
            <div class="card mb-4">
                <h6 class="card-header with-elements">
                    <div class="card-header-title">Latest events</div>
                    <div class="card-header-elements ml-auto">
                        <button type="button" class="btn btn-default btn-xs md-btn-flat">More</button>
                    </div>
                </h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item py-3">
                        <div class="badge badge-success float-right">Success</div>
                        <div class="font-weight-semibold">System Boot</div>
                        <small class="text-muted">02/05/2018 11:32:45</small>
                    </li>
                    <li class="list-group-item py-3">
                        <div class="badge badge-success float-right">Success</div>
                        <div class="font-weight-semibold">System Restart</div>
                        <small class="text-muted">02/05/2018 11:32:15</small>
                    </li>
                    <li class="list-group-item py-3">
                        <div class="badge badge-danger float-right">Failed</div>
                        <div class="font-weight-semibold">System Restart</div>
                        <small class="text-muted">02/05/2018 11:32:02</small>
                    </li>
                </ul>
            </div>
            <!-- / Latest events -->

        </div>
    </div>
@endsection