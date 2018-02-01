<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Password;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use App\Support\Logger\LoggerTrait;

class ResetPasswordController extends Controller
{

    use LoggerTrait;

    /**
     * @var UserRepository
     */
    private $users;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->middleware('guest');
        $this->users = $users;
    }

        /**
     * Display the password reset view for the given token.
     *
     * @param  string $token
     * @return \Illuminate\Http\Response
     * @throws NotFoundHttpException
     */
    public function getReset(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with([
            'token' => $token, 
            'email' => $request->email
        ]);
    }

    /**
     * Reset the given user's password.
     *
     * @param PasswordResetRequest $request
     * @return \Illuminate\Http\Response
     */
    public function postReset(Request $request)
    {
        $credentials = $this->credentials($request);

        $validator = $this->validator($credentials);
        if ( $validator->passes() ) {          

            $response = Password::reset($credentials, function ($user, $password) {
                $this->resetPassword($user, $password);
            });

            if ($response == Password::PASSWORD_RESET) {
                $user = $this->users->where('email', $request->email)->first();
                $this->logAction('auth', trans('log.reseted_password'), $user);
            }

            switch ($response) {
                case Password::PASSWORD_RESET:
                    return response()->json([
                        'success' => true,
                        'message' => trans($response)
                    ]);
                default:
                    return response()->json([
                        'success' => false,
                        'message' => trans($response)
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

            return redirect('login')->withErrors($messages);         
        }   
    }

    /**
     * Get a validator for reset pasword.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6'
        ];

        return Validator::make($data, $rules);
    }

    /**
     * Get the password reset credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = $password;
        $user->save();
    }

}
