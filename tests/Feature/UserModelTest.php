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
        $user = factory(User::class)->create([
            'name' => 'Daniel Vera'
        ]);

        $this->get('/usuarios/' . $user->id)
            ->assertStatus(200)
            ->assertSee('Daniel Vera');
    }

    /** @test */
    function it_display_a_404_error_if_the_users_is_not_find() {
        $this->get('/usuarios/144')
            ->assertStatus(404)
            ->assertSee('Pagina no encontrada');
    }

    /** @test */
    function it_loads_create_new_user_page() {
        $this->get('/usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee('Crear Nuevo Usuario');
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

    /** @test */
    function it_creates_a_new_user() {
        // Creamos el post mediante el test
        $this->post('/usuarios', [
            'name' => 'Daniel Alberto',
            'email' => 'daniel@daniel.com',
            'password' => '1234'
        ]);

        // Verificamos si se creo en la base de datos
        $this->assertDatabaseHas('users', [
            'name' => 'Daniel Alberto',
            'email' => 'daniel@daniel.com',
        ]);
    }   
}
