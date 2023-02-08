<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function index()
    {

        $items= Item::paginate(8);
        return view('home',compact('items'));
    }
    public function productDetail(Request $request)
    {
        $items = Item::where('id',$request->id)->get();
        return view('detail-product',compact('items'));
    }
    public static function countCart()
    {
        $cart = session("cart");
        if($cart!==null)
        {
            return count($cart);
        }
    }
    public function viewProfile()
    {
        return view('profile');

    }
    public function successPage()
    {
        return view('success-page');
    }

}
