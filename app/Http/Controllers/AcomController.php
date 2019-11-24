<?php

namespace App\Http\Controllers;

use App\Acom;
use App\Personal;
use App\Departament;
use App\Auth;
use App\Http\Requests\Acom\StoreRequest;
use App\Http\Requests\Acom\UpdateRequest;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class AcomController extends Controller
{
    
	public function index(Request $request, Acom $acom)
    {     
        $request->user()->authorizeRoles(['administrador','departamento']);
        $departament="";
        $buscar = $request->input("buscar");
        $porPagina = $request->input('paginate') != null ? $request->input('paginate') : 20;
        if($request->user()->hasRole('administrador')){
            $acom = Acom::with('activities')->where('nombre', 'like','%'.$buscar.'%')->paginate($porPagina);
        }
        if($request->user()->hasRole('departamento')){        
            $personal =Personal::where('RFC',$request->user()->name)->with('departament')->first();
            $departament=Departament::where('personal_id',$personal->departament->id)->first();
            $acom=$departament->acoms()->with('activities')->where('nombre', 'like','%'.$buscar.'%')
            ->paginate($porPagina);
        }
        
        return view('acoms.index', [
            'acoms' => $acom ,
            'departament' => $departament,
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
        return view('acoms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request,Acom $acom)
    {
        $acom = $acom->store($request);
        toast('Se agregó correctamente la ACOM','success');
        return redirect()->route('admin.acom.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Acom $acom)
    {
        $buscar = $request->input("buscar");
        $porPagina = $request->input('paginate') != null ? $request->input('paginate') : 20;
        $acom=Acom::where('id',$acom->id)->first();
        
        $activities=$acom->activities()->where('nombre', 'like','%'.$buscar.'%')
        ->paginate($porPagina);
        return view('acoms.show',[
            'acom' => $acom,
            'activities' => $activities,
            'buscar' => $buscar,
            'porPagina' => $porPagina
        ]);
    }

    public function ver(Request $request, $depa){
        dd($request->depa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Acom $acom)
    {
        return view('acoms.edit',compact('acom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,Acom $acom)
    {
        $acom->muUpdate($request);
        toast('Se modificó correctamente la ACOM','success');
        return redirect()->route('admin.acom.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acom $acom)
    {
        $acom->delete();
        toast('Se eliminó correctamente el Profesor','success');
        return redirect()->route('admin.acom.index');
    }

}
