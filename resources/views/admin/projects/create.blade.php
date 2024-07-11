@extends('layouts.app')

@section('content')
	<div class="container">
		<h1 class="text-center py-2">Crea Nuovo Progetto</h1>

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


		<form method="POST" action="{{ route('admin.projects.store') }}">
			@csrf

			<div class="mb-3">
				<label for="title" class="form-label">Titolo Nuovo Progetto</label>
				<input type="text" class="form-control" name="title" value="{{ old('title') }}">
				@error('title')
					<div class="form-text text-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3">
				<label for="description" class="form-label">Descrizione Nuovo Progetto</label>
				<input type="text" class="form-control" name="description" value="{{ old('description') }}">
				@error('description')
					<div class="form-text text-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-3">
				<label for="img_preview" class="form-label">URL Immagine Nuovo Progetto</label>
				<input type="text" class="form-control" name="img_preview" value="{{ old('img_preview') }}">
				@error('img_preview')
					<div class="form-text text-danger">The Link Preview field is required.</div>
				@enderror
			</div>

			<button type="submit" class="btn btn-outline-primary">Invia Nuovo Progetto</button>
		</form>
	</div>
@endsection
