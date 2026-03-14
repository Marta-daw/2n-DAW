@extends('layouts.app')

@section('title', 'Editar tasca')

@section('content')
<div class="containerEdit">
    <!-- Order your soul. Reduce your wants. - Augustine -->

    <h1 class="mb-4">Editar tasca</h1>

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

            <form action="{{ route('tasques.update', $tasca->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Títol --}}
                <div class="mb-3">
                    <label for="titol" class="form-label">Títol</label>
                    <input type="text" name="titol" id="titol"
                            class="form-control"
                            value="{{ old('titol', $tasca->titol) }}" required>
                </div>

                {{-- Descripció --}}
                <div class="mb-3">
                    <label for="descripcio" class="form-label">Descripció</label>
                    <textarea name="descripcio" id="descripcio"
                                class="form-control" rows="3">{{ old('descripcio', $tasca->descripcio) }}</textarea>
                </div>

                {{-- Prioritat --}}
                <div class="mb-3">
                    <label for="prioritat" class="form-label">Prioritat</label>
                    <select name="prioritat" id="prioritat" class="form-select" required>
                        <option value="baixa" {{ old('prioritat', $tasca->prioritat) == 'baixa' ? 'selected' : '' }}>Baixa</option>
                        <option value="mitjana" {{ old('prioritat', $tasca->prioritat) == 'mitjana' ? 'selected' : '' }}>Mitjana</option>
                        <option value="alta" {{ old('prioritat', $tasca->prioritat) == 'alta' ? 'selected' : '' }}>Alta</option>
                    </select>
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label for="stat" class="form-label">Estat</label>
                    <select name="stat" id="stat" class="form-select" required>
                        <option value="pendent" {{ old('stat', $tasca->stat) == 'pendent' ? 'selected' : '' }}>Pendent</option>
                        <option value="en_curs" {{ old('stat', $tasca->stat) == 'en_curs' ? 'selected' : '' }}>En curs</option>
                        <option value="fet" {{ old('stat', $tasca->stat) == 'fet' ? 'selected' : '' }}>Fet</option>
                    </select>
                </div>

                {{-- Categoria --}}
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        @foreach ($categories as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ old('category_id', $tasca->category_id) == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btnActualitza">Actualitzar</button>
                <a href="{{ route('tasques.index') }}" class="link">Cancel·lar</a>

            </form>

        </div>
    </div>

</div>
@endsection
