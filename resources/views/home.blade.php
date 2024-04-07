@extends('layout')

@section('content')

@if(session('freshOrder'))
    <script>
        // Check if action status is success
        if ("{{ session('freshOrder') }}" === "fresh") {
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

<div class="flex justify-between items-center bg-gray-50 mt-14 pt-4 pb-2 p-2">
    <div class="items-center w-1/2">
            @include('partials._search')
    </div>

    <div class="flex justify-between">
         <a class="my-auto px-2 py-1 nav-link mr-6 text-gray-50 font-semibold bg-laravel rounded hover:bg-gray-300 hover:text-laravel p-2 " href="/new-order">New Order</a>
       <x-shopping-cart />
    </div>
    
</div>



@unless (count($products) == 0)

<div class="flex">
<x-product-categories :categories="$categories"/>
 <x-product-list :products="$products"/>
</div>


    
    
   
       
        <div class="mt-4 p-4">
            {{$products->links()}}
        </div>
   





                    
@else
<p>There are No products</p>
@endunless

@endsection


<script>
     document.addEventListener("DOMContentLoaded", function() {
        const products = document.getElementById('products')
        products.classList.add('bg-gray-50')
        // products.classList.add('text-laravel')
        products.classList.add('-mb-5')
        products.classList.replace('text-gray-50', 'text-laravel')
     });
</script>