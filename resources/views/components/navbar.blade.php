<nav id="navbar" class="sticky top-0 z-20 w-full flex-none bg-white">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div
            class="flex items-center h-16 lg:border-0 border-gray-200 {{ Route::is('home') ? 'border-0' : 'border-b' }}">
            <div class="flex gap-4 items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <img src="{{ asset('assets/images/menphy-logo.png') }}" alt="Menphy AI Logo" class="h-6">
                        <h1 class="text-xl font-bold">Menphy AI</h1>
                    </a>
                </div>

                <!-- Search -->
                <div class="hidden sm:block">
                    <x-search />
                </div>
            </div>

            <div class="flex h-max ml-auto">
                <!-- Navigation Links -->
                <!-- Login button -->
                @if (Route::has('login'))
                    <nav class="relative flex gap-2">
                        @auth
                            <!-- Dropdown Button -->
                            <div class="hidden sm:flex relative gap-2 cursor-pointer" x-data="{ open: false }">
                                <button @click="open = !open" @click.away="open = false" class="flex items-center">
                                    <div class="avatar">
                                        @php
                                            $avatarUrl = asset('assets/images/default-avatar.png'); // Default avatar URL

                                            if (Auth::user()->avatar) {
                                                if (Str::startsWith(Auth::user()->avatar, 'https://')) {
                                                    $avatarUrl = Auth::user()->avatar;
                                                } elseif (Str::startsWith(Auth::user()->avatar, 'avatars/')) {
                                                    $avatarUrl = Storage::url(Auth::user()->avatar);
                                                }
                                            }
                                        @endphp

                                        <img id="avatar-preview" class="h-[32px] w-[32px] object-cover rounded-full"
                                            src="{{ $avatarUrl }}" alt="User Avatar" />
                                    </div>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute top-9 right-0 mt-2 w-48 rounded-full bg-white p-1 text-sm shadow-lg ring-1 ring-gray-900/10"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                                    style="display: none;">
                                    <div role="none">
                                        <a href="{{ route('dashboard') }}"
                                            class="block px-4 py-2 text-sm rounded-full text-gray-700 hover:bg-gray-100"
                                            role="menuitem">Dashboard</a>
                                        <a href="{{ route('profile.edit') }}"
                                            class="block px-4 py-2 text-sm rounded-full text-gray-700 hover:bg-gray-100"
                                            role="menuitem">Profile</a>
                                        <a href=""
                                            class="block px-4 py-2 text-sm rounded-full text-gray-700 hover:bg-gray-100"
                                            role="menuitem">Settings</a>
                                        <form method="POST" action="{{ route('logout') }}" role="none"
                                            style="margin-bottom: 0">
                                            @csrf
                                            <button type="submit"
                                                class="block w-full text-left px-4 py-2 text-sm rounded-full text-gray-700 hover:bg-gray-100"
                                                role="menuitem"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                Log Out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="hidden sm:flex font-semibold text-center text-sm rounded-full px-3 py-2 bg-white hover:bg-gray-200 transition">
                                Sign In
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="hidden sm:flex font-semibold text-center text-sm rounded-full px-3 py-2 text-white bg-gray-900 hover:bg-gray-700 transition">
                                    Sign Up
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>

            <!-- Three Dots -->
            {{-- <x-navbar-menu-mobile /> --}}
        </div>
    </div>

    <!-- Mobile menu button -->
    {{-- <div class="mx-auto p-4 sm:px-6 items-center lg:hidden {{ Route::is('home') ? 'hidden' : 'flex' }}">

        <!-- Dashboard Sidebar Menu -->
        <div
            class="{{ Route::is('dashboard') || Route::is('admin.users.index') || Route::is('profile.edit') || Route::is('settings.edit') || Route::is('version.index') || Route::is('category.index') || Route::is('component.*') ? 'flex' : 'hidden' }}">
            <x-sidebar-dashboard-mobile />
        </div>

        <!-- Breadcrumb -->
        <x-breadcrumb />
    </div> --}}
</nav>
