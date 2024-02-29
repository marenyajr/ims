@extends('layout')

@section('content')
{{-- @include('partials._hero')
@include('partials._search') --}}

@unless (count($products) == 0)
<x-container>
<div class="lg:grid lg:grid-cols-3 gap-4 md:grid md:grid-cols-2 space-y-2 md:space-y-0 mx-0">
    @foreach ($products as $product)
        <x-product-card :product="$product" />
        
    @endforeach
    
</div>
</x-container>

<x-container>
 <x-admin-item-card />
                            
</x-container>                    
@else
<p>There are No products</p>
@endunless
<div class="mt-4 p-4">
    {{$products->links()}}
</div>
@endsection

