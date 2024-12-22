<div>
<div class="flex flex-col md:flex-row md:space-x-4 mb-4 space-y-4 md:space-y-0">
    <!-- Search Input -->
    <input 
        name="search"
        type="text" 
        placeholder="Search by title..." 
        wire:model.live="search"
        class="border border-gray-300 px-4 py-2 rounded w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500"
    />

    <!-- Filter by Category Dropdown -->
    <select name="category_dropdown" wire:model.live="filterCategory" class="border border-gray-300 px-4 py-2 rounded w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">Filter by Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->name }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <!-- Filter by Level Dropdown -->
    <select name="level_dropdown" wire:model.live="filterLevel" class="border border-gray-300 px-4 py-2 rounded w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">Filter by Level</option>
        <option value="Beginner">Beginner</option>
        <option value="Intermediate">Intermediate</option>
        <option value="Advanced">Advanced</option>
    </select>

    <!-- Clear Filters Button -->
    <button 
        wire:click="clearFilters" 
        class="bg-blue-500 text-white px-4 py-2 rounded w-full md:w-auto hover:bg-blue-600 transition-colors duration-200"
    >
        Clear
    </button>
</div>


     <table class="lg:table hidden table-auto w-full border-collapse border border-gray-300 shadow-lg rounded-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left border-b">
                    <button wire:click="sortBy('title')" class="hover:underline">
                        Title
                        @if ($sortField === 'title')
                            <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </button>
                </th>
                <th class="px-4 py-2 text-left border-b">
                    <button wire:click="sortBy('level')" class="hover:underline">
                        Level
                        @if ($sortField === 'level')
                            <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </button>
                </th>
                <th class="px-4 py-2 border-b">Duration</th>
                <th class="px-4 py-2 border-b text-left">Category</th>
                <th class="px-4 py-2 border-b">Favorite</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">
                         <a wire:navigate href="{{ route('course.show', $course->slug) }}" class="text-blue-500 hover:underline">
                            {{ $course->title }}
                        </a>
                    </td>
                    <td class="px-4 py-2 border-b">{{ $course->level }}</td>
                    <td class="px-4 py-2 border-b">  {{ $course->formatted_duration; }} </td>

                   <td class="px-4 py-2 border-b">
                        @foreach ($course->categories as $category)
                            <span class="inline-block px-2 py-1 text-sm rounded text-white mr-2 mb-1" style="background-color: {{ $category->color ?? '#cccccc' }}">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </td>
                    <td class="px-4 py-2 border-b text-center">
                   
                         @livewire('favorite-course-button', ['course' => $course], key('favorite-button-' . $course->id .Str::random(4)), ['wire:poll.keep-alive'])
                   
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

       <div class="block lg:hidden ">
        @foreach ($courses as $course)
        <div class="flex flex-col md:flex-row items-start border-b pb-4 relative">
            <!-- Course Title -->
            <div class="flex-1 mb-2 md:mb-0 pt-2">
            
                <a wire:navigate href="{{ route('course.show', $course->slug) }}" class="text-lg font-bold text-blue-500 hover:underline">
                    
                      {{ Str::limit($course->title,30) }}
                </a>
                <p class="text-sm text-gray-600">
                    {{ Str::limit($course->description, 45) }}
                </p>
                <p class="text-sm text-gray-600">
                    Level: {{ $course->level }}
                </p>
                <p class="text-sm text-gray-600">
                    Duration: {{ $course->formatted_duration; }}
                </p>
                <p class="text-sm text-gray-600 mt-2">
                      @foreach ($course->categories as $category)
                            <span class="inline-block px-2 py-1 text-sm rounded text-white mr-2 mb-1" style="background-color: {{ $category->color ?? '#cccccc' }}">
                                {{ $category->name }}
                            </span>
                        @endforeach
                </p>

                  <div class="absolute top-2 right-4" >
                        @livewire('favorite-course-button', ['course' => $course], key('favorite-button-' . $course->id .Str::random(4)), ['wire:poll.keep-alive'])
                    </div>
            </div>
        
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $courses->links() }}
    </div>
</div>
