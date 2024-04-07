@extends('admin.layout')
@section('content')

@php
    $email = "test@test"
@endphp

<div class="p-4 mt-20"
                >
                    <header class="text-center mb-8">
                      
                        <p class="font-bold tracking-wider mt-3 text-xl leading-3">Add New User</p>
                        
                        
                        </header>

                    <form action="/admin/users" method="POST" class="">
                        @csrf

                        <div class="flex mb-12 px-8">
                        <div class="w-3/4 mx-4">
                            
                            <input
                                type="email"
                                class="border border-gray-500 rounded w-full p-3 bg-transparent "
                                name="email"
                                value="{{old('email')}}"
                                placeholder="Email Address"
                            />
                            <!-- Error Example -->
                            @error('email')
                                <div class="text-red-500 text-xs mt-0">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="w-3/4 mx-4">
                            
                            <input
                                type="text"
                                class="border border-gray-500 rounded w-full p-3 bg-transparent"
                                name="name"
                                value="{{old('name')}}"
                                placeholder="Full Name"
                            />
                            
                            @error('name')
                                <div class="text-red-500 text-xs tracking-wide mt-0">{{$message}}</div>
                            @enderror
                        </div>
                        </div>

                        

                        
                        <div class="flex px-8 mb-8">


                            <div class="w-3/4 mx-4">
                            
                           
                            <select name="role"  class="border border-gray-500 bg-transparent rounded p-3 w-full">
                            <option value="" class="text-gray-600">Select Role</option>
                             <option value="sales_person">Sales person</option>
                            <option value="supplier">Supplier</option>
                            <option value="admin">Administrator</option>
                            
                            </select>

                             @error('role')
                                <p class="text-red-300 text-xs mt-t">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="w-3/4 mx-4">
                            
                            <input
                                type="password"
                                class="border border-gray-500 rounded p-3 bg-transparent w-full"
                                name="password"
                                placeholder="Password"
                            />
                            @error('password')
                                <div class="text-red-500 text-xs mt-0">{{$message}}</div>
                            @enderror
                        </div>

                        
                        </div>
                        
                        <div class="mb-6 w-3/4 mx-auto">
                            <button
                                type="submit"
                                class="w-full text-lg tracking-wide mx-auto bg-laravel text-white rounded py-3 px-4 hover:shadow-2xl transition-transform transform hover:scale-105 font-semibold"
                            >
                                Add User
                            </button>
                        </div>

                        
                    </form>
                </div>
    
@endsection