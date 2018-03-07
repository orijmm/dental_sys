<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Http\Requests\PatientCreate;
use App\Http\Requests\PatientUpdate;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('locale'); 
        $this->middleware('timezone'); 
        $this->middleware('permission:acceso.full.editar');
        $this->middleware('session.database', ['only' => ['sessions', 'invalidateSession']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patient = Patient::orderBy('id','asc')->paginate(10);
        if ( $request->ajax() ) {
            if (count($patient)) {
                return response()->json([
                    'success' => true,
                    'view'    => view('patient.list', compact('patient'))->render(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => trans('app.no_records_found')
                ]);
            }
        }
        return view('patient.index', compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('patient.create', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientCreate $request)
    {
        $patient = Patient::create($request->all());
        if ( $patient ) {
                return redirect()->route('patient.index', compact('patient'))->withSuccess('Paciente creado con exito');
                
        } else {    
            return back()->withErrors($messages);   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return view('patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = true;
        $patient = Patient::find($id);
        return view('patient.create', compact('edit', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientUpdate $request, $id)
    {
         $patient = Patient::find($id)->update($request->all());
        if ( $patient ) {
                return redirect()->route('patient.index', compact('patient'))->withSuccess('Paciente actualizado con exito');
                
        } else {    
            return back()->withErrors($messages);   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletepatient = Patient::find($id);
        if ( $deletepatient->delete() ) {
            
            return response()->json([
                'success' => true,
                'message' => 'Paciente eliminado',
            ]);
        } else {
            return response()->json([
                'success'=> false,
                'message' => trans('app.error_again')
            ]);
        }
    }
}
