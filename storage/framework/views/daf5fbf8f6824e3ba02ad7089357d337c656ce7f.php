<div class="card mb-3">
    <h6 class="card-header">
        Create New Item <i class="ion ion-ios-help-buoy" data-toggle="tooltip" data-placement="top" data-state="primary"
                           title="Create an item. You will add items quantities in Manage Inventory."></i>
    </h6>
    <script type="application/javascript">
        $('[data-toggle="tooltip"]').tooltip();
    </script>
    <div class="panel-body">
        <div class="col-md-12 pt-10 pb-10">
            <div class="form-group">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Item Name</label>
                        <?php echo Form::text('name', null, ['class' => 'form-control', 'id'=>'name']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Item Description</label>
                        <?php echo Form::text('description', null, ['class' => 'form-control', 'id'=>'description']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Symbol</label>
                        <?php echo Form::select('metric',$metrics ,null, ['class' => 'form-control']); ?>


                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Category</label>
                        <?php echo Form::select('category',$categories ,null, ['class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type="submit"
                            class="btn btn-outline btn-success">
                        CREATE
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>