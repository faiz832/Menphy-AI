<title>Dashboard - Menphy AI</title>

<x-app-layout>
    <div class="flex">
        <div class="w-full max-w-7xl relative flex items-start mx-auto pt-4 px-4 sm:px-6 lg:px-8 gap-8">
            <!-- Sidebar -->
            <x-sidebar-dashboard />

            <div class="w-full min-h-screen lg:w-5/6 flex flex-col gap-4 pb-8">
                <div class="overflow-hidden rounded-md p-6 border border-gray-200">
                    @role('admin')
                        <div class="">
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Welcome Back!') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('You are logged in as an admin.') }}
                            </p>
                        </div>
                    @else
                        <div class="">
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Welcome Back!') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('You are logged in as a user.') }}
                            </p>
                        </div>
                    @endrole
                </div>

                <div class="rounded-md p-6 border border-gray-200 overflow-auto">
                    <h1 class="font-semibold mb-4">Riwayat Analisis Kamu</h1>
                    <table class="w-full table-auto rounded-lg overflow-hidden shadow">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-12">
                                    No
                                </th>
                                <th
                                    class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Gangguan Mental
                                </th>
                                <th
                                    class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Rekomendasi
                                </th>
                                <th
                                    class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal
                                </th>
                                <th
                                    class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($diagnoses as $diagnosis)
                                <tr>
                                    <td class="px-4 py-4 text-center whitespace-nowrap text-sm">{{ $loop->iteration }}
                                    </td>
                                    <td class="px-4 py-4 text-center whitespace-nowrap text-sm">
                                        @if ($diagnosis->mentalDisorder)
                                            {{ $diagnosis->mentalDisorder->name }}
                                        @else
                                            Tidak Ada Gangguan Mental
                                        @endif
                                    </td>
                                    <td class="px-4 my-4 text-center text-sm text-gray-900 line-clamp-2">
                                        {{ $diagnosis->recommendation->recommendation_text }}
                                    </td>
                                    <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                        {{ $diagnosis->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                        <a href="{{ url('/diagnosis/result/' . $diagnosis->id) }}"
                                            class="flex justify-center">
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
            </div>
        </div>
    </div>
</x-app-layout>
