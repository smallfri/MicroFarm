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
            <div class="card-header">
                <a class="text-dark" data-toggle="collapse" href="#accordion-1">
                    Growing Summary
                </a>
            </div>
            <div id="accordion-1" class="collapse show" data-parent="#accordion" style="padding:20px;">
            <div class="card-datatable table-responsive">
                <table class="table" id="summary-table">
                    <thead>
                    <tr>
                        <th scope="col">Seed Name</th>
                        <th scope="col">Density</th>
                        <th scope="col">Maturity</th>
                        <th scope="col">Yield</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $userseedlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($value->seed_name); ?></th>
                        <td><?php echo e($value->density); ?></td>
                        <td><?php echo e($value->maturity); ?></td>
                        <td><?php echo e($value->yield); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
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