<x-app-layout>
    <div class="p-6 bg-white border-b border-gray-200">
        <form method="POST" action="{{ route('assessments.store', $diagnosis) }}">
            @csrf
            @foreach ($questions as $question)
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="question_{{ $question->id }}">
                        {{ $question->question_text }}
                    </label>
                    <select name="answers[{{ $question->id }}]" id="question_{{ $question->id }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
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
