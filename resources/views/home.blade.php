<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stalfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Figtree', sans-serif;
        }

        .hover-grow {
            transition: all 0.2s ease-in-out;
        }

        .hover-grow:hover {
            transform: scale(1.1);
            color: black;
        }

        .nav-link.active {
        color: #EC9594 !important;
        font-weight: 700;
          }
    </style>
</head>
<body class="bg-white scroll-smooth">

<!-- ✅ Sticky Navigation -->
<header class="sticky top-0 z-50 w-full bg-white shadow-md">
    <div class="flex items-center justify-between h-20 px-16">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo-1.jpg') }}" class="w-12 h-12 rounded-full object-cover border border-black" alt="Logo">
            <span class="text-3xl font-bold text-[#1e1e1e]">it's stal.</span>
        </div>
        <nav class="flex gap-8 text-xl font-medium">
            <a href="#home" class="nav-link text-black">home</a>
            <a href="#about" class="nav-link text-black">about me</a>
            <a href="#track-record" class="nav-link text-black">track record</a>
            <a href="#sample-work" class="nav-link text-black">portfolios & work</a>
            <a href="#contact" class="nav-link text-black">contact me</a>
        </nav>
    </div>
</header>

<!-- Home Section -->
<section id="home" class="flex px-36 py-20 gap-8">
    <div class="w-1/2 pr-8">
        <h1 class="text-6xl font-semibold text-[#1e1e1e] mb-8">hi there,<br>nice to meet you!</h1>
        <div class="space-y-4">
            @foreach (['content writer', 'entrepreneur', 'seo expert', 'copywriter', 'computer science', 'business analyst'] as $role)
                <p><span class="hover-grow inline-block text-3xl font-semibold text-[#1e1e1e4c] cursor-pointer">{{ $role }}</span></p>
            @endforeach
        </div>
    </div>

    <div class="w-1/2 pl-8">
        <p class="text-3xl font-semibold text-[#1e1e1e4c] mb-4">leave a message for me.</p>
        <div class="bg-[#fda5a4] rounded-[30px] border-2 border-black p-6 w-full min-h-[363px] max-h-[363px] overflow-y-auto scroll-hide">
            <div class="flex justify-end gap-2 mb-4">
                <div class="w-5 h-5 bg-[#c88d8c] rounded-full border-2 border-black"></div>
                <div class="w-5 h-5 bg-[#c88d8c] rounded-full border-2 border-black"></div>
                <div class="w-5 h-5 bg-[#c88d8c] rounded-full border-2 border-black"></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach ($pins as $index => $pin)
                    @php
                        $colors = ['#FFDFB2', '#FFFFFF', '#C5FFF1'];
                        $bg = $colors[$index % count($colors)];
                    @endphp
                    <div class="rounded-[15px] p-4 border-2 border-black min-h-[100px]" style="background-color: {{ $bg }}">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-5 h-5 bg-[#cbb28e] rounded-full border-2 border-black"></div>
                            <div class="flex-1 font-semibold text-black">{{ $pin->name }}</div>
                        </div>
                        <p class="text-black text-sm" contenteditable="false" data-pin-id="{{ $pin->id }}">{{ $pin->message }}</p>
                        <div class="mt-2 hidden pin-actions flex gap-2">
                            <form method="POST" action="{{ route('pin.delete', $pin->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm">Delete</button>
                            </form>
                            <form method="POST" action="{{ route('pin.update', $pin->id) }}" class="inline-block">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="name" value="{{ $pin->name }}">
                                <input type="hidden" name="message" class="updated-message">
                                <button type="submit" class="text-blue-600 text-sm update-pin">Update</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button id="add-pin-btn" class="mt-4 w-[150px] bg-[#1e1e1e] text-white font-semibold py-2.5 rounded-full hover:scale-125 transition-transform duration-200">add a pin.</button>

        <!-- Modal -->
        <div id="pin-modal" class="fixed top-0 left-0 w-full h-full bg-black/50 hidden z-50 flex items-center justify-center">
            <form action="{{ route('pin.store') }}" method="POST" class="bg-white p-6 rounded-lg w-96 space-y-4">
                @csrf
                <h2 class="text-2xl font-bold">Add a Pin</h2>
                <div>
                    <label class="block mb-1">Name</label>
                    <input type="text" name="name" required class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block mb-1">Message</label>
                    <textarea name="message" required class="w-full border rounded px-3 py-2 h-24"></textarea>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" id="cancel-pin" class="px-4 py-2 border rounded">Cancel</button>
                    <button type="button" id="admin-pin" class="px-4 py-2 border rounded bg-yellow-200">Admin</button>
                    <button type="submit" class="px-4 py-2 bg-[#1e1e1e] text-white rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Hide Scrollbar CSS -->
<style>
    .scroll-hide::-webkit-scrollbar {
        width: 0px;
        height: 0px;
    }
    .scroll-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<!-- Scripts -->
<script>
    const modal = document.getElementById('pin-modal');
    const adminBtn = document.getElementById('admin-pin');

    document.getElementById('add-pin-btn').addEventListener('click', () => modal.classList.remove('hidden'));
    document.getElementById('cancel-pin').addEventListener('click', () => modal.classList.add('hidden'));

    adminBtn.addEventListener('click', () => {
        const pass = prompt("Enter admin password:");
        if (pass === "Gwapokosimo1!") {
            document.querySelectorAll('.pin-actions').forEach(el => el.classList.remove('hidden'));
            document.querySelectorAll('[contenteditable]').forEach(el => el.setAttribute('contenteditable', 'true'));
            alert("Admin mode activated.");
        } else {
            alert("Incorrect password.");
        }
    });

    document.querySelectorAll('.update-pin').forEach(button => {
        const form = button.closest('form');
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const wrapper = form.closest('div');
            const paragraph = wrapper.querySelector('[contenteditable]');
            const messageInput = form.querySelector('.updated-message');
            const updatedMessage = paragraph.textContent.trim();
            if (!updatedMessage) {
                alert("Message cannot be empty.");
                return;
            }
            messageInput.value = updatedMessage;
            form.submit();
        });
    });

    // Scroll spy for navbar active state
    window.addEventListener('scroll', () => {
        const links = document.querySelectorAll('.nav-link');
        const scrollPos = window.scrollY + 100;

        links.forEach(link => {
            const section = document.querySelector(link.getAttribute('href'));
            if (section.offsetTop <= scrollPos && section.offsetTop + section.offsetHeight > scrollPos) {
                links.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
            }
        });
    });
