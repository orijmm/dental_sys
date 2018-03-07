<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NumConsult;
use App\Http\Requests\NumConsultorio; 

class NumConsultController extends Controller
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
        $numconsult = NumConsult::orderBy('id','asc')->paginate(10);
        if ( $request->ajax() ) {
            if (count($numconsult)) {
                return response()->json([
                    'success' => true,
                    'view'    => view('numconsult.list', compact('numconsult'))->render(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => trans('app.no_records_found')
                ]);
            }
        }
        return view('numconsult.index', compact('numconsult'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('numconsult.create', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NumConsultorio $request)
    {
        $numconsult = NumConsult::create($request->all());
        if ( $numconsult ) {
                return redirect()->route('numconsult.index')->withSuccess('Numero de consultorio creado con exito');
                
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
        $deleteconsult = NumConsult::find($id);
        if ( $deleteconsult->delete() ) {
            
            return response()->json([
                'success' => true,
                'message' => 'consultorio eliminado',
            ]);
        } else {
            return response()->json([
                'success'=> false,
                'message' => trans('app.error_again')
            ]);
        }
    }
}
