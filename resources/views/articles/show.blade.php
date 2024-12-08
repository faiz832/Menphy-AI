<title>{{ $article->title }} - Menpy AI</title>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                            class="mb-4 max-w-full h-auto">
                    @endif

                    <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
                    <p class="text-gray-600 mb-4">Published: {{ $article->created_at->format('M d, Y') }}</p>
                    <div class="prose max-w-none">
                        {!! nl2br(e($article->content)) !!}
                    </div>

                    @if (auth()->user() && auth()->user()->hasRole('admin'))
                        <div class="mt-4">
                            <a href="{{ route('articles.edit', $article) }}"
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
