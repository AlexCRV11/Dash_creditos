<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // RELACIONES
    public function permissions(){
        return $this->belongsToMany('App\Permission')->withTimestamps();
    }

    public function roles(){
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    //////////VALIDACION ROLES /////////////

    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401,'This action is unauthorized');
    }

    public function showMenu($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
    }



    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }
    

    public function hasRole($role){
        if ($this->roles()->where('slug',$role)->first()) {
            return true;
        }
        return false;
    }


    // ALMACENAMIENTO
    public function store($request,$tipo){

        dd($request);
        $user=$request->RFC;
        $email=$request->email;

        if ($tipo=="Docente") {
            $password="ITFC-D#".substr($user, 0, 2).substr($user, -2);
        }
        
        if ($tipo=="Estudiante") {
            $password="ITFC-E#".substr($user, 0, 2).substr($user, -2);
        }

        User::create(
        [
            'name'      =>  $user,
            'email'     =>  $email,
            'password'  =>  bcrypt($password),
        ]);

    }

    // VALIDACIÓN

    // RECUPERACIÓN DE INFORMACIÓN

    // OTRAS OPERACIONES
}
