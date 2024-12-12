<title>Diagnosis Management - Menpy AI</title>

<x-app-layout>
    @if (session('toast'))
        <x-toast :type="session('toast.type')" :message="session('toast.message')" />
    @endif

    <div class="rounded-md p-6 border border-gray-200 overflow-auto">
        <h1 class="text-lg font-medium text-gray-900">Diagnosis History</h1>
        <p class="mt-1 text-sm text-gray-600">Here is your diagnosis history</p>
        <table class="mt-6 w-full table-auto rounded-lg overflow-hidden">
            <thead class="border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider w-12">
                        No
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        Disorder
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        Certainity
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        AI Recommendation
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        Date
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        Therapy
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($diagnoses as $diagnosis)
                    <tr>
                        <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}
                        </td>
                        <td class="px-4 py-4 text-center font-medium whitespace-nowrap text-sm text-gray-900">
                            @if ($diagnosis->mentalDisorder)
                                {{ $diagnosis->mentalDisorder->name }}
                            @else
                                Tidak Ada
                            @endif
                        </td>
                        <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                            @if ($diagnosis->cf == 0.0)
                                100%
                            @else
                                {{ $diagnosis->cf }}%
                            @endif
                        </td>
                        <td class="px-4 my-4 text-center text-sm text-gray-500 line-clamp-2">
                            {{ $diagnosis->recommendation->recommendation_text }}
                        </td>
                        <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                            {{ $diagnosis->created_at->format('d M Y') }}
                        </td>
                        <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                            @if ($diagnosis->is_recovered)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Recovered
                                </span>
                            @elseif (!$diagnosis->mentalDisorder)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Nothing
                                </span>
                            @else
                                <div x-data="{ diagnosisId: {{ $diagnosis->id }} }">
                                    <button type="button"
                                        class="px-2.5 py-1.5 text-xs text-white font-semibold rounded-md bg-gray-900 hover:bg-gray-700 transition"
                                        x-on:click="$dispatch('open-modal', 'warning-diagnosis-' + diagnosisId)">
                                        Take
                                    </button>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                            <div class="flex gap-2">
                                <div x-data="{ diagnosisId: {{ $diagnosis->id }} }">
                                    <button type="button"
                                        class="px-2.5 py-1.5 text-xs text-white font-semibold rounded-md bg-blue-600 hover:bg-blue-700 transition"
                                        x-on:click="$dispatch('open-modal', 'view-diagnosis-' + diagnosisId)">
                                        View
                                    </button>
                                </div>
                                <a href="{{ route('diagnosis.export', $diagnosis) }}"
                                    class="px-2.5 py-1.5 text-xs font-semibold rounded-md border border-gray-300 hover:bg-gray-100 transition">
                                    Download
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-sm whitespace-nowrap text-center text-gray-500">
                            Oops! Kamu belum melakukan diagnosis sebelumnya
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @foreach ($diagnoses as $item)
        <!-- View diagnosis Modals -->
        <x-modal :name="'view-diagnosis-' . $item->id">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Diagnosis') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Here is your diagnosis') }}
                </p>

                <div class="mt-4">
                    <h2 class="font-medium text-gray-900">Disorder</h2>
                    <p class="mt-1 text-sm text-gray-600">
                        @if ($item->mentalDisorder)
                            {{ $item->mentalDisorder->name }}
                        @else
                            Tidak Ada
                        @endif
                    </p>
                </div>

                <div class="mt-4">
                    <h2 class="font-medium text-gray-900">Description</h2>
                    <p class="mt-1 text-sm text-gray-600">
                        @if ($item->mentalDisorder)
                            {{ $item->mentalDisorder->description }}
                        @else
                            Tidak Ada
                        @endif
                    </p>
                </div>

                <div class="mt-4">
                    <h2 class="font-medium text-gray-900">Certainainty</h2>
                    <p class="mt-1 text-sm text-gray-600">
                        @if ($item->cf == 0.0)
                            100%
                        @else
                            {{ $item->cf }}%
                        @endif
                    </p>
                </div>

                <div class="mt-4">
                    <h2 class="font-medium text-gray-900">AI Recommendation</h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ $item->recommendation->recommendation_text }}
                    </p>
                </div>

                <div class="mt-8 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                </div>
            </div>
        </x-modal>

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
