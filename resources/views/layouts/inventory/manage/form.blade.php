<div class="card mb-3">
    <h6 class="card-header">
        Add Item Quantity <i class="ion ion-ios-help-buoy" data-toggle="tooltip" data-placement="top" data-state="primary" title="Add quantity to your items."></i>

    </h6>
    <div class="panel-body">
        <div class="col-md-12 pt-10 pb-10">
            <div class="form-group">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Item</label>
                        {!! Form::select('inventory',$inventories2 ,null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Item Quantity</label>
                            {!! Form::text('quantity', null, ['class' => 'form-control', 'id'=>'quantity']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Item Location</label>
                        {!! Form::select('location',$locations ,null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Item Cost</label>
                        {!! Form::text('cost', null, ['class' => 'form-control', 'id'=>'cost']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Item Notes</label>
                        {!! Form::text('reason', null, ['class' => 'form-control', 'id'=>'reason']) !!}
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