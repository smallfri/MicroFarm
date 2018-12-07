<div class="ui-block">
    <h3 class="ui-block-heading">Bootstrap Tour</h3>
    <a target="_blank" href="http://bootstraptour.com" class="ui-block-description">http://bootstraptour.com</a>

    <samp class="cui-example-code-static">
        &lt;link rel="stylesheet" href="&#123;&#123; mix('/vendor/libs/bootstrap-tour/bootstrap-tour.css') &#125;&#125;"&gt;
        &lt;script src="&#123;&#123; mix('/vendor/libs/bootstrap-tour/bootstrap-tour.js') &#125;&#125;"&gt;&lt;/script&gt;
    </samp>

    <h4 class="ui-block-heading">Examples</h4>

    <div class="cui-example">
        <div class="row">
            <div class="col-sm-4" id="tour-1">
                <p>Lorem ipsum dolor sit amet, nam ut odio essent indoctum, an graecis detracto intellegat cum.</p>
            </div>
            <div class="col-sm-4">
                <p>Duo te aperiri accommodare voluptatibus.</p>
            </div>
            <div class="col-sm-4" id="tour-2">
                <p>Eam unum facilis accusata no, facer libris pro ei, vim verterem mandamus intellegam cu.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6" id="tour-3">
                <p>Qui nobis docendi ut.</p>
            </div>
            <div class="col-sm-6">
                <p>Ad sea illud quidam oblique, nec ipsum discere intellegebat an.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <p>Quem natum constituam mei ut, et vim graeco aliquam periculis.</p>
            </div>
            <div class="col-sm-3" id="tour-5">
                <p>Vix eu tritani mentitum.</p>
            </div>
            <div class="col-sm-3">
                <p>Diam iracundia definitiones ea eam.</p>
            </div>
            <div class="col-sm-3" id="tour-4">
                <p>Mel nonumes adolescens an, at duo modus partiendo maiestatis, sed integre honestatis cu.</p>
            </div>
        </div>

        <button class="btn btn-default" id="bs-tour-example">Start tour</button>

        <!-- Javascript -->
        <script>
            $(function() {
                var tour = new Tour({
                    backdrop: true,
                    steps: [
                        {
                            element: "#tour-1",
                            title: "Title of first step",
                            content: "Content of first step",
                            smartPlacement: true
                        },
                        {
                            element: "#tour-2",
                            title: "Title of second step",
                            content: "Content of second step",
                            smartPlacement: true
                        },
                        {
                            element: "#tour-3",
                            title: "Title of third step",
                            content: "Content of third step",
                            smartPlacement: true
                        },
                        {
                            element: "#tour-4",
                            title: "Title of fourth step",
                            content: "Content of fourth step",
                            smartPlacement: true
                        },
                        {
                            element: "#tour-5",
                            title: "Title of fifth step",
                            content: "Content of fifth step",
                            smartPlacement: true
                        }
                    ]
                });
                // Initialize the tour
                tour.init();

                $('#bs-tour-example').click(function() {
                    tour.restart();
                });
            });
        </script>
        <!-- / Javascript -->
    </div>
</div>
