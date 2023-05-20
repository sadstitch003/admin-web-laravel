<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminControl extends Controller
{
    public function loginFunction(Request $request)
    { 
        $input = $request->all();
        if($input['username'] == $input['password'])
        {
            return view('dashboard');
        }
    }
}
