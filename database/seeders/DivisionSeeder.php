<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Division;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Division::truncate();
        $user = User::first()->id;
        $csvFile = fopen(base_path('database/data/divisions.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Division::create([
                    'name' => $data['0'],
                    'abbr' => $data['1'],
                    'director_id' => $user
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
