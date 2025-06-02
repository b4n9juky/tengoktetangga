@props(['type' => 'info', 'title' => 'Informasi', 'message' => ''])

@php
$colors = [
'success' => ['bg' => 'bg-green-50', 'border' => 'border-green-200', 'text' => 'text-green-800', 'icon' => 'text-green-600', 'svg' => 'M5 13l4 4L19 7'],
'warning' => ['bg' => 'bg-yellow-50', 'border' => 'border-yellow-200', 'text' => 'text-yellow-800', 'icon' => 'text-yellow-500', 'svg' => 'M13 16h-1v-4h-1m1-4h.01'],
'error' => ['bg' => 'bg-red-50', 'border' => 'border-red-200', 'text' => 'text-red-800', 'icon' => 'text-red-600', 'svg' => 'M6 18L18 6M6 6l12 12'],
'info' => ['bg' => 'bg-blue-50', 'border' => 'border-blue-200', 'text' => 'text-blue-800', 'icon' => 'text-blue-600', 'svg' => 'M13 16h-1v-4h-1m1-4h.01'],
];
$color = $colors[$type] ?? $colors['info'];
@endphp

<div class="flex items-start p-4 mb-4 rounded-lg shadow-md border {{ $color['bg'] }} {{ $color['border'] }} {{ $color['text'] }} alert-auto-close">
    <svg class="w-6 h-6 mr-3 mt-1 {{ $color['icon'] }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $color['svg'] }}" />
    </svg>
    <div class="flex-1">
        <h3 class="text-sm font-semibold">{{ $title }}</h3>
        <p class="text-sm">{{ $message }}</p>
    </div>
    <button class="ml-4 {{ $color['icon'] }} hover:opacity-80" onclick="this.parentElement.remove()">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>