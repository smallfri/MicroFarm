@extends('layouts.layout-2')

@section('content')
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
    <!-- begin page-header -->
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Home /</span> Growing Journal
    </h4>
    <div class="alert alert-success collapse" role="alert" id="primary">
        Your changes have been saved.
    </div>
    @if(session()->has('message-success'))
        <div class="alert alert-success">
            {{ session()->get('message-success') }}
        </div>
    @endif
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
                        @foreach($userseedlist as $key => $value)
                            <tr>
                                @csrf
                                <td>{{$value->seed_name}}</td>
                                <td>
                                    {!! Form::text('density', $value->density, ["class" => "form-control", "id"=>"density-".$value->variety_id.""]) !!}
                                    @if ($errors->has('density'))
                                        <span class="help-block">
                                                  <strong>{{ $errors->first('density') }}</strong>
                                            </span>
                                    @endif
                                </td>
                                <td>
                                    {!! Form::select('seeds_measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->seeds_measurement) && $value->seeds_measurement != '' ) ? $value->seeds_measurement : '', ['class' => 'form-control',"id"=>"seeds_measurement-".$value->variety_id.""]) !!}

                                </td>

                                <td>
                                    {!! Form::text('maturity', $value->maturity, ['class' => 'form-control', "id"=>"maturity-".$value->variety_id.""]) !!}
                                    @if ($errors->has('maturity'))
                                        <span class="help-block">
                                                  <strong>{{ $errors->first('maturity') }}</strong>
                                            </span>
                                    @endif
                                </td>
                                <td>
                                    {!! Form::text('yield', $value->yield, ['class' => 'form-control', "id"=>"yield-".$value->variety_id.""]) !!}

                                    @if ($errors->has('yield'))
                                        <span class="help-block">
                                                  <strong>{{ $errors->first('yield') }}</strong>
                                            </span>
                                    @endif
                                </td>
                                <td>
                                    {!! Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->measurement) && $value->measurement != '' ) ? $value->measurement : '', ['class' => 'form-control',"id"=>"measurement-".$value->variety_id.""]) !!}

                                </td>
                                <td>
                                    <input type="hidden" name="variety_id" id="variety_id"
                                           value="{{$value->variety_id}}">
                                    <input type="hidden" name="supplier_id" id="supplier_id"
                                           value="{{$value->supplier_id}}">
                                    <div class="form-group col-md-12">
                                        <button href="#" type="submit" class="btn btn-outline btn-success btn-sm"
                                                id="update_{{$value->variety_id}}" data-toggle="tooltip"
                                                data-placement="top" title="Save Seed Details">
                                            <i class="fa fa-save"></i>
                                        </button>

                                        {{--<button type="submit" class="btn btn-outline btn-warning btn-sm"--}}
                                        {{--id="delete_{{$value->variety_id}}" data-toggle="tooltip" data-placement="top" title="Delete Only Seed Details">--}}
                                        {{--<i class="fa fa-trash-alt"></i>--}}
                                        {{--</button>--}}
                                        <button type="submit" class="btn btn-outline btn-danger btn-sm"
                                                id="deleteAll_{{$value->variety_id}}" data-toggle="tooltip"
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

                                        {{--$("#delete_{{$value->variety_id}}").click(function(event){--}}

                                        {{--$.post(--}}
                                        {{--"seed/summary-delete",--}}
                                        {{--{--}}
                                        {{--_token: '{{csrf_token()}}',--}}
                                        {{--variety_id: '{{$value->variety_id}}'--}}
                                        {{--},--}}
                                        {{--function(data) {--}}
                                        {{--var status = jQuery.parseJSON(data);--}}
                                        {{--if(status.status === 'success')--}}
                                        {{--{--}}
                                        {{--$("#primary").show();--}}
                                        {{--}--}}
                                        {{--else--}}
                                        {{--{--}}
                                        {{--$("#danger").show();--}}
                                        {{--}--}}
                                        {{--setTimeout(myTimeout1, 3000);--}}
                                        {{--location.reload();--}}
                                        {{--}--}}
                                        {{--);--}}

                                        {{--});--}}

                                        $("#deleteAll_{{$value->variety_id}}").click(function (event) {

                                            $.post(
                                                "seed/summary-delete-all",
                                                {
                                                    _token: '{{csrf_token()}}',
                                                    variety_id: '{{$value->variety_id}}'
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

                                        $("#update_{{$value->variety_id}}").click(function (event) {

                                            $.post(
                                                "seed/summary-update",
                                                {
                                                    _token: '{{csrf_token()}}',
                                                    variety_id: '{{$value->variety_id}}',
                                                    supplier_id: '{{$value->supplier_id}}',
                                                    density: $("#density-{{$value->variety_id}}").val(),
                                                    maturity: $("#maturity-{{$value->variety_id}}").val(),
                                                    yield: $("#yield-{{$value->variety_id}}").val(),
                                                    measurement: $("#measurement-{{$value->variety_id}}").val(),
                                                    seeds_measurement: $("#seeds_measurement-{{$value->variety_id}}").val()
                                                },
                                                function (data) {
                                                    var status = jQuery.parseJSON(data);
                                                    if (status.status === 'success') {
                                                        $("#primary").show();

                                                        $("#accordion-2").toggle();
                                                        $("#accordion-1").addClass('collapse');

                                                        var yield = $("#yield-{{$value->variety_id}}").val();
                                                        var density = $("#density-{{$value->variety_id}}").val();
                                                        var maturity =  $("#maturity-{{$value->variety_id}}").val();
                                                        var measurement = $("#measurement-{{$value->variety_id}}").val();
                                                        var seeds_measurement = $("#seeds_measurement-{{$value->variety_id}}").val();


                                                        $('#yield').val(yield);
                                                        $('#density').val(density);
                                                        $('#maturity').val(maturity);
                                                        $('#measurement').val(measurement);
                                                        $('#seeds_measurement').val(seeds_measurement);

                                                        $('#nav-{{$value->variety_id}}').tab('show');


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
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{--seed density days to mature yield--}}

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
                                        @foreach($userseedlist as $key => $value)
                                            <li class="nav-item">
                                                <a href="#nav-tab2-{{$value->variety_id}}" data-toggle="tab" id="nav-{{$value->variety_id}}"
                                                   class="nav-link {{ $key == count($userseedlist) - 1 ? 'active show' : '' }}">{{$value->seed_name}}</a>
                                            </li>
                                        @endforeach
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
                                @foreach($userseedlist as $key => $value)

                                    <div class="tab-pane fade {{ $key == count($userseedlist)-1 ? 'active show' : '' }}"
                                         id="nav-tab2-{{$value->variety_id}}">
                                        <h3 class="m-t-10">{{$value->seed_name}}</h3>
                                        <form action="#" method="post" name="{{$value->variety_id}}">
                                            <input type="hidden" value="{{$value->supplier_id}}" name="xyz"
                                                   id="xyz">
                                            <input type="hidden" value="{{$value->variety_id}}" name="variety_id"
                                                   id="variety_id">
                                            {{csrf_field()}}
                                            <div class="col-md-12 pt-10 pb-10">
                                                <div class="form-group">


                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Supplier</label>
                                                            {!! Form::select('supplier_id',$suppliers ,[$value->supplier_id], ['class' => 'form-control']) !!}
                                                        </div>

                                                    </div>



                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Seed Density</label>
                                                            {!! Form::text('density', $value->density, ['class' => 'form-control', 'id'=>'density']) !!}

                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Measurement</label>
                                                        {!! Form::select('seeds_measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->seeds_measurement) && $value->seeds_measurement != '' ) ? $value->seeds_measurement : '', ['class' => 'form-control',"id"=>"seeds_measurement"]) !!}
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Tray Size</label>
                                                            {!! Form::select('tray_size',['10 X 20'=>'10 X 20','5 X 5'=>'5 X 5','18 X 26'=>'18 X 26'] ,(isset($value->tray_size) && $value->tray_size != '' ) ? $value->tray_size : '', ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Soak</label>
                                                            <select class="form-control" name="soak_status">

                                                                @if($value->soak_status=='1')
                                                                    <option value="1" selected>YES = 24 hr Max
                                                                    </option>
                                                                    <option value="2">NO</option>
                                                                @else
                                                                    <option value="1">YES = 24 hr Max</option>
                                                                    <option value="2" selected>NO</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Germination Period</label>
                                                            {!! Form::select('germination',$days,(isset($value->germination) && $value->germination != '' ) ? $value->germination : '', ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Situation</label>

                                                            {!! Form::select('situation',['IN DARKNESS'=>'IN DARKNESS ','IN LIGHT'=>'IN LIGHT','PLANT ON TOP (SOIL)'=>'PLANT ON TOP (SOIL)','COVER WITH SOIL (SOIL)'=>'COVER WITH SOIL (SOIL)'] ,(isset($value->situation) && $value->situation != '' ) ? $value->situation : '', ['class' => 'form-control']) !!}

                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Days to Maturity</label>
                                                            {!! Form::select('maturity',$days,(isset($value->maturity) && $value->maturity != '' ) ? $value->maturity : '', ['class' => 'form-control', 'id'=>'maturity']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Best Medium</label>
                                                            {!! Form::select('medium',['MAT'=>'MAT','SOIL'=>'SOIL'] ,(isset($value->medium) && $value->medium != '' ) ? $value->medium : '', ['class' => 'form-control']) !!}

                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Yield</label>
                                                            {!! Form::text('yield',(isset($value->yield) && $value->yield !='' ) ? $value->yield : '', ['class' => 'form-control', 'id'=>'yield']) !!}

                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Measurement</label>
                                                            {!! Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->measurement) && $value->measurement != '' ) ? $value->measurement : '', ['class' => 'form-control',"id"=>"measurement"]) !!}
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="form-label">Grow Notes:</label>

                                                            {!! Form::textarea('notes', '' , ['class' => 'form-control','size' => '30x5','placeholder'=>'Add notes']) !!}

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
                                                            @if($notes != null)
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
                                                                            @foreach($notes as $note)
                                                                                {{--@if($note->variety_id == $userseedlist->variety_id)--}}
                                                                                <tr class="gradeA even" role="row">
                                                                                    <td>
                                                                                        {{ $note->created_at }}
                                                                                    </td>
                                                                                    <td>
                                                                                        <p>{{ ((isset($note->notes) && $note->notes != '' ) ? $note->notes : '') }}</p>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
