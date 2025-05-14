<header class="sticky top-0 z-50 w-full bg-white shadow-md" x-data="{ mobileOpen: false }">
    <div class="flex items-center justify-between h-20 px-4 sm:px-8 md:px-12 lg:px-16">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo-1.jpg') }}" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover border border-black" alt="Logo">
            <span class="text-xl sm:text-2xl md:text-3xl font-bold text-[#1e1e1e]">it's stal.</span>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex gap-6 lg:gap-8 text-base sm:text-lg md:text-xl font-medium items-center relative">
            <a href="#home" class="nav-link text-black">home</a>
            <a href="#about" class="nav-link text-black">about me</a>
            <a href="#track-record" class="nav-link text-black">track record</a>
            <a href="#sample-work" class="nav-link text-black">portfolios & work</a>
            <a href="#contact" class="nav-link text-black">contact me</a>

            @auth
            <!-- User Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = ! open" class="nav-link text-black focus:outline-none">
                    {{ Auth::user()->name }}
                </button>
                <div x-show="open" @click.away="open = false"
                     class="absolute right-0 mt-2 w-40 bg-white border border-black rounded shadow-lg z-50">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-black hover:bg-gray-100">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
            @endauth
        </nav>

        <!-- Mobile Hamburger Button -->
        <button @click="mobileOpen = !mobileOpen" class="md:hidden focus:outline-none">
            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path x-show="!mobileOpen" d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="mobileOpen" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Navigation -->
    <div class="md:hidden px-4 pt-2 pb-4 space-y-2" x-show="mobileOpen" @click.away="mobileOpen = false">
        <a href="#home" class="block text-black text-lg font-medium">home</a>
        <a href="#about" class="block text-black text-lg font-medium">about me</a>
        <a href="#track-record" class="block text-black text-lg font-medium">track record</a>
        <a href="#sample-work" class="block text-black text-lg font-medium">portfolios & work</a>
        <a href="#contact" class="block text-black text-lg font-medium">contact me</a>

        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left text-black text-lg font-medium">Sign Out</button>
        </form>
        @endauth
    </div>
</header>

<!-- Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>
