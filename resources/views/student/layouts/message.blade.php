@if(count($errors->all()) > 0)
	<div class="alert alert-danger" role="alert">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif



@if(session()->has('success'))
	<div class="alert alert-success" role="alert">
		{{ session('success') }}
	</div>
@endif

@if(session()->has('error'))
	<div class="alert alert-danger" role="alert">
		{{ session('error') }}
	</div>
@endif

