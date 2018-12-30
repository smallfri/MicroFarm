<?php $__env->startSection('content'); ?>
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Home /</span> Seed Summary
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

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"
            type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"
            type="text/javascript"></script>
    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
    <script>

        $(function () {

            $(document).ready(function() {
                $('#summary-table').DataTable( {
                    columnDefs: [ {
                        targets: [ 0 ],
                        orderData: [ 0, 1 ]
                    }, {
                        targets: [ 1 ],
                        orderData: [ 1, 0 ]
                    }, {
                        targets: [ 4 ],
                        orderData: [ 4, 0 ]
                    } ]
                } );
            } );
        });
    </script>
<div class="card mb-4">
    <div class="card-body">
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
                                <button href="#" type="submit" class="btn btn-outline btn-info btn-sm"
                                        data-toggle="modal"
                                        data-placement="top" title="View Seed Details" data-target="#view-modal-<?php echo e($value->variety_id); ?>">
                                    <i class="fas fa-search-plus"></i>
                                </button>

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
                                        "/seed/summary-delete-all",
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
                                            setTimeout(myTimeout1, 5000);
                                            location.reload();
                                        }
                                    );

                                });

                                $("#update_<?php echo e($value->variety_id); ?>").click(function (event) {

                                    $.post(
                                        "/seed/summary-update",
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
                                            } else {
                                                $("#danger").show();
                                            }
                                            setTimeout(myTimeout1, 5000);
                                            window.location.reload(true);
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
    <?php $__currentLoopData = $userseedlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="view-modal-<?php echo e($value->variety_id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e($value->seed_name); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/seed/detail/<?php echo e($value->variety_id); ?>" method="post" name="<?php echo e($value->variety_id); ?>">
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
                                            <?php echo Form::select('supplier_id',$suppliers ,[$value->supplier_id], ['class' => 'form-control','disabled' => true]); ?>

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
                                            <?php $notes = \App\GrowNotes::select('grow_notes.*')->where('user_id', $value->user_id)->where('variety_id', $value->variety_id)->orderby('id', 'desc')->get();

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
                                                                    aria-sort="ascending"
                                                                    aria-label=": activate to sort column descending">
                                                                    Created At:
                                                                </th>

                                                                <th class="text-nowrap sorting"
                                                                    tabindex="0"
                                                                    style="width:480px"
                                                                    aria-controls="data-table-responsive"
                                                                    rowspan="1"
                                                                    colspan="1"
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>