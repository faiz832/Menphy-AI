<title>Therapy - Menpy AI</title>

<x-app-layout>
    @if (session('toast'))
        <x-toast :type="session('toast.type')" :message="session('toast.message')" />
    @endif

    @if ($diagnoses->isEmpty())
        <div class="rounded-md p-6 border border-gray-200 overflow-auto">
            <p>You haven't taken any assessments yet.</p>
        </div>
    @else
        @foreach ($diagnoses as $diagnosis)
            @if ($diagnosis->mentalDisorder)
                <div class="rounded-md p-6 pb-2 border border-gray-200 overflow-auto">
                    <h2 class="text-lg font-semibold flex items-center">
                        @if ($diagnosis->mentalDisorder)
                            {{ $diagnosis->mentalDisorder->name }}
                        @endif
                        @if ($diagnosis->is_recovered)
                            <span
                                class="ml-4 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Recovered
                            </span>
                        @else
                            <div x-data="{ diagnosisId: {{ $diagnosis->id }} }">
                                <button type="button"
                                    class="ml-4 px-2 inline-flex text-xs leading-5 font-semibold rounded-full text-gray-100 bg-gray-800"
                                    x-on:click="$dispatch('open-modal', 'warning-diagnosis-' + diagnosisId)">
                                    Take Assessment
                                </button>
                            </div>
                        @endif
                    </h2>
                    @if ($diagnosis->assessments->isEmpty() && $diagnosis->mentalDisorder)
                        <p class="text-sm text-gray-500 py-4">No assessments taken for this diagnosis yet.</p>
                    @else
                        <ul class="divide-y divide-gray-200">
                            @foreach ($diagnosis->assessments as $assessment)
                                <li class="py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                Assessment #{{ $loop->iteration }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Taken on {{ $assessment->created_at->format('M d, Y') }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Improvement:
                                                {{ number_format($assessment->percentage_improvement, 2) }}%
                                            </p>
                                        </div>
                                        <div>
                                            <a href="{{ route('assessments.show', $assessment) }}"
                                                class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                View Results
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @else
                <div class="rounded-md p-6 pb-2 border border-gray-200 overflow-auto">
                    <h2 class="text-lg font-semibold flex items-center">
                        No Diagnosis
                        <span
                            class="ml-4 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            Nothing
                        </span>
                    </h2>
                    <p class="text-sm text-gray-500 py-4">No need to take any assessments.</p>
                </div>
            @endif
        @endforeach
    @endif

    @foreach ($diagnoses as $item)
        <!-- Warning diagnosis Modals -->
        <x-modal :name="'warning-diagnosis-' . $item->id">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Take Assessment') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Are you sure you are doing what the AI recommends?') }}
                </p>

                <div class="mt-4 p-4 rounded-md bg-gray-100">
                    <p class="text-sm text-gray-600">
                        {{ $item->recommendation->recommendation_text }}
                    </p>
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <a href="{{ route('assessments.create', $item->id) }}"
                        class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Continue
                    </a>
                </div>
            </div>
        </x-modal>
    @endforeach
</x-app-layout>
