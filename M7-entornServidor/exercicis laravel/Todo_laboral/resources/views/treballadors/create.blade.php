@extends('layouts.app')

@section('content')
<div class="containerCreate">
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <h1>Afegir nou treballador</h1>

    {{-- Mostrar errors de validació --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('treballadors.store') }}" method="POST">
        @csrf

        {{-- DNI --}}
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" name="dni" id="dni" class="form-control" value="{{ old('dni') }}" required>
        </div>

        {{-- Nom --}}
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
        </div>

        {{-- Cognoms1 --}}
        <div class="mb-3">
            <label for="cognoms1" class="form-label">Primer cognom</label>
            <input type="text" name="cognoms1" id="cognoms1" class="form-control" value="{{ old('cognoms1') }}" required>
        </div>
        {{-- Cognoms2 --}}
        <div class="mb-3">
            <label for="cognoms2" class="form-label">Segon cognom</label>
            <input type="text" name="cognoms2" id="cognoms2" class="form-control" value="{{ old('cognoms2') }}" required>
        </div>

        {{-- Correu electrònic --}}
        <div class="mb-3">
            <label for="correu" class="form-label">Correu electrònic</label>
            <input type="text" name="correu" id="correu" class="form-control" value="{{ old('correu') }}" required>
        </div>

        {{-- Telèfon --}}
        <div class="mb-3">
            <label for="telefon" class="form-label">Telèfon</label>
            <input type="text" name="telefon" id="telefon" class="form-control" value="{{ old('telefon') }}" required>
        </div>

        {{-- Tasques --}}
        <div class="mb-3">
            <label for="tasques" class="form-label">Tasques</label>
            <select name="tasques[]" id="tasques" class="form-select" multiple>
                @foreach ($tasques as $tasca)
                    <option value="{{ $tasca->id }}">{{ $tasca->titol }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btnCreate">Crear treballador</button>
</div>
@endsection
