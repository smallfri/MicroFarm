<!-- / jquery [required] --> 
<script src="{!! asset('assets/javascripts/jquery/jquery.min.js') !!}" type="text/javascript"></script> 
<!-- / jquery mobile (for touch events) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="{!! asset('assets/javascripts/jquery/jquery.mobile.custom.min.js') !!}" type="text/javascript"></script>
<!-- / jquery migrate (for compatibility with new jquery) [required] -->
<script src="{!! asset('assets/javascripts/jquery/jquery-migrate.min.js') !!}" type="text/javascript"></script>
<!-- / jquery ui -->
<script src="{!! asset('assets/javascripts/jquery/jquery-ui.min.js') !!}" type="text/javascript"></script>
<!-- / jQuery UI Touch Punch -->
<script src="{!! asset('assets/javascripts/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js') !!}"
        type="text/javascript"></script>
<!-- / bootstrap [required] -->
<script src="{!! asset('assets/javascripts/bootstrap/bootstrap.js') !!}" type="text/javascript"></script>


<script src="{!! asset('js/bootstrap-datetimepicker.min.js') !!}"
        type="text/javascript"></script>

<script src="{!! asset('assets/javascripts/plugins/select2/select2.js') !!}" type="text/javascript"></script>
<!-- / modernizr -->


<script src="{!! asset('assets/javascripts/plugins/modernizr/modernizr.min.js') !!}" type="text/javascript"></script>
<!-- / retina -->
<script src="{!! asset('assets/javascripts/plugins/retina/retina.js') !!}" type="text/javascript"></script>
<!-- / theme file [required] -->
<script src="{!! asset('assets/javascripts/theme.js') !!}" type="text/javascript"></script>
<!-- / demo file [not required!] -->
<script src="{!! asset('assets/javascripts/demo.js') !!}" type="text/javascript"></script>



{{-- Data Table--}}
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js" ></script>

<script src="{!! asset('assets/javascripts/plugins/validate/jquery.validate.min.js')!!}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>


<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>


<script type="text/javascript">


$(document).ready(function() {

$('.summernote_class_content').summernote({
lang: 'fr-FR',
        height: 300,
        toolbar : [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['link', ['link']],
        //['picture', ['picture']]
        ],
        onImageUpload: function(files, editor, welEditable) {
        for (var i = files.lenght - 1; i >= 0; i--) {
        sendFile(files[i], this);
        }
        }
});
function sendFile(file, el) {
var form_data = new FormData();
form_data.append('file', file);
$.ajax ({
data: form_data,
        type: "POST",
        url: "../up.php",
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
        $(el).summernote('editor.insertImage', url);
        }
})
}

});





        </script>


