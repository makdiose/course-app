<div class="bg-gray-50 min-h-screen">
    <!-- Page Heading -->
    <div class="bg-blue-500 text-white p-6 text-center shadow-lg">
        <h1 class="text-3xl font-bold">Welcome to the Course Portal</h1>
        <p class="mt-2 text-lg">Browse and explore courses to enhance your skills.</p>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto p-6">
        <!-- Courses Section Heading -->
        <div class="text-center mb-8">
            <h2 class="text-2xl font-semibold text-gray-800">Available Courses</h2>
            <p class="text-gray-600">Filter, sort, and search for your desired courses below.</p>
        </div>

        <!-- CoursesTable Component -->
        <div class="bg-white shadow rounded p-4">
            @livewire('courses-table')
        </div>
    </div>
</div>
