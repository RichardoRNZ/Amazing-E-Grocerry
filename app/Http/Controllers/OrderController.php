<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    //
    public function addTocart(Request $request)
    {
        $id = $request->id;
        $cart = session("cart");
        $item = Item::where('id',$id)->first();


            $cart[] =  [
                "id" =>$item->id,
                "name" => $item->name,
                "image" => $item->picture,
                "price" => $item->price
            ];
            session(["cart" => $cart]);

            return redirect()->route('view-cart');
    }
    public function viewCart()
    {
        $cart = session("cart");
        return view('cart',compact('cart'));
    }
    public function deleteItem(Request $request)
    {
        $cart = session("cart");
        unset($cart[$request->id]);
        session(["cart" => $cart]);
        return redirect()->route('view-cart');
    }
    public function addTransaction(Request $request)
    {
        $cart = session("cart");
        $order = new Order();
        $order->account_id = Auth::user()->id;
        foreach($cart as $c =>$item)
        {
            $order->item_id = $item['id'];
        }
        $order->price = $request->price;
        $order->save();
        session()->forget("cart");
       return redirect()->route('success-page')->with('success', 'Order Success');

    }
}
