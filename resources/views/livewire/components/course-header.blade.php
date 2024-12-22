<div class="bg-blue-500 text-white shadow-md rounded-lg mb-8 relative">
    <div class="p-6">
        <div class="absolute top-4 right-4" >
            @livewire('favorite-course-button', ['course' => $course])
        </div>
        <h1 class="text-3xl font-bold">{{ $course->title }}</h1>
        <p class="mt-4">{{ $course->description }}</p>
        <div class="flex items-center">
            <p class="text-sm">Duration: {{ $course->formatted_duration }}</p>
        </div>
    </div>
</div>
