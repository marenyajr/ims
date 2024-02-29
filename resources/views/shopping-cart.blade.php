@extends('layout')
@section('content')
<x-header />
<div class="bg-gray-100 h-10 mb-2 mt-24 p-2 ">Home > tv > mawish</div>
<x-container class="mt-12">
@foreach ($products as $product)
<div class="px-20">
    <div class="flex items-center">
        <div class="w-32 h-24 ml-20">
            <img id="image"
                class="md:block w-full"
                src='{{$product->image ? asset("storage/" . $product->image): asset("storage/product_images/no_image.jpg")}}'
                                    alt=""/>
        </div>

        <div class="text-xl font-bold text-laravel ml-10">{{$product->unit_price}}</div>
    </div>
</div>    
@endforeach
</x-container>
    
@endsection