<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomeTest extends TestCase
{
    public function test_the_welcome_page_is_displayed(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Bienvenido', false)
            ->assertSee('Entrar al sistema', false);
    }
}
