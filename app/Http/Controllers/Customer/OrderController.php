<?php

namespace App\Http\Controllers\Customer;

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

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'delivery_date' => 'required|date',
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'menu_id' => $request->menu_id,
            'quantity' => $request->quantity,
            'delivery_date' => $request->delivery_date,
        ]);

        return redirect()->route('merchant.order.index')->with('success', 'Order created successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('merchant.order.index')->with('success', 'Order deleted successfully.');
    }
}
