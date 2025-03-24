<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        User::factory()->create([
            'name' => 'Haniff Rahman',
            'email' => 'haniffra@gmail.com',
        ]);
        $this->call(DivisionSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(RoleSeeder::class);
        $user = User::first();
        $user['unit_id'] = Unit::first()->id;
        $user->save();
    }
}
