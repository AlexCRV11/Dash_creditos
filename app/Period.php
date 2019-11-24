<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    public $fillable = [
        'nombre','slug', 'año'
    ];



    //////RELACIONES
    public function students()
    {
        return $this->hasMany('App\Student');
    }

    

    //ALMACENAMIENTO
    public function store($request){
    	//$slug=$request->año."-".$request->nombre;
 
        return self::create($request->all());
    }

    // VALIDACIÓN
    public function muUpdate($request){
        self::update($request->all() );
    }
}
