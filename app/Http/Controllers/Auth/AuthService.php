<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthService 
{
    protected $repository;
    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }
   public function signup($request)
   {
    $validator = Validator::make($request->all(), [
        'name' => 'required|unique:users,name',
        'email' => 'required|email|unique:users,email',
        'password' => [
            'required',
            'string',
            'min:8',
            'confirmed'
        ]
    ]);
     
    if ($validator->fails()) {
        return ['msg'=> $validator->messages(),'status'=>403];
    }else{
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $res = $this->repository->storeData($data);
        $credentials = ['email'=>$request->email,'password'=>$request->password];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return ['status'=>200];
        }
    }
   }
   public function authenticate($request)
   {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'password' => 'required'
    ]);
    if ($validator->fails()) {
        return ['msg'=> $validator->messages(),'status'=>403];
    }else{
        $credentials = [
            'name' => $request->name, 
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return ['status'=>200];
        } else {
            return ['unknown'=> 'Invalid Credentials','status'=>403];
        }
    }
   }
   public function logout($request)
   {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
   }
}
