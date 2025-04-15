<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Track Record</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Figtree', sans-serif;
    }

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
</head>
<body class="bg-neutral-50 min-h-screen">
  <!-- Header -->
  <header class="w-full h-20 bg-white shadow-[4px_4px_4px_#73737312]">
    <div class="flex items-center justify-between h-full px-16">
      <div class="flex items-center gap-2">
        <img src="{{ asset('images/logo-1.jpg') }}" alt="Logo" class="w-12 h-12 rounded-full object-cover border border-black" />
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

  <!-- Title -->
  <section class="text-center py-10">
    <h1 class="text-6xl font-semibold text-[#1e1e1e]">my track record</h1>
    <p class="text-2xl font-semibold text-[#1e1e1e4c] mt-2">here’s what I did before :)</p>
  </section>

  <!-- Three Columns -->
  <div class="flex justify-center gap-10 px-28 pb-20">
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
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <img src="{{ asset('images/star-final.svg') }}" class="w-6 h-6 icon-position" alt="Star" />
        <span class="font-semibold text-base text-[#1e1e1e]">2019</span>
        <p class="text-[10px] text-[#1e1e1e] mt-1 leading-[14px]">
          SOX Summer Writing Camp Lagulad Fellowship Awardee of the 1st SOX Summer Writing Camp
        </p>
      </div>
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <img src="{{ asset('images/star-final.svg') }}" class="w-6 h-6 icon-position" alt="Star" />
        <span class="font-semibold text-base text-[#1e1e1e]">2020</span>
        <p class="text-[10px] text-[#1e1e1e] mt-1 leading-[14px]">
          Sultan Kudarat Writer's Association Winner of Kirab: Sultan Kudarat Hiligaynon and Kiniray-a Flash Fiction Writing Contest
        </p>
      </div>
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <img src="{{ asset('images/star-final.svg') }}" class="w-6 h-6 icon-position" alt="Star" />
        <span class="font-semibold text-base text-[#1e1e1e]">2021</span>
        <p class="text-[10px] text-[#1e1e1e] mt-1 leading-[14px]">
          Sulat SOX Winner of "Tell Me You Love Me without Saying I Love You" - A Sulat SOX Poetry Writing Contest
        </p>
      </div>
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <img src="{{ asset('images/star-final.svg') }}" class="w-6 h-6 icon-position" alt="Star" />
        <span class="font-semibold text-base text-[#1e1e1e]">2021</span>
        <p class="text-[10px] text-[#1e1e1e] mt-1 leading-[14px]">
          UP JPIA Business Camp Case Study Winner – University of the Philippines Junior Philippine Institute of Accountants
        </p>
      </div>
    </div>

    <!-- Right: Education -->
    <div class="flex flex-col gap-4 w-[300px]">
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <img src="{{ asset('images/graduation-cap.svg') }}" class="w-6 h-6 icon-position" alt="Graduation Cap" />
        <span class="font-semibold text-base text-[#1e1e1e]">2015 - 2019</span>
        <p class="text-[10px] text-[#1e1e1e] mt-1 leading-[14px]">
          Graduated as a Science, Technology, and Mathematics student in Libertad National High School
        </p>
      </div>
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <img src="{{ asset('images/graduation-cap.svg') }}" class="w-6 h-6 icon-position" alt="Graduation Cap" />
        <span class="font-semibold text-base text-[#1e1e1e]">2019 - 2021</span>
        <p class="text-[10px] text-[#1e1e1e] mt-1 leading-[14px]">
          Graduated Accountancy and Business Management at University of Mindanao – General Santos City
        </p>
      </div>
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <img src="{{ asset('images/graduation-cap.svg') }}" class="w-6 h-6 icon-position" alt="Graduation Cap" />
        <span class="font-semibold text-base text-[#1e1e1e]">2021 - 2022</span>
        <p class="text-[10px] text-[#1e1e1e] mt-1 leading-[14px]">
          Enrolled in Bachelor of Science in Accountancy at University of St. La Salle – Bacolod City
        </p>
      </div>
      <div class="relative record-card p-4 bg-white rounded-2xl border-2 border-black">
        <img src="{{ asset('images/graduation-cap.svg') }}" class="w-6 h-6 icon-position" alt="Graduation Cap" />
        <span class="font-semibold text-base text-[#1e1e1e]">2022 - Present</span>
        <p class="text-[10px] text-[#1e1e1e] mt-1 leading-[14px]">
          Shifted to BS Computer Science Major in Game Development – University of St. La Salle, Bacolod City
        </p>
      </div>
    </div>
  </div>
</body>
</html>
