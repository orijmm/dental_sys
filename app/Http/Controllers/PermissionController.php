<?php

namespace App\Http\Controllers;

use App\Role;
use Validator;
use Illuminate\Http\Request;
use App\Repositories\Permission\PermissionRepository;
use App\Support\Logger\LoggerTrait;
use App\Repositories\Role\RoleRepository;

class PermissionController extends Controller
{
    use LoggerTrait;

    /**
     * @var PermissionRepository
     */
    private $permissions;

    /**
     * RoleController constructor.
     * @param PermissionRepository $permissions
     */
    public function __construct(PermissionRepository $permissions)
    {
        $this->middleware('auth');
        $this->middleware('locale'); 
        $this->middleware('timezone'); 
        $this->middleware('permission:permissions.manage');
        $this->permissions = $permissions;
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
            $rules['name'] = 'required|unique:permissions,name,'.$id;
        } else {
            $rules['name'] = 'required|unique:permissions';
        }

        return Validator::make($data, $rules);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, RoleRepository $roleRepository)
    {
        $roles = $roleRepository->all();
        $permissions = $this->permissions->all();
        if ( $request->ajax() ) {
            if (count($permissions)) {
                return response()->json([
                    'success' => true,
                    'view' => view('permissions.list', compact('permissions','roles'))->render(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => trans('app.no_records_found')
                ]);
            }
        }

        return view('permissions.index', compact('permissions', 'roles'));
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
                'view' => view('permissions.create-edit', compact('edit'))->render()
            ]);
        } 

        return view('permissions.create-edit', compact('edit'));
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
            $permission = $this->permissions->create($request->all());
            if ( $permission ) {
                $this->logAction('permission', trans('log.new_permission', ['name' => $permission->display_name ]), $permission);
                return response()->json([
                    'success' => true,
                    'message' => trans('app.permission_created')
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
        if ( $permission = $this->permissions->find($id) ) {
            return response()->json([
                'success' => true,
                'view' => view('permissions.create-edit', compact('permission', 'edit'))->render()
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
            $permission = $this->permissions->update(
                $id, 
                $request->only('display_name','description')
            );
            if ( $permission ) {
                $this->logAction('permission', trans('log.updated_permission', ['name' => $permission->display_name ]), $permission);

                return response()->json([
                    'success' => true,
                    'message' => trans('app.permission_updated')
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
        $permission = $this->permissions->find($id);
        if ( !$this->permissions->delete($id) ) {
            $this->logAction('permission', trans('log.deleted_permission', ['name' => $permission->display_name ]), $permission);
            return response()->json([
                'success' => true,
                'message' => trans('app.permission_deleted')
            ]);
        } else {
            return response()->json([
                'success'=> false,
                'message' => trans('app.error_again')
            ]);
        }
    }

    /**
     * Update permissions for each role.
     *
     * @param Request $request
     * @return mixed
     */
    public function saveRolePermissions(Request $request, RoleRepository $roleRepository)
    {
        $roles = $request->get('roles');

        $allRoles = $roleRepository->lists_id('id');

        foreach ($allRoles as $roleId) {
            $permissions = array_get($roles, $roleId, []);
            $roleRepository->updatePermissions($roleId, $permissions);
        }

        return back()
            ->withSuccess(trans('app.permissions_saved_successfully'));
    }
}
