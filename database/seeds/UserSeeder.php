<?php

use App\Profession;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*        DB::insert('INSERT INTO profession (title) VALUE (:title)', [
            'title' => 'Profe. con SQL'
        ]); */

        /* $profession = DB::select('SELECT id FROM profession WHERE title = ?', ['Backend Developer']); */

        $profession = Profession::select('id')->first();

        //dd($profession); //$profession[0]

        User::create([
            'name' => 'Daniel',
            'email' => 'prueba@prueba.com',
            'password' => bcrypt('1234'),
            'is_admin' => true,
            'profession_id' => $profession->id
        ]);
    }
}
