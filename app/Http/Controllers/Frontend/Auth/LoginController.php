<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {


    return view('frontend.account.login');


    }
    public function userlogin(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

      
            // if (Auth::guard('cus')->attempt($credentials)) {
            //     return redirect()->route('home.index')->with('success', 'Đăng nhập thành công');
            // }else {
            //     return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác'); 
            //     // return back()->with('error', 'Email hoặc mật khẩu không chính xác');
            // }

            if($credentials['email']== 'admin@gmail.com')
            {
                if(Auth::attempt($credentials))
                {
                  
                    return redirect()->route('home.index')->with('success', 'Đăng nhập thành công');
                }else{
                return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác'); 

                }
            }else
            {
                if (Auth::guard('cus')->attempt($credentials)) {
                   

                    return redirect()->route('home.index')->with('success', 'Đăng nhập thành công');
                }else {
                    return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác'); 
                    // return back()->with('error', 'Email hoặc mật khẩu không chính xác');
                }
            }
        }
          
           
    

      
    
    public function logout(Request $request) {
        Auth::guard('cus')->logout();
        // dd(Auth::check());
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home.index');

    }
}

    // return view('frontend.account.login');



  

