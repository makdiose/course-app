<!-- resources/views/livewire/favorite-course-button.blade.php -->

@props(['courseId'])

<div class="relative inline-block">
    @if (auth()->check())
        <button
            wire:click="toggleFavorite"
            class="focus:outline-none"
            aria-label="{{ $isFavorite ? 'Unfavorite' : 'Favorite' }}"
        >
            @if ($isFavorite)
                <!-- Filled Heart Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 
                    8.5 2 5.42 4.42 3 7.5 3c1.74 0 
                    3.41 0.81 4.5 2.09C13.09 3.81 
                    14.76 3 16.5 3 19.58 3 22 
                    5.42 22 8.5c0 3.78-3.4 
                    6.86-8.55 11.54L12 21.35z"/>
                </svg>
            @else
                <!-- Outlined Heart Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-red-500 transition-colors duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 21.35l-1.45-1.32C5.4 
                    15.36 2 12.28 2 8.5 2 5.42 
                    4.42 3 7.5 3c1.74 0 
                    3.41 0.81 4.5 2.09C13.09 3.81 
                    14.76 3 16.5 3 19.58 3 22 
                    5.42 22 8.5c0 3.78-3.4 
                    6.86-8.55 11.54L12 21.35z"/>
                </svg>
            @endif
        </button>
    @else
        <button
            onclick="showLoginTooltip(event, '{{ $courseId }}')"
            class="focus:outline-none relative"
            aria-label="Log in to favorite"
            data-course-id="{{ $courseId }}"
        >
            <!-- Outlined Heart Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-red-500 transition-colors duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 21.35l-1.45-1.32C5.4 
                15.36 2 12.28 2 8.5 2 5.42 
                4.42 3 7.5 3c1.74 0 3.41 0.81 
                4.5 2.09C13.09 3.81 14.76 3 
                16.5 3 19.58 3 22 5.42 
                22 8.5c0 3.78-3.4 6.86-8.55 
                11.54L12 21.35z"/>
            </svg>

            <!-- Tooltip with Unique ID -->
            <div id="login-tooltip-{{ $courseId }}" role="tooltip" class="absolute bottom-full mb-2 left-1/2 transform -translate-x-1/2 z-50 hidden bg-gray-800 text-white text-sm rounded py-1 px-2 w-40 text-center shadow-lg">
                You need to log in to favorite courses.
                <svg class="absolute top-full left-1/2 transform -translate-x-1/2 w-2 h-2 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512">
                    <path d="M143 352.3L7 216.3C-5.9 205.4-5.9 188.6 7 
                    177.7c12-10.9 28.8-10.9 40.8 
                    0L160 292.3l112.2-114c12-10.9 
                    28.8-10.9 40.8 0 12 10.9 
                    12 27.7 0 38.6L177 352.3c-12 11-28.8 
                    11-40.8 0z"/>
                </svg>
            </div>
        </button>
    @endif
</div>

<!-- Inline Script for Tooltip Functionality -->
<script>
    function showLoginTooltip(event, courseId) {
        // Prevent default button behavior
        event.preventDefault();

        // Construct the unique tooltip ID
        const tooltipId = `login-tooltip-${courseId}`;

        // Get the tooltip element by ID
        const tooltip = document.getElementById(tooltipId);

        if (tooltip) {
            // Toggle tooltip visibility
            tooltip.classList.toggle('hidden');

            // Hide the tooltip after 3 seconds
            setTimeout(() => {
                tooltip.classList.add('hidden');
            }, 3000);
        }
    }

    // Optional: Hide all tooltips when clicking outside
    document.addEventListener('click', function(event) {
        const tooltips = document.querySelectorAll('[id^="login-tooltip-"]');
        tooltips.forEach(tooltip => {
            const button = tooltip.parentElement;
            if (!button.contains(event.target)) {
                tooltip.classList.add('hidden');
            }
        });
    });
</script>
