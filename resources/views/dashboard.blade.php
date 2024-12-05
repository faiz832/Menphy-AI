<title>Dashboard - Menphy AI</title>

<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="p-6 bg-white rounded-md border border-gray-200">
            @role('admin')
                <div class="flex justify-between">
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
                <div class="flex justify-between">
                    <div class="">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Welcome Back!') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('You are logged in as an user.') }}
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
        </div>
    </div>
</x-app-layout>
