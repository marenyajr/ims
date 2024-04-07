<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_sales = OrderProduct::count();
        

        return view('admin-dashboard', ['users' => User::get(), 'orders' => Order::get(), 'products' => Product::get(), 'sales' => $total_sales, 'cash_inflow' => Order::sum('total_amount')], );
    }


    public function users()
    {
        return view('admin.users', ['users' => User::latest()->paginate(15)]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function sales(Request $request)
    {

        $orders = Order::latest()->paginate(10);

        $users = [];
        foreach ($orders as $order) {

            $users[$order->id] = User::where('id', $order->user_id)->first()->name;
        }

       
        return view('product.sales', ['orders' => $orders, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function sale_products($id)
    {
        $products = [];
        $sale_products = OrderProduct::where('order_id', $id)->get();
        foreach($sale_products as $sale_product){
            $products[$sale_product->product_id] = Product::where('id', $sale_product->product_id)->first()->name;
        }
        // dd($products);
        return view('Product.sale_products', ['sale_products' => $sale_products, 'products' => $products, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
