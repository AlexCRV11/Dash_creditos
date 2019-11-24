<?php

namespace App\Http\Controllers;

use App\Career;

use App\Http\Requests\Career\StoreRequest;
use App\Http\Requests\Career\UpdateRequest;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Career $career)
    {   
        $request->user()->authorizeRoles('administrador');
        $buscar = $request->input("buscar");
        $porPagina = $request->input('paginate') != null ? $request->input('paginate') : 20;

        return view('careers.index', [
            'careers' => $career::where('nombre', 'like','%'.$buscar.'%')->paginate($porPagina),
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
        $request->user()->authorizeRoles('administrador');
        return view('careers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request,Career $career)
    {
        $request->user()->authorizeRoles('administrador');
        $career = $career->store($request);
        toast('Se agregó correctamente la carrera','success');
        return redirect()->route('admin.career.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Career $career)
    {
        dd($career);
        $request->user()->authorizeRoles('administrador');
        return view('careers.edit',compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Career $career)
    {
        $request->user()->authorizeRoles('administrador');
        $career->muUpdate($request);
        toast('Se modificó correctamente la carrera','success');
        return redirect()->route('admin.career.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Career $career)
    {
        $request->user()->authorizeRoles('administrador');
        $career->delete();
        toast('Se eliminó correctamente la carrera','success');
        return redirect()->route('admin.career.index');
    }
}
