<?php

namespace Tests\Feature\Livewire;

use App\Livewire\UserTable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserTableTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(UserTable::class)
            ->assertStatus(200);
    }
}
