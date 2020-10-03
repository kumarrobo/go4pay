<?php

namespace App\Http\Controllers\Auth\Ro;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\User;
use Session;
use App\LoginOtp;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use RedirectsUsers, ThrottlesLogins;


     /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'RO/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:ro')->except('logout','verifyOTPAndLogin');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    { 
        //dd("dasd");
        return view('RO.index');
    }



     /**
     * Show the application's OTP login form.
     * param Mobile Number, User Id 
     * return integer as OTP
     * Call Method getNewOTP() from Main Controller
     */
    public function getOTP($mobile)
    {
        
        return $this->getNewOTP($mobile);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function saveOTP(array $data)
    {   
        //dd($data);

        return LoginOtp::create([
                'user_id'   => $data['user_id'],
                'OTP'       => $data['otp'],
                'mobile'    => $data['mobile'],
                'time'      => time(),
                'created_at'=> date('Y-m-d H:i:s'),
        ]);
    }


    /**
     * Show the application's OTP login form.
     *
     * @return \Illuminate\View\View
     */
    public function showOTPLoginForm(Request $request,$id,$password)
    {
        
        try {
                
            $userId = Crypt::decryptString($id);
            if($userId!=''){
                $user_id            = $userId;
                $user               = User::find($user_id);
                $mobile             = $user['mobile'];
                $data['user_id']    = $user['id'];
                $data['otp']        = $this->getOTP($mobile);
                $data['mobile']     = $mobile;
                $mobile             = substr($mobile,0,1).'XXXXXX'.substr($mobile,-2);
                LoginOtp::where('user_id','=',$data['user_id'])->delete();
                if($this->saveOTP($data)){
                    return view('RO.otpLoginForm',['mobile'=>$mobile,'pass'=>$password,'userId'=>$id]);
                }
            
            }else{
                return redirect('RO/login')->with(['status'=>'Sorry ! Invalid Url.']);
            }

        } catch (DecryptException $e) {

            return redirect('RO/login')->with(['status'=>'Sorry ! Invalid Url.']);
        }

      
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function verifyOTPAndLogin(Request $request)
    {   
        $otp        = $request->get('otp');
        $user_id    = $request->get('uid');
        $pass       = $request->get('pass');
        
        //Decryption User Id
        try {
            $userId      = Crypt::decryptString($user_id);
            $password    = Crypt::decryptString($pass);
            $userDetails = User::find($userId);
            $mobile      = $userDetails['mobile'];
            
            //Verify OTP
            $loginDetails = LoginOtp::where('user_id','=',$userId)->where('mobile','=',$mobile)->where('OTP','=',$otp)->orderBy('id','DESC')->first();
            //dd($loginDetails);
            if($loginDetails!=null){
                LoginOtp::where('user_id','=',$userId)->delete();
                $request->merge(['mobile'=>$mobile,'password'=>$password]);
                // If the class is using the ThrottlesLogins trait, we can automatically throttle
                // the login attempts for this application. We'll key this by the username and
                // the IP address of the client making these requests into this application.
                if (method_exists($this, 'hasTooManyLoginAttempts') &&
                    $this->hasTooManyLoginAttempts($request)) {
                    $this->fireLockoutEvent($request);

                    return $this->sendLockoutResponse($request);
                }

                if ($this->attemptLogin($request)) {
                    return $this->sendLoginResponse($request);
                }

                // If the login attempt was unsuccessful we will increment the number of attempts
                // to login and redirect the user back to the login form. Of course, when this
                // user surpasses their maximum number of attempts they will get locked out.
                $this->incrementLoginAttempts($request);

                return $this->sendFailedLoginResponse($request);

                 
            }else{
                return redirect('RO/verifyOTP/'.$user_id.'/'.$pass)->with(['status'=>'Invalid OTP!!']);
            }
            


        } catch (DecryptException $e) {
            return redirect('RO/verifyOTP/'.$user_id.'/'.$pass)->with(['status'=>'Sorry ! Invalid Url, try again']);
        }


       
       

        return $this->sendFailedLoginResponse($request);

    }





    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *return redirect('RO/verifyOTP/'.$user_id.'/'.$pass)->with(['status'=>'Invalid OTP!!'])
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        

         // dd($request->all());
        $validator = $this->validateLogin($request);

        if($validator->fails()) {
                $error=$validator->errors()->all();
                Session::flash('error', $error);
                foreach($request->all() as $k=>$value){
                    Session::flash($k, $request->get($k));
                }
                return redirect('/RO/login')->with(['status'=>'Sorry ! Invalid Input.']);
        }
        //dd($validation);
        $user = User::where($this->username(),$request->get('mobile'))->where('status','=',1)->first();
        // dd($user);
        if($user AND $user->role_id != 3){
            //dd("ok");
            return redirect('RO/login')->with(['status'=>'Sorry ! Invalid Credentials.']);
        }

        if($user AND $user->role_id == 3){
            $id =  Crypt::encryptString($user['id']);
            $password =  Crypt::encryptString($request->get('password'));
            return redirect('RO/verifyOTP/'.$id.'/'.$password)->with(['status'=>'Verify OTP Now.']);
        }

        

        
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
         $validator = Validator::make($request->all(), [
            $this->username() => 'required',
            'password' => 'required|string',
        ]);
        return $validator;
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'mobile';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/RO/login');
    }


    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('ro');
    }

   
}
