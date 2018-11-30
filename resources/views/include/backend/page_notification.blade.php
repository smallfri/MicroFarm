@if (Session::has('flash_warning'))

    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">&times;</button>
        {{ Session::get('flash_warning') }}
    </div>
@endif

@if (Session::has('flash_success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">&times;</button>
        {{ Session::get('flash_success') }}
    </div>


@endif

@if (Session::has('flash_error'))
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">&times;</button>
        {{ Session::get('flash_error') }}
    </div>
@endif