@extends('admin.layout')

@section('content')




<div class="border border-gray-10 pt-4 rounded max-w-6xl mx-auto mt-12">

   <h1 class="font-semibold text-gray-800 tracking-wide p-3">
    Sales
   </h1>

    <div class="container mx-auto">
  <table class="min-w-full">
    <thead class="bg-orange-400">
      <tr class="bg-orange-400">
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Order id</th>
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Sold By</th>
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">No Items</th>
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Total</th>
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">View Products</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-orange-300' : 'bg-orange-200' }}">
                
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">#{{$order->id}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{$users[$order->id]}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{$order->no_of_items}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">${{number_format($order->total_amount, 2)}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <a href="/admin/sales/show/{{$order->id}}" class="text-gray-50 font-semibold hover:scale-105 hover:shadow-md bg-laravel px-4 py-1 rounded-sm">View products</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>   
    
</div>

<div class="mt-4 p-4">
    {{$orders->links()}}
</div>
@endsection

