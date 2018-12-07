<div class="ui-block">
    <h3 class="ui-block-heading">Bootstrap SweetAlert</h3>
    <a target="_blank" href="https://github.com/lipis/bootstrap-sweetalert" class="ui-block-description">https://github.com/lipis/bootstrap-sweetalert</a>

    <samp class="cui-example-code-static">
        &lt;link rel="stylesheet" href="&#123;&#123; mix('/vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.css') &#125;&#125;"&gt;
        &lt;script src="&#123;&#123; mix('/vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.js') &#125;&#125;"&gt;&lt;/script&gt;
    </samp>

    <h4 class="ui-block-heading">Examples</h4>

    <div class="cui-example cui-example-inline-spacing">
        <button class="btn btn-lg btn-default" id="sweetalert-example-1">Basic</button>
        <button class="btn btn-lg btn-default" id="sweetalert-example-2">Full</button>
        <button class="btn btn-lg btn-default" id="sweetalert-example-3">With loader</button>
        <button class="btn btn-lg btn-info" id="sweetalert-example-4">Info</button>
        <button class="btn btn-lg btn-success" id="sweetalert-example-5">Success</button>
        <button class="btn btn-lg btn-warning" id="sweetalert-example-6">Warning</button>
        <button class="btn btn-lg btn-danger" id="sweetalert-example-7">Danger</button>

        <!-- Javascript -->
        <script>
            $(function() {
                $('#sweetalert-example-1').click(function(){
                    swal("Here's a message!", "It's pretty, isn't it?")
                });

                $('#sweetalert-example-2').click(function(){
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel plx!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        } else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
                });

                $('#sweetalert-example-3').click(function(){
                    swal({
                        title: "Ajax request example",
                        text: "Submit to run ajax request",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }, function () {
                        setTimeout(function () {
                            swal("Ajax request finished!");
                        }, 2000);
                    });
                });

                $('#sweetalert-example-4').click(function(){
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-info',
                        confirmButtonText: 'Info!'
                    });
                });

                $('#sweetalert-example-5').click(function(){
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'Success!'
                    });
                });

                $('#sweetalert-example-6').click(function(){
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-warning',
                        confirmButtonText: 'Warning!'
                    });
                });

                $('#sweetalert-example-7').click(function(){
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "error",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-danger',
                        confirmButtonText: 'Danger!'
                    });
                });
            });
        </script>
        <!-- / Javascript -->
    </div>
</div>
