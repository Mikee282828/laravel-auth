@extends('layouts.app')

@section('content')
    <h1 class="py-2 m-0 text-danger text-center">Modifica Tipo</h1>
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

        <form method="POST" action="{{ route('admin.types.update', $type->id) }}">
            @method('PUT')

            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Modifica Nome Tipo</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $type->name) }}">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Modifica Descrizione Tipo</label>
                <input type="text" class="form-control" name="description"
                    value="{{ old('description', $type->description) }}">
                @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="icon" class="form-label">Modifica Icona Tipo</label>
                <input type="text" class="form-control" name="icon"
                    value="{{ old('title', $type->icon) }}">
                @error('icon')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-danger">Modifica Tipo</button>

        </form>
    </div>
@endsection
