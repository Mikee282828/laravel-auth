@extends('layouts.app')

@section('content')
	<div class="col-4 mt-3 m-auto">
		<div class="card p-0 h-100">
			<div class="row g-0 m-0">
				<div class="col-12">
					<div class="card-body">
						<p class="card-text"><b>Nome Tipo:</b> {{ $type->name }}</p>
						<p class="card-text"><b>Descrizione Tipo:</b> {{ $type->description }}</p>
						<p class="card-text"><b>Icona Tipo:</b> <i class='{{ $type->icon }}'></i></p>
						<a href="{{route('admin.types.index')}}">Ritorna alla lista</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
