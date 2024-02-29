<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
        return view(
            'inventory.index',
            ['products' => Inventory::latest()->filter(['search' => $request->search])->paginate(18)]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $formFields = $request->validate([
            'product_name' => 'required',
            'product_category' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
            'quantity_in_stock' => 'required',
                      
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('product_images', 'public');
        }

        Inventory::create($formFields);
        return redirect('/products')->with('message', 'product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
       
       
        return view('inventory.show', ['product' => $inventory, 'related_products' => Inventory::latest()->paginate(6)]);
    }


    public function shoppingCart(Request $request, $IDs){
        
        $product_IDs = explode(',', $IDs);
        array_shift($product_IDs);
        $products = [];
        
        foreach ($product_IDs as $product) {           
            if (array_key_exists($product, $products)) {                
                $products[$product]++;
            } else {                
                $products[$product] = 1;
            }
        }

       
        $cart_products = Inventory::whereIn('id', array_keys($products))->get();
       
        return view('shopping-cart', ['products' => $cart_products, "product_count" => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
