
        <div class="field-group {{ $errors->has('name') ? ' has-error' : ''}}">           
                    {!! Form::text('name', null, ['placeholder' => 'Name','class'=>'input-field']) !!} {!! $errors->first('name', '
                    <p class="help-block">:message</p>') !!}
        </div> 
        <div class="field-group {{ $errors->has('email') ? ' has-error' : ''}}">           
                    {!! Form::email('email', null, ['placeholder' => 'Email','class'=>'input-field']) !!} {!! $errors->first('email', '
                    <p class="help-block">:message</p>') !!}
        </div>
        <div class="field-group {{ $errors->has('phone') ? ' has-error' : ''}}">           
                    <input type="text" class="input-field" value="" id="phone" name="phone" placeholder="Phone" onkeypress="return isNumber(event)" />
                     {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
        </div>
        
        <div class="field-group {{ $errors->has('subject') ? ' has-error' : ''}}">           
                    {!! Form::text('subject', null, ['placeholder' => 'Subject','class'=>'input-field']) !!} {!! $errors->first('subject', '
                    <p class="help-block">:message</p>') !!}
        </div>
        <div class="field-group">           
                    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'contact-btn']) !!}
        </div>
   
     <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
            

    </script>        