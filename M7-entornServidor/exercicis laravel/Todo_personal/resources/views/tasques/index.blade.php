@extends('layouts.app')

@section('content')
<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
    <div class="containerTasques">
        <a href="{{ route('tasques.create') }}">Nova tasca</a>
        <ul class="llistaTasques">
            @foreach ($tasques as $tasca)
                <li>
                    <strong>{{ $tasca->titol }}</strong>
                    ({{ $tasca->categoria->nom }})
                    - {{ $tasca->status }}

                    <a href="{{ route('tasques.show', $tasca) }}" class="linkIndex">Veure</a>
                    <a href="{{ route('tasques.edit', $tasca) }}" class="linkIndex">Editar</a>

                    <form action="{{ route('tasques.destroy', $tasca) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="linkIndex">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
