<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use App\Models\Division;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $division = Division::first()->id;
        $manager = User::first()->id;
        
        Unit::truncate();
        $csvFile = fopen(base_path('database/data/units.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Unit::create([
                    'designator' => $data['0'],
                    'name' => $data['1'],
                    'div_id' => $division,
                    'address' => $data['3'],
                    'phone' => $data['4'],
                    'fax' => $data['5'],
                    'afs' => $data['6'],
                    'manager_id' => $manager
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
