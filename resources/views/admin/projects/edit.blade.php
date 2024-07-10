@extends('layouts.app')

@section('content')
	<h1 class="bg-warning p-2 m-0">Questo è l'edit</h1>
	<div class="container">

		{{-- MESSAGGIO DI ERRORE SE NON SI COMPLETANO I CAMPI CHE SONO OBBLIGATORI --}}
		<div>
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>

		<form method="POST" action="{{ route('admin.projects.update') }}">
			@method('PUT')
			@csrf
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
				@error('email')
					<div>{{ $message }}</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword1">
				@error('password')
					<div>{{ $message }}</div>
				@enderror
			</div>
			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Check me out</label>
				@error('password')
					<div>{{ $message }}</div>
				@enderror
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection
