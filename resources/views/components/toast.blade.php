@props(['type' => 'info', 'message'])

@php
    $classes =
        [
            'info' => 'bg-blue-500',
            'success' => 'bg-green-500',
            'warning' => 'bg-yellow-500',
            'error' => 'bg-red-500',
        ][$type] ?? 'bg-blue-500';
@endphp

<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed top-4 right-4 z-50">
    <div class="{{ $classes }} text-white px-6 py-4 rounded-md shadow-lg">
        <div class="flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ $message }}</span>
        </div>
    </div>
</div>
