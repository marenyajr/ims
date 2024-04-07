@extends('admin.layout')

@section('content')


<div class="border border-gray-100 p-10 rounded max-w-6xl mx-auto mt-12">

    <header class="flex justify-between px-6">
        <h2 class="text-lg text-laravel font-bold mb-2 tracking-wide">
             IMS Users
        </h2>  
        
        <a href="/admin/register" class="p-2 bg-laravel text-gray-50 font-semibold rounded-md hover:scale-105 hover:shadow-xl mb-2 ">
          Add User
        </a>
    </header>

    <div class="container mx-auto">
  <table class="min-w-full ">
    <thead >
      <tr>        
        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-orange-300' : 'bg-orange-200' }}">
                
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">#{{$user->id}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{$user->name}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{$user->email}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{$user->email}}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <a href="/admin/users/edit/{{$user->id}}" class="text-gray-50 font-semibold hover:scale-105 hover:shadow-md bg-laravel px-4 py-1 rounded-sm">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>   
    
</div>

<div class="mt-4 p-4">
    {{$users->links()}}
</div>
@endsection

