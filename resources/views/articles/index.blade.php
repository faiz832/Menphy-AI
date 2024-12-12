<title>Articles - Menpy AI</title>

<x-app-layout>
    <div class="rounded-md p-6 border border-gray-200 overflow-auto">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Article Management') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Manage existing and new articles') }}
            </p>
        </header>
        <a href="{{ route('articles.create') }}"
            class="mt-4 inline-flex px-2.5 py-1.5 text-xs text-white font-semibold rounded-md bg-gray-900 hover:bg-gray-700 transition">Create
            New Article
        </a>
    </div>

    @foreach ($articles as $article)
        <div class="rounded-md p-6 border border-gray-200 overflow-auto">
            <div class="flex items-center justify-between">
                <div class="">
                    <h3 class="text-lg font-medium text-gray-900">{{ $article->title }}</h3>
                    <p class="mt-1 text-sm text-gray-600">Published: {{ $article->created_at->format('M d, Y') }}</p>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('articles.show', $article) }}"
                        class="px-2.5 py-1.5 text-xs text-white font-semibold rounded-md bg-blue-600 hover:bg-blue-700 transition">View
                    </a>
                    <a href="{{ route('articles.edit', $article) }}"
                        class="px-2.5 py-1.5 text-xs text-white font-semibold rounded-md bg-yellow-500 hover:bg-yellow-600 transition">Edit</a>
                    <div x-data="{ articleId: {{ $article->id }} }">
                        <button type="button"
                            class="px-2.5 py-1.5 text-xs text-white font-semibold rounded-md bg-red-600 hover:bg-red-700 transition"
                            x-on:click="$dispatch('open-modal', 'warning-article-' + articleId)">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($articles as $item)
        <!-- Warning article Modals -->
        <x-modal :name="'warning-article-' . $item->id">
            <form action="{{ route('articles.destroy', $item->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Delete Article') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        Are you sure you want to delete <strong>{{ $item->title }}</strong> article?
                    </p>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-4">
                            Delete
                        </x-danger-button>
                    </div>
                </div>
            </form>
        </x-modal>
    @endforeach
</x-app-layout>
