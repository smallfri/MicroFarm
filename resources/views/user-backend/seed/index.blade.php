@extends('layouts.user-backend')

@section('title','Seed List')

@section('content')
    <div style="max-width:800px">
    <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-unlimited-tabs-2">
        <!-- begin panel-heading -->
        <div class="panel-heading p-0 ui-sortable-handle">
            <div class="panel-heading-btn m-r-10 m-t-10">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
            </div>
            <!-- begin nav-tabs -->
            <div class="tab-overflow">
                <ul class="nav nav-tabs">
                    <li class="nav-item prev-button" style=""><a href="javascript:;" data-click="prev-tab"
                                                                 class="text-inverse nav-link"><i
                                    class="fa fa-arrow-left"></i></a></li>
                    @foreach($userseedlist as $key => $value)
                        <li class="nav-item"><a href="#nav-tab2-{{$value->variety_id}}" data-toggle="tab"
                                                class="nav-link {{ $key == count($userseedlist) - 1 ? 'active show' : 'adfasdfasdf' }}">{{$value->seed_name}}</a>
                        </li>
                    @endforeach
                    <li class="nav-item next-button" style=""><a href="javascript:;" data-click="next-tab"
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
                        {{csrf_field()}}
                        <div class="col-md-12 pt-10 pb-10">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="seed-name" class="label-1">SEED NAME</label>
                                </div>
                                <div class="col-md-12">
                                    @if(isset($value->seed_name))
                                        {!! Form::text('seed_name', $value->seed_name, ['class' => 'form-control','readonly'=>'readonly']) !!}
                                        <input type="hidden" name="variety_id"
                                               value="{{$value->variety_id}}">
                                    @else
                                        {!! Form::text('seed_name', $value->seed_name, ['class' => 'form-control','readonly'=>'readonly']) !!}

                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-10 pb-10">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="supplier-1">SUPPLIER</label>
                                </div>
                                <div class="col-md-12">
                                    {!! Form::select('supplier_id',$suppliers ,[$value->supplier_id], ['class' => 'form-control']) !!}

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-10 pb-10">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="supplier-1">SEED DENSITY</label>
                                </div>
                                <div class="col-md-12">
                                    @if(isset($value->density))
                                        {!! Form::text('density', $value->density, ['class' => 'form-control']) !!}
                                    @else
                                        {!! Form::text('density', $value->density, ['class' => 'form-control']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 pt-10 pb-10">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="supplier-1">SEED DENSITY</label>
                                </div>
                                <div class="col-md-12">
                                    @if(isset($value->measurement))
                                        {!! Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->measurement) && $value->measurement != '' ) ? $value->measurement : '', ['class' => 'form-control']) !!}
                                    @else
                                        {!! Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->measurement) && $value->measurement != '' ) ? $value->measurement : '', ['class' => 'form-control']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-10 pb-10">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="supplier-1">TRAY SIZE</label>
                                </div>
                                <div class="col-md-12">
                                    {!! Form::select('tray_size',['10 X 20'=>'10 X 20','5 X 5'=>'5 X 5','18 X 26'=>'18 X 26'] ,(isset($value->tray_size) && $value->tray_size != '' ) ? $value->tray_size : '', ['class' => 'form-control']) !!}


                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-10 pb-10">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="soak_status">SOAK</label>
                                </div>
                                <div class="col-md-12">
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
                        </div>

                        <div class="col-md-12 pt-10 pb-10">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="supplier-1">GERMINATION DAYS</label>
                                </div>
                                <div class="col-md-12">
                                    {!! Form::select('germination',$days,(isset($value->germinationDays[0]->id) && $value->germinationDays[0]->id != '' ) ? $value->germinationDays[0]->id : '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-10 pb-10">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="supplier-1">SITUATION</label>
                                </div>
                                <div class="col-md-12">
                                    {!! Form::select('situation',['IN DARKNESS'=>'IN DARKNESS ','IN LIGHT'=>'IN LIGHT','PLANT ON TOP (SOIL)'=>'PLANT ON TOP (SOIL)','COVER WITH SOIL (SOIL)'=>'COVER WITH SOIL (SOIL)'] ,(isset($value->situation) && $value->situation != '' ) ? $value->situation : '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-10 pb-10">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="supplier-1">BEST MEDIUM</label>
                                </div>
                                <div class="col-md-12">
                                    {!! Form::select('medium',['MAT'=>'MAT','SOIL'=>'SOIL'] ,(isset($value->medium) && $value->medium != '' ) ? $value->medium : '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-10 pb-10">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="supplier-1">DAYS TO MATURITY</label>
                                </div>
                                <div class="col-md-12">

                                    {!! Form::select('maturity',$days,(isset($value->maturityDays[0]->id) && $value->maturityDays[0]->id != '' ) ? $value->maturityDays[0]->id : '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-10 pb-10">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="supplier-1">YIELD</label>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::text('yield',(isset($value->yield) && $value->yield !='' ) ? $value->yield : '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-10 pb-10">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="supplier-1">GROW NOTES</label>
                                </div>
                                <div class="col-md-12">
                                    {!! Form::textarea('notes', '' , ['class' => 'form-control','size' => '30x5','placeholder'=>'Add notes']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-10 pb-10" style="margin-left:15px;">
                            <button type="submit" class="btn btn-outline btn-success">
                                UPDATE
                            </button>
                        </div>

                        <div class="panel panel-inverse" style="margin:20px 30px 20px 30px;">
                            <!-- begin panel-heading -->
                            <div class="panel-heading ui-sortable-handle">
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                                       data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                                       data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                                       data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                                       data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                                <h4 class="panel-title">GROW NOTES</h4>
                            </div>
                            <!-- end panel-heading -->
                            <!-- begin alert -->
                        {{--<div class="alert alert-secondary fade show">--}}
                        {{--<button type="button" class="close" data-dismiss="alert">--}}
                        {{--<span aria-hidden="true">×</span>--}}
                        {{--</button>--}}
                        {{--In the modern world of responsive web design tables can often cause a particular problem for designers due to their row based layout. Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.--}}
                        {{--</div>--}}
                        <!-- end alert -->
                            <!-- begin panel-body -->
                            <div class="panel-body">
                                <div id="data-table-responsive_wrapper"
                                     class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="dataTables_length" id="data-table-responsive_length">
                                                <label>Show
                                                    <select name="data-table-responsive_length"
                                                            aria-controls="data-table-responsive"
                                                            class="form-control input-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label></div>
                                        </div>
                                    </div>

                                    <?php $notes = \APP\GrowNotes::select('grow_notes.*' )->where('user_id', $value->user_id)->where('variety_id', $value->variety_id)->orderby('id', 'desc')->get();

                                    ?>
                                    @if($notes != null)
                                        <div class="row">
                                        <div class="col-sm-12">
                                                    <table id="data-table-responsive"
                                                       class="table table-striped table-bordered dataTable no-footer dtr-inline"
                                                       role="grid" aria-describedby="data-table-responsive_info"
                                                       style="width: 812px;">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0"
                                                            aria-controls="data-table-responsive" rowspan="1"
                                                            colspan="1"
                                                            style="max-width: 60%;" aria-sort="ascending"
                                                            aria-label=": activate to sort column descending">Created At:</th>

                                                        <th class="text-nowrap sorting" tabindex="0"
                                                            aria-controls="data-table-responsive" rowspan="1"
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
                            <!-- end panel-body -->
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
        <!-- end tab-content -->
    </div>
    </div>
    {{--<div class="panel panel-default panel-with-tabs" data-sortable-id="ui-unlimited-tabs-2">--}}
    {{--<!-- begin panel-heading -->--}}
    {{--<div class="panel-heading p-0 ui-sortable-handle">--}}
    {{--<div class="panel-heading-btn m-r-10 m-t-10">--}}
    {{--<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-inverse" data-click="panel-expand"><i class="fa fa-expand"></i></a>--}}
    {{--</div>--}}
    {{--<!-- begin nav-tabs -->--}}
    {{--<div class="tab-overflow overflow-right overflow-left">--}}
    {{--<ul class="nav nav-tabs" style="margin-left: -424px;">--}}
    {{--<li class="nav-item prev-button"><a href="javascript:;" data-click="prev-tab" class="text-inverse nav-link"><i class="fa fa-arrow-left"></i></a></li>--}}

    {{--@foreach($userseedlist as $key => $value)--}}
    {{--<li class="nav-item"><a href="#nav-tab2-{{$value->variety_id}}" data-toggle="tab" class="nav-link">{{$value->seed_name}}</a></li>--}}
    {{--@endforeach--}}

    {{--<li class="nav-item next-button" style=""><a href="javascript:;" data-click="next-tab" class="text-inverse nav-link"><i class="fa fa-arrow-right"></i></a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<!-- end nav-tabs -->--}}
    {{--</div>--}}
    {{--<!-- end panel-heading -->--}}
    {{--<!-- begin tab-content -->--}}
    {{--<div class="tab-content">--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-1">--}}
    {{--<h3 class="m-t-10">Nav Tab 1</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-2">--}}
    {{--<h3 class="m-t-10">Nav Tab 2</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-3">--}}
    {{--<h3 class="m-t-10">Nav Tab 3</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-4">--}}
    {{--<h3 class="m-t-10">Nav Tab 4</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-5">--}}
    {{--<h3 class="m-t-10">Nav Tab 5</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-6">--}}
    {{--<h3 class="m-t-10">Nav Tab 6</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-7">--}}
    {{--<h3 class="m-t-10">Nav Tab 7</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-8">--}}
    {{--<h3 class="m-t-10">Nav Tab 8</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-9">--}}
    {{--<h3 class="m-t-10">Nav Tab 9</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-10">--}}
    {{--<h3 class="m-t-10">Nav Tab 10</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-11">--}}
    {{--<h3 class="m-t-10">Nav Tab 11</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade active show" id="nav-tab2-12">--}}
    {{--<h3 class="m-t-10">Nav Tab 12</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-13">--}}
    {{--<h3 class="m-t-10">Nav Tab 13</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-14">--}}
    {{--<h3 class="m-t-10">Nav Tab 14</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-15">--}}
    {{--<h3 class="m-t-10">Nav Tab 15</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-16">--}}
    {{--<h3 class="m-t-10">Nav Tab 16</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-17">--}}
    {{--<h3 class="m-t-10">Nav Tab 17</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-18">--}}
    {{--<h3 class="m-t-10">Nav Tab 18</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-19">--}}
    {{--<h3 class="m-t-10">Nav Tab 19</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--<!-- begin tab-pane -->--}}
    {{--<div class="tab-pane fade" id="nav-tab2-20">--}}
    {{--<h3 class="m-t-10">Nav Tab 20</h3>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
    {{--Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor,--}}
    {{--est diam sagittis orci, a ornare nisi quam elementum tortor.--}}
    {{--Proin interdum ante porta est convallis dapibus dictum in nibh.--}}
    {{--Aenean quis massa congue metus mollis fermentum eget et tellus.--}}
    {{--Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien,--}}
    {{--nec eleifend orci eros id lectus.--}}
    {{--</p>--}}
    {{--<p>--}}
    {{--Aenean eget odio eu justo mollis consectetur non quis enim.--}}
    {{--Vivamus interdum quam tortor, et sollicitudin quam pulvinar sit amet.--}}
    {{--Donec facilisis auctor lorem, quis mollis metus dapibus nec. Donec interdum tellus vel mauris vehicula,--}}
    {{--at ultrices ex gravida. Maecenas at elit tincidunt, vulputate augue vitae, vulputate neque.--}}
    {{--Aenean vel quam ligula. Etiam faucibus aliquam odio eget condimentum.--}}
    {{--Cras lobortis, orci nec eleifend ultrices, orci elit pellentesque ex, eu sodales felis urna nec erat.--}}
    {{--Fusce lacus est, congue quis nisi quis, sodales volutpat lorem.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<!-- end tab-pane -->--}}
    {{--</div>--}}
    {{--<!-- end tab-content -->--}}
    {{--</div>--}}








    {{--<div class="row">--}}
    {{--<div class="col-lg-12 col-sm-12 col-xs-12">--}}
    {{--<div class="white-box">--}}
    {{--<!-- Nav tabs -->--}}
    {{--<ul class="nav nav-tabs" role="tablist">--}}
    {{--@foreach($userseedlist as $key => $value)--}}
    {{--<li role="presentation" class="{{ $key == 0 ? 'active' : '' }}">--}}
    {{--<a href="#li-{{$value->variety_id}}" aria-controls="messages"--}}
    {{--role="tab" data-toggle="tab" aria-expanded="false">--}}
    {{--<span class="visible-xs"><i class="ti-email"></i></span>--}}
    {{--<span class="hidden-xs">{{$value->seed_name}}</span>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--@endforeach--}}
    {{--</ul>--}}
    {{--<!-- Tab panes -->--}}

    {{--<div class="tab-content">--}}
    {{--@foreach($userseedlist as $key => $value)--}}
    {{--<div role="tabpanel" class="tab-pane {{ $key == 0 ? 'active' : '' }}"--}}
    {{--id="li-{{$value->variety_id}}">--}}
    {{--<form action="#" method="post" name="{{$value->variety_id}}">--}}
    {{--<input type="hidden" value="{{$value->variety_id}}" name="variety_id" id="xyz">--}}
    {{--{{csrf_field()}}--}}
    {{--<div class="col-md-6">--}}
    {{--<label for="supplier-1">SEED NAME</label>--}}
    {{--@if(isset($value->seed_name))--}}
    {{--{!! Form::text('seed_name', $value->seed_name, ['class' => 'form-control','readonly'=>'readonly']) !!}--}}

    {{--@else--}}
    {{--{!! Form::text('seed_name', $value->seed_name, ['class' => 'form-control','readonly'=>'readonly']) !!}--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--<div class="col-md-6">--}}
    {{--<label for="supplier-1">SUPPLIER</label>--}}
    {{--{!! Form::select('supplier_id',$suppliers ,[$value->supplier_id], ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
    {{--<div class="col-md-6" style="margin-top:20px;">--}}
    {{--<label for="supplier-1">SEED DENSITY</label>--}}
    {{--{!! Form::text('density',(isset($value->density) && $value->density !='' ) ? $value->density : '', ['class' => 'form-control']) !!}--}}

    {{--</div>--}}
    {{--<div class="col-md-6" style="margin-top:20px;">--}}
    {{--<label for="supplier-1">MEASUREMENT</label>--}}
    {{--{!! Form::select('measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILOS'=>'KILOS'] ,(isset($value->measurement) && $value->measurement != '' ) ? $value->measurement : '', ['class' => 'form-control']) !!}--}}
    {{--</div>--}}

    {{--<div class="col-md-6" style="margin-top:20px;">--}}
    {{--<label for="supplier-1">TRAY SIZE</label>--}}
    {{--{!! Form::select('tray_size',['10 X 20'=>'10 X 20','5 X 5'=>'5 X 5','18 X 26'=>'18 X 26'] ,(isset($value->tray_size) && $value->tray_size != '' ) ? $value->tray_size : '', ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
    {{--<div class="col-md-6" style="margin-top:20px;">--}}
    {{--<label for="supplier-1">SOAK</label>--}}
    {{--<select class="select" name="soak_status">--}}
    {{--@if($value->soak_status=='1')--}}
    {{--<option value="1" selected>YES = 24 hr Max </option>--}}
    {{--<option value="2">NO</option>--}}
    {{--@else--}}
    {{--<option value="1">YES = 24 hr Max </option>--}}
    {{--<option value="2" selected>NO</option>--}}
    {{--@endif--}}
    {{--</select>--}}
    {{--</div>--}}
    {{--<div class="clearfix"></div>--}}
    {{--<div class="col-md-6" style="margin-top:20px;">--}}
    {{--<label for="supplier-1">GERMINATION DAYS</label>--}}
    {{--//TODO fix this--}}
    {{--{!! Form::select('germination',$days,(isset($value->germination) && $value->germination != '' ) ? $value->germination : '', ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
    {{--<div class="col-md-6" style="margin-top:20px;">--}}
    {{--<label for="supplier-1">SITUATION</label>--}}
    {{--{!! Form::select('situation',['IN DARKNESS'=>'IN DARKNESS ','IN LIGHT'=>'IN LIGHT','PLANT ON TOP (SOIL)'=>'PLANT ON TOP (SOIL)','COVER WITH SOIL (SOIL)'=>'COVER WITH SOIL (SOIL)'] ,(isset($value->situation) && $value->situation != '' ) ? $value->situation : '', ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
    {{--<div class="clearfix"></div>--}}
    {{--<div class="col-md-6" style="margin-top:20px;">--}}
    {{--<label for="supplier-1">MEDIUM</label>--}}
    {{--{!! Form::select('medium',['MAT'=>'MAT','SOIL'=>'SOIL'] ,(isset($value->medium) && $value->medium != '' ) ? $value->medium : '', ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
    {{--<div class="col-md-6" style="margin-top:20px;">--}}
    {{--<label for="supplier-1">DAYS TO MATURITY</label>--}}
    {{--{!! Form::select('maturity',$days,(isset($value->maturity) && $value->maturity != '' ) ? $value->maturity: '', ['class' => 'form-control']) !!}--}}
    {{--</div>--}}

    {{--<div class="clearfix"></div>--}}
    {{--<div class="col-md-6" style="margin-top:20px;">--}}
    {{--<label for="supplier-1">YIELD</label>--}}
    {{--{!! Form::text('yield',(isset($value->yield) && $value->yield !='' ) ? $value->yield : '', ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
    {{--<div class="col-md-6" style="margin-top:20px;">--}}
    {{--<label for="supplier-1">MEASUREMENT</label>--}}
    {{--{!! Form::select('seeds_measurement',['OUNCES'=>'OUNCES','GRAMS'=>'GRAMS','ML'=>'ML', 'POUNDS'=>'POUNDS', 'KILO'=>'KILO'] ,(isset($value->seeds_measurement) && $value->seeds_measurement != '' ) ? $value->seeds_measurement : '', ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
    {{--<div class="clearfix"></div>--}}
    {{--<div class="col-md-12" style="margin-top:20px;">--}}
    {{--<label for="supplier-1">NOTES</label>--}}
    {{--{!! Form::textarea('notes', '' , ['class' => 'form-control','size' => '30x5','placeholder'=>'Add notes']) !!}--}}
    {{--</div>--}}
    {{--<div class="clearfix"></div>--}}
    {{--<div class="col-md-12" style="margin-top:20px;">--}}
    {{--<button class="btn btn-block btn-success pull-left">UPDATE</button>--}}
    {{--</div>--}}
    {{--@if($notes != null)--}}
    {{--@foreach($notes as $note)--}}
    {{--@if($note->seed_id == $value->variety_id)--}}
    {{--<label for="supplier-1">NOTES</label>--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="comment">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<p class="p-small"><small>{{ $note->created_at }} </small></p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="border-div">--}}
    {{--<p> {{ ((isset($note->notes) && $note->notes != '' ) ? $note->notes : '') }}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@endif--}}
    {{--@endforeach--}}
    {{--@endif--}}
    {{--</form>--}}
    {{--<div class="clearfix"></div>--}}
    {{--</div>--}}

    {{--@endforeach--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}





@endsection