<?php $__env->startSection('content'); ?>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"
            type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"
            type="text/javascript"></script>
    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
    <script>

        $(function () {
            $('#lists-table-1').dataTable({
                footerCallback: function (row, data, start, end, display) {
                    var api = this.api(), data;

                    function getSummary(colIndex, tmpl, avg, percents) {
                        var len = 0;
                        var sum = api.column(colIndex).data()
                            .reduce(function (a, b) {
                                len++;
                                return a + (numeral(b).value() * (percents ? 100 : 1));
                            }, 0);

                        var result = sum / (avg ? len : 1);

                        if (percents) {
                            result = result / 100;
                        }

                        $(api.column(colIndex).footer()).html(numeral(result).format(tmpl));
                    }

                    getSummary(1, '0,0'); // Unique visits
                    getSummary(2, '0,0'); // Views
                    getSummary(3, '0.00%', true, true); // Failure
                    getSummary(4, '0.00', true); // Avg. view depth

                    // Get average time on site
                    avgTimeLen = 0;
                    var totalSeconds = api.column(5).data()
                        .reduce(function (a, b) {
                            var seconds = moment(b, 'm:s').unix() - moment('0:0', 'm:s').unix();

                            avgTimeLen++;
                            return a + seconds;
                        }, 0);
                    var avgTime = Math.floor(totalSeconds / avgTimeLen);
                    var avgMinutes = Math.floor(avgTime / 60);
                    var avgSeconds = avgTime - (avgMinutes * 60);

                    $(api.column(5).footer()).html(avgMinutes + ':' + avgSeconds);
                }
            });
        });
    </script>
    <!-- begin page-header -->
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Home /</span> Growing Journal
    </h4>

    <hr class="border-light container-m--x mt-0 mb-5">


    <div id="accordion">
        <div class="card">
            <h6 class="card-header">
                Growing Summary
            </h6>
            <div class="card-datatable table-responsive" style="margin:15px 15px;">
                <table class="table" id="summary-table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row">
            <!-- Content -->
            <div class="container-fluid flex-grow-1 container-p-y">

                <h4 class="font-weight-bold py-3 mb-4">
                    <span class="text-muted font-weight-light">Tables /</span> Bootstrap Sortable
                </h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped sortable">
                        <thead>
                        <tr>
                            <th style="width: 20%; vertical-align: middle;" rowspan="2" class="az"
                                data-defaultsign="nospan" data-defaultsort="asc">
                                <i class="ion ion-ios-navigate"></i>&nbsp; Name
                            </th>
                            <th colspan="4" data-mainsort="3" style="text-align: center;">Results</th>
                            <th data-defaultsort="disabled"></th>
                        </tr>
                        <tr>
                            <th style="width: 20%" colspan="2" data-mainsort="1" data-firstsort="desc">Round 1</th>
                            <th style="width: 20%">Round 2</th>
                            <th style="width: 20%">Total</th>
                            <th style="width: 20%" data-defaultsign="month">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Jack Jackson</td>
                            <td>30.51</td>
                            <td>17.77</td>
                            <td>14.99</td>
                            <td>63.27</td>
                            <td data-dateformat="DD-MM-YYYY">04-07-2013</td>
                        </tr>
                        <tr>
                            <td class="sorted">Steven White</td>
                            <td>6.21</td>
                            <td>67.31</td>
                            <td>84.32</td>
                            <td>157.84</td>
                            <td data-dateformat="DD-MM-YYYY">14-11-2016</td>
                        </tr>
                        <tr>
                            <td class="sorted">Peter White</td>
                            <td>15.53</td>
                            <td>7.54</td>
                            <td>37.36</td>
                            <td>60.43</td>
                            <td data-dateformat="DD-MM-YYYY">25-11-2012</td>
                        </tr>
                        <tr>
                            <td class="sorted">Steven Spielberg</td>
                            <td>0.25</td>
                            <td>7.74</td>
                            <td>15.19</td>
                            <td>23.18</td>
                            <td data-dateformat="DD-MM-YYYY">14-12-2001</td>
                        </tr>
                        <tr>
                            <td class="sorted">Frank White</td>
                            <td>24.81</td>
                            <td>5.02</td>
                            <td>18.1</td>
                            <td>47.93</td>
                            <td data-dateformat="DD-MM-YYYY">11.05.2016</td>
                        </tr>
                        <tr>
                            <td class="sorted">Peter Jackson</td>
                            <td>25.54</td>
                            <td>26.32</td>
                            <td>5.45</td>
                            <td>57.31</td>
                            <td data-dateformat="DD-MM-YYYY">09.04.2003</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- / Content -->

            <!-- Layout footer -->
            <nav class="layout-footer footer bg-footer-theme">
                <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
                    <div class="pt-3">
                        <span class="footer-text font-weight-bolder">Appwork</span> ©
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="footer-link pt-3">About Us</a>
                        <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Help</a>
                        <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Contact</a>
                        <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Terms &amp; Conditions</a>
                    </div>
                </div>
            </nav>
            <!-- / Layout footer -->
        </div>
    </div>
    </div>
    </div>

    </div>
    

    <div id="accordion">
        <div class="card mb-2">
            <div class="card-header">
                <a class="text-dark" data-toggle="collapse" href="#accordion-2">
                    Growing Journal
                </a>
            </div>

            <div id="accordion-2" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <div>
                        <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-unlimited-tabs-2">
                            <!-- begin panel-heading -->
                            <div class="panel-heading p-0 ui-sortable-handle">
                                <div class="panel-heading-btn m-r-10 m-t-10">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse"
                                       data-click="panel-expand"><i
                                                class="fa fa-expand"></i></a>
                                </div>
                                <!-- begin nav-tabs -->
                                <div class="tab-overflow">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item prev-button" style=""><a href="javascript:;"
                                                                                     data-click="prev-tab"
                                                                                     class="text-inverse nav-link"><i
                                                        class="fa fa-arrow-left"></i></a></li>
                                        <?php $__currentLoopData = $userseedlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="nav-item"><a href="#nav-tab2-<?php echo e($value->variety_id); ?>"
                                                                    data-toggle="tab"
                                                                    class="nav-link <?php echo e($key == count($userseedlist) - 1 ? 'active show' : 'adfasdfasdf'); ?>"><?php echo e($value->seed_name); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item next-button" style=""><a href="javascript:;"
                                                                                     data-click="next-tab"
                                                                                     class="text-inverse nav-link"><i
                                                        class="fa fa-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                                <!-- end nav-tabs -->
                            </div>
                            <!-- end panel-heading -->
                            <!-- begin tab-content -->
                            <div class="tab-content">
                                <?php $__currentLoopData = $userseedlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="tab-pane fade <?php echo e($key == count($userseedlist)-1 ? 'active show' : ''); ?>"
                                         id="nav-tab2-<?php echo e($value->variety_id); ?>">
                                        <h3 class="m-t-10"><?php echo e($value->seed_name); ?></h3>
                                        <form action="#" method="post" name="<?php echo e($value->variety_id); ?>">
                                            <input type="hidden" value="<?php echo e($value->supplier_id); ?>" name="xyz" id="xyz">
                                            <input type="hidden" value="<?php echo e($value->variety_id); ?>" name="variety_id"
                                                   id="variety_id">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="col-md-12 pt-10 pb-10">
                                                <div class="form-group">


                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Supplier</label>
                                                            <?php echo Form::select('supplier_id',$suppliers ,[$value->supplier_id], ['class' => 'form-control']); ?>

                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Seed Density</label>
                                                            <?php echo Form::text('density', $value->density, ['class' => 'form-control']); ?>


                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Tray Size</label>
                                                            <?php echo Form::select('tray_size',['10 X 20'=>'10 X 20','5 X 5'=>'5 X 5','18 X 26'=>'18 X 26'] ,(isset($value->tray_size) && $value->tray_size != '' ) ? $value->tray_size : '', ['class' => 'form-control']); ?>

                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Soak</label>
                                                            <select class="form-control" name="soak_status">

                                                                <?php if($value->soak_status=='1'): ?>
                                                                    <option value="1" selected>YES = 24 hr Max</option>
                                                                    <option value="2">NO</option>
                                                                <?php else: ?>
                                                                    <option value="1">YES = 24 hr Max</option>
                                                                    <option value="2" selected>NO</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Germination Period</label>
                                                            <?php echo Form::select('germination',$days,(isset($value->germination) && $value->germination != '' ) ? $value->germination : '', ['class' => 'form-control']); ?>

                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Situation</label>

                                                            <?php echo Form::select('situation',['IN DARKNESS'=>'IN DARKNESS ','IN LIGHT'=>'IN LIGHT','PLANT ON TOP (SOIL)'=>'PLANT ON TOP (SOIL)','COVER WITH SOIL (SOIL)'=>'COVER WITH SOIL (SOIL)'] ,(isset($value->situation) && $value->situation != '' ) ? $value->situation : '', ['class' => 'form-control']); ?>


                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Days to Maturity</label>
                                                            <?php echo Form::select('maturity',$days,(isset($value->maturity) && $value->maturity != '' ) ? $value->maturity : '', ['class' => 'form-control']); ?>

                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Best Medium</label>
                                                            <?php echo Form::select('medium',['MAT'=>'MAT','SOIL'=>'SOIL'] ,(isset($value->medium) && $value->medium != '' ) ? $value->medium : '', ['class' => 'form-control']); ?>


                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Yield</label>
                                                            <?php echo Form::text('yield',(isset($value->yield) && $value->yield !='' ) ? $value->yield : '', ['class' => 'form-control']); ?>


                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="form-label">Grow Notes:</label>

                                                            <?php echo Form::textarea('notes', '' , ['class' => 'form-control','size' => '30x5','placeholder'=>'Add notes']); ?>


                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" class="btn btn-outline btn-success">
                                                                UPDATE
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">

                                                        <div class="col-md-12 pt-10 pb-10">
                                                            <?php $notes = \APP\Model\GrowNotes::select('grow_notes.*')->where('user_id', $value->user_id)->where('variety_id', $value->variety_id)->orderby('id', 'desc')->get();

                                                            ?>
                                                            <?php if($notes != null): ?>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <table id="data-table-responsive"
                                                                               class="table table-striped table-bordered dataTable no-footer dtr-inline"
                                                                               role="grid"
                                                                               aria-describedby="data-table-responsive_info"
                                                                               style="">
                                                                            <thead>
                                                                            <tr role="row">
                                                                                <th class="sorting_asc" tabindex="0"
                                                                                    aria-controls="data-table-responsive"
                                                                                    rowspan="1"
                                                                                    colspan="1"
                                                                                    style="max-width: 60%;"
                                                                                    aria-sort="ascending"
                                                                                    aria-label=": activate to sort column descending">
                                                                                    Created At:
                                                                                </th>

                                                                                <th class="text-nowrap sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="data-table-responsive"
                                                                                    rowspan="1"
                                                                                    colspan="1"
                                                                                    style=""
                                                                                    aria-label="Rendering engine: activate to sort column ascending">
                                                                                    Note:
                                                                                </th>

                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                
                                                                                <tr class="gradeA even" role="row">
                                                                                    <td>
                                                                                        <?php echo e($note->created_at); ?>

                                                                                    </td>
                                                                                    <td>
                                                                                        <p><?php echo e(((isset($note->notes) && $note->notes != '' ) ? $note->notes : '')); ?></p>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>