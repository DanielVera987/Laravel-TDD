<?php

use App\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('profession')->truncate();

        //DB::table('profession')->insert();
        
        factory(Profession::class)->create();

        Profession::create([
            'title' => 'Backend Developer'
        ]);


        DB::table('profession')->insert([
            'title' => 'Backend Developer php'
        ]);
    }
}
