<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use App\Patient;
use App\Odontogram;
use App\Teeth;
use App\Specialist;
use DB;
use App\Http\Requests\HistorialCreate;
use App\Http\Requests\HistoryUpdate;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('locale'); 
        $this->middleware('timezone'); 
        $this->middleware('permission:historias.general');
        $this->middleware('session.database', ['only' => ['sessions', 'invalidateSession']]);
    }
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
    public function store(HistorialCreate $request)
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
                'c1'    => 0,
                'c2'    => 0,
                'c3'    => 0,
                'c4'    => 0,
                'c5'    => 0,
                'all_c' => 0
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
        $history = History::find($id);
        $patients = Patient::all()->pluck('full_name2', 'id');
        $specialists = Specialist::all()->pluck( 'full_name','id');
        return view('history.create', compact('edit', 'patients', 'specialists', 'history'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HistoryUpdate $request, $id)
    {
        $history = History::find($id)->update($request->all());
        if ( $history ) {
                return redirect()->route('history.index', compact('history'))->withSuccess('Historial actualizado con exito');
                
        } else {    
            return back()->withErrors($messages);   
        }
    }

    public function getTeeth($id)
    {
        $teeths = Teeth::where('odontogram_id', $id)->get();
        $todos = $teeths->pluck('id')->all();
        return response()->json([
            'teeth' => $teeths,
            'todos' => $todos
            ]);
    }

    public function editTeeth($id)
    {
        $teeth = Teeth::find($id);
        if ($teeth) {
            return response()->json([
            'success' => true,
            'view' => view('history.edit_teeth', compact('teeth'))->render()
            ]);
        } else {
            return response()->json([
            'success' => false,
            'message' => 'error'
            ]);
        } 
    }

    public function updateTeeth(Request $request,$id)
    {
        $teeth = Teeth::find($id);
        $history = History::where('odontogram_id',$teeth->odontogram_id)->first();
        if ($request->elect_odonto > 3) {
            $request['all_c'] = $request->elect_odonto;
        }else{
            switch ($request->inputone) {
            case '1':
                $request['c1'] = $request->elect_odonto;
                $request['all_c'] = 0;
                break;
            case '2':
                $request['c2'] = $request->elect_odonto;
                $request['all_c'] = 0;
                break;
            case '3':
                $request['c3'] = $request->elect_odonto;
                $request['all_c'] = 0;
                break;
            case '4':
                $request['c4'] = $request->elect_odonto;
                $request['all_c'] = 0;
                break;
            case '5':
                $request['c5'] = $request->elect_odonto;
                $request['all_c'] = 0;
                break;
            }
        }
        if ( $teeth->update( $request->all() ) ) {
            return response()->json([
            'success' => true,
            'message' => 'Odontograma Actualizado',
            'view'    => view('history.odontogram', compact('history'))->render()
            ]);
        } else {
            return response()->json([
            'success' => false,
            'view' => 'error'
            ]);
        }
        
    }
}
