@props(['products'])
<div class="border rounded w-4/5 mx-2 mt-2">

          

            <div id="card-container" class=" container mx-auto">
        <table class="min-w-full">
            <thead class="bg-orange-400">
            <tr class="bg-orange-400">
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">id</th>
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Capacity</th>
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
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
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">${{$product->quantity_in_stock}}</td>
                        <td class="pl-6 whitespace-no-wrap border-b border-gray-200">
                         <div data-product-id="{{$product->id}}" class="add-item text-center text-gray-50 text-md w-full bg-orange-400 hover:bg-orange-500 font-semibold hover:scale-105 rounded p-2">
                            Add Item
                         </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>   
            
</div>

<script>
     document.addEventListener("DOMContentLoaded", function() {
        let cartProductIds = localStorage.getItem("productIDs"); 
            let IDs = new Array();
            if (cartProductIds !== null && cartProductIds !== undefined) {                   
                        IDs = JSON.parse(cartProductIds);
                } 
            updateCartCount(IDs);
           
            
                // Get the container element
        let card = document.getElementById('card-container');
            card.addEventListener('mouseover',function(event) {
            
            
                let addProduct = event.target.closest('.add-item');

               
                addProduct.addEventListener("click", function() { 
                    
                    const productID = addProduct.dataset.productId;
                    
                    IDs.push(productID.toString());
                    localStorage.setItem("productIDs", JSON.stringify(IDs)); 
                    
                    
                    // addProduct.href = '/shopping-cart/' + IDs;
                    addProduct.textContent = 'Item Added'
                    addProduct.classList.replace('bg-orange-400', 'bg-laravel')
                    updateCartCount(IDs);
                    
                    
                });               
                

    });

    

            function updateCartCount(IDs) {
                document.getElementById("cartItemCount").textContent = IDs.length;


                document.getElementById("cartItemCount").style.display = document.getElementById("cartItemCount").textContent > 0 ? "block" : "none";
                const link = document.getElementById('shopping-cart-link');
                // Set the new href attribute
                link.href = '/shopping-cart/' + IDs;


                // var checkout = document.getElementById('checkout');
                // checkout.action = '/shopping-cart/' + IDs;
                // Get the existing anchor element by its ID               

                // if (IDs.length > 0) {
                // document.getElementById('checkout-button').removeAttribute('disabled');
                //     }


            }

                  


     });   

 </script>