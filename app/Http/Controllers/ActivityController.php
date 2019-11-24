<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Acom;
use App\Personal;
use App\Departament;

use App\Http\Requests\Activity\StoreRequest;
use App\Http\Requests\Activity\UpdateRequest;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class ActivityController extends Controller
{
       


	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Activity $activity)
    {
        $request->user()->authorizeRoles(['administrador','responsble-acom']);
        $buscar = $request->input("buscar");
        $porPagina = $request->input('paginate') != null ? $request->input('paginate') : 20;
        if($request->user()->hasRole('administrador')){
        $activity = Activity::with('acom')->where('nombre', 'like','%'.$buscar.'%')->paginate($porPagina);
        }
        //if($request->user()->hasRole('departamento')){
        //    $personal =Personal::where('RFC',$request->user()->name)->with('departament')->first();
        //    $departament=Departament::where('personal_id',$personal->departament->id)->first();
        //        $activities="";
                //$collection = Collection::make($activity);
        //    $acoms=$departament->acoms()->with('activities')->get();
        //    foreach ($acoms as $acom ) {
                
        //        if(empty($activities)){
        //        $activities = $acom->activities()->with('acom')->where('nombre', 'like','%'.$buscar.'%')->paginate($porPagina);
        //        }
        //        else{
        //          $activity=$acom->activities()->with('acom')->where('nombre', 'like','%'.$buscar.'%')->paginate($porPagina);
                  //$activities->push($activity); 
        //        }
        //    }
        //}
        return view('activities.index', [
            'activities' => $activity ,
            'buscar' => $buscar,
            'porPagina' => $porPagina
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        if(!empty($request->acom)){
            $acom=$request->acom;
            dd($request);
            return view('activities.create',compact('acom'));   
        }
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request,Activity $activity)
    {   
        $activity = $activity->store($request);
        toast('Se agregó correctamente la actvidad','success');
        return redirect()->route('admin.activity.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
         return view('activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,Activity $activity)
    {
        $activity->muUpdate($request);
        toast('Se modificó correctamente la actividad','success');
        return redirect()->route('admin.activity.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Activity $activity)
    {   
        if($request->solicitud=="departamento"){
            $acom=Acom::where('id',$request->acom)->first();
            $activity->delete();
            toast('Se eliminó correctamente la actividad','success');
            return redirect()->route('admin.acom.show',[
                'acom' => $request->acom
            ]);
        }
        $activity->delete();
        toast('Se eliminó correctamente la actividad','success');
        return redirect()->route('admin.activity.index');
    }

}
