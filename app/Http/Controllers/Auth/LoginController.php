<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Models\LoginTime;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\Weblogin;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginPageView(){
        
        return view('auth.login');
    }
    public function otp(){
        
        return view('auth.otp');
    }

    public function verifyOtp(Request $request){
        $user= User::where('email',$request->email)->where('usercode',$request->otp)->first();
        if($user){
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $Weblogin= new Weblogin();
            $Weblogin->username=$request->email;
            $Weblogin->ip_address=  $_SERVER['REMOTE_ADDR'];  
            $Weblogin->created_at=  date('Y-m-d H:i:s'); 
            $Weblogin->updated_at=  date('Y-m-d H:i:s'); 
            $Weblogin->login_time=  date('Y-m-d H:i:s'); 
            $Weblogin->status=  1; 
            $Weblogin->save(); 

            $user->is_active=1;
            $user->save();
           return redirect('/dashboard');
        }else{
            return \Redirect::back()->withErrors(['Error', 'Please Enter Valid OTP !!!']);
        }
         
    }
     public function logout1(){
        $user= User::where('id',\Auth::user()->id)->first();
        $user->is_active=0;
        $user->save();
       \Auth::logout();
        return redirect('/admin');
        //return view('auth.login');
    }

    public function loginPost(Request $request){
       //echo  \Hash::make(123456);
         
        if (\Auth::attempt(array('email' => $request['email'], 'password' => $request['password']))) {
            $user= User::where('id',Auth::user()->id)->first();
            if(Auth::user()->user_type==1){

                $random = substr(md5(mt_rand()), 0, 7);

                $user->usercode= $random;
                $user->save();
                 
                $data = array('otp'=>$random);
                $email= $request['email'];
                \Mail::send('emails.login', $data, function($message) use ($email){
                $message->to($email)->subject
                ('Login OTP');
                $message->from('sales@pcmart.com.my','Login OTP');
                });

                return redirect('/otp')->withErrors(['Success', 'Please check your email to enter OTP']); 

            }else{
                // if(Auth::user()->status==0){
                //     return \Redirect::back()->withErrors(['Error login !!!', 'You are not activated . Please contact admin !!!']);
                // }
            date_default_timezone_set("Asia/Kuala_Lumpur");
               $dayId= date('w');
               $currentTime = date('H:i:s');
               //$currentTime = '03:01:28';
               //echo Auth::user()->id.$dayId;
               $loginTime= LoginTime::where('user_id',Auth::user()->user_type)->where('day_id',$dayId)->first();
               if($loginTime){
               if($currentTime >= $loginTime['start_time'] && $currentTime <= $loginTime['end_time'] && Auth::user()->status==1){
                $random = substr(md5(mt_rand()), 0, 7);

                $user->usercode= $random;
                $user->save();
                 
                $data = array('otp'=>$random);
                $email= $request['email'];
                \Mail::send('emails.login', $data, function($message) use ($email){
                $message->to($email)->subject
                ('Login Otp');
                $message->from('sales@pcmart.com.my','Login Otp');
                });

                return redirect('/otp')->withErrors(['Success', 'Please check your email to enter OTP']); 
               }else{
                return \Redirect::back()->withErrors(['Error login !!!', 'You are not authorized. Please contact admin !!!']);
               }
            }else{
                return \Redirect::back()->withErrors(['Error login !!!', 'You are not authorized. Please contact admin !!!']);
            }
            }


            
        } else {
        return \Redirect::back()->withErrors(['Error login !!!', 'Please Enter Valid Detail !!!']);
        }

        }

        
}