</script>

<section class="w-full bg-white py-5 relative overflow-hidden" id="tech-logos">
  <!-- Masked fade overlays -->
  <div class="absolute top-0 bottom-0 left-0 w-2/5 z-10" style="background: linear-gradient(to right, white 0%, transparent 100%);"></div>
  <div class="absolute top-0 bottom-0 right-0 w-2/5 z-10" style="background: linear-gradient(to left, white 0%, transparent 100%);"></div>

  <!-- Scrolling Container -->
  <div class="relative w-full overflow-hidden">
    <div class="scroll-track flex gap-16 min-w-max animate-scroll px-20">
      <!-- Logos: Duplicated for seamless loop -->
      <img src="/images/logos/php.svg" class="h-24 w-auto" alt="PHP">
      <img src="/images/logos/python.svg" class="h-24 w-auto" alt="Python">
      <img src="/images/logos/javascript.svg" class="h-24 w-auto" alt="JavaScript">
      <img src="/images/logos/java.svg" class="h-24 w-auto" alt="Java">
      <img src="/images/logos/cpp.svg" class="h-24 w-auto" alt="C++">
      <img src="/images/logos/flutter.svg" class="h-24 w-auto" alt="Flutter">
      <img src="/images/logos/sql.svg" class="h-24 w-auto" alt="SQL">

      <!-- Repeat -->
      <img src="/images/logos/php.svg" class="h-24 w-auto" alt="PHP">
      <img src="/images/logos/python.svg" class="h-24 w-auto" alt="Python">
      <img src="/images/logos/javascript.svg" class="h-24 w-auto" alt="JavaScript">
      <img src="/images/logos/java.svg" class="h-24 w-auto" alt="Java">
      <img src="/images/logos/cpp.svg" class="h-24 w-auto" alt="C++">
      <img src="/images/logos/flutter.svg" class="h-24 w-auto" alt="Flutter">
      <img src="/images/logos/sql.svg" class="h-24 w-auto" alt="SQL">

            <!-- Repeat -->
      <img src="/images/logos/php.svg" class="h-24 w-auto" alt="PHP">
      <img src="/images/logos/python.svg" class="h-24 w-auto" alt="Python">
      <img src="/images/logos/javascript.svg" class="h-24 w-auto" alt="JavaScript">
      <img src="/images/logos/java.svg" class="h-24 w-auto" alt="Java">
      <img src="/images/logos/cpp.svg" class="h-24 w-auto" alt="C++">
      <img src="/images/logos/flutter.svg" class="h-24 w-auto" alt="Flutter">
      <img src="/images/logos/sql.svg" class="h-24 w-auto" alt="SQL">
    </div>
  </div>
