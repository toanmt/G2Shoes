<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;

class LoginController extends Controller
{
    public function index(Request $request){
        if($request->cookie('admin_login')){
            return redirect()->route('home');
        }
        else{
            return View('Admin.login.index');
        }
        return View('Admin.login.index');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $username = $request->name;
            $password = $request->password;

            $admin = Admin::where('username',$username)->first();
            if(!empty($admin)){
                if(Hash::check($password,$admin["password"])){
                    Cookie::queue('admin_login',json_encode($admin),10*365*24*3600);
                    return redirect('admin');
                }else{
                    return redirect()->back()->with('message','Mật khẩu không chính xác');
                }
            }else{
                return redirect()->back()->with('message','Tài khoản không tồn tại');
            }
        }
    }

    public function logout(Request $request){
        if($request->cookie('admin_login')){
            Cookie::queue(Cookie::forget('admin_login'));
            return redirect('admin/login');
        }
    }
}
