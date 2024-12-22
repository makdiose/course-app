<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">Related Courses</h2>
    <div class="space-y-4">
        @foreach ($relatedCourses as $related)
        <div class="flex flex-col md:flex-row items-start border-b pb-4">
            <!-- Course Title -->
            <div class="flex-1 mb-2 md:mb-0">
                <a wire:navigate href="{{ route('course.show', $related->slug) }}" class="text-lg font-bold text-blue-500 hover:underline">
                    {{ $related->title }}
                </a>
                <p class="text-sm text-gray-600">
                    {{ Str::limit($related->description, 80) }}
                </p>
                <p class="text-sm text-gray-600">
                    Level: {{ $related->level }}
                </p>
                <p class="text-sm text-gray-600">
                    Duration: {{ $related->formatted_duration }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
