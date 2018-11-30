@extends('layouts.user-backend')

@section('title','Profile')
@section('content')
    <!-- Form horizontal -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Edit Profile</h5>
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
				{!! Form::model($user,[
					'method' => 'POST',
					'class' => 'form-horizontal',
					'files'=>true
				]) !!}

					<div class="form-group">
						<label for="first-name">Name:</label>
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
						{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
					</div>					
					<div class="form-group">
						<label for="last-name">Email:</label>
						{!! Form::email('email', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
						{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-1 pull-left"><div class	="ladda-progress">Update</div></button>
					</div>				
			</div>
		</div>
	</div>
					
@endsection


@push('js')
<script>
    </script>
@endpush