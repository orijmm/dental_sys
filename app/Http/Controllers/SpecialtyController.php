<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use App\Http\Requests\SaveSpecialty;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $specialty = Specialty::paginate(10);
        if ( $request->ajax() ) {
            if (count($specialty)) {
                return response()->json([
                    'success' => true,
                    'view'    => view('specialty.list', compact('specialty'))->render(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => trans('app.no_records_found')
                ]);
            }
        }
        return view('specialty.index', compact('specialty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('specialty.create', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveSpecialty $request)
    {
        $specialty = Specialty::create($request->all());
        if ( $specialty ) {
                return redirect()->route('specialty.index', compact('specialty'))->withSuccess('Especialidad creada con exito');
                
        } else {    
            return back()->withErrors($messages);   
        }
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
        $specialty = Specialty::find($id);
        return view('specialty.create', compact('edit', 'specialty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveSpecialty $request, $id)
    {
        $specialty = Specialty::find($id)->update($request->all());
        if ( $specialty ) {
                return redirect()->route('specialty.index', compact('specialty'))->withSuccess('Especialidad actualizada con exito');
                
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
        $deletespecialty = Specialty::find($id);
        if ( $deletespecialty->delete() ) {
            
            return response()->json([
                'success' => true,
                'message' => 'Especialidad eliminada',
            ]);
        } else {
            return response()->json([
                'success'=> false,
                'message' => trans('app.error_again')
            ]);
        }
    }
}
