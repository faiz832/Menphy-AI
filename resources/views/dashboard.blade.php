<title>Dashboard - Menphy AI</title>

<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="p-6 bg-white rounded-full border border-gray-200">
            @role('admin')
                <div class="flex justify-between mb-6">
                    <div class="">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Welcome Back!') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('You are logged in as an admin.') }}
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1733103373160-003dc53ccdba?q=80&w=1987&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="" />
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex justify-between mb-6">
                    <div class="">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Welcome Back!') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('You are logged in as a user.') }}
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1733103373160-003dc53ccdba?q=80&w=1987&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="" />
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                    </div>
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
