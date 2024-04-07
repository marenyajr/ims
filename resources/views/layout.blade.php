<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="#" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @vite('resources/css/app.css')
    {{-- <script>
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
                        laravel: "#C15D5D",
                        laraveld: "#E07E1D",
                    },
                    scale: {
                        "101": "1.01",
                    },
                },
            },
            plugins: [],
        };
    </script> --}}
    <title>IMS</title>
</head>

<body class="min-h-full bg-gray-300">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    
        <div class="flex flex-col flex-1 overflow-hidden">

            <main class="flex-1 overflow-x-hidden overflow-y-auto ">
                <x-header />

                @yield('content')


            </main>
        </div>
   

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        // localStorage.clear();
        // Retrieve cart count from local storage or set to 0 if not available           
        let cartProductIds = localStorage.getItem("productIDs");


        console.log(cartProductIds)
        let IDs = new Array();
        if (cartProductIds !== null && cartProductIds !== undefined) {
            IDs = JSON.parse(cartProductIds);
        }
        updateCartCount(IDs);

        // Function to update cart count display
        function updateCartCount(IDs) {
            document.getElementById("cartItemCount").textContent = IDs.length;
            document.getElementById("cartItemCount").style.display = IDs.length > 0 ? "block" : "none";
            // Get the existing anchor element by its ID
            const link = document.getElementById('shopping-cart-link');
            // Set the new href attribute
            link.href = '/shopping-cart/' + IDs;
        }
    });
</script> --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let cartProductIds = localStorage.getItem("productIDs"); 
            let IDs = new Array();
            if (cartProductIds !== null && cartProductIds !== undefined) {                   
                        IDs = JSON.parse(cartProductIds);
                } 
           

            
        const orderProcessing = document.getElementById('order-processing')
        orderProcessing.href = '/shopping-cart/' + IDs;
            });
</script>

</html>