<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Requests\SaveService;
use App\Http\Requests\UpdateService;
use DB;

class ServiceController extends Controller
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
        $service = Service::orderBy('id','asc')->paginate(10);
        if ( $request->ajax() ) {
            if (count($service)) {
                return response()->json([
                    'success' => true,
                    'view'    => view('service.list', compact('service'))->render(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => trans('app.no_records_found')
                ]);
            }
        }
        return view('service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('service.create', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveService $request)
    {
        $service = Service::create($request->all());
        if ( $service ) {
                return redirect()->route('service.index', compact('service'))->withSuccess('Servicio creada con exito');
                
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
        $service = Service::find($id);
        return view('service.create', compact('edit', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateService $request, $id)
    {
        $service = Service::find($id)->update($request->all());
        if ( $service ) {
                return redirect()->route('service.index', compact('service'))->withSuccess('Servicio actualizada con exito');
                
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
        $deleteservice = Service::find($id);
        $sales = DB::table('sales')
            ->join('sale_service', 'sales.id', '=', 'sale_service.sale_id')
            ->join('services', 'sale_service.service_id', '=', 'services.id')
            ->where('sale_service.service_id',$id)
            ->select('sale_service.service_id', 'services.name','sales.id')
            ->get();
        if (count($sales) > 0 ) {
            return response()->json([
                'success'=> false,
                'message' => trans('Este Servicio esta asociado a una venta no puedo ser borrado')
            ]);
        }else{
            if ( $deleteservice->delete() ) {
            
            return response()->json([
                'success' => true,
                'message' => 'Servicio eliminada',
            ]);
            } else {
                return response()->json([
                    'success'=> false,
                    'message' => trans('app.error_again')
                ]);
            }
        }
    }
}
