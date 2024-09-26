<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(){

        $menu = Menu::all();
        $type = Type::all();
        $location = Location    ::all();

        return view('customer.menu.index', compact('menu', 'type', 'location'));
    }
}
