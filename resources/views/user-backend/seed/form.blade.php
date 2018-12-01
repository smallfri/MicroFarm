<?php
$userSeeds = array();
foreach ($userseedlist as $userseeds)
    $userSeeds[] = $userseeds->variety_id;
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <h3><a href="{{url('/dashboard')}}">Dashboard</a> / Seed Selection</h3>
                {!! Form::label('supplier', 'Supplier Name', ['class' => 'col-md-1 control-label']) !!}

                <div class="col-md-4">
                    {!!Form::select('supplier',$supplier,'null',array('class'=>'form-control selectTag','id'=>'supplier'))!!}
                </div><div class="supplier-btn"></div>
                <div class="clearfix"></div>
                <div class="tab-content">
                    <div class="tab-pane active" id="solid-justified-tab1-1">
                        <div id="dvLoading" style="display:none"></div>
                        <div class="form-group {{ $errors->has('variety_id') ? 'has-error' : ''}}">
                            <div class="input-group" id="divinput">
                                <div id="div1">
                                    <ul class="icheck-list" id="seedlist">
                                    </ul>
                                </div>
                                <div id="div2">
                                    <ul class="icheck-list" id="seedlist2">
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                                <button type="submit" class="btn btn-success pull-left" id="submit-two"><div class="ladda-progress">Submit</div></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="count" value="<?php echo $count;?>">
<?php
$userSeeds = '[' . implode(', ', $userSeeds) . ']';
?>
@push('script-head')
    <script type="text/javascript">
        var userSeeds = <?php echo $userSeeds ?>;

        $('#supplier').change(function () {
            var supplierID = $(this).val();

            if(supplierID == 0)
            {
                $("#seedlist").empty();
                $("#seedlist").empty();
                $("#submit-two").hide();
                return;
            }


            if (supplierID) {
                $("#supplier").val(supplierID);
                $('#dvLoading').show();
                $("#submit-two").hide();
                $.ajax({
                    type: "GET",
                    url: "{{url('seed/supplierseed')}}/" + supplierID,

                    success: function (res) {
                        var i = 1;

                        if (res) {
                            $('.supplier-btn').empty();

                            $("#seedlist").empty();
                            $("#seedlist2").empty();
                            $("#submit-two").hide();
                            $.each(res.seed, function (key, value) {

                                if (value.name.length > 0) {
                                    exists = (jQuery.inArray(value.id, userSeeds) > -1);

                                    var check = '';

                                    if (exists) {
                                        check = 'checked="checked"';
                                    }


                                    var count = $("#count").val();
                                    var finalCount;
                                    if (count > res.count) {
                                        finalCount = res.count;
                                    }
                                    else {
                                        finalCount = count;
                                    }
                                    if (i >= finalCount / 2) {

                                        $("#seedlist2").append('<li><input type="checkbox" class="check" name="variety_id[]" id="variety_id" value="' + value.id + '" ' + check + '><label for="variety_id">' + value.name + ' ' + value.vname + '</label></li>');
                                    }
                                    else {
                                        $("#seedlist").append('<li><input type="checkbox" class="check" name="variety_id[]" id="variety_id" value="' + value.id + '" ' + check + '><label for="variety_id">' + value.name + ' ' + value.vname + '</label></li>');
                                    }
                                    $("#submit-two").show();

                                    i++;

                                }
                            });

                            $("input[type='checkbox']").iCheck({
                                checkboxClass: 'icheckbox_square-green'
                            });

                            var count = $('input:checkbox').length;
                            if (count === 0) {
                                $("#seedlist").empty();
                                $("#seedlist2").empty();
                                $('.supplier-btn').append('<div class="text-center">No Seeds Found</div>');
                            } else {
                                $('.supplier-btn').append('<div class="text-right"><button type="submit" class="btn btn-success pull-left"><div class="ladda-progress">Submit</div></button></div>');
                            }

                        } else {
                            $("#seedlist").empty();
                            $("#seedlist2").empty();
                            $('.supplier-btn').remove();
                        }
                        $('#dvLoading').hide();
                    }

                });
            } else {
                $("#seedlist").empty();
                $("#seedlist2").empty();
            }
        });
        $('#supplier')
            .trigger('change');


    </script>
@endpush