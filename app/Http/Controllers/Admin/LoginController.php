<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function doLogout(Request $request)
    {
       Auth::logout();
       return redirect('/');
    }
    public function loginPage(Request $request)
    {
        $isLogin = Auth::guard('administrator')->check();
        //dd($isLogin);
        if($isLogin)
        {
            return view('welcome');
        }
        return view('admin.pages.auth.login');
    }

    public function checklogin(Request $request)
    {
        //$request->session()->put('stu', $request->input());
        // $request->session()->get('stu');

        $info = array('email' => $request->email, 'password' => $request->password);
        $rem = $request->input('remember');
        if (Auth::guard('administrator')->attempt($info, $rem))
        {
            return redirect()->intended('category/');
        }else{
            return redirect()->intended("admin/login")->with("error","AcLount Login Fail !");
        }
//        $check = Auth::guard('administrator')->check();

    }
}
