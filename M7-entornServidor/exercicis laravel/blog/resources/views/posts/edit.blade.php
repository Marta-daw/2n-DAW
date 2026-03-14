<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar post
        </h2>
    </x-slot>

    <div class="p-6">

        {{-- Errors de validació --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Títol --}}
            <div class="mb-4">
                <label for="titol" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Títol</label>
                <input type="text" name="titol" id="titol"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white"
                    value="{{ old('titol', $post->titol) }}" required>
            </div>

            {{-- Contingut --}}
            <div class="mb-4">
                <label for="contingut" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contingut</label>
                <textarea name="contingut" id="contingut" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">{{ old('contingut', $post->contingut) }}</textarea>
            </div>

            {{-- Usuari --}}
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Usuari</label>
                <input type="text" name="user_id" id="user_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 dark:bg-gray-600 dark:text-white"
                    value="{{ old('user_id', $post->user_id) }}" readonly>
            </div>

            <div class="flex gap-4 mt-4">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    Actualitzar
                </button>
                <a href="{{ route('posts.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 dark:bg-gray-600 dark:text-white">
                    Cancel·lar
                </a>
            </div>

        </form>

    </div>

</x-app-layout>