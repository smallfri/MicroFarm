<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"
        type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"
        type="text/javascript"></script>
<link href="https://uxpowered.com/products/appwork/v121/assets_/vendor/libs/datatables/datatables.css" rel="stylesheet"/>

<div class="card">
    <h6 class="card-header">
        Current Inventory
    </h6>
    <div class="card-datatable table-responsive">
        <table class="datatables-demo table table-striped table-bordered" id="metrics-table">
            <thead>
            <tr>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">SKU</th>
                <th scope="col">Quantity</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $inventories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <?php echo csrf_field(); ?>
                    <td><?php echo e($value->description); ?></td>
                    <td><?php echo e($value->category); ?></td>
                    <td><?php echo e($value->sku); ?></td>
                    <td><?php echo e($value->quantity); ?> / <?php echo e($value->symbol); ?></td>
                    <td>
                        <div style="text-align: center">


                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modals-default">Manage Quantity</button></div>
                        <!-- Modal template -->
                        <div class="modal fade" id="modals-default">
                            <div class="modal-dialog">
                                <?php echo Form::open(['url' => 'inventory/manage/'.$value->isid, 'class' => 'modal-content','id'=>'inventory-manage','enctype'=>'multipart/form-data']); ?>


                                <div class="modal-header">
                                    <h3 class="modal-title">
                                        Adjust
                                        <span class="font-weight-light">Stock</span>
                                        <br>
                                        <small class="text-muted">This will update the stock of this item.</small>
                                    </h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col mb-0">
                                            <label class="form-label">Quantity</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="">
                                        </div>
                                        <div class="form-group col mb-0">
                                            <label class="form-label">Cost</label>
                                            <input type="text" class="form-control" id="cost" name="cost" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col mb-0">
                                            <label for="adjust" class="form-label">Adjust</label>
                                            <select class="form-control" name="adjust" id="adjust">
                                                <option value="1">Add to Inventory</option>
                                                <option value="0">Subtract from Inventory</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                <?php echo Form::close(); ?>


                            </div>
                        </div>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <script type="application/javascript">
            $(document).ready(function() {
                $('#metrics-table').DataTable();
            } );
        </script>
    </div>
</div>