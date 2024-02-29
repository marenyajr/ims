 <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="#" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                
                @auth
                    
               
                <li>
                    <span class="font-bold uppercase">
                        Welcome David
                    </span>
                </li>
                <li>
                    <a href="#" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage products</a
                    >
                </li>

                <li>
                    <form class="inline" method="post" action="/logout">
                        @csrf
                        <button type="submit" class="hover:text-laravel">
                            <i class="fa-solid fa-door-closed"></i>logout
                        </button>
                    </form>
                </li>
                @endauth
                @guest
                    <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endguest
                
                
                
                
            </ul>
        </nav>