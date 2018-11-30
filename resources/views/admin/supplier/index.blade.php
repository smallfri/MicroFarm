@extends('layouts.backend')

@section('title',trans('supplier.suppliers'))
@section('pageTitle',trans('supplier.suppliers'))

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="box bordered-box blue-border">
                <div class="box-header blue-background">
                    <div class="title">
                        <i class="icon-circle-blank"></i>
                            @lang('supplier.suppliers')
                    </div>

                </div>
                <div class="box-content ">
                    <div class="row">
                        <div class="col-md-6">
                               
                        </div>

                        <div class="col-md-6">
                            {!! Form::open(['method' => 'GET', 'url' => '/admin/supplier', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                            
                            
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless" id="supplier-table">
                            <thead>
                            <tr>                        
                                <th data-priority="3">@lang('supplier.name')</th>                                                
                                <th data-priority="8">@lang('supplier.actions')</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-head')
<script>
var url ="{{ url('/admin/supplier/') }}";
var goalurl="{{ url('/admin/supplier') }}";
var img_path = "{{asset('images')}}";

     
        var edit = "<?php echo Auth::user()->can('access.user.edit'); ?>";
        var Userdelete = "<?php echo Auth::user()->can('access.user.delete'); ?>";
        
        datatable = $('#supplier-table').DataTable({
            processing: true,
            serverSide: true,
             ajax: {
                    url: '{!! route('SuppliersData') !!}',//"{{ url('admin/tickets/datatable') }}", // json datasource
                    type: "get", // method , by default get
                    data: function (d) {
                        
                    }
                },
                columns: [
                    { 
                        "data" : null, 
                        "searchable" : false,
                        "orderable":false,
                        render : function(o){
                          return o.name;  
                        }
                    },
                   
                              
                     
					{ 
                        "data": null,
                        "searchable": false,
                        "orderable": false,
                        "render": function (o) {
                            var e="";var d="";var g="";
                           
                            e= "<a href='"+url+"/"+o.id+"/edit' data-id="+o.id+"><button class='btn btn-primary btn-xs'><i class='fa fa-pencil-square-o' aria-hidden='true'></i>edit</button></a>&nbsp;";

                            d = "<a href='javascript:void(0);' class='btn btn-primary btn-xs'  ><button class='btn btn-danger btn-xs del-item' data-id="+o.id+"><i class='fa fa-trash-o' aria-hidden='true'></i> Delete</button></a>&nbsp;";
                              
                            g =  "<a href='"+url+"/"+o.id+"' data-id="+o.id+"><button class='btn btn-info btn-xs'><i class='fa fa-eye' aria-hidden='true'></i> @lang('user.view')</button></a>&nbsp;";   
 
                            
                            return d+g+e;
                        }
                    }
                    
                ]
        });
    $('#filter_role').change(function() {
        datatable.draw();
    });
    $('#filter_status').change(function() {
        datatable.draw();
    });
    $(document).on('click', '.del-item', function (e) {
        var id = $(this).attr('data-id');
		
		var url ="{{ url('/admin/supplier/') }}";
        url = url + "/" + id;
        
        var r = confirm("Are you sure you want to delete Supplier ?");
        if (r == true) {
            $.ajax({
                type: "delete",
                url: url ,
                headers: {
                    "X-CSRF-TOKEN": "<?php echo csrf_token();?>"
                },
                success: function (data) {
                    datatable.draw();
                    toastr.success('Action Success!', data.message)
                },
                error: function (xhr, status, error) {
                    var erro = ajaxError(xhr, status, error);
                    toastr.error('Action Not Procede!',erro)
                }
            });
        }
    });

</script>
@endpush
