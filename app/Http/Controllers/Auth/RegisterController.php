<?php

namespace App\Http\Controllers\Auth;

use App\Models\User; // Pastikan Anda mengimpor model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
            'company_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = new user;
        $user->name =  $request->input('name');
        $user->email =  $request->input('email');
        $user->password =  $request->input('password');
        $user->role =  $request->input('role');
        $user->company_name =  $request->input('company_name');
        $user->address =  $request->input('address');
        $user->contact =  $request->input('contact');
        $user->description =  $request->input('description');
        $user->save();

        return redirect()->route('/')->with('success', 'Registration successful. You can now log in.');
    }
}
