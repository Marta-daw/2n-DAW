@extends('layouts.app')

@section('title', 'Detall de la tasca')

@section('content')
<div class="containerShow">
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <h1 class="mb-3">{{ $tasca->titol }}</h1>

    <div class="card">
        <div class="card-body">

            <p><strong>Descripció:</strong></p>
            <p>{{ $tasca->descripcio }}</p>

            <p><strong>Prioritat:</strong> {{ $tasca->prioritat }}</p>
            <p><strong>Estat:</strong> {{ $tasca->stat }}</p>

            @if($tasca->categoria)
                <p><strong>Categoria:</strong> {{ $tasca->categoria->nom }}</p>
            @else
                <p><strong>Categoria:</strong> Sense categoria</p>
            @endif

        </div>
    </div>

    <a href="{{ route('tasques.index') }}" class="btnTornar">Tornar</a>
</div>
@endsection
