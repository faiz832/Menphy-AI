<title>Diagnosis Management - Menphy AI</title>

<x-app-layout>
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
                        Action
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
                            <a href="{{ url('/diagnosis/result/' . $diagnosis->id) }}" class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z">
                                    </path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 whitespace-nowrap text-center text-gray-500">
                            Oops! Kamu belum melakukan scan sebelumnya
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
