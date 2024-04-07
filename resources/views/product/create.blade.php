@extends('admin.layout')
@section('content')

<div class="fixed flex justify-between items-center bg-gray-50 mt-14 pt-4 pb-2 p-2 w-4/5">
    <div class="items-center w-1/2">
            @include('partials._search')
    </div>

    <div class="flex items-center">


        
       <a class=" px-2 py-1 nav-link mr-6 text-gray-50 font-semibold bg-laravel rounded hover:bg-gray-300 hover:text-laravel p-2" href="/admin/products/create">Add Products</a>
       <a class=" px-2 py-1 nav-link mr-6 text-gray-50 font-semibold bg-laravel rounded hover:bg-gray-300 hover:text-laravel p-2 " href="/admin/products">Update Stock</a>
       {{-- <a class=" px-2 py-1 nav-link mr-6 text-gray-50 font-semibold bg-laravel rounded hover:bg-gray-300 hover:text-laravel p-2 " href="#">Product Details</a> --}}
       
               
    </div>
</div>

<div class=" p-10 rounded max-w-4xl mx-auto mt-20">

                    <form method="POST" action="/admin/products" enctype="multipart/form-data" class="text-gray-600">
                        @csrf
                        <div class="flex">
                            <div class="mb-3 mx-6 w-full">
                            <label
                                for="name"
                                class="inline-block text-md tracking-wide mb-2"
                                ></label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-4 w-full"
                                name="name"
                                value="{{old('name')}}"
                                placeholder="Product name"
                            />
                            @error('name')
                                <p class="text-red-500 text-xs mt-t">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3 mx-6 w-full">
                            <label for="category" class="inline-block text-md tracking-wide mb-2"
                                ></label
                            >
                           
                            <select name="category"  class="border border-gray-200 rounded p-4 w-full">
                            <option value="" class="text-gray-600">Select category</option>
                             <option value="Food staffs">Food staffs</option>
                            <option value="Beverages">Beverage</option>
                            <option value="Snacks">Snacks</option>
                            <option value="Cakes">Cakes</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Hair care">Hair Care</option>
                            <option value="Skin Care">Skin Care</option>
                            </select>

                             @error('category')
                                <p class="text-red-300 text-xs mt-t">{{$message}}</p>
                            @enderror
                        </div>
                        </div>
                        
                        <div class="flex">
                        

                        <div class="mb-3 mx-6 w-full">
                            <label
                                for="price"
                                class="inline-block text-md tracking-wide mb-2"
                            >
                               
                            </label>
                            <input
                                type="number"
                                step="any"
                                class="border border-gray-200 rounded p-4 w-full"
                                name="unit_price"
                                value="{{old('unit_price')}}"
                                placeholder="Buying price"
                            />
                             @error('unit_price')
                                <p class="text-red-500 text-xs mt-t">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3 mx-6 w-full">
                            <label
                                for="selling_price"
                                class="inline-block text-md tracking-wide mb-2"
                            >
                               
                            </label>
                            <input
                                type="number"
                                step="any"
                                class="border border-gray-200 rounded p-4 w-full"
                                name="selling_price"
                                value="{{old('selling_price')}}"
                                placeholder="Selling price"
                            />
                             @error('selling_price')
                                <p class="text-red-500 text-xs mt-t">{{$message}}</p>
                            @enderror
                        </div>
                        
                        </div>

                        
                        <div class="flex">
                        

                        <div class="mb-6 mx-6 w-full">
                                <label
                                    for="description"
                                    class="inline-block text-md tracking-wide mb-2 text-gray-500"
                                >
                                  Description  
                                </label>
                                <textarea
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="description"
                                    rows="8"
                                    value="Get high quality sound system"
                                    
                                >{{old('description')}}
                            </textarea>
                                @error('description')
                                    <p class="text-red-500 text-xs mt-t">{{$message}}</p>
                                @enderror
                            </div>

                        <div class="mb-6 mx-6 w-full">
                            <div class="w-full">
                                <label
                                    for="capacity"
                                    class="inline-block text-md tracking-wide mb-2"
                                >
                                
                                </label>
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-4 w-full"
                                    name="capacity"
                                    value="{{old('capacity')}}"
                                    placeholder="Capacity"
                                />
                                @error('unit_price')
                                    <p class="text-red-500 text-xs mt-t">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="w-full mb-6">
                                <label for="quantity_in_stock" class="inline-block text-md tracking-wide mb-2">
                                
                                </label>
                                <input
                                    type="number"
                                    step="1"
                                    class="border border-gray-200 rounded p-4 w-full"
                                    name="quantity_in_stock"
                                    placeholder="Quantity added to stock"
                                    value="{{old('quantity_in_stock')}}"
                                />
                                @error('quantity_in_stock')
                                    <p class="text-red-500 text-xs mt-t">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-6 text-center w-full">
                                <button
                                    class="bg-laravel text-white font-semibold rounded p-4 w-3/4 hover:scale-105"
                                >
                                    Add Product
                                </button>
                            </div>

                            {{-- <div class="w-full">
                                <label for="quantity_in_stock" class="inline-block text-md tracking-wide mb-2">
                                
                                </label>
                                <input
                                    type="number"
                                    step="1"
                                    class="border border-gray-200 rounded p-4 w-full"
                                    name="quantity_in_stock"
                                    placeholder="Quantity added to stock"
                                    value="{{old('quantity_in_stock')}}"
                                />
                                @error('quantity_in_stock')
                                    <p class="text-red-500 text-xs mt-t">{{$message}}</p>
                                @enderror
                            </div> --}}
                        </div>
                        
                        </div>
                        
                        <div class="flex">
                            

                            
                        </div>
                        <x-flash-message />
                    </form>
                    
                </div>
<script>
    const productManagament = document.getElementById('product-managament');
        productManagament.classList.add('bg-gray-50');
        productManagament.classList.replace('text-gray-50', 'text-laravel');
        productManagament.classList.add('-mb-5');

    function previewImage() {
        var fileInput = document.getElementById('file');
        var preview = document.getElementById('preview');
        var fileLabel = document.getElementById('file-label')

        
        
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(fileInput.files[0]);
            fileLabel.textContent = "Change file"
        }
    }
</script>    
@endsection