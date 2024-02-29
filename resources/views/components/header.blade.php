<nav class="z-20 fixed flex w-full items-center justify-between px-6 py-4 bg-white border-b-0">
    <div class="text-3xl font-extrabold text-gray-600 tracking-wide ml-0">
        TECK-<span class="text-laravel">TREND</span>
    </div>
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-900 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </button>
        
        
        {{-- <div class="relative mx-4 lg:mx-0">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    </path>
                </svg>
            </span>
             <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search">
         </div> --}} 
    </div>
    
    <div class="items-center w-1/2">
        @include('partials._search')
    </div>
    
    <div class="flex items-center">
        
        @auth
             {{-- @include('partials._apps') --}}
            {{-- <x-notification />             --}}
        @endauth 
       
        @include('partials._profile')
         <x-shopping-cart />
    </div>
</nav>