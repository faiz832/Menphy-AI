<title>Diagnosis Management - Menpy AI</title>

<x-app-layout>
    @if (session('toast'))
        <x-toast :type="session('toast.type')" :message="session('toast.message')" />
    @endif

    <div class="rounded-md p-6 border border-gray-200 overflow-auto">
        <h1 class="text-lg font-medium text-gray-900 mb-4">Riwayat Analisis Kamu</h1>
        <table class="w-full table-auto rounded-lg overflow-hidden">
            <thead class="border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider w-12">
                        No
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        Gangguan
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        Kepastian
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        Rekomendasi
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        Tanggal
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        Terapi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($diagnoses as $diagnosis)
                    <tr>
                        <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}
                        </td>
                        <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
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
                                <a href="{{ route('assessments.create', $diagnosis->id) }}"
                                    class="flex justify-center px-2.5 py-1.5 text-xs text-white rounded-md bg-gray-900 hover:bg-gray-700">
                                    Take
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-sm whitespace-nowrap text-center text-gray-500">
                            Oops! Kamu belum melakukan scan sebelumnya
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
