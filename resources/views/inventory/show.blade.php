@extends('layout')

@section('content')
<x-header />

    <div class="bg-gray-100 h-10 mb-2 mt-24 p-2 ">Home > tv > mawish</div>

    <x-container class="p-1">
                <div class="flex gap-6 w-full my- mx-6 px-8">
                    <div class="w-1/3 h-96 p-2 bg-gray-50 mx-auto">
                        <img id="image"
                                class="md:block w-full"
                                src='{{$product->image ? asset("storage/" . $product->image): asset("storage/product_images/no_image.jpg")}}'
                                alt=""
                            />
                    </div>

                    <div class="p-6 w-2/3 h-96 bg-gray-50">
                        
                        <div class="text-3xl text-gray-700 tracking-wide mb-2 pl-6">
                            {{$product->description }}
                        </div>
                        <div class="text-xl text-laravel tracking-wider mb-2 pl-6 font-bold py-2 bg-gray-200 rounded">
                            ${{ number_format($product->unit_price, 2)}}
                        </div>
                        
                        <div class="flex text-md tracking-wide font-semibild mb-2">
                            
                            <div class="w-1/4">
                                Model:
                            </div>
                            <div class="py-1 border border-laravel bg-transparent rounded-sm px-4">
                                Samsung
                            </div>
                        </div>
                         <div class="flex text-md tracking-wide font-semibild mb-2">
                            
                            <div class="w-1/4">
                                Size:
                            </div>
                            <div class="py-1 border border-laravel bg-transparent rounded-sm px-4">
                               43"
                            </div>
                        </div>
                        <div class="flex text-md tracking-wide font-semibild mb-2">
                            
                            <div class="w-1/4">
                                Color:
                            </div>
                            <div class="py-1 border border-laravel bg-transparent rounded-sm px-4">
                                Black
                            </div>
                        </div>
                        <div class="flex text-md tracking-wide font-semibild mb-2">
                            
                            <div class="w-1/4">
                                Power:
                            </div>
                            <div class="py-1 border border-laravel bg-transparent rounded-sm px-4">
                                1000W {{$product->id}}
                            </div>
                        </div>
                        <div class="flex text-md tracking-wide font-semibild mb-2">
                          
                            <div class="w-1/4">
                                Qty:
                            </div>
                            
                            <div class=" flex border border-laravel bg-transparent rounded-lg px-4 w-32 items-center">
                                <div class="text-left w-8 py-1">
                                    -
                                </div>
                                <div class="px-3 h-full border-x border-laravel bg-transparent w-14 py-1 text-center">
                                    1
                                </div>
                                <div class="text-center w-8">
                                    +
                                </div>
                            </div>
                        </div>
                        <div id="add-To-Cart-Btn" data-product-id="{{$product->id}}" class="w-3/4 text-center bg-orange-400 hover:shadow-lg hover:bg-laravel rounded-sm py-3 mt-2">
                                <a href="#"  class="text-gray-50 font-semibold text-sm ">ADD TO CART</a>
                            </div>
                    </div>                    
                </div>                
    </x-container>
    <x-container>
        

    </x-container>

    <x-container>
    <div class="px-6">
        <h1 class="mb-1 pl-3">Related items</h1>
        <hr>
    </div>
    <x-container>    
    <div id="card-container" class="lg:grid lg:grid-cols-6 gap-2 md:grid md:grid-cols-4 sm:grid sm:grid-cols-2 space-y-2 md:space-y-0 mx-0 ">
        @foreach ($related_products as $product)
       
            <x-product-card :product="$product" />
        
            
            
        @endforeach
        <div class="justify-between">
            {{$related_products->links()}}
        </div>
    </div>
</x-container>
    </x-container> 
    
     <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Retrieve cart count from local storage or set to 0 if not available
            let cartCount = localStorage.getItem("cartCount") || 0;
            let cartProductIds = localStorage.getItem("productIDs") || 0;
            updateCartCount(cartCount, cartProductIds);
            

            // Add event listener to the "Add to Cart" button
            let = addToCartBtn = document.getElementById("add-To-Cart-Btn")
            addToCartBtn.addEventListener("click", function() {
                
                // Increment cart count
                
                cartCount++;
                // Update cart count in local storage
                // localStorage.clear();
                localStorage.setItem("cartCount", cartCount);
                const productId = addToCartBtn.dataset.productId;
                cartProductIds += ',' + productId;
                localStorage.setItem("productIDs", cartProductIds)       
                


                
                // Update cart count display and link
                updateCartCount(cartCount, cartProductIds);
            });

            // Function to update cart count display
            function updateCartCount(count, IDs) {
                document.getElementById("cartItemCount").textContent = count;
                document.getElementById("cartItemCount").style.display = count > 0 ? "block" : "none";
                // Get the existing anchor element by its ID
                const link = document.getElementById('shopping-cart-link');
                // Set the new href attribute
                link.href = '/shopping-cart/' + IDs;
            }
        });
    </script>
           
@endsection