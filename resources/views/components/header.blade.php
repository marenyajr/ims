<nav id="nav" class="z-20 fixed flex w-full justify-between px-6 bg-laravel pt-2">
    
   
    <a href="/" class="w-12 rounded-full pb-2  bg-laravel ml-2">
                <img class="md:block w-full" src='{{asset("storage/product_images/logo.png")}}' alt="" />
    </a>

    
           
    
    <div class="flex items-center">


        
       <a id="products" class="nav-link mr-8 text-gray-50 font-semibold hover:bg-gray-50 hover:text-laravel p-2" href="/">Sales Dashboard</a>
       <a id="order-processing" class="nav-link mr-8 text-gray-50 font-semibold hover:bg-gray-50 hover:text-laravel p-2 " href="#">Order Management</a>
       <a id="product-managament" class="nav-link mr-8 text-gray-50 font-semibold hover:bg-gray-50 hover:text-laravel p-2 " href="/admin/products/create">Product Management</a>
       
       <div class="">
             @include('partials._profile')
       </div>
       
        
    </div>
</nav>