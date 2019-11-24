<?php

namespace App\Http\Controllers;

use App\Role;

use App\Http\Requests\Role\Store;
use App\Http\Requests\Role\Update;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Role $role)
    {   
        // dd($request->input("buscar"));

        $buscar = $request->input("buscar");
        $porPagina = $request->input('paginate') != null ? $request->input('paginate') : 20;

        return view('role.index', [
            'roles' => $role::where('name', 'like','%'.$buscar.'%')->paginate($porPagina),
            'buscar' => $buscar,
            'porPagina' => $porPagina
        ]);

        // dd($role::where('name', 'like','%'.$request->input("buscar").'%')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, Role $role)
    {
        // dd($request);
        $role = $role->store($request);
        toast('Se agregó correctamente el Rol','success');
        return redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {   
        return view('role.show', [
            'role' => $role
        ]);

        // return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Role $role)
    {
        $role->muUpdate($request);
        toast('Se modificó correctamente el Rol','success');
        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        toast('Se eliminó correctamente el Rol','success');
        return redirect()->route('admin.role.index');
    }
}
