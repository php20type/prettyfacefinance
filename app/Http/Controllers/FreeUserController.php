<?php

namespace App\Http\Controllers;

use App\FreeUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreeUserController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'email' => 'required|unique:free_users,email'
        ]);
        
        FreeUser::create($request->all());
        
        return redirect('/admin/freeusers');
    }
}
