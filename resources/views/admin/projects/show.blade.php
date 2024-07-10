@extends('layouts.app')

@section('content')
	<div class="col-4 mt-3 m-auto">
		<div class="card p-0 h-100">
			<div class="col-4">
				<img src="{{ $projects->img_preview }}" class="w-100 rounded-start" alt="immagine-progetto">
			</div>
			<div class="row g-0 m-0">
				<div class="col-md-8">
					<div class="card-body">
						<p class="card-text"><b>Titolo Progetto:</b> {{ $projects->title }}</p>
						<p class="card-text"><b>Descrizione Progetto:</b> {{ $projects->description }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
