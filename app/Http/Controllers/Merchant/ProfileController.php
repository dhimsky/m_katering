<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $user = User::where('id', $id)->get();
        return view('merchant.profile.index', compact('user'));
    }
}
