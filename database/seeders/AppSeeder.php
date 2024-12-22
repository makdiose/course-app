<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AppSeeder extends Seeder
{
    public function run()
    {
        // Truncate existing data
        DB::table('course_category')->truncate();
        DB::table('lessons')->truncate();
        DB::table('chapters')->truncate();
        DB::table('courses')->truncate();
        DB::table('categories')->truncate();
        
        // Sample categories with colors
        $categories = [
            ['name' => 'Technology', 'color' => '#8B0000'],
            ['name' => 'Business Skills', 'color' => '#00008B'],
            ['name' => 'Design', 'color' => '#4B0082'],
            ['name' => 'Marketing', 'color' => '#006400'],
            ['name' => 'Soft Skills', 'color' => '#8B4513'],
            ['name' => 'Productivity', 'color' => '#2F4F4F'],
            ['name' => 'Technical', 'color' => '#5F9EA0'],
            ['name' => 'Office', 'color' => '#2C2C2C'],
            ['name' => 'Health', 'color' => '#FF0000'],
            ['name' => 'Finance', 'color' => '#FFA500'],
            ['name' => 'Education', 'color' => '#FFFF00'],
        ];
    
        // Insert categories
        $categoryIds = [];
        foreach ($categories as $category) {
            $categoryIds[] = DB::table('categories')->insertGetId([
                'name' => $category['name'],
                'color' => $category['color'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
        // Sample courses with categories
        $courses = [
            [
                'title' => 'Introduction to Python',
                'level' => 'Beginner',
                'description' => 'Learn the basics of Python programming.',
                'categories' => [$categoryIds[0], $categoryIds[6]], // Technology, Technical
                'slug' => Str::slug('Introduction to Python'),
            ],
            [
                'title' => 'Advanced Excel Techniques',
                'level' => 'Advanced',
                'description' => 'Master advanced Excel formulas and tools.',
                'categories' => [$categoryIds[7]], // Office
                'slug' => Str::slug('Advanced Excel Techniques'),
            ],
            [
                'title' => 'Creative Graphic Design',
                'level' => 'Intermediate',
                'description' => 'Explore creative techniques in graphic design.',
                'categories' => [$categoryIds[2], $categoryIds[5]], // Design, Productivity
                'slug' => Str::slug('Creative Graphic Design'),
            ],
            [
                'title' => 'Digital Marketing Basics',
                'level' => 'Beginner',
                'description' => 'Understand the fundamentals of digital marketing.',
                'categories' => [$categoryIds[3]], // Marketing
                'slug' => Str::slug('Digital Marketing Basics'),
            ],
            [
                'title' => 'Leadership Skills for Managers',
                'level' => 'Intermediate',
                'description' => 'Develop essential leadership skills for team management.',
                'categories' => [$categoryIds[4], $categoryIds[1]], // Soft Skills, Business Skills
                'slug' => Str::slug('Leadership Skills for Managers'),
            ],
            [
                'title' => 'Time Management Hacks',
                'level' => 'Beginner',
                'description' => 'Learn effective time management strategies.',
                'categories' => [$categoryIds[5]], // Productivity
                'slug' => Str::slug('Time Management Hacks'),
            ],
            [
                'title' => 'JavaScript for Web Development',
                'level' => 'Advanced',
                'description' => 'Build dynamic websites using advanced JavaScript techniques.',
                'categories' => [$categoryIds[0]], // Technology
                'slug' => Str::slug('JavaScript for Web Development'),
            ],
            [
                'title' => 'Public Speaking Mastery',
                'level' => 'Intermediate',
                'description' => 'Master the art of public speaking and presentation.',
                'categories' => [$categoryIds[4]], // Soft Skills
                'slug' => Str::slug('Public Speaking Mastery'),
            ],
            [
                'title' => 'Introduction to PHP',
                'level' => 'Beginner',
                'description' => 'Learn the basics of PHP programming.',
                'categories' => [$categoryIds[0], $categoryIds[6]], // Technology, Technical
                'slug' => Str::slug('Introduction to PHP'),
            ],
            [
                'title' => 'Advanced PowerPoint Techniques',
                'level' => 'Advanced',
                'description' => 'Master advanced PowerPoint formulas and tools.',
                'categories' => [$categoryIds[7]], // Office
                'slug' => Str::slug('Advanced PowerPoint Techniques'),
            ],
            [
                'title' => 'Creative Web Design',
                'level' => 'Intermediate',
                'description' => 'Explore creative techniques in web design.',
                'categories' => [$categoryIds[2], $categoryIds[5]], // Design, Productivity
                'slug' => Str::slug('Creative Web Design'),

            ],
            [
                'title' => 'SEO Basics',
                'level' => 'Beginner',
                'description' => 'Understand the fundamentals of SEO.',
                'categories' => [$categoryIds[3]], // Marketing
                'slug' => Str::slug('SEO Basics'),
            ],
            [
                'title' => 'Negotiation Skills for Managers',
                'level' => 'Intermediate',
                'description' => 'Develop essential negotiation skills for team management.',
                'categories' => [$categoryIds[4], $categoryIds[1]], // Soft Skills, Business Skills
                'slug' => Str::slug('Negotiation Skills for Managers'),
            ],
            [
                'title' => 'Stress Management Hacks',
                'level' => 'Beginner',
                'description' => 'Learn effective stress management strategies.',
                'categories' => [$categoryIds[5]], // Productivity
                'slug' => Str::slug('Stress Management Hacks'),
            ],
            [
                'title' => 'React for Web Development',
                'level' => 'Advanced',
                'description' => 'Build dynamic websites using advanced React techniques.',
                'categories' => [$categoryIds[0]], // Technology
                'slug' => Str::slug('React for Web Development'),
            ],
            [
                'title' => 'Negotiation Mastery',
                'level' => 'Intermediate',
                'description' => 'Master the art of negotiation and persuasion.',
                'categories' => [$categoryIds[4]], //
                'slug' => Str::slug('Negotiation Mastery'), 
            ],
            [
                'title' => 'Introduction to Ruby',
                'level' => 'Beginner',
                'description' => 'Learn the basics of Ruby programming.',
                'categories' => [$categoryIds[0], $categoryIds[6]], // Technology, Technical
                'slug' => Str::slug('Introduction to Ruby'),
            ],
            [
                'title' => 'Advanced Word Techniques',
                'level' => 'Advanced',
                'description' => 'Master advanced Word formulas and tools.',
                'categories' => [$categoryIds[7]], // Office
                'slug' => Str::slug('Advanced Word Techniques'),
            ],
            [
                'title' => 'Creative UX Design',
                'level' => 'Intermediate',
                'description' => 'Explore creative techniques in UX design.',
                'categories' => [$categoryIds[2], $categoryIds[5]], // Design, Productivity
                'slug' => Str::slug('Creative UX Design'),
            ],
            [
                'title' => 'Content Marketing Basics',
                'level' => 'Beginner',
                'description' => 'Understand the fundamentals of content marketing.',
                'categories' => [$categoryIds[3]], // Marketing
                'slug' => Str::slug('Content Marketing Basics'),
            ],
            [
                'title' => 'Conflict Resolution Skills for Managers',
                'level' => 'Intermediate',
                'description' => 'Develop essential conflict resolution skills for team management.',
                'categories' => [$categoryIds[4], $categoryIds[1]], // Soft Skills, Business Skills
                'slug' => Str::slug('Conflict Resolution Skills for Managers'),
            ],
            [
                'title' => 'Procrastination Management Hacks',
                'level' => 'Beginner',
                'description' => 'Learn effective procrastination management strategies.',
                'categories' => [$categoryIds[5]], // Productivity
                'slug' => Str::slug('Procrastination Management Hacks'),
            ],
            [
                'title' => 'Angular for Web Development',
                'level' => 'Advanced',
                'description' => 'Build dynamic websites using advanced Angular techniques.',
                'categories' => [$categoryIds[0]], // Technology
                'slug' => Str::slug('Angular for Web Development'),
            ],
            [
                'title' => 'Conflict Resolution Mastery',
                'level' => 'Intermediate',
                'description' => 'Master the art of conflict resolution and mediation.',
                'categories' => [$categoryIds[4]], // Soft Skills
                'slug' => Str::slug('Conflict Resolution Mastery'),
            ],
        ];
    
        // Insert courses, chapters, and lessons
        foreach ($courses as $course) {
            // Insert course
            $courseId = DB::table('courses')->insertGetId([
                'title' => $course['title'],
                'level' => $course['level'],
                'description' => $course['description'],
                'slug' => $course['slug'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Attach categories to the course
            foreach ($course['categories'] as $categoryId) {
                DB::table('course_category')->insert([
                    'course_id' => $courseId,
                    'category_id' => $categoryId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
    
            // Create chapters and lessons
            for ($chapterIndex = 1; $chapterIndex <= 3; $chapterIndex++) {
                $chapterId = DB::table('chapters')->insertGetId([
                    'course_id' => $courseId,
                    'title' => "Chapter $chapterIndex",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
    
                // Create lessons for each chapter
                for ($lessonIndex = 1; $lessonIndex <= 3; $lessonIndex++) {
                    DB::table('lessons')->insert([
                        'chapter_id' => $chapterId,
                        'title' => "Lesson $lessonIndex for Chapter $chapterIndex",
                        'duration' => rand(300, 900), // Random duration between 5 to 15 minutes
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }


        //Seed users, use John Doe, user@email.com, 123456
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'user@email.com',
            'password' => bcrypt('123456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
    
    
}
