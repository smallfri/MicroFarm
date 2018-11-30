@extends('layouts.user-backend')

@section('title','Change Password')
@section('content')
    <!-- Form horizontal -->
	<div class="panel panel-flat">
		<div class="panel-heading">
							<h5 class="panel-title">CHANGE PASSWORD</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                	</ul>
		                	</div>
						</div>

		<div class="panel-body">
		@if ($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif	
			<div class="col-md-6">
				 {!! Form::open([
                        'method' => 'PATCH',
                        'class' => 'form-horizontal'
                    ]) !!}

					<div class="form-group">
						<label for="current_password">Current Password:</label>
						{!! Form::password('current_password', ['class' => 'form-control']) !!}
						{!! $errors->first('current_password', '<p class="help-block">:message</p>') !!}
					</div>					
					<div class="form-group">
						<label for="password">New password:</label>
						{!! Form::password('password', ['class' => 'form-control']) !!}
						{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
					</div>
                    <div class="form-group">
						<label for="password_confirmation">Confirm new password:</label>
						{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
						{!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-1 pull-left"><div class="ladda-progress">Change Password</div></button>
					</div>				
			</div>
		</div>
	</div>
					
@endsection


@push('js')
<script>
    </script>
@endpush