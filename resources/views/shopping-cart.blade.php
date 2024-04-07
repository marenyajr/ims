@extends('layout')
@section('content')

<div class="fixed flex justify-between items-center bg-gray-50 mt-14 pt-4 pb-2 p-2 w-full">
    <div class="w-1/2">
            <form id="checkout" action="#" method="post">
                @csrf
                        <div class="flex relative ">
                        
                            <input
                                type="text"
                                name="search"
                                class="w-full pl-4 pr-4 py-3 rounded focus:shadow focus:outline-none ml-6 mr-4 font-semibold"
                                value="Order Total = ${{number_format($total, 2)}}"
                                disabled
                            
                            />
                            
                                <button
                                    id="checkout-button"
                                    type="submit"
                                    class=" px-6 py-3 text-white rounded bg-laravel hover:scale-101 shadow-3xl text-md font-semibold tracking-wider
                                    {{ count($products) < 1 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                    {{ count($products) > 0 ? '' : 'disabled' }}>
                                    Checkout...
                                </button>
                        
                        </div>
            </form>
    </div>

    <div class="justify-between flex">
    <a id="order" class=" my-auto px-2 pt-2 pb-6 nav-link mr-6 text-gray-50 font-semibold bg-laravel rounded hover:bg-gray-300 hover:text-laravel" href="#">Order Processing</a>
       <a class="my-auto px-2 py-1 nav-link mr-6 text-gray-50 font-semibold bg-laravel rounded hover:bg-gray-300 hover:text-laravel p-2 " href="/new-order">New Order</a>
        <a class="my-auto px-2 py-1 nav-link mr-6 text-gray-50 font-semibold bg-laravel rounded hover:bg-gray-300 hover:text-laravel p-2 " href="/add-items">Add Items</a>
       

    <x-shopping-cart />
    </div>
</div>

@if(session('actionStatus'))
    <script>
        // Check if action status is success
        if ("{{ session('actionStatus') }}" === "success") {
            // Call your JavaScript function here
           localStorage.clear();
           let cartProductIds = localStorage.getItem("productIDs"); 
            let IDs = new Array();
            if (cartProductIds !== null && cartProductIds !== undefined) {                   
                        IDs = JSON.parse(cartProductIds);
                } 
            updateCartCount(IDs);
        }
    </script>
@endif

<x-cart-list :products="$products" :product_count="$product_count" />


    

 <script>
     document.addEventListener("DOMContentLoaded", function() {
        let cartProductIds = localStorage.getItem("productIDs"); 
            let IDs = new Array();
            if (cartProductIds !== null && cartProductIds !== undefined) {                   
                        IDs = JSON.parse(cartProductIds);
                } 
            updateCartCount(IDs);

            
        const orderProcessing = document.getElementById('order-processing')
        orderProcessing.classList.add('bg-gray-50')
        orderProcessing.classList.replace('text-gray-50', 'text-laravel')
        orderProcessing.classList.add('-mb-5')

        const order = document.getElementById('order')
        order.classList.replace('bg-laravel', 'bg-gray-300')
        order.classList.replace('text-gray-50', 'text-laravel')
        order.classList.remove('py-1')
        order.classList.add('pt-2')
        order.classList.add('pb-6')
        order.classList.add('-mb-4')
        // orderProcessing.classList.add('-mb-5')
           
            
        // Get the container element
        const cardContainer = document.getElementById('card-container');
            cardContainer.addEventListener('mouseover',function(event) {           
            
               
                let removeProduct = event.target.closest('.remove-product'); 

                removeProduct.addEventListener("click", function() { 
                    
                    const productIds = removeProduct.dataset.productId; 
                    let indexToRemove = IDs.indexOf(productIds.toString());
                    if (indexToRemove !== -1) {
                        IDs.splice(indexToRemove, 1);
                        localStorage.setItem("productIDs", JSON.stringify(IDs));
                        // console.log(countOccurrences(IDs, productIds));
                        // event.target.closest('.qty').textContent = countOccurrences(IDs, productIds)
                                          
                        removeProduct.href = '/shopping-cart/' + IDs;
                        reload(IDs);
                        
                    } 
                    
                });

    });

    
            cardContainer.addEventListener('mouseover',function(event) {           
            
               
                let removeItem = event.target.closest('.remove-item'); 

                removeItem.addEventListener("click", function() { 
                    
                    const itemId = removeItem.dataset.productId; 

                    // let indexToRemove = IDs.indexOf(itemId.toString());
                    // if (indexToRemove !== -1) {
                    //     IDs.splice(indexToRemove, 1);
                    //     localStorage.setItem("productIDs", JSON.stringify(IDs));
                    //     // console.log(countOccurrences(IDs, productIds));
                    //     // event.target.closest('.qty').textContent = countOccurrences(IDs, productIds)
                                          
                    //     removeItem.href = '/shopping-cart/' + IDs;
                    //     reload(IDs);
                        
                    // } 

                    let indexesToRemove = [];
                    IDs.forEach((id, index) => {
                        if (id.toString() === itemId.toString()) {
                            indexesToRemove.push(index);
                        }
                    });

                    indexesToRemove.reverse().forEach(index => {
                        IDs.splice(index, 1);
                    });

                    localStorage.setItem("productIDs", JSON.stringify(IDs));
                    removeItem.href = '/shopping-cart/' + IDs;
                    reload(IDs);
                    
                });

    });

    // Get the container element
        let card = document.getElementById('card-container');
            card.addEventListener('mouseover',function(event) {
            
            
                let addProduct = event.target.closest('.add-product');

               
                addProduct.addEventListener("click", function() { 
                    console.log('added')  ;
                    const productID = addProduct.dataset.productId;
                    
                    IDs.push(productID.toString());
                    localStorage.setItem("productIDs", JSON.stringify(IDs)); 
                    
                    
                    addProduct.href = '/shopping-cart/' + IDs;
                    updateCartCount(IDs);
                    
                    
                });               
                

    });


            function updateCartCount(IDs) {
                document.getElementById("cartItemCount").textContent = IDs.length;
                document.getElementById("cartItemCount").style.display = IDs.length > 0 ? "block" : "none";
                var checkout = document.getElementById('checkout');
                checkout.action = '/shopping-cart/' + IDs;
                // Get the existing anchor element by its ID
                const link = document.getElementById('shopping-cart-link');
                // Set the new href attribute
                link.href = '/shopping-cart/' + IDs;

                if (IDs.length > 0) {
                document.getElementById('checkout-button').removeAttribute('disabled');
    }


            }

            function reload(IDs) {
                console.log('/shopping-cart/' + IDs);
                $(document).ready(function() {
                
                    $.ajax({
                        url: '/shopping-cart/' + IDs,
                        type: 'GET',
                        success: function(response) {
                            // Handle the response here
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            console.error(error);
                        }
                    });
                
});
            }

            


        });

 </script>
 @endsection
