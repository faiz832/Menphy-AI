<title>Dashboard - Menphy AI</title>

<x-app-layout>
    <div class="min-h-screen max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="p-6 bg-white rounded-md border border-gray-200">
            @role('admin')
                <div class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Welcome Back!') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('You are logged in as an admin.') }}
                    </p>
                </div>
            @else
                <div class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Welcome Back!') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('You are logged in as a user.') }}
                    </p>
                </div>
            @endrole

            <h3 class="text-lg font-medium text-gray-900 mb-4">Your Diagnosis History</h3>

            @if ($diagnoses->isEmpty())
                <p class="text-gray-600">You haven't taken any diagnoses yet.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Mental Disorder</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kepastian</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Recommendation</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($diagnoses as $diagnosis)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $diagnosis->created_at->format('Y-m-d') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        @if ($diagnosis->mentalDisorder)
                                            {{ $diagnosis->mentalDisorder->name }}
                                        @else
                                            Tidak Ada Gangguan Mental yang Terdeteksi
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ number_format($diagnosis->cf, 2) }}%
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <div class="truncate max-w-sm"
                                            title="{{ $diagnosis->recommendation->recommendation_text }}">
                                            {{ Str::limit($diagnosis->recommendation->recommendation_text, 100) }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
