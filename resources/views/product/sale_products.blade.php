@extends('admin.layout')

@section('content')




<div class="border border-gray-10 pt-4 rounded max-w-6xl mx-auto mt-12">

   <h1 class="font-semibold text-gray-800 tracking-wide flex justify-between px-8 py-3">
    Order_#{{$id}} Products

    <a href="/admin/sales" class=" cursor-pointer">
        <div class="px-3 py-1 bg-laravel hover:scale-105 rounded-md">
            Back
        </div>
        </a>
   </h1>

    <div class="container mx-auto">
  <table class="min-w-full">
    <thead class="bg-orange-400">
      <tr class="bg-orange-400">
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Product id</th>
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Product name</th>
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">No Items</th>
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Selling Price</th>
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($sale_products as $sale_product)
            <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-orange-300' : 'bg-orange-200' }}">
                
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">#{{$sale_product->product_id}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{$products[$sale_product->product_id]}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{$sale_product->quantity_ordered}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">${{number_format($sale_product->unit_price, 2)}}</td>
                 <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">${{number_format($sale_product->subtotal, 2)}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>   
    
</div>


@endsection

