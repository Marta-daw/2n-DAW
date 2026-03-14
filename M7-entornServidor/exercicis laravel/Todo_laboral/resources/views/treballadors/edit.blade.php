@extends('layouts.app')

@section('title', 'Editar treballador')

@section('content')
<div class="containerEdit">
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <h1 class="mb-4">Editar treballador</h1>

    {{-- Errors de validació --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('treballadors.update', $treballador->dni) }}" method="POST">
                @csrf
                @method('PUT')
                
                {{-- DNI (no editable) --}}
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" name="dni" id="dni" class="form-control" value="{{ $treballador->dni }}" readonly>
                </div>

                {{-- Nom --}}
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="nom"
                        class="form-control"
                        value="{{ old('nom', $treballador->nom) }}" required>
                </div>

                {{-- Cognoms1 --}}
                <div class="mb-3">
                    <label for="cognoms1" class="form-label">Primer cognom</label>
                    <input type="text" name="cognoms1" id="cognoms1"
                        class="form-control" 
                        value="{{ old('cognoms1', $treballador->cognoms1) }}" required>
                </div>
                {{-- Cognoms2 --}}
                <div class="mb-3">
                    <label for="cognoms2" class="form-label">Segon cognom</label>
                    <input type="text" name="cognoms2" id="cognoms2"
                        class="form-control" value="{{ old('cognoms2', $treballador->cognoms2) }}" required>
                </div>
                
                {{-- Correu electrònic --}}
                <div class="mb-3">
                    <label for="correu" class="form-label">Correu electrònic</label>
                    <input type="etext" name="correu" id="correu"
                        class="form-control" value="{{ old('correu', $treballador->correu) }}" required>
                </div>
                
                {{-- Telèfon --}}
                <div class="mb-3">
                    <label for="telefon" class="form-label">Telèfon</label>
                    <input type="text" name="telefon" id="telefon"
                        class="form-control" value="{{ old('telefon', $treballador->telefon) }}" required>
                </div>

                {{-- Tasques --}}
                <div class="mb-3">
                    <label for="tasques" class="form-label">Tasques</label>
                    <select name="tasques[]" id="tasques" class="form-select" multiple>
                        @foreach ($tasques as $tasca)
                            <option value="{{ $tasca->id }}">
                                {{ old('tasques', $treballador->tasca_id) == $tasca->id ? 'selected' : '' }}
                                {{ $tasca->titol }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btnActualitza">Actualitzar</button>
                <a href="{{ route('treballadors.index') }}" class="link">Cancel·lar</a>
            </form>
        </div>
    </div>
</div>
@endsection
