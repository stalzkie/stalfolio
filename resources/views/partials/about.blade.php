<!-- About Section -->
<section id="about" class="flex h-[623px] items-start px-36 py-20 w-full gap-16 bg-white">
    <!-- Left Column -->
    <div class="flex flex-col w-[544px] h-[623px] items-start gap-2.5 px-0 py-2.5">
        <div class="inline-flex flex-col items-center justify-center px-0 py-[30px] gap-2.5">
            <h1 class="w-[544px] font-semibold text-[#1e1e1e] text-[64px] leading-[76px]">
                who's stal?
            </h1>
            <p class="w-[544px] font-semibold text-[#1e1e1e4c] text-[25px] leading-[30px]">
                a little snippet about me.
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

    <!-- Right Column: Socials Grid -->
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

    <style>
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
</section>