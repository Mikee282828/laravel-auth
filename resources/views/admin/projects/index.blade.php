@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="m-0 p-2 text-center text-primary">Questi sono i miei Progetti</h1>
        {{ $projects->links('pagination::bootstrap-5') }}
        <section>
            <div class="text-center px-2 row m-0">
                @foreach ($projects as $projectSingle)
                    <div class="col-4 mt-3">
                        <div class="card p-0 h-100">
                            <div class="row g-0 m-0">
                                <div class="col-12">
                                    @if (Str::startsWith($projectSingle->img_preview, 'http'))
                                        <div class="w-100">
                                            <img src="{{ $projectSingle->img_preview }}" alt="" class="w-100">
                                        </div>
                                    @else
                                        <div class="w-100">
                                            <img src="{{ asset('storage/' . $projectSingle->img_preview) }}" alt="" class="w-100">
                                        </div>
                                    @endif
                                </div>
                                <h5 class="card-title"><b>Titolo Progetto:</b> {{ $projectSingle->title }}</h5>
                            </div>
                            <a href="{{ route('admin.projects.show', $projectSingle->id) }}"
                                class="btn btn-outline-primary my-3">Dettagli
                                Progetto</a>
                            <a href="{{ route('admin.projects.edit', $projectSingle->id) }}"
                                class="btn btn-outline-primary my-3">Modifica
                                Progetto</a>
                            {{-- CREO FORM PER CANCELLARE UN FUMETTO DAL DATABASE GLI DO LA ROTTA DESTROY E IL METODO POST POI SOTTO LO CAMBIO NEL METODO DELETE --}}
                            <form method="POST" action="{{ route('admin.projects.destroy', $projectSingle->id) }}">
                                @csrf

                                @method('DELETE')
                                <button type="submit" href="" class="btn btn-outline-danger my-3">Elimina
                                    Progetto</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
