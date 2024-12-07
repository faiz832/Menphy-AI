<x-app-layout>
    <div class="rounded-md p-6 border border-gray-200 overflow-auto">
        <div class="max-w-xl">
            <h3 class="text-lg font-semibold mb-4">{{ $assessment->diagnosis->mentalDisorder->name }} Assessment
            </h3>
            <p class="mb-2"><strong>Date:</strong> {{ $assessment->created_at->format('M d, Y') }}</p>
            <p class="mb-2"><strong>Score:</strong> {{ $assessment->score }}</p>
            <p class="mb-4"><strong>Improvement:</strong>
                {{ number_format($assessment->percentage_improvement, 2) }}%</p>

            <div class="mt-6">
                <h4 class="text-md font-semibold mb-2">Interpretation:</h4>
                @if ($assessment->percentage_improvement >= 80)
                    <p class="text-green-600">Kamu luar biasa! Peningkatan kamu sangat bagus, terus lanjutkan ya!</p>
                @elseif($assessment->percentage_improvement >= 60)
                    <p class="text-blue-600">Kamu sudah ada di jalur yang benar. Ayo terus semangat!</p>
                @elseif($assessment->percentage_improvement >= 40)
                    <p class="text-yellow-600">Kamu udah cukup baik, tapi coba diskusikan lagi langkah-langkah kamu sama
                        ahli kesehatan ya.</p>
                @else
                    <p class="text-red-600">Perkembangannya masih kurang, coba konsultasi lagi sama ahli kesehatan untuk
                        rencana yang lebih tepat buat kamu.</p>
                @endif
            </div>

            <a href="{{ route('assessments.index') }}"
                class="mt-6 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none disabled:opacity-25 transition">
                {{ __('Back') }}
            </a>
        </div>
    </div>
</x-app-layout>
