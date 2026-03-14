@extends('layouts.app')

@section('content')
<div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
    <div class="containerTreballadors">
        <a href="{{ route('treballadors.create') }}">Nou treballador</a>
        <ul class="llistaTreballadors">
            @foreach ($treballadors as $treballador)
                <li>
                    <strong>{{ $treballador->nom }} {{ $treballador->cognoms1 }} {{ $treballador->cognoms2 }}</strong>
                    - {{ $treballador->correu }}

                    <a href="{{ route('treballadors.show', $treballador) }}" class="linkIndex">Veure</a>
                    <a href="{{ route('treballadors.edit', $treballador) }}" class="linkIndex">Editar</a>

                    <form action="{{ route('treballadors.destroy', $treballador) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="linkIndex">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
</div>
@endsection
