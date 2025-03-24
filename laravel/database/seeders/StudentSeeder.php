<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [];

        if (($handle = fopen("students.txt", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $students[] = [
                    "name" => $data[1],
                    "gender" => $data[2],
                    "classId" => (int)$data[3]
                ];
            }
            fclose($handle);
        }
        else{
            echo "Valami hiba történt a tanulók beolvasásakor";
        }
        
        foreach ($students as $student) {
            
        }
    }
}
