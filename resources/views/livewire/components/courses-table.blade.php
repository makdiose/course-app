<div>
 <div class="flex space-x-4 mb-4">
    <!-- Search Input -->
    <input 
        type="text" 
        placeholder="Search by title..." 
        wire:model.live="search"
        class="border px-4 py-2 rounded w-1/3"
    />

    <!-- Filter by Category Dropdown -->
    <select wire:model.live="filterCategory" class="border px-4 py-2 rounded w-1/3">
        <option value="">Filter by Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->name }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <!-- Filter by Level Dropdown -->
    <select wire:model.live="filterLevel" class="border px-4 py-2 rounded w-1/3">
        <option value="">Filter by Level</option>
        <option value="Beginner">Beginner</option>
        <option value="Intermediate">Intermediate</option>
        <option value="Advanced">Advanced</option>
    </select>

    <!-- Clear Filters Button -->
    <button 
        wire:click="clearFilters" 
        class="bg-gray-200 text-black px-4 py-2 rounded"
    >
        Clear 
    </button>
</div>


    <table class="table-auto w-full border-collapse border border-gray-300 shadow-lg rounded-lg">
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
                <th class="px-4 py-2 border-b">Category</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">
                         <a href="{{ route('courses.show', $course->slug) }}" class="text-blue-500 hover:underline">
                            {{ $course->title }}
                        </a>
                    </td>
                    <td class="px-4 py-2 border-b">{{ $course->level }}</td>
                    <td class="px-4 py-2 border-b">
                        @php
                            $duration = $course->total_duration;
                        @endphp

                        @if ($duration >= 3600)
                            {{ floor($duration / 3600) }} hr 
                            @if ($duration % 3600 >= 60)
                                {{ floor(($duration % 3600) / 60) }} min
                            @endif
                        @elseif ($duration >= 60)
                            {{ floor($duration / 60) }} min 
                            @if ($duration % 60 > 0)
                                {{ $duration % 60 }} sec
                            @endif
                        @else
                            {{ $duration }} sec
                        @endif
                    </td>

                   <td class="px-4 py-2 border-b">
                        @foreach ($course->categories as $category)
                            <span class="inline-block px-2 py-1 text-sm rounded text-white mr-2 mb-1" style="background-color: {{ $category->color ?? '#cccccc' }}">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </td>


                    <td class="px-4 py-2 border-b">
                        @if (auth()->check())
                            <button 
                                wire:click="toggleFavorite({{ $course->id }})"
                                class="text-{{ auth()->user()->favorites->contains($course->id) ? 'red' : 'gray' }}-500 hover:underline"
                            >
                                {{ auth()->user()->favorites->contains($course->id) ? 'Unfavorite' : 'Favorite' }}
                            </button>
                        @else
                            <span class="text-gray-500">Log in to favorite</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $courses->links() }}
    </div>
</div>
