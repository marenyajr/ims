<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view(
            'product.index',
            ['products' => Product::latest()->filter(['search' => $request->search])->paginate(18)
                
            ]
        );
    }


    public function products(Request $request)
    {
        return view(
            'product.products',
            ['products' => Product::latest()->filter(['search' => $request->search])->paginate(18)         
            ]
        );
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $product = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'selling_price' => 'required',
            'unit_price' => 'required',
            'quantity_in_stock' => 'required',
            'capacity' => 'required'
        ]);

        // dd($request->all());
        Product::create($product);
        return back()->with('message', 'product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {


        return view('product.show', ['product' => $product, 'related_products' => Product::latest()->paginate(6)]);
    }


    public function shoppingCart(Request $request, $IDs = null)
    {



        $product_IDs = explode(',', $IDs);

        $products = [];

        foreach ($product_IDs as $product) {
            if (array_key_exists($product, $products)) {
                $products[$product]++;
            } else {
                $products[$product] = 1;
            }
        }


        $cart_products = Product::whereIn('id', array_keys($products))->get();

        $total = 0;

        foreach ($cart_products as $prod) {
            $subtotal = $prod->selling_price * $products[$prod->id];
            $total += $subtotal;
        }
        //dd($products);

        return view('shopping-cart', ['products' => $cart_products, "product_count" => $products, 'count' => count($product_IDs), 'total' => $total]);
    }

    public function checkout(Request $request, $IDs)
    {

        $product_IDs = explode(',', $IDs);

        $products = [];

        foreach ($product_IDs as $product) {
            if (array_key_exists($product, $products)) {
                $products[$product]++;
            } else {
                $products[$product] = 1;
            }
        }

        //dd($products);

        $cart_products = Product::whereIn('id', array_keys($products))->get();

        $total = 0;
        $order_products = [];
        $items = 0;
        foreach ($cart_products as $prod) {
            $subtotal = $prod->selling_price * $products[$prod->id];
            $total += $subtotal;
            $order_products[$prod->id] = [$prod->id, $prod->unit_price, $products[$prod->id], $subtotal, $prod->capacity];
            $items += $products[$prod->id];
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'total_amount' => $total,
            'no_of_items' => $items
        ]);

        foreach ($order_products as $order_product) {
            OrderProduct::create([
                'product_id' => $order_product[0],
                'order_id' => $order->id,
                'capacity' => $order_product[4],
                'unit_price' => $order_product[1],
                'quantity_ordered' =>  $order_product[2],
                'discount' => 0,

                'subtotal' => $order_product[3]
            ]);

            $item = Product::where('id', $order_product[0])->first();
            $item->update([
                'quantity_in_stock' => $item->quantity_in_stock - $order_product[2]
            ]);
        }
        session()->flash('actionStatus', 'success');
        return redirect('/shopping-cart');
    }


   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $updates = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
            'selling_price' => 'required'

        ]);

        $updates['quantity_in_stock'] = $product->quantity_in_stock + $request->added_to_stock;
        

        $product->update($updates);
        return back()->with('message', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
