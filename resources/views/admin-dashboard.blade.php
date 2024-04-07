@extends('admin.layout')
@section('content')
<x-container>
    <x-admin-item-card :users="$users" :orders="$orders" :products="$products" :sales="$sales" :cash_inflow="$cash_inflow"/>    
</x-container>

@endsection