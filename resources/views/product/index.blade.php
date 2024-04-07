@extends('admin.layout')

@section('content')


<div class="border border-gray-10 pt-4 rounded max-w-6xl mx-auto mt-12">

   

    <div class="container mx-auto">
  <table class="min-w-full">
    <thead class="bg-orange-400">
      <tr class="bg-orange-400">
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">id</th>
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">stock</th>
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Buying Price</th>
         <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Selling Price</th>
        <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-orange-300' : 'bg-orange-200' }}">
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                   {{$product->id}}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{$product->name}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{$product->quantity_in_stock}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">${{number_format($product->unit_price, 2)}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">${{number_format($product->selling_price, 2)}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <a href="/admin/products/edit/{{$product->id}}" class="text-gray-50 font-semibold hover:scale-105 hover:shadow-md bg-laravel px-4 py-1 rounded-sm">Update</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>   
    
</div>

<div class="mt-4 p-4">
    {{$products->links()}}
</div>
@endsection

