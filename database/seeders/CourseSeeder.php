<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = Courses::factory()->create([
            'course_name' => 'M.Sc. (Five Year Integrated) in Computer Science (Artificial Intelligence & Data Science)'
        ]);

        $course = Courses::factory()->create([
            'course_name' => 'M.Tech Computer Science & Engineering (Data Science and Artificial Intelligence)[Part-Time]'
        ]);
    }
}
