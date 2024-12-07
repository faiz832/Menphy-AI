<x-app-layout>
    <div class="rounded-md p-6 border border-gray-200">
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
                        <option value="">Select an option</option>
                        <option value="1">Not at all</option>
                        <option value="2">A little bit</option>
                        <option value="3">Moderately</option>
                        <option value="4">Quite a bit</option>
                        <option value="5">Extremely</option>
                    </select>
                </div>
            @endforeach
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Submit Assessment') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
