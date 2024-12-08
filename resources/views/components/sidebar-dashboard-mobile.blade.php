<div x-data="{ open: false }" class="h-6 w-6">
    <button @click="open = !open; document.documentElement.classList.toggle('overflow-hidden', open)"
        class="inline-flex items-center justify-center rounded transition-all">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="absolute top-0 right-0 h-screen w-full z-50 backdrop-blur-sm" role="dialog" aria-modal="true"
        style="display: none;">
        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="absolute top-0 left-0 h-screen w-full bg-gray-500/70 transition-opacity"
            @click="open = false; document.documentElement.classList.remove('overflow-hidden')" aria-hidden="true">
        </div>

        <div x-show="open" @click.away="open = false; document.documentElement.classList.remove('overflow-hidden')"
            x-transition:enter="ease-out duration-300" x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
            class="h-screen w-max transform divide-y divide-gray-100 overflow-hidden bg-white shadow-2xl transition-all">

            <aside class="flex flex-col w-56 px-4 py-6">
                <nav class="flex-1 space-y-4">
                    <!-- Home Section -->
                    <div>
                        <div class="mb-2">
                            <h2 class="px-2 text-xs font-semibold text-gray-500">
                                Home
                            </h2>
                        </div>
                        <div class="space-y-1">
                            <a href="{{ route('dashboard') }}"
                                class="{{ Route::is('dashboard') ? 'font-semibold' : '' }} relative flex items-center px-2 py-2 text-sm rounded-md text-gray-900 hover:bg-gray-100">
                                <div
                                    class="{{ Route::is('dashboard') ? 'block' : 'hidden' }} absolute inset-y-0 -left-2 w-1 h-6 my-auto bg-gray-900 rounded-t-lg rounded-b-lg">
                                </div>
                                <svg class="mr-3 h-5 w-5 text-gray-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                Dashboard
                            </a>
                            @role('admin')
                                <a href="{{ route('users.index') }}"
                                    class="{{ Route::is('users.index') ? 'font-semibold' : '' }} relative flex items-center px-2 py-2 text-sm rounded-md text-gray-900 hover:bg-gray-100">
                                    <div
                                        class="{{ Route::is('users.index') ? 'block' : 'hidden' }} absolute inset-y-0 -left-2 w-1 h-6 my-auto bg-gray-900 rounded-t-lg rounded-b-lg">
                                    </div>
                                    <svg class="mr-3 h-5 w-5 text-gray-700" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                    User
                                </a>
                            @endrole
                        </div>
                    </div>

                    <!-- Data Section -->
                    <div>
                        <div class="mb-2 pt-4 border-t border-gray-200">
                            <h2 class="px-2 text-xs font-semibold text-gray-500">
                                Data
                            </h2>
                        </div>
                        <div class="space-y-1">
                            @role('admin')
                                <a href="{{ route('articles.index') }}"
                                    class="{{ Route::is('articles.*') ? 'font-semibold' : '' }} relative flex items-center px-2 py-2 text-sm rounded-md text-gray-900 hover:bg-gray-100">
                                    <div
                                        class="{{ Route::is('articles.*') ? 'block' : 'hidden' }} absolute inset-y-0 -left-2 w-1 h-6 my-auto bg-gray-900 rounded-t-lg rounded-b-lg">
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-700"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Articles
                                </a>
                            @endrole
                            <a href="{{ route('diagnosis.index') }}"
                                class="{{ Route::is('diagnosis.index') ? 'font-semibold' : '' }} relative flex items-center px-2 py-2 text-sm rounded-md text-gray-900 hover:bg-gray-100">
                                <div
                                    class="{{ Route::is('diagnosis.index') ? 'block' : 'hidden' }} absolute inset-y-0 -left-2 w-1 h-6 my-auto bg-gray-900 rounded-t-lg rounded-b-lg">
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-700"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                Diagnosis
                            </a>
                            <a href="{{ route('assessments.index') }}"
                                class="{{ Route::is('assessments.*') ? 'font-semibold' : '' }} relative flex items-center px-2 py-2 text-sm rounded-md text-gray-900 hover:bg-gray-100">
                                <div
                                    class="{{ Route::is('assessments.*') ? 'block' : 'hidden' }} absolute inset-y-0 -left-2 w-1 h-6 my-auto bg-gray-900 rounded-t-lg rounded-b-lg">
                                </div><svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 text-gray-700"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Therapy
                            </a>
                        </div>
                    </div>

                    <!-- Account Section -->
                    <div>
                        <div class="mb-2 pt-4 border-t border-gray-200">
                            <h2 class="px-2 text-xs font-semibold text-gray-500">
                                Account
                            </h2>
                        </div>
                        <div class="space-y-1">
                            <a href="{{ route('profile.edit') }}"
                                class="{{ Route::is('profile.edit') ? 'font-semibold' : '' }} relative flex items-center px-2 py-2 text-sm rounded-md text-gray-900 hover:bg-gray-100">
                                <div
                                    class="{{ Route::is('profile.edit') ? 'block' : 'hidden' }} absolute inset-y-0 -left-2 w-1 h-6 my-auto bg-gray-900 rounded-t-lg rounded-b-lg">
                                </div>
                                <svg class="mr-3 h-5 w-5 text-gray-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                Profile
                            </a>
                            <a href="{{ route('settings.edit') }}"
                                class="{{ Route::is('settings.edit') ? 'font-semibold' : '' }} relative flex items-center px-2 py-2 text-sm rounded-md text-gray-900 hover:bg-gray-100">
                                <div
                                    class="{{ Route::is('settings.edit') ? 'block' : 'hidden' }} absolute inset-y-0 -left-2 w-1 h-6 my-auto bg-gray-900 rounded-t-lg rounded-b-lg">
                                </div>
                                <svg class="mr-3 h-5 w-5 text-gray-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Settings
                            </a>
                        </div>
                    </div>

                    <!-- Logout Section -->
                    <div class="pt-4 border-t border-gray-200">
                        <form method="POST" action="{{ route('logout') }}" role="none"
                            style="margin-bottom: 0">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center px-2 py-2 text-sm rounded-md text-gray-900 hover:bg-gray-100">
                                <svg class="mr-3 h-5 w-5 text-gray-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </nav>
            </aside>
        </div>
    </div>
</div>
