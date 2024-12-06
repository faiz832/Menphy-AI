<div class="bg-white w-1/6 hidden lg:block rounded-md border border-gray-200">
    <div class="px-6 py-4">
        <h2 class="text-lg font-bold text-slate-900 mb-4">MENU</h2>
        <ul class="space-y-4">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center {{ Route::is('dashboard') ? 'text-primary relative' : 'text-slate-900' }}">
                    @if (Route::is('dashboard'))
                        <div class="absolute -left-6 h-full w-1 bg-primary"></div>
                    @endif
                    <svg class="h-5 w-5 mr-3 {{ Route::is('dashboard') ? 'text-primary' : 'text-slate-900' }}"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                {{-- <a href="{{ route('bmi.index') }}"
                    class="flex items-center {{ Route::is('bmi.index') || Route::is('bmi.create') ? 'text-primary relative' : 'text-slate-900' }}">
                    @if (Route::is('bmi.index') || Route::is('bmi.create'))
                        <div class="absolute -left-6 h-full w-1 bg-primary"></div>
                    @endif
                    <svg class="h-5 w-5 mr-3 {{ Route::is('bmi.index') || Route::is('bmi.create') ? 'text-primary relative' : 'text-slate-900' }}"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                    <span>BMI</span>
                </a> --}}
            </li>
            <li>
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center {{ Route::is('profile.edit') ? 'text-primary relative' : 'text-slate-900' }}">
                    @if (Route::is('profile.edit'))
                        <div class="absolute -left-6 h-full w-1 bg-primary"></div>
                    @endif
                    <svg class="h-5 w-5 mr-3 {{ Route::is('profile.edit') ? 'text-primary' : 'text-slate-900' }}"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.edit') }}"
                    class="flex items-center {{ Route::is('settings.edit') ? 'text-primary relative' : 'text-slate-900' }}">
                    @if (Route::is('settings.edit'))
                        <div class="absolute -left-6 h-full w-1 bg-primary"></div>
                    @endif
                    <svg class="h-5 w-5 mr-3 {{ Route::is('settings.edit') ? 'text-primary' : 'text-slate-900' }}"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center text-slate-900"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <svg class="h-5 w-5 mr-3 text-slate-900" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Log Out</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
