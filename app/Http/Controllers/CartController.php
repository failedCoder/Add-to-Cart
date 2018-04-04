<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Cart;

use App\Category;

use App\Item;

class CartController extends Controller
{
   public function __construct()
   {
    $this->middleware('auth');
   }

   public function add()
   {	
      $exists = Cart::where('item_id',request('item_id'))->get();

      if(count($exists)<1)
      {
          Cart::create([
            'item_id'=>request('item_id'),
            'user_id'=>Auth::id(),
            ]);    
       }
    	return back();
    }

    public function show()
    {
    	$categories = Category::all();

    	$cartCount = Auth::user()->items->count();

    	$cartItems = Auth::user()->items;

    	return view('cart',compact('categories','cartCount','cartItems'));
    }

    public function destroy($id)
    {   
        $user_id = Auth::user()->id;
        $order = Cart::where('user_id',$user_id)->where('item_id',$id)->delete();

        return back();
    }

    public function checkout()
    {
        return view('checkout');
    }
}
