<title>Edit Article - Menpy AI</title>

<x-app-layout>
    <div class="rounded-md p-6 border border-gray-200 overflow-auto">
        <div class="max-w-xl">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Edit Article') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Update existing article') }}
                </p>
            </header>

            <x-message />

            <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                        :value="old('title', $article->title)" required autofocus autocomplete="title" />
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>

                <div>
                    <x-input-label for="content" :value="__('Content')" />
                    <textarea id="content" name="content"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        rows="6" required>{{ old('content', $article->content) }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('content')" />
                </div>

                <div>
                    <x-input-label for="image" :value="__('Image')" />
                    <div class="mt-1 flex items-center gap-6">
                        <div class="shrink-0">
                            @php
                                $imageUrl = asset('assets/images/article-1.jpg'); // Default image URL

                                if ($article->image) {
                                    if (Str::startsWith($article->image, 'assets/')) {
                                        $imageUrl = asset($article->image);
                                    } elseif (Str::startsWith($article->image, 'articles/')) {
                                        $imageUrl = Storage::url($article->image);
                                    }
                                }
                            @endphp
                            <img id="preview-image" class="h-40 w-64 object-cover rounded-md" src="{{ $imageUrl }}"
                                alt="Article preview" />
                        </div>
                        <label class="block">
                            <span class="sr-only">Choose article photo</span>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-gray-200 file:text-gray-800
                                hover:file:bg-gray-300 file:cursor-pointer file:transition file:duration-300 file:ease-in-out" />
                        </label>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('image')" />
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ route('articles.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition">
                        Back
                    </a>
                    <x-primary-button>{{ __('Update') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('image').onchange = function(evt) {
        const [file] = this.files;
        if (file) {
            document.getElementById('preview-image').src = URL.createObjectURL(file);
        }
    }
</script>
