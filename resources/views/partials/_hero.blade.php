<!-- Hero -->
@php
    $categories = [
        "Televisions",
        "Home Audio",
        "Headphones",
        "Portable Audio",
        "Cameras",
        "Security",
        "Phones",
        "Tablets",
        "Computers",
        "Laptops",
        "Computing accessories",
        "Other Categories"
    ]
@endphp
<div class="flex gap-3 w-full">
        <div class=" h-96 bg-gray-200 align-center pt-4 space-y-4 mb-4 mt-10 w-1/6 rounded-lg">
            @foreach ($categories as $category)
                <div class="w-full h-3 text-gray-800  hover:text-laravel pl-4">
                    <a href="#" class="tracking-wide leading-3 text-xs text-current">
                        {{$category}} 
                    </a>
                </div>             
            @endforeach
            
        </div>      
        <div class="h-96 bg-laravel align-center text-center space-y-4 mb-4 mt-10 w-4/6 rounded-lg">

            <div class="pt-16">
                <h1 class="text-6xl font-bold uppercase text-white">
                    Tech<span class="text-black">Trend</span>
                </h1>
                <p class="text-2xl text-gray-200 font-bold my-4">
                   Elevate Your Shopping Experience with TechTrend
                </p>
                <div>
                    <a
                        href="#"
                        class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                        >Start Shopping</a
                    >
                </div>
            </div>
        </div>
        <div class="h-96 w-1/6 mt-10 mb-4">
            <div class="h-1/2 bg-gray-300 align-center text-center space-y-4 mb-1 w-full rounded-lg">

                <div class="pt-8">
                    <h1 class="text-6md  uppercase text-white">
                        Tech<span class="text-black">Trend</span>
                    </h1>
                    
                    <div>
                        <a
                            href="#"
                            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                            >Start Shopping</a
                        >
                    </div>
                </div>
            </div> 
            <div class="h-1/2 bg-gray-300 align-center text-center space-y-4 mb-1 mt-1 w-full rounded-lg">

                <div class="pt-8">
                    <h1 class="text-6md  uppercase text-white">
                        Tech<span class="text-black">Trend</span>
                    </h1>
                    
                    <div>
                        <a
                            href="#"
                            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                            >Start Shopping</a
                        >
                    </div>
                </div>
            </div>
        </div>
         
        </div>
</div>