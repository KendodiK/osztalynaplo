<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GroupSeeder::class,
            SubjectSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            MarkSeeder::class,
            ConnectGroupSubjectSeeder::class,
            ConnectSubjectTeacherGroupSeeder::class,
        ]);
        
    }   
}
