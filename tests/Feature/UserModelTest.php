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
    function it_loads_the_users_details_page() 
    {
        $user = factory(User::class)->create([
            'name' => 'Daniel Vera'
        ]);

        $this->get('/usuarios/' . $user->id)
            ->assertStatus(200)
            ->assertSee('Daniel Vera');
    }

    /** @test */
    function it_display_a_404_error_if_the_users_is_not_find() 
    {
        $this->get('/usuarios/144')
            ->assertStatus(404)
            ->assertSee('Pagina no encontrada');
    }

    /** @test */
    function it_loads_create_new_user_page() 
    {
        $this->get('/usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee('Crear Nuevo Usuario');
    }

    /** @test */
    function it_loads_the_saludo_for_user_name_page() 
    {
        $this->get('/saludo/Daniel')
            ->assertStatus(200)
            ->assertSee('Hola Daniel');
    }

    /** @test */
    function it_loads_the_saludo_for_nickname_page() 
    {
        $this->get('/saludo/Daniel/Crack')
            ->assertStatus(200)
            ->assertSee('Hola Daniel, tu apodo es Crack');
    }

    /** @test */
    function it_creates_a_new_user() 
    {

        // Creamos el post mediante el test
        $this->from(route('users'))
            ->post('/usuarios', [
                'name' => 'Daniel Alberto',
                'email' => 'daniel@daniel.com',
                'password' => '123456'
            ])->assertRedirect(route('users'));

        // Verificamos si se creo en la base de datos
        $this->assertCredentials([
            'name' => 'Daniel Alberto',
            'email' => 'daniel@daniel.com',
            'password' => '123456'
        ]);
    }   

    /** @test */
    function the_name_is_required() 
    {
        DB::table('users')->truncate();

        $this->from(route('users.create'))
            ->post('/usuarios/', [
                'name' => '',
                'email' => 'daniel@danie.com',
                'password' => '123456'
            ])->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']);

        $this->assertEquals(0, User::count());

        $this->assertDatabaseMissing('users', [
            'email' => 'daniel@danie.com',
        ]);
    }

    /** @test */
    function the_email_is_required() 
    {
        DB::table('users')->truncate();

        $this->from(route('users.create'))
            ->post('/usuarios/', [
                'name' => 'Daniel',
                'email' => '',
                'password' => '123456'
            ])->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['email' => 'El campo email es obligatorio']);

        $this->assertEquals(0, User::count());
    }

    /** @test */
    function the_email_is_must_be_unique() 
    {
        DB::table('users')->truncate();

        factory(User::class)->create([
            'name' => 'Daniel',
            'email' => 'daniel@danie.com',
            'password' => '123456'
        ]);

        $this->from(route('users.create'))
            ->post('/usuarios/', [
                'name' => 'Daniel',
                'email' => 'daniel@danie.com',
                'password' => '123456'
            ])->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['email']);
    }

    /** @test */
    function the_password_is_required() 
    {
        DB::table('users')->truncate();

        $this->from(route('users.create'))
            ->post('/usuarios/', [
                'name' => 'Daniel',
                'email' => 'daniel@danie.com',
                'password' => ''
            ])->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['password' => 'El campo password es obligatorio']);

        $this->assertEquals(0, User::count());
    }
}
