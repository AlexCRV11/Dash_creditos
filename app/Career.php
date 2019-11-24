<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    
    public $fillable = [
        'nombre'
    ];

    //////RELACIONES
    public function students()
    {
        return $this->hasMany('App\Student');
    }

    //////ALMACENAMIENTO

    public function store($request){
        return self::create($request->all() );
    }

    // VALIDACIÓN
    public function muUpdate($request){
        self::update($request->all() );
    }
}
