<?php

namespace App\Http\Controllers;

use App\Profession;

use App\Http\Requests\Profession\StoreRequest;
use App\Http\Requests\Profession\UpdateRequest;

use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , Profession $profession)
    {   

        $buscar = $request->input("buscar");
        $porPagina = $request->input('paginate') != null ? $request->input('paginate') : 20;
        
        return view('professions.index', [
            'professions' => $profession::where('profesion', 'like','%'.$buscar.'%')->paginate($porPagina),
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
            return view('professions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Profession $profession)
    {
        $profession = $profession->store($request);
        toast('Se agregó correctamente la profesión','success');
        return redirect()->route('admin.profession.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show(Profession $profession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        return view('professions.edit', compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Profession $profession)
    {
        $profession->muUpdate($request);
        toast('Se modificó correctamente el estudiante','success');
        return redirect()->route('admin.profession.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {
        $profession->delete();
        toast('Se eliminó correctamente la profesión','success');
        return redirect()->route('admin.profession.index');
    }
}
