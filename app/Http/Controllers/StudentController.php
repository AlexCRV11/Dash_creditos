<?php

namespace App\Http\Controllers;

use App\Student;
use App\Role;
use App\User;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;

//use DB;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Student $student)
    {
        $request->user()->authorizeRoles('administrador');
        $buscar = $request->input("buscar");
        $porPagina = $request->input('paginate') != null ? $request->input('paginate') : 20;
        $student = Student::with('career','period')->where('matricula', 'like','%'.$buscar.'%')->paginate($porPagina);

        return view('students.index', [
            'students' => $student,
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
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Student $student)
    {   
        $request->user()->authorizeRoles('administrador');

        $user=$request->matricula;
        $password="ITFC-E#".substr($user, 0, 2).substr($user, -2);
        $role_user=Role::where('slug','estudiante')->first();

        $user= new User();
        $user->name = $request->matricula;
        $user->email =$request->email;
        $user->password =  bcrypt($password);
        $user->save();
        $user->roles()->attach($role_user);

        $student = $student->store($request);
        toast('Se agregó correctamente el estudiante','success');
        return redirect()->route('admin.student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Student $student)
    {   
        $request->user()->authorizeRoles('administrador');
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Student $student)
    {   
        $request->user()->authorizeRoles('administrador');
        $student->muUpdate($request);
        toast('Se modificó correctamente el estudiante','success');
        return redirect()->route('admin.student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Student $student)
    {
        $request->user()->authorizeRoles('administrador');
        $student->delete();
        toast('Se eliminó correctamente el estudiante','success');
        return redirect()->route('admin.student.index');
    }
}
