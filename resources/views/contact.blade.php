<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
    </style>
</head>
<body class="flex flex-col w-full min-h-screen bg-neutral-50">
    <!-- Header/Navigation -->
    <header class="w-full h-20 bg-white shadow-[4px_4px_4px_#73737312]">
        <div class="flex items-center justify-between h-full px-16">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logo-1.jpg') }}" alt="Logo" class="w-12 h-12 rounded-full object-cover border border-black">
                <span class="text-3xl font-bold text-[#1e1e1e]">it's stal.</span>
            </div>
            <nav class="flex gap-8">
                <a href="{{ route('home') }}" class="text-xl font-medium text-black">home</a>
                <a href="{{ route('about') }}" class="text-xl font-medium text-black">about me</a>
                <a href="{{ route('track-record') }}" class="text-xl font-medium text-black">track record</a>
                <a href="{{ route('sample-work') }}" class="text-xl font-medium text-black">sample work</a>
                <a href="{{ route('contact') }}" class="text-xl font-medium text-black">contact me</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex flex-col justify-center items-center w-full py-10">
        <!-- Title -->
        <div class="w-full text-center mb-10">
            <h1 class="text-6xl font-semibold text-stone-900">contact me</h1>
            <p class="text-2xl font-semibold text-stone-900/30 mt-2">want to work with me or just have a chat? feel free to reach out</p>
        </div>

        <!-- Contact Form -->
        <form action="{{ route('contact.submit') }}" method="POST"
              class="w-[670px] bg-white rounded-2xl outline outline-2 outline-black px-8 py-10 space-y-6">
            @csrf

            <!-- Email -->
            <div class="space-y-1">
                <label class="block font-semibold text-base text-stone-900 tracking-wide">Email</label>
                <input type="email" name="email" required
                       class="w-full h-10 px-3 py-2 bg-neutral-200 rounded-2xl outline outline-2 outline-black text-[12px] tracking-tight text-black"
                       placeholder="Please enter your email..." />
            </div>

            <!-- Full Name -->
            <div class="space-y-1">
                <label class="block font-semibold text-base text-stone-900 tracking-wide">Full Name</label>
                <input type="text" name="name" required
                       class="w-full h-10 px-3 py-2 bg-neutral-200 rounded-2xl outline outline-2 outline-black text-[12px] tracking-tight text-black"
                       placeholder="What’s your name?" />
            </div>

            <!-- Message -->
            <div class="space-y-1">
                <label class="block font-semibold text-base text-stone-900 tracking-wide">Your Message</label>
                <textarea name="message" required
                          class="w-full h-28 px-3 py-2 bg-neutral-200 rounded-2xl outline outline-2 outline-black text-[12px] tracking-tight text-black resize-none"
                          placeholder="What do you want to say?"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit"
                        class="w-[529px] py-2.5 bg-stone-900 rounded-[100px] text-white text-base font-semibold">
                    send.
                </button>
            </div>
        </form>
    </main>
</body>
</html>
