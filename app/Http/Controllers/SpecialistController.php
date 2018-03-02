<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialist;
use App\Specialty;
use App\Http\Requests\SpecialistCreate;
use App\Http\Requests\SpecialistUpdate;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $specialist = Specialist::orderBy('id','asc')->paginate(10);
        if ( $request->ajax() ) {
            if (count($specialist)) {
                return response()->json([
                    'success' => true,
                    'view'    => view('specialist.list', compact('specialist'))->render(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => trans('app.no_records_found')
                ]);
            }
        }
        return view('specialist.index', compact('specialist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $specialties = Specialty::pluck('name', 'id');
        return view('specialist.create', compact('edit', 'specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialistCreate $request)
    {
        $specialist = Specialist::create($request->all());
        if ( $specialist ) {
                return redirect()->route('specialist.index', compact('specialist'))->withSuccess('Especialista creado con exito');
                
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
        $specialist = Specialist::find($id);
        return view('specialist.show', compact('specialist'));
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
        $specialist = Specialist::find($id);
        $specialties = Specialty::pluck('name','id');
        return view('specialist.create', compact('edit', 'specialist', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialistUpdate $request, $id)
    {
         $specialist = Specialist::find($id)->update($request->all());
        if ( $specialist ) {
                return redirect()->route('specialist.index', compact('specialist'))->withSuccess('Especialista actualizado con exito');
                
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
         $deletespecialist = Specialist::find($id);
        if ( $deletespecialist->delete() ) {
            
            return response()->json([
                'success' => true,
                'message' => 'Especialista eliminado',
            ]);
        } else {
            return response()->json([
                'success'=> false,
                'message' => trans('app.error_again')
            ]);
        }
    }
}
