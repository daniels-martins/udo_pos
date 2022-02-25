<?php

namespace App\Http\Controllers;

use Hamcrest\Core\IsSame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ModifyPasswordController extends Controller
{
    public function modify(Request $request)
    {
        $request->validate([
            'current_password' => 'current_password',
            'password' => 'required|confirmed|min:8 ,'
        ]);

        // modify password
        $request->user()->password = Hash::make($request->password);
        $request->user()->save();
        return back()->with('success', 'Password Updated');
    }
}
