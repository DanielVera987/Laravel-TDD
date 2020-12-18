<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    /* @return void */
     /** @test */
     function it_shows_the_users_list()
     {
         factory(User::class)->create([
             'name' => 'Joel'
         ]);
 
         factory(User::class)->create([
             'name' => 'Ellie',
         ]);
 
         $this->get('/usuarios')
             ->assertStatus(200)
             ->assertSee('Listado de usuarios')
             ->assertSee('Joel')
             ->assertSee('Ellie');
     }

    /** @test */
    function it_shows_a_default_message_if_the_users_list_is_empty()
    {
        DB::table('users')->truncate();
        
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados.');
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
