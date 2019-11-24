<?php

namespace App\Http\Controllers;


use App\Departament;
use App\acom;
use App\personal;
use App\User;
use App\Role;


use App\Http\Requests\Departament\StoreRequest;
use App\Http\Requests\Departament\UpdateRequest;
use App\Http\Requests\Departament\AsignationRequest;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Departament $departament)
    {
        $buscar = $request->input("buscar");
        $porPagina = $request->input('paginate') != null ? $request->input('paginate') : 20;
        $departament = Departament::with('personal','acoms')->where('departamento', 'like','%'.$buscar.'%')->paginate($porPagina);

        return view('departaments.index', [
            'departaments' => $departament,
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
        return view('departaments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Departament $departament)
    {
        $departament = $departament->store($request);
        $pers=Personal::where('id',$request->personal_id)->first();
        $rol=Role::where('slug','departamento')->first();
        $user = User::where('name',$pers->RFC)->first();
        $user->roles()->attach($rol);
        toast('Se agregó correctamente el departamento','success');
        return redirect()->route('admin.departament.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Departament $departament)
    {   
        $buscar = $request->input("buscar");
        $porPagina = $request->input('paginate') != null ? $request->input('paginate') : 20;
        $departament=Departament::where('id',$departament->id)->first();
        $acoms=$departament->acoms()->with('activities')->where('nombre', 'like','%'.$buscar.'%')
        ->paginate($porPagina);
        return view('departaments.show',[
            'departament' => $departament,
            'acoms' => $acoms,
            'buscar' => $buscar,
            'porPagina' => $porPagina
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function asignation(Request $request)
    {   
        
        $mensaje= $request->session()->get('error');
        $depa= $request->session()->get('departament');
        $acom= $request->session()->get('acom');
        $request->session()->forget('error');
        $request->session()->forget('departament');
        $request->session()->forget('acom');
        
        return view('departaments.asignar',[
            'depa' => $depa,
            'acom' => $acom,
            'mensaje' => $mensaje
        ]);
        
    }

    public function desasignation(Request $request){
            $ac=$request->acom;
            $dep=$request->depa;
            $departament=Departament::where('id',$dep)->first();
            $acom=Acom::where('id',$ac)->first();
            $departament->acoms()->detach($acom);
            toast('Se desvinculó la ACOM del departamento','success');
            return redirect()->route('admin.departament.show',[
                'departament' => $departament
            ]);
    }

    public function relacion(AsignationRequest $request)
    {
        $dep=$request->id;
        $ac=$request->acom_id;
        $departament=Departament::where('id',$dep)->first();
        $acom=Acom::where('id',$ac)->first();
        if($departament->acoms()->where('acom_id',$ac)->exists()){
        $error= "El departamento ya tiene asignado la ACOM";
        $request->session()->put('error',$error);
        $request->session()->put('departament',$dep);
        $request->session()->put('acom',$ac);
        return redirect()->route('admin.departament.asignation');
        }
        $departament->acoms()->attach($acom);

        toast('Se asignó una ACOM al departamento','success');
        return redirect()->route('admin.departament.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function edit(Departament $departament)
    {
        return view('departaments.edit', compact('departament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Departament $departament)
    {
        $departament->muUpdate($request);
        toast('Se modificó correctamente el departamento','success');
        return redirect()->route('admin.departament.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departament $departament)
    {
        $departament->delete();
        $pers=Personal::where('id',$departament->personal_id)->first();
        $user=User::where('name',$pers->RFC)->first();
        $user->roles()->detach("2");
        toast('Se eliminó correctamente el departamento','success');
        return redirect()->route('admin.departament.index');
    }
}
