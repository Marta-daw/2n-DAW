<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear nou post
        </h2>
    </x-slot>

    <!-- An unexamined life is not worth living. - Socrates -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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

                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf

                        {{-- Títol --}}
                            <div>
                                <label for="titol" class="form-label">Títol</label>
                                <input type="text" name="titol" id="titol" class="form-control" value="{{ old('titol') }}" required>
                            </div>

                        {{-- contingut --}}
                            <div>
                                <label for="contingut" class="form-label">Contingut</label>
                                <textarea name="contingut" id="contingut" class="form-control" row=3> {{ old('contingut') }} </textarea>
                            </div>

                        {{-- usuari --}}
                            <div>
                                <label for="user_id" class="form-label">Usuari</label>
                                <input type="text" name="user_id" id="user_id" class="form-control" value="{{ old('user_id', $user) }}" readonly>
                            </div>

                        <button type="submit" class="btn btn-primary mt-3">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
