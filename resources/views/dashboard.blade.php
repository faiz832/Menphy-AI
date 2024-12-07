<title>Dashboard - Menpy AI</title>

<x-app-layout>
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
                        Certainainty
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        Recommendation
                    </th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                        Date
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
                            <a href="{{ url('/diagnosis/result/' . $diagnosis->id) }}"
                                class="px-2.5 py-1.5 text-xs text-white rounded-md bg-gray-900 hover:bg-gray-700">
                                view
                            </a>
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
