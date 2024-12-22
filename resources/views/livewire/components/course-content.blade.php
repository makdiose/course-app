<div class="bg-white shadow-md rounded-lg p-4 mb-4">
    <h2 class="text-2xl font-bold text-gray-900 mb-4">Course Content</h2>

    <div class="space-y-4">
        @foreach ($chapters as $chapter)
        <div x-data="{ open: false }" class="border rounded-lg overflow-hidden shadow">
            <!-- Chapter Title -->
            <div 
                class="bg-gray-100 px-4 py-3 cursor-pointer flex justify-between items-center"
                @click="open = !open">
                <h3 class="font-bold text-gray-800">{{ $chapter->title }}</h3>
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
            </div>

            <!-- Lessons Table -->
            <div x-show="open" class="bg-white">
                <table class="w-full text-left border-collapse">
                    <tbody>
                        @foreach ($chapter->lessons as $lesson)
                        <tr class="border-t">
                            <td class="px-4 py-2 text-gray-700 text-sm sm:text-base">
                                {{ $lesson->title }}
                            </td>
                            <td class="px-4 py-2 text-gray-500 text-center text-sm sm:text-base">
                                {{ $lesson->formatted_duration }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>
</div>
