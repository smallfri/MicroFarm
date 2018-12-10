@extends('layouts.layout-2')

@section('content')

    <!-- begin page-header -->
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Home /</span> Growing Journal
    </h4>

    <hr class="border-light container-m--x mt-0 mb-5">

    <div class="row">
        @foreach($userseedlist as $key => $value)

            <div class="col-md-6 col-lg-3">
                <div class="uikit-example">
                    <div class="card <?php echo ($value->maturity == 0) ? 'bg-primary text-white' : '';?> pt-4 mb-4">
                        <div class="card-header border-0 pb-0">
                           <?php echo mb_strimwidth($value->seed_name, 0, 25, "...");?>
                        </div>
                        <div class="d-flex align-items-center position-relative mt-4" style="height:110px;">

                            <div class="w-100 text-center text-xlarge">
                                @if($value->maturity>0)
                                    {{$value->maturity}} day(s)
                                @else
                                    Ready Now!!
                                @endif
                            </div>
                        </div>
                        <div class="text-center mt-3 mb-4">
                            Days until Maturity
                        </div>
                        <div class="card-footer text-center py-3 bg-white">
                            <div class="row">
                                <div class="col">
                                    <div class="text-dark small mb-1">Density</div>
                                    <strong class="text-big">
                                        {!! Form::text('density', $value->density, ['class' => 'form-control', 'style'=>'width:80px;']) !!}
                                    </strong>
                                </div>
                                <div class="col">
                                    <div class="text-dark small mb-1">Yield</div>
                                    <strong class="text-big text-dark">
                                        {!! Form::text('yield',(isset($value->yield) && $value->yield !='' ) ? $value->yield : '', ['class' => ['form-control','text-dark']]) !!}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uikit-example-btns"></div>
                </div>
            </div>
        @endforeach

    </div>
    {{--seed density days to mature yield--}}

    <div id="accordion">
        <div class="card mb-2">
            <div class="card-header">
                <a class="text-dark" data-toggle="collapse" href="#accordion-1">
                    Growing Journal
                </a>
            </div>

            <div id="accordion-1" class="collapse show" data-parent="#accordion">
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
                                        @foreach($userseedlist as $key => $value)
                                            <li class="nav-item"><a href="#nav-tab2-{{$value->variety_id}}"
                                                                    data-toggle="tab"
                                                                    class="nav-link {{ $key == count($userseedlist) - 1 ? 'active show' : 'adfasdfasdf' }}">{{$value->seed_name}}</a>
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
                                            <input type="hidden" value="{{$value->supplier_id}}" name="xyz" id="xyz">
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
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Seed Density</label>
                                                            {!! Form::text('density', $value->density, ['class' => 'form-control']) !!}

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
                                                                    <option value="1" selected>YES = 24 hr Max</option>
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
                                                            {!! Form::select('maturity',$days,(isset($value->maturity) && $value->maturity != '' ) ? $value->maturity : '', ['class' => 'form-control']) !!}
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Best Medium</label>
                                                            {!! Form::select('medium',['MAT'=>'MAT','SOIL'=>'SOIL'] ,(isset($value->medium) && $value->medium != '' ) ? $value->medium : '', ['class' => 'form-control']) !!}

                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="form-label">Yield</label>
                                                            {!! Form::text('yield',(isset($value->yield) && $value->yield !='' ) ? $value->yield : '', ['class' => 'form-control']) !!}

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
                                                            <button type="submit" class="btn btn-outline btn-success">
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
    </div>

@endsection