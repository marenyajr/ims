@props(['products', 'product_count'])
<div class="border rounded w-auto mx-auto mt-36">

          

            <div id="card-container" class=" container mx-auto">
        <table class="min-w-full">
            <thead class="bg-orange-400">
            <tr class="bg-orange-400">
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">id</th>
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Capacity</th>
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Quantity bought</th>
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Sub total</th>
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Remove item</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-orange-300' : 'bg-orange-200' }}">
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        {{$product->id}}
                        
                        </td>
                        <a href="/admin/products/edit/{{$product->id}}">
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{$product->name}}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{$product->capacity}}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">${{number_format($product->selling_price, 2)}}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            
                            <div class=" flex w-auto items-center">
                                <a href="" data-product-id="{{$product->id}}" class="remove-product text-center text-gray-50 text-3xl font-bold items-center w-full bg-laravel rounded-md hover:scale-105 hover:shadow-md" data-product-id="{{$product->id}}">
                                    -
                                </a>
                                <p data-product-id="{{$product->id}}" class="qty text-center font-semibold w-full py-1 bg-transparent">
                                    {{$product_count[$product->id]}}                            
                                </p>
                                <a href="" data-product-id="{{$product->id}}" class="add-product text-center text-gray-50 text-3xl font-bold  w-full bg-laravel rounded-md hover:scale-105 hover:shadow-md" data-product-id="{{$product->id}}">
                                    +
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">${{number_format($product->selling_price * $product_count[$product->id], 2)}}</td>
                        
                        <td class="px-12 whitespace-no-wrap border-b border-gray-200">
                         <a href="" data-product-id="{{$product->id}}" class="remove-item mx-auto p-2 text-center text-gray-50 text-md bg-laravel  font-semibold hover:scale-105 rounded">
                            Remove
                         </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>   
            
</div>

