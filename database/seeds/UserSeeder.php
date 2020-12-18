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

        $profession = Profession::select('id')->first();

        factory(User::class)->create([
            'profession_id' => $profession
        ]);

        factory(User::class)->create();
    }
}
