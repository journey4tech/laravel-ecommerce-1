<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $user = User::where('remember_token', $token)-> first();
        if(!is_null($user)){
        $user -> status = 1;
        $user -> remember_token = NULL;
        $user -> save();
        session()->flush('succes', 'Registration has been completed. Login now');
        return redirect('login');
        }
        else{
             session()->flush('errors', 'Unmatched token');
        return redirect('/');
        }
    }
}
