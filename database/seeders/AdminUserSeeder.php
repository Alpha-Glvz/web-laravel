<?php

namespace Database\Seeders;

use App\Models\User;
use App\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = config('auth.admin.email');
        $name = config('auth.admin.name');
        $password = config('auth.admin.password');

        $existing = User::query()->where('email', $email)->first();

        if ($existing !== null) {
            $existing->forceFill([
                'name' => $name,
                'role' => UserRole::Admin,
            ])->save();

            $this->command?->info("El usuario admin ya existe: {$email}");

            return;
        }

        $plainPassword = filled($password) ? $password : Str::password(16);

        User::query()->create([
            'name' => $name,
            'email' => $email,
            'password' => $plainPassword,
            'role' => UserRole::Admin,
        ]);

        $this->command?->info("Usuario admin creado: {$email}");

        if (! filled($password)) {
            $this->command?->warn("Contraseña generada: {$plainPassword}");
            $this->command?->warn('Guárdala y define ADMIN_PASSWORD en .env.');
        }
    }
}
