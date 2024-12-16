<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginAdmin(){
        return view('auth_admin.login');
    }

    // process login User
    public function loginAdmin(LoginAdminRequest $request){

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
    }

    // logout User
    public function logoutAdmin(){
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Đăng xuất thành công');
    }

    public function showDashboard(){
        return view('admin.dashboard');
    }
}
