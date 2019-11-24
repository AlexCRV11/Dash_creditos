<?php

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
        DB::table('Professions')->insert([
    		'profesion' => 'Ingeniero',
    		'abreviatura' => 'ING',
    		]);

        DB::table('Professions')->insert([
            'profesion' => 'Licenciado',
            'abreviatura' => 'LIC',
            ]);
        DB::table('Professions')->insert([
            'profesion' => 'Arquitecto',
            'abreviatura' => 'ARQ.',
            ]);
    }
}
