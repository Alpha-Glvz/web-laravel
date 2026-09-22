<?php

namespace Tests\Feature;

use App\Models\User;
use App\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_view_users(): void
    {
        $this->get(route('users.index'))->assertRedirect(route('login'));
        $this->get(route('users.create'))->assertRedirect(route('login'));
    }

    public function test_consulta_users_cannot_manage_users(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('users.index'))
            ->assertForbidden();

        $this->actingAs($user)
            ->get(route('users.create'))
            ->assertForbidden();

        $this->actingAs($user)
            ->post(route('users.store'), [
                'name' => 'Nuevo',
                'email' => 'nuevo@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'role' => UserRole::Consulta->value,
            ])
            ->assertForbidden();

        $this->assertDatabaseMissing('users', ['email' => 'nuevo@example.com']);
    }

    public function test_admins_can_view_the_users_index(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)
            ->get(route('users.index'))
            ->assertOk()
            ->assertSee('Usuarios', false)
            ->assertSee($admin->email, false);
    }

    public function test_admins_can_create_users(): void
    {
        $admin = User::factory()->admin()->create();

        $response = $this->actingAs($admin)->post(route('users.store'), [
            'name' => 'Consulta TI',
            'email' => 'consulta@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => UserRole::Consulta->value,
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'email' => 'consulta@example.com',
            'role' => UserRole::Consulta->value,
        ]);
    }
}
