<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acom extends Model
{
     public $fillable = [
        'nombre','descripcion','departament_id'
    ];

    //////////////////
     public function departaments(){
        return $this->belongsToMany('App\Departament')->withTimestamps();
    }

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
    ////////////// Almacenamiento
    public function store($request){       
        return self::create($request->all() );
    }

    // VALIDACIÓN
    public function muUpdate($request){
        self::update($request->all() );
    }

}
