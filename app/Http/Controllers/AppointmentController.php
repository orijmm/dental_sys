<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Patient;
use App\Specialist;
use App\Numconsult;
use App\Http\Requests\AppointmentCreate;

class AppointmentController extends Controller
{
    private $appointment;
    /**
     * UserController constructor.
     * @param UserRepository $roles
     */
    public function __construct(Appointment $appointment)
    {
        $this->middleware('auth');
        $this->middleware('locale'); 
        $this->middleware('timezone'); 
        $this->middleware('session.database', ['only' => ['sessions', 'invalidateSession']]);
        $this->appointment = $appointment;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::paginate(10);
        return view('appointment.index',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $appointment = $this->appointment;
        $patients = Patient::all()->pluck('full_name2', 'id');
        $specialists = Specialist::all()->pluck( 'full_name','id');
        $numconsult = Numconsult::pluck('name_consult', 'id');
        return view('appointment.create', compact('edit', 'appointment', 'patients', 'specialists', 'numconsult'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentCreate $request)
    {
        $appointment = Appointment::create($request->all());
        if ( $appointment ) {
                return redirect()->route('appointment.index', compact('appointment'))->withSuccess('Cita creada con exito');
                
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
        $appointment = Appointment::find($id);
        return view('appointment.show', compact('appointment'));
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
        $appointment = Appointment::find($id);
        $numconsult = Numconsult::pluck('name_consult', 'id');
        $patients = Patient::all()->pluck('full_name2', 'id');
        $specialists = Specialist::all()->pluck( 'full_name','id');
        return view('appointment.create', compact('edit', 'appointment', 'numconsult', 'patients', 'specialists'));
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
        $appointment = Appointment::find($id)->update($request->all());
        if ( $appointment ) {
                return redirect()->route('appointment.index', compact('appointment'))->withSuccess('Cita actualizada con exito');
                
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
        $deleteappointment = Appointment::find($id);
        if ( $deleteappointment->delete() ) {
            
            return response()->json([
                'success' => true,
                'message' => 'Cita eliminada',
            ]);
        } else {
            return response()->json([
                'success'=> false,
                'message' => trans('app.error_again')
            ]);
        }
    }
}
