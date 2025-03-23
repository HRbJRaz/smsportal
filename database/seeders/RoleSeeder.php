<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Role::create(['name' => 'Controller']);
        Role::create(['name' => 'SAG Member']);
        Role::create(['name' => 'Safety Officer']);
        Role::create(['name' => 'ATSU Manager']);
        Role::create(['name' => 'Director']);
        Role::create(['name' => 'NOSS Observer']);
        Role::create(['name' => 'NOSS Coordinator']);
        Role::create(['name' => 'NOSS Manager']);
        Role::create(['name' => 'ALoSP Officer']);
        Role::create(['name' => 'ALoSP Coordinator']);
        Role::create(['name' => 'ALoSP Manager']);
    }
}
