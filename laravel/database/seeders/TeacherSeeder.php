<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tanarok = [];

        $handle = fopen(public_path("teachers.txt"), "r");

        while (($line = fgets($handle)) !== false) {
            $data = explode(';', trim($line)); // Trim, hogy eltávolítsuk az extra whitespace-t

            

            $tanarok[] = [  // Helyes tömb hozzáadás
                'name' => $data[1] ?? null,  
                'class_id' => $data[2] ?? null,
                'username' => $data[3] ?? null,
                'identification_code' => $data[4] ?? null,
                
            ];
        }

        fclose($handle);

        foreach ($tanarok as $tanar) {
            
            $teacher = new Teacher();
            $teacher->name = $tanar['name'];
            $teacher->class_id = $tanar['class_id'];
            $teacher->username = $tanar['username'];
            $teacher->identification_code = $tanar['identification_code'];
            $teacher->save();
        }
    }
}
