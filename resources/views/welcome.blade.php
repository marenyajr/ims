@extends('layout')

@section('content')

<x-header />

@unless (count($products) == 0)

<x-container class="p-1">
    @include('partials._hero')
  
</x-container>

<x-container>    
    <div id="card-container" class="lg:grid lg:grid-cols-6 gap-2 md:grid md:grid-cols-4 sm:grid sm:grid-cols-2 space-y-2 md:space-y-0 mx-0 ">
        @foreach ($products as $product)
       
            <x-product-card :product="$product" />
        
            
            
        @endforeach
        <div class="mt-4 p-4">
    {{$products->links()}}
</div>
    </div>
</x-container>



<x-container>
    <x-admin-item-card />    
</x-container>
                    
@else
<p>There are No products</p>
@endunless

@endsection


