<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModelTest extends TestCase
{
    /* @return void */
    function test_it_load_the_user_list_page()
    {
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Welcome User');
    }

    /** @test */
    function it_loads_the_users_details_page() {
        $this->get('/usuarios/5')
            ->assertStatus(200)
            ->assertSee('El id del usuario es 5');
    }

    /** @test */
    function it_loads_create_new_user_page() {
        $this->get('/usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee('Usario nuevo');
    }

    /** @test */
    function it_loads_the_saludo_for_user_name_page() {
        $this->get('/saludo/Daniel')
            ->assertStatus(200)
            ->assertSee('Hola Daniel');
    }

    /** @test */
    function it_loads_the_saludo_for_nickname_page() {
        $this->get('/saludo/Daniel/Crack')
            ->assertStatus(200)
            ->assertSee('Hola Daniel, tu apodo es Crack');
    }
}
