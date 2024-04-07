<div class="relative flex">
    <a id="dropdown-button" href="#" class="items-center z-10 relative flex text-gray-50 hover:text-laravel hover:bg-gray-50 rounded-3xl p-2">
            <svg class="w-10 h-8 text-current" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="1.6" d="M7 17v1c0 .6.4 1 1 1h8c.6 0 1-.4 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            </svg>
            
            <div class="font-semibold text-current -ml-2">Account</div>
        
    </a>
    
    <div id="dropdown-menu" class="absolute right-0 z-10 hidden mt-10 origin-top-right rounded-md shadow-lg w-48">
    <div class="rounded-md bg-white shadow-xs">
      <div class="py-1">
      @auth
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">profile</a>
        @if (Auth()->user()->hasRole('admin'))
            <a href="/admin" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Admin Panel</a>
        @endif
        <form class="inline" method="post" action="/logout">
                        @csrf
                        <button type="submit" class="w-full block pl-4 text-left py-2 text-sm text-gray-700 hover:bg-gray-100">
                           Logout
                        </button>
            </form>
        @else
        <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">login</a>
        <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">register</a>
      @endauth
        
      </div>
    </div>
  </div>
    
    
                        
</div>



<script>
  const button = document.getElementById('dropdown-button');
  const menu = document.getElementById('dropdown-menu');

  button.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>
