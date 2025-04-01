<?php

namespace Database\Seeders;
use App\Models\ConnectSubjectsGroupTeacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConnectSubjectTeacherGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adatok = [];

        $handle = fopen(public_path("connect_subject_group_teacher.txt"), "r");

        while (($line = fgets($handle)) !== false) {
            $data = explode(';', trim($line)); // Trim, hogy eltávolítsuk az extra whitespace-t

            

            $adatok[] = [  // Helyes tömb hozzáadás
                'subject_id' => $data[0] ?? null,  
                'teacher_id' => $data[2] ?? null,
                'group_id' => $data[1] ?? null,
            ];  
        }

        fclose($handle);


        foreach ($adatok as $adat) {
            
            $temp = new ConnectSubjectsGroupTeacher();
            $temp->subject_id = $adat['subject_id'];
            $temp->group_id = $adat['group_id'];
            $temp->teacher_id = $adat['teacher_id'];
            $temp->save();
        }
    }
}
