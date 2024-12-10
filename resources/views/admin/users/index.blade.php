<title>User - Menpy AI</title>

<x-app-layout>
    <div>
        <div class="p-4 sm:p-8 rounded-md border border-gray-200">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('User Management') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Update the user's role or status activation.") }}
                </p>
            </header>

            @if (session('success') || $errors->any())
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="mt-4">
                    @if (session('success'))
                        <div class="flex my-4">
                            <span class="text-sm text-green-600 space-y-1">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="flex my-4">
                            @foreach ($errors->all() as $error)
                                <span class="text-sm text-red-600 space-y-1">{{ $error }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            <div class="overflow-x-auto mt-6">
                <table class="min-w-full">
                    <thead class="border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 tracking-wider">
                                Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-900 tracking-wider">
                                Email</th>
                            <th class="px-6 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                                Role</th>
                            <th class="px-6 py-3 text-center text-sm font-medium text-gray-900 tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm text-gray-500">
                                    {{ $loop->iteration }}</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium capitalize text-gray-900">
                                    {{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm text-gray-500">
                                    {{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @foreach ($roles as $role)
                                        <div class="flex justify-center items-center">
                                            <span class="inline-flex text-sm font-medium capitalize text-gray-900">
                                                {{ $user->hasRole($role->name) ? $role->name : '' }}
                                            </span>
                                        </div>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center justify-center space-x-2">
                                        <div x-data="{ userId: {{ $user->id }} }">
                                            <button type="button"
                                                class="px-2.5 py-1.5 text-xs text-white rounded-md bg-red-600 hover:bg-red-700"
                                                x-on:click="$dispatch('open-modal', 'delete-user-' + userId)">
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @foreach ($users as $item)
            <!-- Delete user Modals -->
            <x-modal :name="'delete-user-' . $item->id" focusable>
                <form method="POST" action="{{ route('users.destroy', $item->id) }}" class="p-6">
                    @csrf
                    @method('DELETE')

                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Delete User') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Are you sure you want to delete this user? This action cannot be undone.') }}
                    </p>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3">
                            {{ __('Delete') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        @endforeach
    </div>
</x-app-layout>
