<nav class="bg-gray-100">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">

            <!-- Left Side - Logo -->
            <div class="flex items-center space-x-4">
                <a href="#" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                    <span class="font-bold">ABC Bank</span>
                </a>
            </div>

            <!-- Primary Navigation -->
            <div class="hidden md:flex items-center space-x-6"> <!-- Increased space-x-6 for better spacing -->
                <a href="{{ route('admin.dashboard') }}"
                    class="text-gray-700 hover:bg-gray-200 px-4 py-2 rounded {{ request()->is('dashboard') ? 'bg-blue-400 text-white font-bold' : '' }}">
                    Home
                </a>

                <a href="{{ route('admin.deposit.form') }}"
                    class="text-gray-700 hover:bg-gray-200 px-4 py-2 rounded {{ request()->is('deposit') ? 'bg-blue-400 text-white font-bold' : '' }}">
                    Deposit
                </a>

                <a href="{{ route('admin.withdrawal.form') }}"
                    class="text-gray-700 hover:bg-gray-200 px-4 py-2 rounded {{ request()->is('withdrawal') ? 'bg-blue-400 text-white font-bold' : '' }}">
                    Withdraw
                </a>

                <a href="{{ route('admin.transfer.form') }}"
                    class="text-gray-700 hover:bg-gray-200 px-4 py-2 rounded {{ request()->is('transfer') ? 'bg-blue-400 text-white font-bold' : '' }}">
                    Transfer
                </a>
                <a href="{{ route('admin.statement') }}"
                    class="text-gray-700 hover:bg-gray-200 px-4 py-2 rounded {{ request()->is('statement') ? 'bg-blue-400 text-white font-bold' : '' }}">
                    Statements
                </a>
            </div>

            <!-- Secondary Navigation (Logout Button) -->
            <div class="hidden md:flex items-center gap-3">
                <span class="font-bold">{{ auth()->user()->name ?? 'User' }}</span>

                <form action="{{ route('admin.logout') }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit"
                        class="py-2 px-4 bg-blue-400 hover:bg-red-500 text-white hover:text-black rounded transition duration-300">
                        Logout
                    </button>
                </form>
            </div>

            <!-- Mobile Menu Button -->
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

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden md:hidden bg-gray-100 py-4">
        <a href="{{ route('admin.dashboard') }}"
            class="text-gray-700 hover:bg-gray-200 px-4 py-2 rounded {{ request()->is('dashboard') ? 'bg-blue-400 text-white font-bold' : '' }}">
            Home
        </a>

        <a href="{{ route('admin.deposit.form') }}"
            class="text-gray-700 hover:bg-gray-200 px-4 py-2 rounded {{ request()->is('deposit') ? 'bg-blue-400 text-white font-bold' : '' }}">
            Deposit
        </a>

        <a href="{{ route('admin.withdrawal.form') }}"
            class="text-gray-700 hover:bg-gray-200 px-4 py-2 rounded {{ request()->is('withdrawal') ? 'bg-blue-400 text-white font-bold' : '' }}">
            Withdraw
        </a>

        <a href="{{ route('admin.transfer.form') }}"
            class="text-gray-700 hover:bg-gray-200 px-4 py-2 rounded {{ request()->is('transfer') ? 'bg-blue-400 text-white font-bold' : '' }}">
            Transfer
        </a>
        <a href="{{ route('admin.statement') }}"
            class="text-gray-700 hover:bg-gray-200 px-4 py-2 rounded {{ request()->is('statement') ? 'bg-blue-400 text-white font-bold' : '' }}">
            Statements
        </a>
    </div>
</nav>
