<!-- About Section -->
<section id="about" class="w-full bg-white px-6 sm:px-12 lg:px-28 py-16">
    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row justify-between items-start gap-8">
        
        <!-- Left Column -->
        <div class="w-full lg:w-1/2 flex flex-col items-center lg:items-start text-center lg:text-left gap-6 max-w-2xl">
            <div>
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-semibold text-[#1e1e1e] leading-tight mb-2">
                    who's stal?
                </h1>
                <p class="text-base sm:text-xl md:text-2xl font-semibold text-[#1e1e1e4c] mt-2">
                    a little snippet about me.
                </p>
            </div>
            <div>
                <p class="text-base sm:text-lg text-[#1e1e1e] leading-7 tracking-wide text-justify">
                    I am an award-winning professional Freelance Writer with over 3
                    years of experience writing for Content Creators and Companies. My
                    work includes SEO, Copywriting, Blog Writing, Content Writing, and
                    Scriptwriting. This has resulted in my writeups garnering millions
                    of views online with my YouTube scripts alone surpassing
                    29,000,000 views in total. <br><br>
                    As a computer science student, I have knowledge coding in PHP,
                    Javascript, SQL, Python, C#, and more. Currently, I am looking at
                    upskilling, taking courses in Data Analytics, Business Analaysis,
                    and Business Intelligence.
                </p>
            </div>
        </div>

        <!-- Right Column -->
        <div class="w-full lg:w-1/2 flex flex-col items-end justify-start gap-16 max-w-2xl">
            <h2 class="text-3xl sm:text-4xl font-semibold text-[#1e1e1e] rotate-[5deg] text-right">
                my socials.
            </h2>

            <!-- Responsive Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-x-10 gap-y-10 sm:gap-x-10 sm:gap-y-16 justify-items-center w-full">
                <a href="https://www.linkedin.com/in/stalingrad-dollosa-628b89267/" target="_blank" rel="noopener noreferrer" class="social-icon rotate-[15deg]">
                    <img src="{{ asset('images/linkedin-logo.svg') }}" alt="LinkedIn logo" class="w-28 sm:w-32 h-auto max-h-[128px]">
                </a>
                <a href="https://www.facebook.com/Sg.Com.Ph/" target="_blank" rel="noopener noreferrer" class="social-icon rotate-[-10deg]">
                    <img src="{{ asset('images/facebook-logo.svg') }}" alt="Facebook logo" class="w-28 sm:w-32 h-auto max-h-[128px]">
                </a>
                <a href="https://www.instagram.com/stal.proper/" target="_blank" rel="noopener noreferrer" class="social-icon rotate-[7deg]">
                    <img src="{{ asset('images/instagram-logo.svg') }}" alt="Instagram logo" class="w-28 sm:w-32 h-auto max-h-[128px]">
                </a>
                <a href="https://www.fiverr.com/hirayacreatives?public_mode=true" target="_blank" rel="noopener noreferrer" class="social-icon rotate-[-18.7deg]">
                    <img src="{{ asset('images/fiverr-logo.svg') }}" alt="Fiverr logo" class="w-28 sm:w-32 h-auto max-h-[128px]">
                </a>
                <a href="https://www.upwork.com/freelancers/~010c05a8fd69e832e8" target="_blank" rel="noopener noreferrer" class="social-icon rotate-[20deg]">
                    <img src="{{ asset('images/upwork-logo.svg') }}" alt="Upwork logo" class="w-28 sm:w-32 h-auto max-h-[128px]">
                </a>
                <a href="https://ytjobs.co/talent/profile/254082" target="_blank" rel="noopener noreferrer" class="social-icon rotate-[-12deg]">
                    <img src="{{ asset('images/youtube-final.svg') }}" alt="YouTube logo" class="w-28 sm:w-32 h-auto max-h-[128px]">
                </a>
            </div>
        </div>
    </div>

    <style>
        .social-icon {
            transition: transform 0.3s ease;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .social-icon:hover {
            transform: rotate(0deg) scale(1.1);
        }
    </style>
</section>
