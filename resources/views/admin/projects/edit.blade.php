@extends('layouts.app')

@section('content')
    <h1 class="py-2 m-0 text-danger text-center">Modifica Progetto</h1>
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

        <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
            @method('PUT')

            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Modifica Titolo Progetto</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Modifica Descrizione Progetto</label>
                <input type="text" class="form-control" name="description"
                    value="{{ old('description', $project->description) }}">
                @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="img_preview" class="form-label">Modifica Immagine Progetto</label>
                <input type="file" class="form-control" name="img_preview">

                @error('img_preview')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">

                <label for="type_id" class="form-label">Tipo Nuovo Progetto</label>

                <select name="type_id">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if ($type->id == $project->type_id) selected @endif>
                            {{ $type->name }}</option>
                    @endforeach
                </select>

                @error('type_id')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                @foreach ($languages as $language)
                    <label for="language_id[]" class="form-label">{{ $language->name }}</label>
                    <input type="checkbox" name="language_id[]" value="{{ $language->id }}" 
                    {{-- @foreach ($setLanguages as $settedLanguage)
							@if ($language->id == $settedLanguage->language_id)
								checked
							@endif 
						@endforeach --}}
                        @foreach ($project->languages as $setlanguage)
							@if ($language->id == $setlanguage->id)
								checked
							@endif 
                        @endforeach>
                @endforeach
            </div>

            <button type="submit" class="btn btn-outline-danger">Modifica Progetto</button>

        </form>
    </div>
@endsection
