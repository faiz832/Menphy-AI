<x-app-layout>
    <div class="rounded-md p-6 border border-gray-200 overflow-auto">
        @if ($assessments->isEmpty())
            <p>You haven't taken any assessments yet.</p>
        @else
            <ul class="divide-y divide-gray-200">
                @foreach ($assessments as $assessment)
                    <li class="py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    {{ $assessment->diagnosis->mentalDisorder->name }} Assessment
                                </p>
                                <p class="text-sm text-gray-500">
                                    Taken on {{ $assessment->created_at->format('M d, Y') }}
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
</x-app-layout>
