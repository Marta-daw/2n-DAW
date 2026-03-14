<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->titol }}
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="bg-white dark:bg-gray-800 rounded-md shadow-sm p-6 mb-4">

            <p class="font-semibold text-gray-700 dark:text-gray-300">Contingut:</p>
            <p class="mb-4 text-gray-900 dark:text-gray-100">{{ $post->contingut }}</p>

            <p class="text-gray-700 dark:text-gray-300">
                <strong>Data de creació:</strong> {{ $post->created_at->format('d/m/Y') }}
            </p>

            @if($post->user_id)
                <p class="text-gray-700 dark:text-gray-300">
                    <strong>Autor:</strong> {{ $post->user->name }}
                </p>
            @else
                <p class="text-gray-700 dark:text-gray-300">
                    <strong>Usuari:</strong> Sense usuari
                </p>
            @endif

        </div>

        <a href="{{ route('posts.index') }}"
            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 dark:bg-gray-600 dark:text-white">
            Tornar
        </a>

    </div>

</x-app-layout>