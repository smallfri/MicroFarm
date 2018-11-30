@extends('layouts.backend')

@section('title','Roles')

@section('pageTitle','Role Management')


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Roles</div>
                <div class="panel-body">

                    <div class="row">


                        <div class="col-md-6">

                            @if(Auth::user()->can('access.role.create'))
                                <a href="{{ url('/admin/roles/create') }}" class="btn btn-success btn-sm"
                                   title="Add New Role">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            @endif
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-borderless" id="role-table">
                            <thead>
                            <tr>
                                <th data-priority="1">ID</th>
                                <th data-priority="2">Name</th>
                                <th data-priority="3">Label</th>
                                <th data-priority="4">Icon</th>
                                <th data-priority="5">Actions</th>
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
var url ="{{ url('/admin/roles/') }}";
var img = "{{asset('/images/')}}";
        var edit = "<?php echo Auth::user()->can('access.roles.edit'); ?>";
        var Discountdelete = "<?php echo Auth::user()->can('access.roles.delete'); ?>";
        
        datatable = $('#role-table').DataTable({
            processing: true,
            server: true,
             ajax: '{!! route('RoleControllerRolesData') !!}',
                columns: [
                    { data: 'id', name: 'Id',"searchable": false },
                    { data: 'name', name: 'name' },
                    { data: 'label', name: 'label' },
                    { 
                        "data": null,
                        "name": 'icon',
                        "orderable": false,
                        "render": function(o){
                            var image = o.icon;
                            if(image){
                                return '<img src="'+img+'/'+image+'" width="50" height="50"></td>';
                            }
                            else{
                                image = img+'/avatar.jpg';
                                return '<img src="'+image+'" width="50" height="50"></td>';
                            }
                        }
                    } ,
                    { 
                        "data": null,
                        "searchable": false,
                        "orderable": false,
                        "render": function (o) {
                            var e="";var d="";
                                e= "<a href='"+url+"/"+o.id+"/edit' data-id="+o.id+"><button class='btn btn-primary btn-xs'><i class='fa fa-pencil-square-o' aria-hidden='true'></i>Edit</button></a>&nbsp;";
                                d = "<a href='javascript:void(0);' class='del-item' data-id="+o.id+" ><button class='btn btn-danger btn-xs'><i class='fa fa-trash-o' aria-hidden='true'></i>Delete</button></a>&nbsp;";
                            var v =  "<a href='"+url+"/"+o.id+"' data-id="+o.id+"><button class='btn btn-info btn-xs'><i class='fa fa-eye' aria-hidden='true'></i>View</button></a>&nbsp;";
                            if(o.id == 1){
                                return e;
                            }else{
                                return v+e+d;
                            }
                        }
                    }
                ]
            });
    
    $(document).on('click', '.del-item', function (e) {
        var id = $(this).attr('data-id');
        url = url + "/" + id;
        var r = confirm("Are you sure you want to delete this Role ?");
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


