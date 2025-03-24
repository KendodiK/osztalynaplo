<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tantargyak = array();


        $handle = fopen(public_path("subjects.txt"), "r");

        while (($line = fgets($handle)) !== false) {
            $data = explode(';', trim($line)); // Trim, hogy eltávolítsuk az extra whitespace-t

            

            $tantargyak[] = [  // Helyes tömb hozzáadás
                'subject_name' => $data[1] ?? null,  
                
            ];  
        }

        fclose($handle);
        
        

        foreach ($tantargyak as $tan) {
            
            $subject = new Subject();
            $subject->subject_name = $tan['subject_name'];
            $subject->save();
        }
    
    }
}
