<?php
$userSeeds = array();
foreach ($userseedlist as $userseeds)
    $userSeeds[] = $userseeds->variety_id;
?>

<div class="card mb-3">

    <div class="panel-body">
        <div class="input-group" id="divinput">
            <div class="form-group row m-b-15">
                <label class="col-form-label col-md-6">Supplier</label>
                <div class="col-md-9">
                    {!!Form::select('supplier',$supplier,'null',array('class'=>'form-control','id'=>'supplier'))!!}
                </div>
                <div class="col-md-3">
                    <button type="submit" form="formSeed" class="btn btn-green">SUBMIT</button>

                </div>
            </div>

        </div>
        <div id="div1">
            <div id="seedlist2">


            </div>
        </div>
        <div id="div2">
            <div id="seedlist">
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="count" value="<?php echo $count;?>">
<?php
$userSeeds = '[' . implode(', ', $userSeeds) . ']';
?>
<script type="text/javascript">
    var userSeeds = <?php echo $userSeeds ?>;
    $('#supplier').change(function () {
        var supplierID = $(this).val();

        if (supplierID == 0) {
            $("#seedlist").empty();
            $("#seedlist2").empty();
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
                                } else {
                                    finalCount = count;
                                }
                                if (i >= finalCount / 2) {

                                    $("#seedlist").append('<div class="checkbox checkbox-css"><input type="checkbox" name="variety_id[]" value="' + value.id + '" ' + check + ' id="cssCheckbox'+i+'"/><label for="cssCheckbox'+i+'">' + value.name + ' ' + value.vname + '</label></div>');
                                } else {
                                    $("#seedlist2").append('<div class="checkbox checkbox-css"><input type="checkbox" name="variety_id[]" value="' + value.id + '" ' + check + ' id="cssCheckbox'+i+'"/><label for="cssCheckbox'+i+'">' + value.name + ' ' + value.vname + '</label></div>');
                                }
                                $("#submit-two").show();

                                i++;

                            }
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

