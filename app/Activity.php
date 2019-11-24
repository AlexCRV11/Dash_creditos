<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $fillable = [
        'nombre','descripcion','creditos','duracion','acom_id'
    ];
    ////////// RELACIONES
   

    public function acom()
    {
    	return $this->belongsTo('App\Acom');
    }
    /////////////////////

    public function groups()
    {
        return $this->hasMany('App\Group');
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
