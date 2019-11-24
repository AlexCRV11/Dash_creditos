<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $fillable = [
        'matricula','curp','nombre','paterno','materno','telefono','email','career_id','period_id'
    ];
    ////////// RELACIONES
    public function career()
    {
    	return $this->belongsTo('App\Career');
    }

    public function period()
    {
    	return $this->belongsTo('App\Period');
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
