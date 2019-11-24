<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{   
    protected $fillable = [
        'RFC', 'nombre','paterno','materno','telefono','email','especialidad','profession_id'
    ];


    public function profession()
    {
    	return $this->belongsTo('App\Profession');
    }

    ////////////////////////////

    public function departament()
    {
        return $this->hasOne('App\Departament');
    }

    // Especificar si la relacion serà con actividad o la tabla grupo

    //public function groups()
    //{
    //    return $this->hasMany('App\Group');
    //}


    public function store($request){

       
        return self::create($request->all() );
    }

    // VALIDACIÓN
    public function muUpdate($request){
        self::update($request->all() );
    }

}
