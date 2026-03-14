@extends('layouts.app')

@section('content')
<div class="containerCreate">

    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    
    <h1>Crear nova tasca</h1>

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

    <form action="{{ route('tasques.store') }}" method="POST">
        @csrf

        {{-- Títol --}}
        <div class="mb-3">
            <label for="titol" class="form-label">Títol</label>
            <input type="text" name="titol" id="titol" class="form-control" value="{{ old('titol') }}" required>
        </div>

        {{-- Descripció --}}
        <div class="mb-3">
            <label for="descripcio" class="form-label">Descripció</label>
            <textarea name="descripcio" id="descripcio" class="form-control" rows="3">{{ old('descripcio') }}</textarea>
        </div>

        {{-- Prioritat --}}
        <div class="mb-3">
            <label for="prioritat" class="form-label">Prioritat</label>
            <select name="prioritat" id="prioritat" class="form-select">
                <option value="baixa">Baixa</option>
                <option value="mitjana">Mitjana</option>
                <option value="alta">Alta</option>
            </select>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="stat" class="form-label">Estat</label>
            <select name="stat" id="stat" class="form-select">
                <option value="pendent">Pendent</option>
                <option value="en_curs">En curs</option>
                <option value="completada">Completada</option>
            </select>
        </div>

        {{-- Categoria --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select name="category_id" id="category_id" class="form-select">
                @foreach ($categories as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btnSave">Guardar tasca</button>
    </form>

</div>
@endsection
