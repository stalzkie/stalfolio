<header class="sticky top-0 z-50 w-full bg-white shadow-md">
    <div class="flex items-center justify-between h-20 px-16">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo-1.jpg') }}" class="w-12 h-12 rounded-full object-cover border border-black" alt="Logo">
            <span class="text-3xl font-bold text-[#1e1e1e]">it's stal.</span>
        </div>
        <nav class="flex gap-8 text-xl font-medium items-center relative">
            <a href="#home" class="nav-link text-black">home</a>
            <a href="#about" class="nav-link text-black">about me</a>
            <a href="#track-record" class="nav-link text-black">track record</a>
            <a href="#sample-work" class="nav-link text-black">portfolios & work</a>
            <a href="#contact" class="nav-link text-black">contact me</a>

            @auth
                <!-- Dropdown -->
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
    </div>
</header>

<!-- Add Alpine.js (for x-data) -->
<script src="//unpkg.com/alpinejs" defer></script>
