<?php

namespace Database\Seeders;

use App\Models\ConnectSubjectsGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConnectGroupSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adatok = [];

        $handle = fopen(public_path("connect_groups_subject.txt"), "r");

        while (($line = fgets($handle)) !== false) {
            $data = explode(';', trim($line)); // Trim, hogy eltávolítsuk az extra whitespace-t

            

            $adatok[] = [  // Helyes tömb hozzáadás
                'group_id' => $data[1] ?? null,  
                'subject_id' => $data[0] ?? null,
            ];  
        }

        fclose($handle);


        foreach ($adatok as $adat) {
            
            $temp = new ConnectSubjectsGroup();
            $temp->group_id = $adat['group_id'];
            $temp->subject_id = $adat['subject_id'];
            $temp->save();
        }
    }

}
