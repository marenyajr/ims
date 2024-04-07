<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        return view(
            'home',
            [
                'products' => Product::latest()->filter(['search' => $request->search])->paginate(18),
                'categories' => Product::distinct()->pluck('category'),
            ]
        );
    }

    public function newOrder(Request $request)
    {

        session()->flash('freshOrder', 'fresh');
        return redirect('/');
    }

    public function addItems(Request $request)
    {
        return redirect('/');
    }
}
