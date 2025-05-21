<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stalfolio - Preview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Figtree', sans-serif; }
        .blur-lock { filter: blur(5px); pointer-events: none; }
        .floating-login {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background-color: #1e1e1e;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 100;
            transition: transform 0.3s ease;
        }
        .floating-login:hover { transform: scale(1.05); }
    </style>
</head>

<body class="bg-white">

    @php
        $pins = \App\Models\Pin::all();
    @endphp
    
    <!-- Include Navigation Partial -->
    @include('partials.navigation')

    <!-- Home Section (fully visible) -->
    <section id="home">
        @include('partials.home-pinboard')
    </section>
    <div class="w-full h-8 bg-white"></div>

    <!-- About Section (fully visible) -->
    <section id="about">
        @include('partials.about')
        <div class="w-full h-6 bg-gradient-to-b from-white to-neutral-50"></div>
    </section>

    <!-- Blurred Sections -->
        <section id="track-record">@include('partials.track-record')
            <div class="w-full h-6 bg-gradient-to-b from-neutral-50 to-white"></div>
        </section>
        <section id="sample-work">@include('partials.sample-work')
            <div class="w-full h-2 bg-gradient-to-b from-white to-neutral-50"></div>
        </section>
        <section id="project-showcase">@include('partials.projects-scroll')</section>

    <div class="blur-lock">
        <section id="contact">@include('partials.contact')</section>
    </div>
    
    <!-- Footer -->
    @include('partials.footer')

    <!-- Floating Login Button -->
    <a href="{{ route('google.login') }}" class="floating-login">sign in with google for full access.</a>

    <!-- JS Logic for Navbar Scrollspy -->
    @include('partials.scripts')

</body>
</html>
