<div class="ui-block">
    <h3 class="ui-block-heading">Bootstrap Maxlength</h3>
    <a target="_blank" href="https://github.com/mimo84/bootstrap-maxlength" class="ui-block-description">https://github.com/mimo84/bootstrap-maxlength</a>

    <samp class="cui-example-code-static">
        &lt;link rel="stylesheet" href="&#123;&#123; mix('/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css') &#125;&#125;"&gt;
        &lt;script src="&#123;&#123; mix('/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js') &#125;&#125;"&gt;&lt;/script&gt;
    </samp>

    <h4 class="ui-block-heading">Examples</h4>

    <div class="cui-example cui-example-vertical-spacing">
        <input type="text" class="form-control bootstrap-maxlength-example" maxlength="25">

        <textarea class="form-control bootstrap-maxlength-example" rows="3" maxlength="255"></textarea>

        <!-- Javascript -->
        <script>
            $(function() {
                $('.bootstrap-maxlength-example').each(function() {
                    $(this).maxlength({
                        warningClass: 'label label-success',
                        limitReachedClass: 'label label-danger',
                        separator: ' out of ',
                        preText: 'You typed ',
                        postText: ' chars available.',
                        validate: true,
                        threshold: +this.getAttribute('maxlength')
                    });
                });
            });
        </script>
        <!-- / Javascript -->
    </div>
</div>
