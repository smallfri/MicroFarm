<div class="card mb-3">
    <div class="panel-body">
        <div class="col-md-12 pt-10 pb-10">
            <div class="form-group">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Category Name</label>
                        {!! Form::text('name', null, ['class' => 'form-control', 'id'=>'name']) !!}

                    </div>
                    {{--<div class="form-group col-md-6">--}}
                    {{--<label class="form-label">Metric Symbol</label>--}}
                    {{--{!! Form::text('symbol', null, ['class' => 'form-control', 'id'=>'symbol']) !!}--}}
                    {{--</div>--}}

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