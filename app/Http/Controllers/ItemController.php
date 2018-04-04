<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use App\Cart;

use App\Category;

use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
    	$items = Item::latest()->paginate(6);

        $categories = Category::all();

        if(Auth::user()){
        $cartItems = Auth::user()->items;
        $cartCount = Auth::user()->items->count();
        }


    	return view('items.index',compact('items','categories','cartCount','cartItems'));
    }

    public function sort($category)
    {   
        
        $category = Category::where('name',$category)->first();

        $count = Item::all()->count();

        $items = Item::where('category_id', $category->id)->paginate(6);

        $categories = Category::all();
        if(Auth::user()){
        $cartItems = Auth::user()->items;
        $cartCount = Auth::user()->items->count();
        }
        return view('items.sort',compact('items','categories','count','cartCount','cartItems'));
    }

    public function search()
    {
        $needle = request('search');

        $result = Item::where('name','LIKE',"%$needle%")->paginate(6);

        if(count($result) < 1)
        {
            session()->flash('message','No items found!');
        }

        $items = $result;

        $categories = Category::all();

        if(Auth::user()){
        $cartItems = Auth::user()->items;
        $cartCount = Auth::user()->items->count();
        }


        return view('items.index',compact('items','categories','cartCount','cartItems'));
    }

}
