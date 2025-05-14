<!-- About Section -->
<section id="about" class="flex flex-col lg:flex-row items-start w-full gap-12 px-4 sm:px-8 lg:px-36 py-14 bg-white">
    <!-- Left Column -->
    <div class="w-full lg:w-1/2 flex flex-col gap-6">
        <div class="text-center lg:text-left">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-semibold text-[#1e1e1e] leading-tight mb-4">
                who's stal?
            </h1>
            <p class="text-xl sm:text-2xl font-semibold text-[#1e1e1e4c]">
                a little snippet about me.
            </p>
        </div>
        <div>
            <p class="text-base sm:text-lg text-[#1e1e1e] leading-7 tracking-wide">
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

    <!-- Right Column: Socials Grid -->
    <div class="w-full lg:w-1/2 flex flex-col items-center lg:items-start gap-6 px-2">
        <h2 class="text-3xl sm:text-4xl font-semibold text-[#1e1e1e] transform rotate-[6deg]">
            my socials.
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-2xl mt-2">
            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/in/stalingrad-dollosa-628b89267/" class="social-icon rotate-[10deg]">
                <img src="{{ asset('images/linkedin-logo.svg') }}" alt="LinkedIn logo" class="w-24 sm:w-28 lg:w-32 h-auto">
            </a>

            <!-- Facebook -->
            <a href="https://www.facebook.com/Sg.Com.Ph/" class="social-icon rotate-[-10deg]">
                <img src="{{ asset('images/facebook-logo.svg') }}" alt="Facebook logo" class="w-24 sm:w-28 lg:w-32 h-auto">
            </a>

            <!-- Instagram -->
            <a href="https://www.instagram.com/stal.proper/" class="social-icon rotate-[7deg]">
                <img src="{{ asset('images/instagram-logo.svg') }}" alt="Instagram logo" class="w-24 sm:w-28 h-auto">
            </a>

            <!-- Fiverr -->
            <a href="https://www.fiverr.com/hirayacreatives?public_mode=true" class="social-icon rotate-[-15deg]">
                <img src="{{ asset('images/fiverr-logo.svg') }}" alt="Fiverr logo" class="w-24 sm:w-28 h-auto">
            </a>

            <!-- Upwork -->
            <a href="https://www.upwork.com/freelancers/~010c05a8fd69e832e8" class="social-icon rotate-[20deg]">
                <img src="{{ asset('images/upwork-logo.svg') }}" alt="Upwork logo" class="w-24 sm:w-28 h-auto">
            </a>

            <!-- YouTube -->
            <a href="https://ytjobs.co/talent/profile/254082" class="social-icon rotate-[-12deg] col-span-1 sm:col-span-2 lg:col-span-1">
                <img src="{{ asset('images/youtube-final.svg') }}" alt="YouTube logo" class="w-32 sm:w-40 h-auto">
            </a>
        </div>
    </div>

    <style>
        .social-icon {
            transition: transform 0.3s ease;
            display: flex;
            justify-content: center;
        }
        .social-icon:hover {
            transform: rotate(0deg) scale(1.1);
        }
    </style>
</section>
