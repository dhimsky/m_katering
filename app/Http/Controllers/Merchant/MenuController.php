<?php

namespace App\Http\Controllers\Merchant;

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

        return view('merchant.menu.index', compact('menu', 'type', 'location'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'id_menu' => 'required|unique:menu,id_menu',
        //     'nama_menu' => 'required',
        // ],[
        //     'id_menu.required' => 'Kode tidak boleh kosong!',
        //     'id_menu.unique' => 'Kode sudah digunakan, pakai yang lain!',
        //     'nama_menu.required' => 'Nama menu tidak boleh kosong!',
        // ]);
        $menu = new Menu;
        $user = Auth::user();
        $menu->user_id =  $user->id;
        $menu->type_id =  $request->input('type_id');
        $menu->location_id =  $request->input('location_id');
        $menu->name =  $request->input('name');
        $menu->price =  $request->input('price');
        $menu->description =  $request->input('description');
        if ($request->hasFile('image')) {
            if ($menu->image) {
                Storage::delete('public/images/' . $menu->image);
            }
            $file = $request->file('image');
            $fileName = $menu->name  . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $menu->image = $fileName;
        }
        $menu->save();
        return redirect()->route('merchant.menu')->with('success', 'menu berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $order = Order::where('menu_id', $id)->first();
        if (!$order){
            $menu = Menu::find($id);
            $menu->delete();
            return redirect()->route('merchant.menu')->with('success', 'menu berhasil dihapus.');
        }else{
            return redirect()->route('merchant.menu')->with('error','Tidak dapat menghapus!, menu sedang digunakan pada tabel order.');        }
    }
}
