<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Name: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(isset($role) && $role->name != '')
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required','readonly'=>true]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        @else
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        @endif
        
    </div>
</div>
<div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
    {!! Form::label('label', 'Label: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('label', null, ['class' => 'form-control']) !!}
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('icon') ? ' has-error' : ''}}">
    {!! Form::label('icon', 'Icon: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('icon', null, ['class' => 'form-control']) !!}
        {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
    {!! Form::label('label', 'Permissions: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">

        <ul>

            @foreach($permissions as $permission)

                <li>
                    <div class="checkbox">
                        <label class=""><input type="checkbox" name="permissions[]" class="parent"
                                               data-parent="{!! $permission->id !!}"
                                               value="{{ $permission->name }}" {!! isset($isChecked)?$isChecked($permission->name):"" !!} ><span
                                    class="text-danger">{{ $permission->label }}</span>
                            [ {{$permission->name}} ]
                        </label>
                    </div>
                    <ul class="child">
                        @foreach($permission->child as $perm)
                            <li>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="permissions[]"
                                                  class="child-{!! $perm->parent_id !!}"
                                                  {!! isset($isChecked)?$isChecked($perm->name):"" !!}
                                                  value="{{ $perm->name }}"><span
                                                class="text-info ">{{ $perm->label }}</span> [ {{$perm->name}} ]
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </li>

            @endforeach
        </ul>


        {{--<select class="permissions form-control" id="permissions" name="permissions[]"--}}
        {{--multiple="multiple">--}}
        {{--@foreach($permissions as $permission)--}}
        {{--<option value="{{ $permission->name }}">{{ $permission->label }}</option>--}}
        {{--@endforeach()--}}
        {{--</select>--}}
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>


@push('js')


    <script>

        $(document).ready(function () {

            $('.parent').change(function (e) {

                var $this = $(this),
                    parent = $this.data('parent'),
                    child = $('.child-' + parent);

                if ($this.is(':checked')) {
                    child.prop('checked', true);
                } else {
                    child.prop('checked', false);
                }
                e.preventDefault();
            });


        });

    </script>

@endpush