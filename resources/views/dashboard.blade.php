<title>Dashboard - Menphy AI</title>

<x-app-layout>
    <div class="">
        <div class="p-6 rounded-md border border-gray-200">
            @role('admin')
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Welcome Back!') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('You are logged in as an admin.') }}
                </p>
            @else
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Welcome Back!') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('You are logged in as a user.') }}
                </p>
            @endrole
        </div>
    </div>
</x-app-layout>
