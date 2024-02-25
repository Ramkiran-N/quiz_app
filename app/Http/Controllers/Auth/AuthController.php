<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthService;
class AuthController extends Controller
{
    protected $service;
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }
    public function signupIndex()
    {
        return view('auth.signup');
    }
    public function signup(Request $request)
    {
        try {
            $res = $this->service->signup($request);
        if($res['status'] != 200){
            return redirect()->back()->withErrors($res['msg'])->withInput();
        }else{
            return redirect()->back()->withSuccess('Added Successfully, Password link will be shared to your email!');
        }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['unknown'=>'Sorry,Something went wrong!'])->withInput();
        }
       
    }
    public function loginIndex()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
       
        try {
            $res = $this->service->authenticate($request);
            if($res['status'] != 200){
                return redirect()->back()->withErrors($res['msg'])->withInput();
            }else{
                return redirect('/');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['unknown'=>'Sorry,Something went wrong!'])->withInput();
        }
    }
    public function logout(Request $request)
    {
        return $this->service->logout($request);
    }
}
