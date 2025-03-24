<?php

namespace Database\Seeders;

use App\Models\Mark;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jegyek = array();


        $handle = fopen(public_path("grades.txt"), "r");

        while (($line = fgets($handle)) !== false) {
            $data = explode(';', trim($line)); // Trim, hogy eltávolítsuk az extra whitespace-t

            

            $jegyek[] = [  // Helyes tömb hozzáadás
                'given_at' => $data[1] ?? null,  
                'student_id' => $data[2] ?? null,
                'subject_id' => $data[3] ?? null,
                'mark' => $data[4] ?? null,
            ];  
        }

        fclose($handle);
        
        

        foreach ($jegyek as $jegy) {
            
            $mark = new Mark();
            $mark->given_at = $jegy['given_at'];
            $mark->student_id = $jegy['student_id'];
            $mark->subject_id = $jegy['subject_id'];
            $mark->mark = $jegy['mark'];
            $mark->save();
        }
    
    }
}
