<title>Profile - Menphy AI</title>

<x-app-layout>
    <div class="space-y-6">
        <h2 class="text-2xl font-semibold text-gray-800">
            {{ __('Profile') }}
        </h2>

        <div class="bg-white p-4 sm:p-8 rounded-lg shadow">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
    </div>
</x-app-layout>
