<title>Create Article - Menpy AI</title>

<x-app-layout>
    <div class="rounded-md p-6 border border-gray-200 overflow-auto">
        <div class="max-w-xl">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Create Article') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Create a new article') }}
                </p>
            </header>

            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="">
                    <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                    <x-text-input type="text" name="title" id="title" class="mt-1 w-full" required />
                </div>
                <div class="">
                    <label for="content" class="block font-medium text-sm text-gray-700">Content</label>
                    <textarea name="content" id="content" rows="10"
                        class="mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required></textarea>
                </div>
                <div class="flex flex-col">
                    <label for="image" class="block font-medium text-sm text-gray-700">Image</label>
                    <div class="mt-1 flex items-center gap-6">
                        <div class="shrink-0">
                            <img id="article-image" class="h-40 w-64 object-cover rounded-md" src=""
                                alt="Article Image Here" />
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
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('articles.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                        Back
                    </a>
                    <x-primary-button type="submit">
                        Create
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('image').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            document.getElementById('article-image').src = URL.createObjectURL(file)
        }
    }
</script>
