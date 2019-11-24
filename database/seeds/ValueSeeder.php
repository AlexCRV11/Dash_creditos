<?php

use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('values')->insert([
    		'desempeño' => 'Insuficiente',
    		'valor' => '0',
    	]);
    	DB::table('values')->insert([
    		'desempeño' => 'Suficiente',
    		'valor' => '1',
    	]);
    	DB::table('values')->insert([
    		'desempeño' => 'Bueno',
    		'valor' => '2',
    	]);
    	DB::table('values')->insert([
    		'desempeño' => 'Notable',
    		'valor' => '3',
    	]);
    	DB::table('values')->insert([
    		'desempeño' => 'Excelente',
    		'valor' => '4',
    	]);
    }
}
