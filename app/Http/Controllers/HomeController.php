<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        return view(
            'welcome',
            ['products' => Inventory::latest()->filter(['search' => $request->search])->paginate(18)]
        );
    }
}
