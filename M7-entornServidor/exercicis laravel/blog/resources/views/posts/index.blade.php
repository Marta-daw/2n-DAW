<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Llista de posts
        </h2>
    </x-slot>

    <div class="p-6">
        @if(Auth::user()->name != "user")
            <a href="{{ route('posts.create') }}"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                Nou post
            </a>
        @endif
        <ul class="mt-6 space-y-3">

            <span class="spanUserName">{{ Auth::user()->name }}</span>
            @foreach ($posts as $post)
                @if(Auth::user()->name != "editor" || ( Auth::user()->name === "editor" && Auth::user()->id === $post->user_id ))
                    <li class="flex items-center gap-4 p-4 bg-white dark:bg-gray-800 rounded-md shadow-sm">

                        <span class="basicInfoPost flex-1">
                            <strong>{{ $post->titol }}</strong>
                            - {{ $post->created_at->format('d/m/Y') }} per {{ $post->user->name }}
                        </span>

                        <a href="{{ route('posts.show', $post) }}"
                            class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 dark:bg-gray-600 dark:text-white">
                            Veure
                        </a>
                        @if(Auth::user()->name != "user")
                            <a href="{{ route('posts.edit', $post) }}"
                                class="px-3 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500">
                                Editar
                            </a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-black rounded hover:bg-red-600">
                                    Eliminar
                                </button>
                            </form>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>

    </div>

</x-app-layout>