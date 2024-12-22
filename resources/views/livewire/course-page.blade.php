<div class="container mx-auto lg:px-8">
    <div class="grid grid-cols-12 gap-4">
        <!-- Left Column -->
        <div class="col-span-12 md:col-span-8">
                    <!-- Course Header -->
                    @livewire('course-header', ['course' => $course])     
                    <!-- Course Content -->
                     @livewire('course-content', ['course' => $course])     
        </div>

        <!-- Right Column -->
       <div class="col-span-12 md:col-span-4">
                @livewire('related-courses', ['course' => $course])
        </div>

    </div>
</div>
