
<!-- Track Record Section -->
<section id="track-record" class="bg-neutral-50 pt-20 pb-28">
  
<!-- Title -->
<div class="text-center mb-10">
  <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-6xl font-semibold text-[#1e1e1e]">
    my track record
  </h1>
  <p class="text-base sm:text-2xl md:text-2xl lg:text-2xl font-semibold text-[#1e1e1e4c] mt-2">
    here’s what I did before.
  </p>
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
    transform: scale(1.05);
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
