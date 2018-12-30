<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"
        type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"
        type="text/javascript"></script>
<link href="https://uxpowered.com/products/appwork/v121/assets_/vendor/libs/datatables/datatables.css" rel="stylesheet"/>

    <div class="card">
        <h6 class="card-header">
            Metrics
        </h6>
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered" id="metrics-table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($locations as $key => $value)
                    <tr>
                        @csrf
                        <td>{{$value->name}}</td>

                    </tr>
                @endforeach
                </tbody>
                <script type="application/javascript">
                    $(document).ready(function() {
                        $('#metrics-table').DataTable();
                    } );
                </script>
            </table>
        </div>
    </div>