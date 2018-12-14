<?php $__env->startSection('content'); ?>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"
            type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"
            type="text/javascript"></script>
    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
    <script>

        $(function () {
            $('#summary-table').dataTable({
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
    <div class="alert alert-success collapse" role="alert" id="primary">
        Your changes have been saved.
    </div>
    <?php if(session()->has('message-success')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('message-success')); ?>

        </div>
    <?php endif; ?>
    <div class="alert alert-danger collapse" role="alert" id="danger">
        There was a problem, please try again.
    </div>
    <hr class="border-light container-m--x mt-0 mb-5">


    <div id="accordion">
        <div class="card">
            <div class="card-header">
                <a class="text-dark" data-toggle="collapse" href="#accordion-1">
                    <icon class="fa fa-plus-square"></icon>
                    Growing Summary
                </a>
            </div>
            <div id="accordion-1" class="collapse show" data-parent="#accordion" style="padding:20px;">


                <div class="card-datatable table-responsive" id="">
                    <table class="table" id="summary-table">
                        <thead>
                        <tr>
                            <th scope="col">Seed Name</th>
                            <th scope="col">Density</th>
                            <th scope="col"></th>
                            <th scope="col">Maturity</th>
                            <th scope="col">Yield</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $userseedlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php echo csrf_field(); ?>
                                <td><?php echo e($value->seed_name); ?></td>
                                <td>
                                    <?php echo Form::text('density', $value->density, ["class" => "form-control", "id"=>"density-".$value->variety_id.""]); ?>

                                    <?php if($errors->has('density')): ?>
                                        <span class="help-block">
                                                  <strong><?php echo e($errors->first('density')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo Form::select('seeds_measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->seeds_measurement) && $value->seeds_measurement != '' ) ? $value->seeds_measurement : '', ['class' => 'form-control',"id"=>"seeds_measurement-".$value->variety_id.""]); ?>


                                </td>

                                <td>
                                    <?php echo Form::text('maturity', $value->maturity, ['class' => 'form-control', "id"=>"maturity-".$value->variety_id.""]); ?>

                                    <?php if($errors->has('maturity')): ?>
                                        <span class="help-block">
                                                  <strong><?php echo e($errors->first('maturity')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo Form::text('yield', $value->yield, ['class' => 'form-control', "id"=>"yield-".$value->variety_id.""]); ?>


                                    <?php if($errors->has('yield')): ?>
                                        <span class="help-block">
                                                  <strong><?php echo e($errors->first('yield')); ?></strong>
                                            </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->measurement) && $value->measurement != '' ) ? $value->measurement : '', ['class' => 'form-control',"id"=>"measurement-".$value->variety_id.""]); ?>


                                </td>
                                <td>
                                    <input type="hidden" name="variety_id" id="variety_id"
                                           value="<?php echo e($value->variety_id); ?>">
                                    <input type="hidden" name="supplier_id" id="supplier_id"
                                           value="<?php echo e($value->supplier_id); ?>">
                                    <div class="form-group col-md-12">
                                        <button href="#" type="submit" class="btn btn-outline btn-success btn-sm"
                                                id="update_<?php echo e($value->variety_id); ?>" data-toggle="tooltip"
                                                data-placement="top" title="Save Seed Details">
                                            <i class="fa fa-save"></i>
                                        </button>

                                        
                                        
                                        
                                        
                                        <button type="submit" class="btn btn-outline btn-danger btn-sm"
                                                id="deleteAll_<?php echo e($value->variety_id); ?>" data-toggle="tooltip"
                                                data-placement="top" title="Delete Seed & it's Details">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                                <script type="text/javascript" language="javascript">
                                    $(document).ready(function () {
                                        $(function () {
                                            $('[data-toggle="tooltip"]').tooltip()
                                        });

                                        function myTimeout1() {
                                            $(".alert").hide();
                                        }

                                        

                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        

                                        

                                        $("#deleteAll_<?php echo e($value->variety_id); ?>").click(function (event) {

                                            $.post(
                                                "seed/summary-delete-all",
                                                {
                                                    _token: '<?php echo e(csrf_token()); ?>',
                                                    variety_id: '<?php echo e($value->variety_id); ?>'
                                                },
                                                function (data) {
                                                    var status = jQuery.parseJSON(data);
                                                    if (status.status === 'success') {
                                                        $("#primary").show();
                                                    } else {
                                                        $("#danger").show();
                                                    }
                                                    setTimeout(myTimeout1, 3000);
                                                    location.reload();
                                                }
                                            );

                                        });

                                        $("#update_<?php echo e($value->variety_id); ?>").click(function (event) {

                                            $.post(
                                                "seed/summary-update",
                                                {
                                                    _token: '<?php echo e(csrf_token()); ?>',
                                                    variety_id: '<?php echo e($value->variety_id); ?>',
                                                    supplier_id: '<?php echo e($value->supplier_id); ?>',
                                                    density: $("#density-<?php echo e($value->variety_id); ?>").val(),
                                                    maturity: $("#maturity-<?php echo e($value->variety_id); ?>").val(),
                                                    yield: $("#yield-<?php echo e($value->variety_id); ?>").val(),
                                                    measurement: $("#measurement-<?php echo e($value->variety_id); ?>").val(),
                                                    seeds_measurement: $("#seeds_measurement-<?php echo e($value->variety_id); ?>").val()
                                                },
                                                function (data) {
                                                    var status = jQuery.parseJSON(data);
                                                    if (status.status === 'success') {
                                                        $("#primary").show();

                                                        $("#accordion-2").toggle();
                                                        $("#accordion-1").addClass('collapse');

                                                        var yield = $("#yield-<?php echo e($value->variety_id); ?>").val();
                                                        var density = $("#density-<?php echo e($value->variety_id); ?>").val();
                                                        var maturity =  $("#maturity-<?php echo e($value->variety_id); ?>").val();
                                                        var measurement = $("#measurement-<?php echo e($value->variety_id); ?>").val();
                                                        var seeds_measurement = $("#seeds_measurement-<?php echo e($value->variety_id); ?>").val();
                                                        

                                                        $('#yield').val(yield);
                                                        $('#density').val(density);
                                                        $('#maturity').val(maturity);
                                                        $('#measurement').val(measurement);
                                                        $('#seeds_measurement').val(seeds_measurement);

                                                        $('#nav-<?php echo e($value->variety_id); ?>').tab('show');


                                                        $("html, body").animate({ scrollTop: $(document).height() - $("#accordion-2").height() }, "slow");

                                                        var li_count = $('.nav-tabs li').length;
                                                        var current_active = $('.nav-tabs li.active').index();

                                                        if(current_active<li_count){
                                                            $('.nav-tabs li.active').next('li').find('a').attr('data-toggle','tab').tab('active show');
                                                        }




                                                    } else {
                                                        $("#danger").show();
                                                    }
                                                    setTimeout(myTimeout1, 3000);
                                                    // location.reload();
                                                }
                                            );

                                        });

                                    });
                                </script>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    

    <div id="accordion">
        <div class="card mb-2">
            <div class="card-header">
                <a class="text-dark" data-toggle="collapse" href="#accordion-2">
                    <icon class="fa fa-plus-square"></icon>
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
                                        <li class="nav-item prev-button" style="">
                                            <a href="javascript:;" data-click="prev-tab"
                                               class="text-inverse nav-link">
                                                <i class="fa fa-arrow-left"></i>
                                            </a>
                                        </li>
                                        <?php $__currentLoopData = $userseedlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="nav-item">
                                                <a href="#nav-tab2-<?php echo e($value->variety_id); ?>" data-toggle="tab" id="nav-<?php echo e($value->variety_id); ?>"
                                                   class="nav-link <?php echo e($key == count($userseedlist) - 1 ? 'active show' : ''); ?>"><?php echo e($value->seed_name); ?></a>
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
                                            <input type="hidden" value="<?php echo e($value->supplier_id); ?>" name="xyz"
                                                   id="xyz">
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

                                                    </div>



                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Seed Density</label>
                                                            <?php echo Form::text('density', $value->density, ['class' => 'form-control', 'id'=>'density']); ?>


                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Measurement</label>
                                                        <?php echo Form::select('seeds_measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->seeds_measurement) && $value->seeds_measurement != '' ) ? $value->seeds_measurement : '', ['class' => 'form-control',"id"=>"seeds_measurement"]); ?>

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
                                                                    <option value="1" selected>YES = 24 hr Max
                                                                    </option>
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
                                                            <?php echo Form::select('maturity',$days,(isset($value->maturity) && $value->maturity != '' ) ? $value->maturity : '', ['class' => 'form-control', 'id'=>'maturity']); ?>

                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Best Medium</label>
                                                            <?php echo Form::select('medium',['MAT'=>'MAT','SOIL'=>'SOIL'] ,(isset($value->medium) && $value->medium != '' ) ? $value->medium : '', ['class' => 'form-control']); ?>


                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Yield</label>
                                                            <?php echo Form::text('yield',(isset($value->yield) && $value->yield !='' ) ? $value->yield : '', ['class' => 'form-control', 'id'=>'yield']); ?>


                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Measurement</label>
                                                            <?php echo Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->measurement) && $value->measurement != '' ) ? $value->measurement : '', ['class' => 'form-control',"id"=>"measurement"]); ?>

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
                                                            <button type="submit"
                                                                    class="btn btn-outline btn-success">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>