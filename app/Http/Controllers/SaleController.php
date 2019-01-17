<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Http\Requests\SaveSale;
use App\Http\Requests\UpdateSale;
use App\Patient;
use App\Specialist;
use App\Service;
use App\Appointment;
use DB;

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
        $sale = Sale::orderBy('id','desc')->paginate(10);
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
    public function store(SaveSale $request)
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
        $patients = Patient::all()->pluck('full_name2', 'id');
        $specialists = Specialist::all()->pluck( 'full_name','id');
        $services = Service::all()->pluck( 'name','id');
        return view('sale.create', compact('edit', 'sale', 'patients', 'specialists', 'services'));
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
        
        $sale = Sale::find($id);
        $update_save = $sale->update($request->all());
        if ( $update_save ) {
            $sale->setService($sale->id,$request->service_id);
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

    public function changeBill(Request $request)
    {
        $editsale = Sale::find($request->id);
        if ($editsale->bill == 0) {
            $changebill = $editsale->update([
            'bill' => 1
             ]);
        } else {
            $changebill = $editsale->update([
            'bill' => 0
             ]);
        }
        $sale = Sale::orderBy('id','desc')->paginate(10);
        return response()->json([
            'success' => true,
            'message' => 'Factura actualizada',
            'view'    => view('sale.list', compact('sale'))->render(),
            ]);
    }

    public function changeCharge(Request $request)
    {
        $editsale = Sale::find($request->id);
        if ($editsale->charged == 0) {
            $changecharged = $editsale->update([
            'charged' => 1
             ]);
        } else {
            $changecharged = $editsale->update([
            'charged' => 0
             ]);
        }
        $sale = Sale::orderBy('id','desc')->paginate(10);
        return response()->json([
            'success' => true,
            'message' => 'Pago actualizado',
            'view'    => view('sale.list', compact('sale'))->render(),
            ]);
    }

    public function showReporte()
    {
        $mesActual = date('m');
        $ventas = Sale::whereMonth('created_at', '=', $mesActual)->where('charged',1)->get();

        //Monto ventas por mes y dia
        $ventaspormes = [];
        $ventaspormes2 = DB::table('sales')
            ->join('sale_service', 'sales.id', '=', 'sale_service.sale_id')
            ->join('services', 'sale_service.service_id', '=', 'services.id')
            ->whereMonth('sales.created_at', '=', $mesActual)->where('sales.charged',1)
            ->select('sales.id','sales.date', 'services.name', 'services.cost')
            ->get();

        $ventamesfecha = $ventaspormes2->groupBy('date');
        foreach ($ventamesfecha as $key => $value) {
            $ventaspormes[] = ['date' => $key, 'units' => $value->sum('cost')];
        }
        
        //porcentajes de servicios al mes
        $serviciospormes = [];
        $jsonserviciomes = [];
        foreach ($ventas as $ventservices) {
            foreach ($ventservices->services as $servicios) {
                $serviciospormes[] = ['id' => $servicios->id, 'name' => $servicios->name];
            }
        }

        $serviciospormes2 = array_count_values(array_column($serviciospormes,'id'));
        $keysservices = array_column($serviciospormes, 'name', 'id');
        foreach ($serviciospormes2 as $key => $value) {
            $jsonserviciomes[] = ['nombre' => $keysservices[$key], 'porcentaje' => number_format( ($value*100)/count($serviciospormes2) , 2)];
        }

        //citas anuladas al mes
        $citaanull = Appointment::whereMonth('created_at', '=', $mesActual)->where('status',2)->get();

        //Numero de pacientes en el mes
        $pacientespormes = Patient::whereMonth('created_at', '=', $mesActual)->get();

        //si estan vacios
        if (empty($jsonserviciomes)) {
            $jsonserviciomes[] = ['nombre' => 'Sin ventas', 'porcentaje' => '100.00'];
        }

        if (empty($ventaspormes)) {
            $ventaspormes[] = ['date' => date('Y-m-d'), 'units' => 0];
        }

        return view('sale.reportes', compact('pacientespormes','ventas','ventaspormes', 'jsonserviciomes', 'citaanull'));
    }
}
