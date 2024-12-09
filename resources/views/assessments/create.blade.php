<title>Therapy Assessment - Menpy AI</title>

<x-app-layout>
    <div class="rounded-md p-6 border border-gray-200">
        <div class="max-w-xl">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Therapy Assessment') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Please answer the following questions.') }}
                </p>
            </header>

            <form method="POST" action="{{ route('assessments.store', $diagnosis) }}">
                @csrf
                @foreach ($questions as $question)
                    <div class="my-6">
                        <label class="block font-medium text-sm text-gray-700" for="question_{{ $question->id }}">
                            {{ $question->question_text }}
                        </label>
                        <select name="answers[{{ $question->id }}]" id="question_{{ $question->id }}"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                            required>
                            <option value="" hidden>Select an option</option>
                            <option value="1">Not at all</option>
                            <option value="2">A little bit</option>
                            <option value="3">Moderately</option>
                            <option value="4">Quite a bit</option>
                            <option value="5">Extremely</option>
                        </select>
                    </div>
                @endforeach
                <div class="flex items-center mt-6">
                    <a href="{{ route('diagnosis.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none disabled:opacity-25 transition">
                        {{ __('Cancel') }}
                    </a>
                    <x-primary-button class="ml-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