</section>

<style>
  .scroll-track {
    animation: scrollLeft 40s linear infinite;
  }

  @keyframes scrollLeft {
    0% {
      transform: translateX(0%);
    }
    100% {
      transform: translateX(-50%);
    }
  }
</style>


<!-- ✅ About Section -->
<section id="about" class="flex h-[623px] items-start px-36 py-20 w-full gap-2.5 bg-white">
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

<!-- Smooth Gradient Divider -->
<div class="w-full h-16 bg-gradient-to-b from-white to-neutral-50"></div>

<!-- ✅ Track Record Section -->
<section id="track-record" class="bg-neutral-50 pt-20 pb-28">
  <!-- Title -->
  <div class="text-center mb-10">
    <h1 class="text-6xl font-semibold text-[#1e1e1e]">my track record</h1>
    <p class="text-2xl font-semibold text-[#1e1e1e4c] mt-2">here’s what I did before.</p>
  </div>

  <!-- Three Columns -->
  <div class="flex justify-center gap-10 px-28">
    <!-- Left: Experience -->
    <div class="flex flex-col gap-4 w-[540px]">
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <span class="font-semibold text-base text-[#1e1e1e]">2021 - 2022 &nbsp;&nbsp; General Manager</span>
        <p class="text-sm text-[#1e1e1e] mt-1 leading-[20px]">
          Started working with a media company known as QuoteTheAnime. In one year, I went from a freelance writer to the general manager of the entire blog team.
        </p>
      </div>
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <span class="font-semibold text-base text-[#1e1e1e]">2023 - Present &nbsp;&nbsp; Level Two Freelancer</span>
        <p class="text-sm text-[#1e1e1e] mt-1 leading-[20px]">
          After taking a break, I started freelancing again. In another year, I reached level two on Fiverr, acquiring consistent 5 star reviews and placing myself with the best of the best on the platform.
        </p>
      </div>
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <span class="font-semibold text-base text-[#1e1e1e]">2023 - Present &nbsp;&nbsp; Founder</span>
        <p class="text-sm text-[#1e1e1e] mt-1 leading-[20px]">
          As my freelance career started to boom, I started my own content writing agency called StalWrites. We are now a leader in content writing and are consistently growing in the space.
        </p>
      </div>
    </div>

    <!-- Middle: Awards -->
    <div class="flex flex-col gap-4 w-[300px]">
      @foreach ([['2019', 'SOX Summer Writing Camp Lagulad Fellowship Awardee of the 1st SOX Summer Writing Camp'],
                ['2020', 'Sultan Kudarat Writer\'s Association Winner of Kirab: Sultan Kudarat Hiligaynon and Kiniray-a Flash Fiction Writing Contest'],
                ['2021', 'Sulat SOX Winner of "Tell Me You Love Me without Saying I Love You" - A Sulat SOX Poetry Writing Contest'],
                ['2021', 'UP JPIA Business Camp Case Study Winner – University of the Philippines Junior Philippine Institute of Accountants']] as [$year, $desc])
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <img src="{{ asset('images/star-final.svg') }}" class="w-6 h-6 icon-position" alt="Star" />
        <span class="font-semibold text-base text-[#1e1e1e]">{{ $year }}</span>
        <p class="text-[10px] text-[#1e1e1e] mt-1 leading-[14px]">{{ $desc }}</p>
      </div>
      @endforeach
    </div>

    <!-- Right: Education -->
    <div class="flex flex-col gap-4 w-[300px]">
      @foreach ([['2015 - 2019', 'Graduated as a Science, Technology, and Mathematics student in Libertad National High School'],
                ['2019 - 2021', 'Graduated Accountancy and Business Management at University of Mindanao – General Santos City'],
                ['2021 - 2022', 'Enrolled in Bachelor of Science in Accountancy at University of St. La Salle – Bacolod City'],
                ['2022 - Present', 'Shifted to BS Computer Science Major in Game Development – University of St. La Salle, Bacolod City']] as [$year, $desc])
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <img src="{{ asset('images/graduation-cap.svg') }}" class="w-6 h-6 icon-position" alt="Graduation Cap" />
        <span class="font-semibold text-base text-[#1e1e1e]">{{ $year }}</span>
        <p class="text-[10px] text-[#1e1e1e] mt-1 leading-[14px]">{{ $desc }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Add the hover effect styles -->
<style>
  .record-card {
    opacity: 0.6;
    transition: all 0.3s ease-in-out;
  }
  .record-card:hover {
    transform: scale(1.1);
    opacity: 1;
  }
  .icon-position {
    position: absolute;
    top: 10px;
    right: 10px;
  }
</style>

<section class="w-full bg-[#FBFBFB] py-5 relative overflow-hidden" id="tech-logos">
  <!-- Masked fade overlays -->
  <div class="absolute top-0 bottom-0 left-0 w-2/5 z-10" style="background: linear-gradient(to right, #FBFBFB 0%, transparent 100%);"></div>
  <div class="absolute top-0 bottom-0 right-0 w-2/5 z-10" style="background: linear-gradient(to left, #FBFBFB 0%, transparent 100%);"></div>

  <!-- Scrolling Container -->
  <div class="relative w-full overflow-hidden">
    <div class="scroll-track flex gap-16 min-w-max animate-scroll px-20">
      <!-- Locked Achievement Placeholders -->
      <img src="/images/logos/businessanalysis.svg" class="h-24 w-auto" alt="Business Analysis">
      <div class="h-24 w-24 rounded-full bg-gray-300 border-2 border-black flex items-center justify-center text-black font-bold text-xl">?</div>

      <!-- Visible Logo -->
      <img src="/images/logos/businessanalysis.svg" class="h-24 w-auto" alt="Business Analysis">

      <!-- More Locked -->
      <div class="h-24 w-24 rounded-full bg-gray-300 border-2 border-black flex items-center justify-center text-black font-bold text-xl">?</div>
      <div class="h-24 w-24 rounded-full bg-gray-300 border-2 border-black flex items-center justify-center text-black font-bold text-xl">?</div>
      <img src="/images/logos/businessanalysis.svg" class="h-24 w-auto" alt="Business Analysis">
      <div class="h-24 w-24 rounded-full bg-gray-300 border-2 border-black flex items-center justify-center text-black font-bold text-xl">?</div>

      <!-- Repeat -->
      <div class="h-24 w-24 rounded-full bg-gray-300 border-2 border-black flex items-center justify-center text-black font-bold text-xl">?</div>
      <div class="h-24 w-24 rounded-full bg-gray-300 border-2 border-black flex items-center justify-center text-black font-bold text-xl">?</div>
      <img src="/images/logos/businessanalysis.svg" class="h-24 w-auto" alt="Business Analysis">
      <div class="h-24 w-24 rounded-full bg-gray-300 border-2 border-black flex items-center justify-center text-black font-bold text-xl">?</div>
      <div class="h-24 w-24 rounded-full bg-gray-300 border-2 border-black flex items-center justify-center text-black font-bold text-xl">?</div>
      <img src="/images/logos/businessanalysis.svg" class="h-24 w-auto" alt="Business Analysis">
      <div class="h-24 w-24 rounded-full bg-gray-300 border-2 border-black flex items-center justify-center text-black font-bold text-xl">?</div>
    </div>
  </div>
</section>

<style>
  .scroll-track {
    animation: scrollLeft 40s linear infinite;
  }

  @keyframes scrollLeft {
    0% {
      transform: translateX(0%);
    }
    100% {
      transform: translateX(-50%);
    }
  }
</style>


<!-- Reverse Gradient Divider -->
<div class="w-full h-10 bg-gradient-to-b from-neutral-50 to-white"></div>

<!-- Sample Work Section -->
<section id="sample-work" class="flex items-start justify-center gap-10 px-[120px] py-20 w-full bg-white">
  <!-- Left Column: Portfolio Cards -->
  <div class="flex flex-col w-[544px] items-start gap-8">
    <div class="flex flex-col gap-2">
      <h1 class="text-[64px] font-semibold text-[#1e1e1e] leading-[76px]">
        my sample works
      </h1>
      <p class="text-[23px] font-semibold text-[#1e1e1e4c] leading-[30px]">
        some of my published outputs and more portfolios!
      </p>
    </div>

    <!-- Portfolio Cards -->
    <div class="flex flex-wrap gap-y-10 gap-x-[60px]">
      <!-- Card 1 -->
      <div class="portfolio-card flex flex-col w-[225px] h-[119px] p-2.5 bg-[#ff8989] rounded-[15px] border-2 border-black">
        <div class="flex justify-between items-start w-full mb-1">
          <div class="font-semibold text-[#1e1e1e] text-base">YouTube Jobs</div>
          <div class="portfolio-button flex items-center justify-center px-3 py-1 rounded-full bg-white border-2 border-black">
            <a href="https://ytjobs.co/talent/profile/254082" target="_blank" rel="noopener noreferrer"
               class="portfolio-button-text text-black text-[8px] font-semibold leading-[19px]">
              go to portfolio.
            </a>
          </div>
        </div>
        <p class="text-xs text-[#1e1e1e] leading-[19px]">
          50+ Videos<br>
          29 Million+ Views<br>
          500+ Likes
        </p>
      </div>

      <!-- Card 2 -->
      <div class="portfolio-card flex flex-col w-[225px] h-[119px] p-2.5 bg-[#bdffc1] rounded-[15px] border-2 border-black">
        <div class="flex justify-between items-start w-full mb-1">
          <div class="font-semibold text-[#1e1e1e] text-base">Fiverr</div>
          <div class="portfolio-button flex items-center justify-center px-3 py-1 rounded-full bg-white border-2 border-black">
            <a href="https://www.fiverr.com/hirayacreatives?public_mode=true" target="_blank" rel="noopener noreferrer"
               class="portfolio-button-text text-black text-[8px] font-semibold leading-[19px]">
              go to portfolio.
            </a>
          </div>
        </div>
        <p class="text-xs text-[#1e1e1e] leading-[19px]">
          170+ 5 Star Reviews<br>
          400+ Orders<br>
          $15,000+ Profit
        </p>
      </div>

      <!-- Card 3 -->
      <div class="portfolio-card flex flex-col w-[225px] h-[119px] p-2.5 bg-[#ffcab2] rounded-[15px] border-2 border-black">
        <div class="flex justify-between items-start w-full mb-1">
          <div class="font-semibold text-[#1e1e1e] text-base">StalWrites</div>
          <div class="portfolio-button flex items-center justify-center px-3 py-1 rounded-full bg-white border-2 border-black">
            <a href="https://stalwrites.com/" target="_blank" rel="noopener noreferrer"
               class="portfolio-button-text text-black text-[8px] font-semibold leading-[19px]">
              go to portfolio.
            </a>
          </div>
        </div>
        <p class="text-xs text-[#1e1e1e] leading-[19px]">
          $70,000+ Revenue<br>
          $500,000+ Client Value<br>
          98% Client Retention
        </p>
      </div>

      <!-- Card 4 -->
      <div class="portfolio-card flex flex-col w-[225px] h-[119px] p-2.5 bg-white rounded-[15px] border-2 border-black">
        <div class="flex justify-between items-start w-full mb-1">
          <div class="font-semibold text-[#1e1e1e] text-base">TBA</div>
          <div class="portfolio-button flex items-center justify-center px-3 py-1 rounded-full bg-white border-2 border-black">
            <span class="portfolio-button-text text-black text-[8px] font-semibold leading-[19px]">
              go to portfolio.
            </span>
          </div>
        </div>
        <p class="text-xs text-[#1e1e1e] leading-[19px]">TBA</p>
      </div>
    </div>
  </div>

  <!-- Right Column: Logos -->
  <div class="flex flex-col w-[598px] items-center justify-center gap-3 px-[30px] py-2.5">
    <div class="text-sm text-[#1e1e1e80] font-normal pb-4">try clicking a logo!</div>

    <div class="grid grid-cols-3 gap-6 w-full max-w-[800px] mx-auto">
    <a href="https://www.fragster.com/mlbb-the-story-of-bren-esports-how-they-reached-the-top/"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/fragster-logo.svg') }}" alt="Fragster Logo" class="max-h-10">
        </a>

        <a href="https://www.gamer.org/the-best-teamfight-tactics-tft-lunar-festival-2025-comps/"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/gamer-org-logo.svg') }}" alt="Gamer.Org Logo" class="max-h-10">
        </a>

        <a href="https://www.xp-pen.com/blog/emr-technology.html"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/xp-pen-logo.svg') }}" alt="XPPEN Logo" class="max-h-10">
        </a>

        <a href="https://updf.com/chatgpt/grammarly-vs-chatgpt/"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/updf-logo.svg') }}" alt="UPDF Logo" class="max-h-10">
        </a>

        <a href="https://now.gg/apps/plug-in-digital/10407/american-sniper-3d.html"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/now-gg-logo.svg') }}" alt="Now.GG Logo" class="max-h-10">
        </a>

        <a href="https://www.insmind.com/blog/canva-vs-photoshop/"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/ins-mind-logo.svg') }}" alt="InsMind Logo" class="max-h-10">
        </a>

        <a href="https://www.hitpaw.com/video-tips/remove-text-from-video.html"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/hitpaw-logo.svg') }}" alt="HitPaw Logo" class="max-h-10">
        </a>

        <a href="https://brookcarrent.ae/brand/lamborghini/huracan/"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/brooklands-logo.svg') }}" alt="Brooklands Logo" class="max-h-10">
        </a>

        <a href="https://www.cryptotoday.org/musks-x-payments-speculation-dogecoin-rise/"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/cryptotoday-logo.svg') }}" alt="CryptoToday Logo" class="max-h-10">
        </a>

        <a href="https://shiehhealth.com/welcome-to-shiehhealth/"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/shiehhealth-logo.svg') }}" alt="ShiehHealth Logo" class="max-h-10">
        </a>

        <a href="https://www.patiowell.com/blogs/tips-how-tos/is-it-cheaper-to-buy-or-build-a-shed"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/patiowell-logo.svg') }}" alt="Patiowell Logo" class="max-h-10">
        </a>

        <a href="https://nas.ugreen.com/blogs/knowledge/what-is-a-file-server"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/ugreen-logo.svg') }}" alt="UGREEN Logo" class="max-h-10">
        </a>

        <a href="https://allthebestloans.ph/blog/credit-score-vs-credit-report/"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/allthebestloans-logo.svg') }}" alt="AllTheBestLoans Logo" class="max-h-10">
        </a>

        <a href="https://digido.ph/articles/secured-loans"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/digido-logo.svg') }}" alt="Digido Logo" class="max-h-10">
        </a>

        <a href="https://trilochanaactivate.com/author/stalwrites/"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/trilochana-activate-logo.svg') }}" alt="TrilochanaActivate Logo" class="max-h-10">
        </a>

        <a href="https://www.xp-pen.com/blog/genshin-new-character-chiori.html"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/xppen-genshin-logo.svg') }}" alt="XPPen Genshin Impact Logo" class="h-10">
        </a>

        <a href="https://www.xp-pen.com/blog/afk-arena-beginner-guide.html"
          target="_blank"
          class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/xppen-afkarena-logo.svg') }}" alt="XPPen AFKArena Logo" class="h-10">
        </a>
    </div>
  </div>

  <!-- Inline Styles -->
  <style>
    .portfolio-card {
      transition: transform 0.3s ease;
    }
    .portfolio-card:hover {
      transform: scale(1.2);
    }
    .portfolio-card:hover .portfolio-button {
      background-color: #1e1e1e;
    }
    .portfolio-card:hover .portfolio-button-text {
      color: white;
    }
    .logo-item {
      transition: transform 0.3s ease;
    }
    .logo-item:hover {
      transform: scale(1.2);
    }
  </style>
</section>

<!-- Smooth Gradient Divider -->
<div class="w-full h-7 bg-gradient-to-b from-white to-neutral-50"></div>

<!-- Contact Section -->
<section id="contact" class="flex flex-col items-center justify-center w-full py-20 bg-neutral-50 relative">
  <!-- Title -->
  <div class="w-full text-center mb-10">
    <h1 class="text-6xl font-semibold text-stone-900">contact me</h1>
    <p class="text-2xl font-semibold text-stone-900/30 mt-2">
      want to work with me? send a message or email me at business@stalwrites.com
    </p>
  </div>

  <!-- Contact Form -->
  <form id="contact-form"
        class="w-[670px] bg-white rounded-2xl outline outline-2 outline-black px-8 py-10 space-y-6">
    @csrf
    <!-- Laravel needs CSRF token manually for fetch -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
              class="w-[529px] py-2.5 bg-stone-900 rounded-[100px] text-white text-base font-semibold hover:scale-105 transition-transform">
        send.
      </button>
    </div>
  </form>

  <!-- Loading Animation -->
  <div id="contact-loading" class="hidden absolute top-0 left-0 w-full h-full bg-white z-50 flex items-center justify-center">
    <video autoplay muted loop playsinline class="w-32 h-32 object-contain">
      <source src="{{ asset('videos/amongusloading.webm') }}" type="video/webm">
      Your browser does not support the video tag.
    </video>
  </div>

  <!-- Confirmation -->
  <div id="contact-confirmation" class="hidden absolute top-0 left-0 w-full h-full z-50 bg-neutral-50 flex items-center justify-center opacity-100 transition-opacity duration-500">
    <div class="w-[670px] h-96 px-10 py-7 bg-white rounded-2xl outline outline-2 outline-black flex justify-center items-center">
      <h1 class="text-5xl font-semibold text-stone-900 text-center">sent!</h1>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="w-full text-center py-6 bg-white border-t border-black">
  <p class="text-sm text-[#1e1e1e] font-medium">
    © {{ date('Y') }} it's stal. All rights reserved.
  </p>
</footer>

<!-- JS Logic -->
<script>
  document.getElementById('contact-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const loading = document.getElementById('contact-loading');
    const confirmation = document.getElementById('contact-confirmation');

    const formData = new FormData(form);

    loading.classList.remove('hidden');

    try {
      const response = await fetch("{{ route('contact.submit') }}", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": formData.get('_token')
        },
        body: formData
      });

      if (!response.ok) throw new Error("Submission failed");

      // Show confirmation after loading
      setTimeout(() => {
        loading.classList.add('hidden');
        confirmation.classList.remove('hidden');

        setTimeout(() => {
          confirmation.classList.add('opacity-0');
        }, 2000);

        setTimeout(() => {
          form.reset();
          confirmation.classList.add('hidden');
          confirmation.classList.remove('opacity-0');
        }, 3000);
      }, 1500);
    } catch (error) {
      loading.classList.add('hidden');
      alert("An error occurred while submitting your message. Please try again.");
    }
  });
</script>