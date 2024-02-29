@extends('layout')
@section('content')

<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-4xl mx-auto mt-8">

                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Inventory
                        </h2>
                        <p class="mb-4">Add product to inventory</p>
                    </header>
                    
                    <form method="POST" action="/products" enctype="multipart/form-data">
                        @csrf
                        <div class="flex">
                            <div class="mb-6 mx-6 w-full">
                            <label
                                for="product_name"
                                class="inline-block text-lg mb-2"
                                >Product Name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="product_name"
                                value="{{old('product_name')}}"
                            />
                            @error('product_name')
                                <p class="text-red-500 text-xs mt-t">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6 mx-6 w-full">
                            <label for="product_category" class="inline-block text-lg mb-2"
                                >Product Category</label
                            >
                           
                            <select name="product_category"  class="border border-gray-200 rounded p-2 w-full">
                            <option value="">Select One</option>
                            <option value="TV">TV</option>
                            <option value="Sub woofer">Sub Woofer</option>
                            <option value="Phone">Phone</option>
                            </select>

                             @error('product_category')
                                <p class="text-red-300 text-xs mt-t">{{$message}}</p>
                            @enderror
                        </div>
                        </div>
                        

                        <div class="flex">
                        <div class="mb-6 mx-6 w-full">
                            <label
                                for="price"
                                class="inline-block text-lg mb-2"
                            >
                                Product Price
                            </label>
                            <input
                                type="number"
                                step="any"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="unit_price"
                                value="{{old('price')}}"
                            />
                             @error('unit_price')
                                <p class="text-red-500 text-xs mt-t">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6 mx-6 w-full">
                            <label for="quantity_in_stock" class="inline-block text-lg mb-2">
                                Quantity Added to stock
                            </label>
                            <input
                                type="number"
                                step="1"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="quantity_in_stock"
                                placeholder="Example: 1"
                                value="{{old('quantity_in_stock')}}"
                            />
                             @error('quantity_in_stock')
                                <p class="text-red-500 text-xs mt-t">{{$message}}</p>
                            @enderror
                        </div>
                        </div>
                        <div class="mb-6 mx-6">
                            <label for="image" class="inline-block text-lg mb-2">
                                Product Picture
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="image"
                            />

                            @error('image')
                                <p class="text-red-500 text-xs mt-t">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6 mx-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                Product Description
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="Get high quality sound system"
                                
                            >{{old('description')}}
                        </textarea>
                             @error('description')
                                <p class="text-red-500 text-xs mt-t">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6 ml-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Add Product
                            </button>

                            <a href="/" class="text-laravel ml-4"> Back </a>
                        </div>
                        <x-flash-message />
                    </form>
                    
                </div>
    
@endsection