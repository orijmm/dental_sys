<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use App\Patient;
use App\Odontogram;
use App\Teeth;
use App\Specialist;
use DB;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $specialists = Specialist::all()->pluck( 'full_name','id');
        if ( $request->ajax() ) {
            
            if ($request->opcion == 1) {
                $option2 = false;
                $history = History::leftJoin("patients", "histories.patient_id", "=", "patients.id")->select("histories.*")->where("patients.dni",$request->search)
                            ->first();
            }elseif ($request->opcion == 2) {
                $option2 = true;
                $history = History::where('specialist_id', $request->search2)
                            ->get();
            } else {
                $option2 = false;
                $history = History::find($request->search);
            }
            

            if ($history) {
                return response()->json([
                    'success' => true,
                    'view'    => view('history.list', compact('history', 'option2'))->render(),
                ]);
             } else {
                return response()->json([
                    'success' => false,
                    'message' => trans('app.no_records_found')
                ]);
            }
           
        }
        
        return view('history.index', compact('specialists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $patients = Patient::all()->pluck('full_name2', 'id');
        $specialists = Specialist::all()->pluck( 'full_name','id');
        return view('history.create', compact('edit', 'patients', 'specialists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //patient exist
        $patient_exist = History::where('patient_id',$request->patient_id)->first();
        //odontograma
        if ($patient_exist) {
            return back()->withErrors(['El historial ya exite']);
        } else {
            $odontograma = Odontogram::create(['patient_id' => $request->patient_id]);
            //dientes
            for ($i=0; $i <= 51; $i++) { 
            $dientes = Teeth::create([
                'odontogram_id' => $odontograma->id,
                'c1' => 0,
                'c2' => 0,
                'c3' => 0,
                'c4' => 0,
                'c5' => 0
                ]);
            }
            $history = History::create([
                      'patient_id' => $request->patient_id,
                      'odontogram_id' => $odontograma->id,
                      'observations' => $request->observations,
                      'specialist_id' => $request->specialist_id,
                        ]);
            if ( $history ) {
                    return redirect()->route('history.show', compact('history'))->withSuccess('Cita creada con exito');
                    
            } else {    
                return back()->withErrors($messages);   
            }
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
        $history = History::find($id);
        return view('history.show', compact('history'));
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
        return view('history.create', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
