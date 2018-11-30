@extends('layouts.user-backend')

@section('title','Profile')
@section('content')
    <!-- Form horizontal -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">View Profile</h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
				</ul>
			</div>
		</div>

		<div class="panel-body">
			
			<div class="col-md-6">
					<div class="form-group">
						<label for="first-name">Name: {{$user->name}}</label>
					</div>					
					<div class="form-group">
						<label for="last-name">Email: {{$user->email}}</label>
						
					</div>
									
			</div>
		</div>
	</div>
					
@endsection


@push('js')
<script>
    </script>
@endpush