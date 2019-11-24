<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    public $fillable = [
        'departamento','cargo', 'personal_id'
    ];

    public function personal()
    {
    	return $this->belongsTo('App\Personal')->withDefault(['RFC' => null]);
    }

    public function acoms(){
        return $this->belongsToMany('App\Acom')->orderBy('nombre','asc')->withTimestamps();
    }
    /////////////////////////////////////////
     public function store($request){
        return self::create($request->all() );
    }

    // VALIDACIÓN
    public function muUpdate($request){
        self::update($request->all() );
    }
}
