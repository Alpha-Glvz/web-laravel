<?php

namespace Tests\Feature;

use App\UserRole;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminUserSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_the_configured_admin_user(): void
    {
        $this->seed(AdminUserSeeder::class);

        $this->assertDatabaseHas('users', [
            'email' => 'galvezalpha@gmail.com',
            'role' => UserRole::Admin->value,
        ]);
    }

    public function test_it_does_not_duplicate_the_admin_user(): void
    {
        $this->seed(AdminUserSeeder::class);
        $this->seed(AdminUserSeeder::class);

        $this->assertDatabaseCount('users', 1);
    }
}
