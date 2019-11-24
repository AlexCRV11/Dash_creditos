<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $fillable = [
        'name', 'slug', 'description'
    ];

    // RELACIONES
    public function permissions(){
        return $this->hasMany('App\Permission');
    }

    public function users(){
        // withTimestamps es una funcion para guardar fecha de creación y modificación en las tablas
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    // ALMACENAMIENTO
    public function store($request){

        $slug = str_slug($request->name, '-');
        return self::create($request->all() + [
            'slug' => $slug
        ]);
    }

    // VALIDACIÓN
    public function muUpdate($request){
        $slug = str_slug($request->name, '-');
        self::update($request->all() + [
            'slug' => $slug
        ]);
    }

    // RECUPERACIÓN DE INFORMACIÓN

    // OTRAS OPERACIONES
}
