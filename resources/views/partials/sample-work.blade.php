<!-- Sample Work Section -->
<section id="sample-work" class="flex flex-col lg:flex-row items-start justify-center gap-10 px-6 sm:px-12 xl:px-28 py-20 w-full bg-white">
  <!-- Left Column: Portfolio Cards -->
  <div class="flex flex-col w-full lg:w-[544px] items-center lg:items-start gap-8">
    <div class="flex flex-col text-center lg:text-left gap-2">
      <h1 class="text-4xl sm:text-5xl md:text-6xl font-semibold text-[#1e1e1e] leading-[1.1]">
        my sample works
      </h1>
      <p class="text-xl sm:text-2xl font-semibold text-[#1e1e1e4c] leading-[1.5]">
        some of my published outputs and more portfolios!
      </p>
    </div>

    <!-- Portfolio Cards -->
    <div class="flex flex-wrap justify-center lg:justify-start gap-y-10 gap-x-[40px]">
      <!-- Portfolio Card Loop -->
      @foreach([
        ['YouTube Jobs', '#ff8989', 'https://ytjobs.co/talent/profile/254082', '50+ Videos<br>29 Million+ Views<br>500+ Likes'],
        ['Fiverr', '#bdffc1', 'https://www.fiverr.com/hirayacreatives?public_mode=true', '170+ 5 Star Reviews<br>400+ Orders<br>$15,000+ Profit'],
        ['StalWrites', '#ffcab2', 'https://stalwrites.com/', '$70,000+ Revenue<br>$500,000+ Client Value<br>98% Client Retention'],
        ['TBA', '#ffffff', null, 'TBA']
      ] as [$title, $bg, $link, $desc])
        <div class="portfolio-card flex flex-col w-[225px] h-[119px] p-2.5" style="background-color: {{ $bg }}; border: 2px solid black; border-radius: 15px;">
          <div class="flex justify-between items-start w-full mb-1">
            <div class="font-semibold text-[#1e1e1e] text-base">{{ $title }}</div>
            <div class="portfolio-button flex items-center justify-center px-3 py-1 rounded-full bg-white border-2 border-black">
              @if ($link)
              <a href="{{ $link }}" target="_blank" rel="noopener noreferrer"
                class="portfolio-button-text text-black text-[8px] font-semibold leading-[19px]">go to portfolio.</a>
              @else
              <span class="portfolio-button-text text-black text-[8px] font-semibold leading-[19px]">go to portfolio.</span>
              @endif
            </div>
          </div>
          <p class="text-xs text-[#1e1e1e] leading-[19px]">{!! $desc !!}</p>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Right Column: Logos -->
  <div class="w-full lg:w-[598px] flex flex-col items-center justify-center gap-6 mt-6 lg:mt-0">
    <div class="text-sm text-[#1e1e1e80] font-normal text-center lg:text-left">
      try clicking a logo!
    </div>
    <div class="grid grid-cols-3 gap-6 w-full max-w-[800px] mx-auto">
      @foreach([
        ['fragster-logo.svg', 'https://www.fragster.com/mlbb-the-story-of-bren-esports-how-they-reached-the-top/'],
        ['gamer-org-logo.svg', 'https://www.gamer.org/the-best-teamfight-tactics-tft-lunar-festival-2025-comps/'],
        ['xp-pen-logo.svg', 'https://www.xp-pen.com/blog/emr-technology.html'],
        ['updf-logo.svg', 'https://updf.com/chatgpt/grammarly-vs-chatgpt/'],
        ['now-gg-logo.svg', 'https://now.gg/apps/plug-in-digital/10407/american-sniper-3d.html'],
        ['ins-mind-logo.svg', 'https://www.insmind.com/blog/canva-vs-photoshop/'],
        ['hitpaw-logo.svg', 'https://www.hitpaw.com/video-tips/remove-text-from-video.html'],
        ['brooklands-logo.svg', 'https://brookcarrent.ae/brand/lamborghini/huracan/'],
        ['cryptotoday-logo.svg', 'https://www.cryptotoday.org/musks-x-payments-speculation-dogecoin-rise/'],
        ['shiehhealth-logo.svg', 'https://shiehhealth.com/welcome-to-shiehhealth/'],
        ['patiowell-logo.svg', 'https://www.patiowell.com/blogs/tips-how-tos/is-it-cheaper-to-buy-or-build-a-shed'],
        ['ugreen-logo.svg', 'https://nas.ugreen.com/blogs/knowledge/what-is-a-file-server'],
        ['allthebestloans-logo.svg', 'https://allthebestloans.ph/blog/credit-score-vs-credit-report/'],
        ['digido-logo.svg', 'https://digido.ph/articles/secured-loans'],
        ['trilochana-activate-logo.svg', 'https://trilochanaactivate.com/author/stalwrites/'],
        ['xppen-genshin-logo.svg', 'https://www.xp-pen.com/blog/genshin-new-character-chiori.html'],
        ['xppen-afkarena-logo.svg', 'https://www.xp-pen.com/blog/afk-arena-beginner-guide.html'],
      ] as [$logo, $url])
        <a href="{{ $url }}" target="_blank" class="logo-item flex items-center justify-center p-2 rounded border-2 border-black">
          <img src="{{ asset('images/client-logo/' . $logo) }}" alt="{{ $logo }}" class="max-h-10 h-auto">
        </a>
      @endforeach
    </div>
  </div>

  <!-- Styles -->
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
