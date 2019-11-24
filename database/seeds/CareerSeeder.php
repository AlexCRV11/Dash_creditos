<?php

use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('careers')->insert([
    		'nombre' => 'Ingeniería en Sistemas Computacionales',
    		]);
        DB::table('careers')->insert([
    		'nombre' => 'Ingeniería en Innovación Agrícola Sustentable',
    		]);
        DB::table('careers')->insert([
    		'nombre' => 'Ingeniería en Gestión Empresarial',
    		]);
        
    }
}
