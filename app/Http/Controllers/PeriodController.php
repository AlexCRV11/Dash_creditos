<?php

namespace App\Http\Controllers;

use App\Period;

use App\Http\Requests\Period\StoreRequest;
use App\Http\Requests\Period\UpdateRequest;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Period $period)
    {
        $buscar = $request->input("buscar");
        $porPagina = $request->input('paginate') != null ? $request->input('paginate') : 20;

        return view('periods.index', [
            'periods' => $period::where('slug', 'like','%'.$buscar.'%')->paginate($porPagina),
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
        return view('periods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Period $period)
    {
        $period = $period->store($request);
        toast('Se agregó correctamente el periodo','success');
        return redirect()->route('admin.period.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        return view('period.show', [
            'period' => $period
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        return view('periods.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Period $period)
    {
        $period->muUpdate($request);
        toast('Se modificó correctamente el periodo','success');
        return redirect()->route('admin.period.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $period->delete();
        toast('Se eliminó correctamente el periodo','success');
        return redirect()->route('admin.period.index');
    }
}
