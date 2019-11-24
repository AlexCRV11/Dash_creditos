<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    public $fillable = [
        'profesion', 'abreviatura',
    ];


    //// RELACION 
    public function personal ()
    {
    	return $this->hasMany('App\Personal');
    }

     ////// ALMACENAMIENTO
    public function store($request){
        return self::create($request->all() );
    }

    // VALIDACIÓN
    public function muUpdate($request){
        self::update($request->all() );
    }
}
