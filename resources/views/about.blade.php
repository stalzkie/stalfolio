<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        .social-icon {
            transition: transform 0.3s ease;
            transform: rotate(var(--tw-rotate));
        }
        .social-icon:hover {
            transform: rotate(0deg) scale(1.2);
        }
        .social-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 60px;
            width: 100%;
            max-width: 600px;
        }
    </style>
</head>
<body class="flex flex-col w-full min-h-screen bg-white">
    <!-- Header/Navigation -->
    <header class="w-full h-20 bg-white shadow-[4px_4px_4px_#73737312]">
        <div class="flex items-center justify-between h-full px-16">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logo-1.jpg') }}" alt="Logo" class="w-12 h-12 rounded-full object-cover border border-black">
                <span class="text-3xl font-bold text-[#1e1e1e]">it's stal.</span>
            </div>
            <nav class="flex gap-8">
                <a href="/" class="text-xl font-medium text-black">home</a>
                <a href="/about" class="text-xl font-medium text-black">about me</a>
                <a href="/track-record" class="text-xl font-medium text-black">track record</a>
                <a href="/sample-work" class="text-xl font-medium text-black">sample work</a>
                <a href="/contact" class="text-xl font-medium text-black">contact me</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="flex h-[623px] items-start px-36 py-0 w-full gap-2.5">
        <!-- Left Column -->
        <div class="flex flex-col w-[544px] h-[623px] items-start gap-2.5 px-0 py-2.5">
            <div class="inline-flex flex-col items-center justify-center px-0 py-[30px] gap-2.5">
                <h1 class="w-[544px] font-semibold text-[#1e1e1e] text-[64px] leading-[76px]">
                    who's stal?
                </h1>
                <p class="w-[544px] font-semibold text-[#1e1e1e4c] text-[25px] leading-[30px]">
                    know something about me.
                </p>
            </div>

            <div class="flex h-[427px] items-start gap-2.5 w-full mb-[-10px]">
                <p class="w-[544px] font-normal text-[#1e1e1e] text-base leading-[30px] tracking-[0.48px]">
                    I am an award-winning professional Freelance Writer with over 2
                    years of experience writing for Content Creators and Companies. My
                    work includes SEO, Copywriting, Blog Writing, Content Writing, and
                    Scriptwriting. This has resulted in my writeups garnering millions
                    of views online with my YouTube scripts alone surpassing
                    10,000,000 views in total. <br><br>
                    I also built a content creation agency from scratch which
                    turned into a writing services company called StalWrites. After
                    just one year of operations we have surpassed 1,000,000 Philippine
                    Pesos in revenue.
                </p>
            </div>
        </div>

        <!-- Right Column -->
        <div class="flex flex-col w-[598px] h-[623px] items-center justify-center gap-3 px-[30px] py-2.5">
            <div class="flex flex-col h-[118px] items-end gap-2.5 pt-[15px] pb-[30px] px-0 w-full">
                <h2 class="w-[235.89px] h-12 rotate-[8.39deg] font-semibold text-[#1e1e1e] text-[40px] leading-[48px]">
                    my socials.
                </h2>
            </div>

            <div class="social-grid">
                <!-- LinkedIn -->
                <a href="https://www.linkedin.com/in/stalingrad-dollosa-628b89267/" class="social-icon rotate-[15deg]">
                    <img src="{{ asset('images/linkedin-logo.svg') }}" alt="LinkedIn logo" class="w-[132px] h-[132px]">
                </a>

                <!-- Facebook -->
                <a href="https://www.facebook.com/Sg.Com.Ph/" class="social-icon rotate-[-10deg]">
                    <img src="{{ asset('images/facebook-logo.svg') }}" alt="Facebook logo" class="w-[132px] h-[132px]">
                </a>

                <!-- Instagram -->
                <a href="https://www.instagram.com/stal.proper/" class="social-icon rotate-[7deg]">
                    <img src="{{ asset('images/instagram-logo.svg') }}" alt="Instagram logo" class="w-[112px] h-[112px]">
                </a>

                <!-- Fiverr -->
                <a href="https://www.fiverr.com/hirayacreatives?public_mode=true" class="social-icon rotate-[-18.7deg]">
                    <img src="{{ asset('images/fiverr-logo.svg') }}" alt="Fiverr logo" class="w-[112px] h-[112px]">
                </a>

                <!-- Upwork -->
                <a href="https://www.upwork.com/freelancers/~010c05a8fd69e832e8" class="social-icon rotate-[20deg]">
                    <img src="{{ asset('images/upwork-logo.svg') }}" alt="Upwork logo" class="w-[123px] h-[123px]">
                </a>

                <!-- YouTube -->
                <a href="https://ytjobs.co/talent/profile/254082" class="social-icon rotate-[-12deg]">
                    <img src="{{ asset('images/youtube-final.svg') }}" alt="YouTube logo" class="w-[162px] h-[131px]">
                </a>
            </div>
        </div>
    </div>
</body>
</html>
