@extends('layouts.backend') 
@section('title','Contact Us') 
@section('pageTitle','Contact Us') 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box bordered-box blue-border">
            <div class="box-header blue-background">
                <div class="title">
                    <i class="icon-circle-blank"></i> Contact Us
                </div>
            </div>
            <div class="box-content ">
                    <div class="row">
                            {!! Form::open(['method' => 'GET', 'url' => '/admin/contact', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                            {!! Form::close() !!}
                    </div>
                    <div class="table-responsive" >
                        <table class="table table-borderless" id="contact-table">
                            <thead>
                                <tr>
                                   
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Actions</th>
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
var url ="{{ url('/admin/contact/') }}";

        
        datatable = $('#contact-table').DataTable({
            processing: true,
            serverSide: true,
             ajax: {
                    url: '{!! route('contactData') !!}',//"{{ url('admin/tickets/datatable') }}", // json datasource
                    type: "get", // method , by default get
                    
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
                    { data: 'email',email:'contact.email',"searchable" : false, "orderable":false},
                     { data: 'phone',name:'contact.phone',"searchable" : false, "orderable":false},
                              
                     
					{ 
                        "data": null,
                        "searchable": false,
                        "orderable": false,
                        "render": function (o) {
                            var d="";var g="";
                        

                            d = "<a href='javascript:void(0);' class='btn btn-primary btn-xs'  ><button class='btn btn-danger btn-xs del-item' data-id="+o.id+"><i class='fa fa-trash-o' aria-hidden='true'></i> Delete</button></a>&nbsp;";
                              
                            g =  "<a href='"+url+"/"+o.id+"' data-id="+o.id+"><button class='btn btn-info btn-xs'><i class='fa fa-eye' aria-hidden='true'></i> View</button></a>&nbsp;";   
 
                            
                            return d+g;
                        }
                    }
                    
                ]
        });
    
    $(document).on('click', '.del-item', function (e) {
        var id = $(this).attr('data-id');
		
		var url ="{{ url('/admin/contact/') }}";
        url = url + "/" + id;
        
        var r = confirm("Are you sure you want to delete Contact ?");
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
