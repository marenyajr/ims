@props(['categories'])
<div class="border rounded w-1/5 mt-2 mx-2">

          

            <div class="container mx-auto">
        <table class="min-w-full">
            <thead class="bg-orange-400">
            <tr class="bg-orange-400">
                <th class="px-6 py-4 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Filter By Category</th>
            </tr>
            </thead>
            <tbody>

                <tr class="bg-orange-200">
                        <td class="whitespace-no-wrap border-b border-gray-200">
                        
                        <a href="/">
                            <div class="w-full h-full hover:bg-laravel p-4">
                                All
                            </div>
                            
                        </a>

                        </td>
                        
                    </tr>


                @foreach ($categories as $category)
                    <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-orange-200' : 'bg-orange-300' }}">
                        <td class="whitespace-no-wrap border-b border-gray-200">
                        
                        <a href="?search={{$category}}">
                            <div class="w-full h-full hover:bg-laravel p-4">
                                {{$category}}
                            </div>
                            
                        </a>

                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>   
            
</div>