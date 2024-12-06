<div class="-mr-2 flex items-center sm:hidden relative gap-2" x-data="{ open: false }">
    <button @click="open = !open"
        class="inline-flex items-center justify-center p-2 focus:bg-gray-100 rounded-md transition-all">
        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z">
            </path>
        </svg>
    </button>

    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute top-9 right-0 mt-2 w-48 rounded-md bg-white p-4 text-sm shadow-lg ring-1 ring-gray-900/10"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" style="display: none;">
        <div role="none">
            @if (Route::has('login'))
                @auth
                    <div class="flex pb-2 gap-2 items-center">
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
                        <div class="flex flex-shrink-0">
                            <img id="avatar-preview" class="h-8 w-8 object-cover rounded-full" src="{{ $avatarUrl }}"
                                alt="User Avatar" />
                        </div>
                        <h1 class="text-sm font-semibold capitalize truncate text-gray-700">
                            {{ Auth::user()->name }}</h1>
                    </div>
                    <div class="my-2 border-b border-gray-200"></div>
                    <a href="{{ route('dashboard') }}" class="block p-2 text-sm rounded-md text-gray-700 hover:bg-gray-100"
                        role="menuitem">Dashboard</a>
                    <a href="{{ route('profile.edit') }}"
                        class="block p-2 text-sm rounded-md text-gray-700 hover:bg-gray-100" role="menuitem">Profile</a>
                    <a href="" class="block p-2 text-sm rounded-md text-gray-700 hover:bg-gray-100"
                        role="menuitem">Settings</a>
                    <div class="my-2 border-b border-gray-200"></div>
                    <form method="POST" action="{{ route('logout') }}" role="none" style="margin-bottom: 0">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left p-2 text-sm rounded-md text-gray-700 hover:bg-gray-100"
                            role="menuitem" onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block p-2 text-sm rounded-md text-gray-700 hover:bg-gray-100">
                        Sign In
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="block p-2 text-sm rounded-md text-gray-700 hover:bg-gray-100">
                            Sign Up
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</div>
