<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('menu')->where('user_id', Auth::id())->get();
        $menus = Menu::all();
        return view('merchant.order.index', compact('orders', 'menus'));
    }
}
