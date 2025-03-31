<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = array();


        $handle = fopen(public_path("students.txt"), "r");

        while (($line = fgets($handle)) !== false) {
            $data = explode(';', trim($line)); // Trim, hogy eltávolítsuk az extra whitespace-t

            

            $students[] = [  // Helyes tömb hozzáadás
                'name' => $data[1] ?? null,  
                'gender' => $data[2] ?? null,
                'group_id' => $data[3] ?? null,
                'student_code' => $data[4] ?? null,
            ];  
        }

        fclose($handle);
        
        

        foreach ($students as $stud) {
            
            $student = new Student();
            $student->name = $stud['name'];
            $student->gender = $stud['gender'];
            $student->group_id = $stud['group_id'];
            $student->student_code = $stud['student_code'];
            $student->save();
        }
    }
}
