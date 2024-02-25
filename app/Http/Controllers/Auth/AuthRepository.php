<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

class AuthRepository 
{
    public function storeData($request)
    {
        return User::create($request);
    }
    
}
