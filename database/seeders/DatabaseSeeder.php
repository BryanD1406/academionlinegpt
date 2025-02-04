<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Lesson;
use App\Models\Platform;
use App\Observers\LessonObserver;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Lesson::unsetEventDispatcher();

        Storage::deleteDirectory('courses');
        Storage::makeDirectory('courses');

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(LevelSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(PriceSeeder::class);
        $this->call(PlatformSeeder::class);
        // $this->call(CourseSeeder::class);

        Lesson::observe(LessonObserver::class);
    }
}
