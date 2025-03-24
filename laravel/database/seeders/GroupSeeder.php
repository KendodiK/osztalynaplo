<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $osztalyok = [];

        $handle = fopen(public_path("groups.txt"), "r");

        while (($line = fgets($handle)) !== false) {
            $data = explode(';', trim($line)); // Trim, hogy eltávolítsuk az extra whitespace-t

            if (count($data) < 4) continue; // Ha nincs elég adat, ugorja át

            $osztalyok[] = [  // Helyes tömb hozzáadás
                'number' => $data[1] ?? null,  
                'sign' => $data[2] ?? null,
                'start_time' => $data[3] ?? null,
            ];
        }

        fclose($handle);



        /*$osztalyok = [];

        $handle = fopen(public_path("groups.txt"),"r");

        while (!feof($handle)) {
            $data = explode(';',fgets($handle));

            $osztalyok += [
                'number' => $data[1],
                'sign' => $data[2],
                'start_time' => $data[3],
            ];

        }

        fclose($handle);*/

        //$lines = file(public_path("groups.txt"), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        /*foreach ($lines as $line) {

            $data = explode(";", $line);

            $osztalyok += [
                'number' => $data[1],
                'sign' => $data[2],
                'start_time' => $data[3],
            ];
        }*/

        foreach ($osztalyok as $osztaly) {
            

            $group = new Group();
            $group->number = $osztaly['number'];
            $group->sign = $osztaly['sign'];
            $group->start_time = $osztaly['start_time'];
            $group->save();
        }

    }
}
