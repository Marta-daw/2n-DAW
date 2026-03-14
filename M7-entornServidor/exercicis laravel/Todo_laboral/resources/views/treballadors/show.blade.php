@extends('layouts.app')

@section('title', 'Detall del treballador')

@section('content')
<div class="containerShow">
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
    <h1 class="mb-3">Informació del treballador</h1>
    <div class="card">
        <p class="mb-3">{{ $treballadors->nom }} {{ $treballadors->cognoms1 }} {{ $treballadors->cognoms2 }}</p>
        <div class="card-body">

        
            <p><strong>Correu electrònic:</strong> {{ $treballadors->correu }}</p>
            <p><strong>Telèfon:</strong> {{ $treballadors->telefon }}</p>

            <p><strong>Tasques associades:</strong></p>
            <ul>
                @foreach ($treballadors->tasques as $tasca)
                    <li class="tascaList">{{ $tasca->titol }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <a href="{{ route('treballadors.index') }}" class="btnTornar">Tornar</a>
    
</div>
@endsection
