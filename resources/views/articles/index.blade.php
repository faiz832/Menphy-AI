<title>Articles - Menpy AI</title>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (auth()->user() && auth()->user()->hasRole('admin'))
                        <a href="{{ route('articles.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create
                            New Article</a>
                    @endif

                    @foreach ($articles as $article)
                        <div class="mb-4 p-4 border rounded">
                            <h3 class="text-lg font-semibold">{{ $article->title }}</h3>
                            <p class="text-gray-600">Published: {{ $article->created_at->format('M d, Y') }}</p>
                            <a href="{{ route('articles.show', $article) }}" class="text-blue-500 hover:underline">Read
                                more</a>

                            @if (auth()->user() && auth()->user()->hasRole('admin'))
                                <div class="mt-2">
                                    <a href="{{ route('articles.edit', $article) }}"
                                        class="text-yellow-500 hover:underline mr-2">Edit</a>
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline"
                                            onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach

                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
