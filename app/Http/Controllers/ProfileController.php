<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use App\Repositories\User\UserRepository;
use App\Repositories\Role\RoleRepository;
use App\Support\User\UserStatus;
use App\Support\Logger\LoggerTrait;

class ProfileController extends Controller
{
    use LoggerTrait;
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * UsersController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->middleware('auth');
        $this->middleware('locale'); 
        $this->middleware('timezone'); 
        $this->users = $users;
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
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'phones' => 'required|numeric|min:9'
        ];

        if ($id) {
            $rules['email'] = 'required|email|max:255|unique:users,email,'.$id;
            $rules['username'] = 'max:100|unique:users,username,'.$id;
        } else {
            $rules['email'] = 'required|email|max:255|unique:users';
            $rules['username'] = 'max:100|unique:users';
        }

        return Validator::make($data, $rules);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if ( $request->ajax() ) {

            return response()->json([
                'success' => true,
                'view' => view('users.profile', compact('user'))->render(),
            ]);
        }

        return view('users.profile', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        //
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
            $data = [
                'username' => $request->username,
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phones' => $request->phones,
                'birthday' => $request->birthday,
                'address' => $request->address
            ];

            $user = $this->users->update($id, $data);
            if ( $user ) {
                $this->logAction('user', trans('log.updated_profile'), $user);
                if ( $request->ajax() ) {

                    return response()->json([
                        'success' => true,
                        'message' => trans('app.user_updated')
                    ]);
                }

                return back()->withSuccess(trans('app.user_updated'));
 
            } else {
                
                if ( $request->ajax() ) {

                    return response()->json([
                        'success' => false,
                        'message' => trans('app.error_again')
                    ]);
                }

                return back()->withErrors(trans('app.error_again'));
                
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

    public function show()
    {
        //
    }


    /**
     * Get a validator for avatar
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator_avatar(array $data)
    {
        $rules = [
            'avatar' => 'required|image|dimensions:min_width=150,min_height=150',
        ];

        return Validator::make($data, $rules);
    }

    public function updateAvatar(Request $request)
    {
        $validator = $this->validator_avatar($request->only('avatar'));
        if ( $validator->passes() ) {
            $file = $request->avatar;
            $date = new DateTime();
            if(Auth::user()->avatar){
                $file_name = Auth::user()->avatar;
            } else {
                $file_name = $date->getTimestamp().'.'.$file->extension();
            }
            if($file){
                if ($file->isValid()) {
                    \File::delete(storage_path('app/users').'/'.$file_name);
                    Storage::delete($file_name);
                    $date = new DateTime();
                    $file_name = $date->getTimestamp().'.'.$file->extension();
                    $path = $file->storeAs('users', $file_name);
                }else{

                    return back()->withError(trans('app.error_upload_file'));
                }
            }
            $data = [
                'avatar' => $file_name
            ];
            $user = $this->users->update(Auth::user()->id, $data);
   
            if ( $user ) {
                $this->logAction('user', trans('log.updated_avatar'), $user);
                return back()->withSuccess(trans('app.update_photo')); 
            } else {
                
                return back()->withError(trans('app.error_again'));
            }
        } else {
            $messages = $validator->errors()->getMessages();

            return back()->withErrors($messages);
        }
       
    }

}
