<section>
	<div class="text-center px-2 row m-0">
		@foreach ($projects as $projectSingle)
			<div class="col-4 mt-3">
				<div class="card p-0 h-100">
					<div class="row g-0 m-0">
						<div class="col-12">
							<img src="{{ $projectSingle->img_preview }}" class="w-50 rounded-start" alt="immagine-progetto">
						</div>
						<h5 class="card-title py-3"><b>Titolo Progetto:</b> {{ $projectSingle->title }}</h5>
						<p class="m-0"><b>Descrizione:</b> {{ $projectSingle->description }} </p>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</section>
