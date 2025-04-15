<!-- Navbar -->
<nav class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 shadow-lg fixed w-full z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" 
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" 
                          d="M3 3h18v4H3V3zm0 6h18v12H3V9zm5 4h4m-2 0v4"></path>
                </svg>
                <span class="text-3xl font-extrabold text-white drop-shadow-lg">InventoPro</span>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-white font-medium hover:text-yellow-300 transition ease-in-out duration-300">
                    Home
                </a>
                <a href="{{ route('dashboard') }}" class="text-white font-medium hover:text-yellow-300 transition ease-in-out duration-300">
                    Dashboard
                </a>

                <!-- User Info -->
                <div class="flex items-center space-x-3 bg-white px-3 py-1 rounded-full shadow-md">
                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" 
                              d="M10 2a4 4 0 00-4 4v1a4 4 0 108 0V6a4 4 0 00-4-4zM3 14a7 7 0 0114 0v1H3v-1z" 
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-gray-800 text-sm font-semibold">{{ Auth::user()->name }}</span>
                </div>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-transform transform hover:scale-105 shadow-md">
                        Keluar
                    </button>
                </form>
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex sm:hidden items-center space-x-3">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" 
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden sm:hidden bg-white shadow-md">
        <a href="{{ route('home') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Home</a>
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Dashboard</a>
        <div class="px-4 py-2 border-t border-gray-200">
            <span class="block text-gray-800 font-medium">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                        class="w-full mt-2 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition ease-in-out">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Script for Mobile Menu Toggle -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
