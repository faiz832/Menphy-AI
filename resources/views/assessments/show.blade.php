<x-app-layout>
    <div class="rounded-md p-6 border border-gray-200 overflow-auto">
        <h3 class="text-lg font-semibold mb-4">{{ $assessment->diagnosis->mentalDisorder->name }} Assessment
        </h3>
        <p class="mb-2"><strong>Date:</strong> {{ $assessment->created_at->format('M d, Y') }}</p>
        <p class="mb-2"><strong>Score:</strong> {{ $assessment->score }}</p>
        <p class="mb-4"><strong>Improvement:</strong>
            {{ number_format($assessment->percentage_improvement, 2) }}%</p>

        <div class="mt-6">
            <h4 class="text-md font-semibold mb-2">Interpretation:</h4>
            @if ($assessment->percentage_improvement >= 80)
                <p class="text-green-600">Excellent progress! Keep up the great work.</p>
            @elseif($assessment->percentage_improvement >= 60)
                <p class="text-blue-600">Good progress. You're on the right track.</p>
            @elseif($assessment->percentage_improvement >= 40)
                <p class="text-yellow-600">Moderate progress. Consider discussing your treatment plan with
                    your healthcare provider.</p>
            @else
                <p class="text-red-600">Limited progress. It's important to consult with your healthcare
                    provider to review and possibly adjust your treatment plan.</p>
            @endif
        </div>
    </div>
</x-app-layout>
