<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ConceptoGasto;
use App\User;
use App\Support\Logger\LoggerTrait;
use App\Http\Requests\CreateConceptoGastoRequest;

class ConceptoGastoController extends Controller
{
    use LoggerTrait;

    private $conceptoGasto;
    /**
     * UserController constructor.
     * @param UserRepository $roles
     */
    public function __construct(ConceptoGasto $conceptoGasto)
    {
        $this->middleware('auth');
        $this->middleware('locale'); 
        $this->middleware('timezone'); 
        $this->middleware('permission:conceptoGasto.total');
        $this->middleware('session.database', ['only' => ['sessions', 'invalidateSession']]);
        $this->conceptoGasto = $conceptoGasto;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conceptos = $this->conceptoGasto->orderBy('id','DESC')->paginate(10, $request->search);
        if ( $request->ajax() ) {
            if (count($conceptos)) {
                return response()->json([
                    'success' => true,
                    'view' => view('conceptoGasto.list', compact('conceptos'))->render(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => trans('app.no_records_found')
                ]);
            }
        }

       // return view('roles.index', compact('roles'));
       
        //$conceptos = $this->conceptoGasto::orderBy('id','desc')->paginate(10);

        return view('conceptoGasto.index',compact('conceptos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $edit = false;

        if ( $request->ajax() ) {
            return response()->json([
                'success' => true,
                'view' => view('conceptoGasto.create-edit', compact('edit'))->render()
            ]);
        } 

        return view('conceptoGasto.create-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateConceptoGastoRequest $request)
    {
        $conceptoGasto = conceptoGasto::create($request->all());

        if ( $conceptoGasto ) {
            $this->logAction('conceptoGasto', trans('log.new_role', ['name' => $conceptoGasto->detalle ]), $conceptoGasto);
            return response()->json([
                'success' => true,
                'message' => trans('app.role_created')
            ]);
        } else {

            return response()->json([
                'success' => false,
                'message' => trans('app.error_again')
            ]);
           
        }

        return back()->withErrors($messages);

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
        if ( $concepto = $this->conceptoGasto->find($id) ) {
            return response()->json([
                'success' => true,
                'view' => view('conceptoGasto.create-edit', compact('concepto', 'edit'))->render()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => trans('app.no_record_found')
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateConceptoGastoRequest $request, $id)
    {        
        $conceptoGasto = conceptoGasto::where('id', $id)->first();

        if ( $conceptoGasto ) {
            
            $conceptoGasto->detalle=$request->get('detalle');

            if($conceptoGasto->update())
            {        
                $this->logAction('role', trans('log.updated_role', ['name' => $conceptoGasto->detalle ]), $conceptoGasto);
                return response()->json([
                    'success' => true,
                    'message' => trans('app.role_updated')
                ]);
            
            } else {

                return response()->json([
                    'success' => false,
                    'message' => trans('app.error_again')
                ]);
            }
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
        $conceptoGasto = conceptoGasto::find($id);

        if ($conceptoGasto->delete()) 
        {
            $this->logAction('conceptoGasto', trans('log.deleted_conceptoGasto', ['name' => $conceptoGasto->detalle ]), $conceptoGasto);
            
            return response()->json([
                'success' => true,
                'message' => trans('app.role_deleted')
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => trans('app.error_again')
            ]);
        }
    }
}
