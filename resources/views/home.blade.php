<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stalfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Figtree', sans-serif; }
        .hover-grow { transition: all 0.2s ease-in-out; }
        .hover-grow:hover { transform: scale(1.1); color: black; }
        .nav-link.active { color: #EC9594 !important; font-weight: 700; }
        .scroll-hide::-webkit-scrollbar { width: 0px; height: 0px; }
        .scroll-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-white scroll-smooth">

    <!-- Navigation -->
    @include('partials.navigation')

    <!-- Home Section -->
    <section id="home">
        @include('partials.home-pinboard')
    </section>
    <div class="w-full h-8 bg-white"></div>
    
    <!-- About Section -->
    <section id="about">
        @include('partials.about')
    <!-- Smooth Gradient Divider -->
    <div class="w-full h-6 bg-gradient-to-b from-white to-neutral-50"></div>
    </section>

    <!-- Track Record Section -->
    <section id="track-record">
        @include('partials.track-record')
        <!-- Reverse Gradient Divider -->
    <div class="w-full h-6 bg-gradient-to-b from-neutral-50 to-white"></div>
    </section>

    <!-- Sample Work Section -->
    <section id="sample-work">
        @include('partials.sample-work')
      <!-- Smooth Gradient Divider -->
    <div class="w-full h-2 bg-gradient-to-b from-white to-neutral-50"></div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        @include('partials.contact')
    </section>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Pinboard Scripts -->
    @include('partials.pinboard-scripts')

    <!-- Scripts -->
    @include('partials.scripts')

</body>
</html>
