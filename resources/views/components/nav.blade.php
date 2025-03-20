<nav class="bg-gray-100">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">

            <div class="flex space-x-4">
                <div>
                    <a href="#" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                        <span class="font-bold">Better Dev</span>
                    </a>
                </div>

                <!-- primary nav -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('admin.dashboard') }}" {{ Request::is('/') ? 'bg-gray-300 font-bold' : '' }}">
                        Home
                    </a>

                    <a href="{{ route('admin.deposit.form') }}" {{ Request::is('/deposit') ? 'bg-gray-300 font-bold' : '' }}">
                        Diposit
                    </a>

                    <a href="{{ route('admin.withdrawal.form') }}" {{ Request::is('/withdrawal')  ? 'bg-gray-300 font-bold' : '' }}">
                        Withdraw
                    </a>
                </div>
            </div>

            <!-- secondary nav -->
            <div class="hidden md:flex items-center space-x-1">
                <a href=""
                    class="py-2 px-3 bg-blue-400 hover:bg-red-500 text-white hover:text-black rounded transition duration-300">Logout</a>
            </div>

            <!-- mobile button goes here -->
            <div class="md:hidden flex items-center">
                <button class="mobile-menu-button">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- mobile menu -->
    <div class="mobile-menu hidden md:hidden">
        <a href="{{ route('admin.dashboard') }}" {{ Request::is('/') ? 'bg-gray-300 font-bold' : '' }}">
            Home
        </a>

        <a href="#" {{ Request::is('features') ? 'bg-gray-300 font-bold' : '' }}">
            Features
        </a>

        <a href="#" {{ Request::is('pricing') ? 'bg-gray-300 font-bold' : '' }}">
            Pricing
        </a>
    </div>

</nav>
