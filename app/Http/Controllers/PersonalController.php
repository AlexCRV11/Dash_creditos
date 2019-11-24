<?php

namespace App\Http\Controllers;

use App\Personal;
use App\User;
use App\Role;
use App\Profession;

use App\Http\Requests\Personal\StoreRequest;
use App\Http\Requests\Personal\UpdateRequest;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Personal $personal)
    {
        $professions=Profession::all();
        $buscar = $request->input("buscar");
        $porPagina = $request->input('paginate') != null ? $request->input('paginate') : 20;
        $personal = Personal::with('profession')->where('RFC', 'like','%'.$buscar.'%')->paginate($porPagina);


        return view('personals.personals', [
            'personals' => $personal,
            'buscar' => $buscar,
            'porPagina' => $porPagina
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Personal $personal)
    {   
        $user=$request->RFC;
        $password="ITFC-D#".substr($user, 0, 2).substr($user, -2);
        $role_user=Role::where('slug','docente')->first();

        $user= new User();
        $user->name = $request->RFC;
        $user->email =$request->email;
        $user->password =  bcrypt($password);
        $user->save();
        $user->roles()->attach($role_user);
        
        $personal = $personal->store($request);
        toast('Se agregó correctamente el profesor','success');
        return redirect()->route('admin.personal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        return view('personals.show', [
            'personal' => $personal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        return view('personals.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Personal $personal)
    {
        $personal->muUpdate($request);
        toast('Se modificó correctamente el profesor','success');
        return redirect()->route('admin.personal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
          $personal->delete();
        toast('Se eliminó correctamente el Profesor','success');
        return redirect()->route('admin.personal.index');
    }
}
