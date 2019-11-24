<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('Roles')->insert([
    		'name' => 'Administrador',
    		'slug' => 'administrador',
    		'description' => 'Usuario adminitrador (todos los permisos)',
    		]);
       DB::table('Roles')->insert([
    		'name' => 'Departamento',
    		'slug' => 'departamento',
    		'description' => 'Usuario responsable de un departamento',
    		]);

       DB::table('Roles')->insert([
    		'name' => 'Responsable ACOM',
    		'slug' => 'responsable-acom',
    		'description' => 'Usuario encargado de coordinar y evaluar el desempelo de los estudiantes en las actividades complementarias',
    		]);

        DB::table('Roles')->insert([
            'name' => 'Docente',
            'slug' => 'docente',
            'description' => 'Usuario de privilegios limitados, solamente tiene permisos de hacer consultas',
            ]);

       DB::table('Roles')->insert([
    		'name' => 'Estudiante',
    		'slug' => 'estudiante',
    		'description' => 'Usuario de privilegios limitados, solamente tiene permisos de hacer consultas',
    		]);
    }
}
