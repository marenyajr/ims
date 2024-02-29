<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
       
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="#" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
       <script src="https://cdn.tailwindcss.com"></script>
        {{-- @vite('resources/css/app.css') --}}
        <script>
            /** @type {import('tailwindcss').Config} */
tailwind.config = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                laravel: "#E07E1B",
                laraveld: "#E07E1D",
            },
            scale: {
                "101": "1.01",
            },
        },
    },
    plugins: [],
};
        </script>
        <title>Teck-Trend</title>
    </head>
    <body class="">
       
     {{-- @include('partials._navbar')    --}}

    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    
    <div x-data="{ sidebarOpen: false }" class="h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
    
        
            {{-- <x-sidebar /> --}}
                  
      
        
       
        <div class="flex flex-col flex-1 overflow-hidden">
            
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                
         
                   @yield('content')

                
            </main>
        </div>
    </div>

    

    {{-- <footer
            class="bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

            <a
                href=""
                class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
                >Get started</a
            >
        </footer>  --}}
        
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Retrieve cart count from local storage or set to 0 if not available
            let cartCount = localStorage.getItem("cartCount") || 0;
            let cartProductIds = localStorage.getItem("productIDs") || 0;
            updateCartCount(cartCount, cartProductIds);
            // localStorage.clear();

            // Add event listener to the "Add to Cart" button
            let = addToCartBtn = document.getElementById("add-To-Cart-Btn")
            addToCartBtn.addEventListener("click", function() {
                
                // Increment cart count
                
                cartCount++;
                // Update cart count in local storage
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
           

</html>