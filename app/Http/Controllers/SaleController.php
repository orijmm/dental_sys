<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Http\Requests\SaveSale;
use App\Http\Requests\UpdateSale;
use App\Patient;
use App\Specialist;
use App\Service;

class SaleController extends Controller
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
        $sale = Sale::orderBy('id','asc')->paginate(10);
        if ( $request->ajax() ) {
            if (count($sale)) {
                return response()->json([
                    'success' => true,
                    'view'    => view('sale.list', compact('sale'))->render(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => trans('app.no_records_found')
                ]);
            }
        }
        return view('sale.index', compact('sale'));
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
        $services = Service::all()->pluck( 'name','id');
        return view('sale.create', compact('edit','patients','specialists', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = Sale::create($request->all());
        if ( $sale ) {
            $setservice = $sale->setService($sale->id,$request->service_id);
            
            return redirect()->route('sale.index', compact('sale'))->withSuccess('Venta creada con exito');
                
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
        $sale = Sale::find($id);
        return view('sale.create', compact('edit', 'sale'));
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
        
        $sale = Sale::find($id)->update($request->all());
        if ( $sale ) {
                return redirect()->route('sale.index', compact('sale'))->withSuccess('Venta actualizada con exito');
                
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
         $deletesale = Sale::find($id);
        if ( $deletesale->delete() ) {
            
            return response()->json([
                'success' => true,
                'message' => 'Venta eliminada',
            ]);
        } else {
            return response()->json([
                'success'=> false,
                'message' => trans('app.error_again')
            ]);
        }
    }

    public function getServices()
    {
        $services = Service::all();
        return response()->json([
            'success' => true,
            'services' => $services
            ]);
    }
}
