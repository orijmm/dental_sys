<?php

namespace App\Http\Controllers;

use App\Role;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\Role\RoleRepository;
use App\Support\Logger\LoggerTrait;

class RoleController extends Controller
{
    use LoggerTrait;

    /**
     * @var RoleRepository
     */
    private $roles;

    /**
     * RoleController constructor.
     * @param RoleRepository $roles
     */
    public function __construct(RoleRepository $roles)
    {
        $this->middleware('auth');
        $this->middleware('locale'); 
        $this->middleware('timezone'); 
        $this->middleware('permission:roles.manage');
        $this->roles = $roles;
    }

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $id = null)
    {
        $rules = [
            'display_name' => 'required',
            'description' => 'required'
        ];

        if ($id) {
            $rules['name'] = 'required|unique:roles,name,'.$id;
        } else {
            $rules['name'] = 'required|unique:roles';
        }

        return Validator::make($data, $rules);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = $this->roles->paginate(10, $request->search);
        if ( $request->ajax() ) {
            if (count($roles)) {
                return response()->json([
                    'success' => true,
                    'view' => view('roles.list', compact('roles'))->render(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => trans('app.no_records_found')
                ]);
            }
        }

        return view('roles.index', compact('roles'));
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
                'view' => view('roles.create-edit', compact('edit'))->render()
            ]);
        } 

        return view('roles.create-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());
        if ( $validator->passes() ) {
            $role = $this->roles->create($request->all());
            if ( $role ) {
                $this->logAction('role', trans('log.new_role', ['name' => $role->display_name ]), $role);
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
        } else {
            $messages = $validator->errors()->getMessages();

            if ( $request->ajax() ) {

                return response()->json([
                    'success' => false,
                    'validator' => true,
                    'message' => $messages
                ]);
            } 

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
        //
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
        if ( $role = $this->roles->find($id) ) {
            return response()->json([
                'success' => true,
                'view' => view('roles.create-edit', compact('role', 'edit'))->render()
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
    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all(), $id);
        if ( $validator->passes() ) {
            $role = $this->roles->update(
                $id, 
                $request->only('display_name','description')
            );
            if ( $role ) {
                $this->logAction('role', trans('log.updated_role', ['name' => $role->display_name ]), $role);
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
        } else {
            $messages = $validator->errors()->getMessages();

            if ( $request->ajax() ) {

                return response()->json([
                    'success' => false,
                    'validator' => true,
                    'message' => $messages
                ]);
            } 

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
        $role = $this->roles->find($id);
        if ( !$this->roles->delete($id) ) {
            $this->logAction('role', trans('log.deleted_role', ['name' => $role->display_name ]), $role);
            
            return response()->json([
                'success' => true,
                'message' => trans('app.role_deleted')
            ]);
        } else {
            return response()->json([
                'success'=> false,
                'message' => trans('app.error_again')
            ]);
        }
    }
}
