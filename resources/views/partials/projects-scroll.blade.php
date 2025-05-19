<!-- Project Scroll Section -->
<section class="w-full bg-neutral-50 py-16 overflow-hidden relative">
    <!-- Section Header -->
    <div class="text-center mb-10">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-semibold text-[#1e1e1e] leading-tight mb-2">
            coding & development
        </h1>
        <p class="text-base sm:text-xl md:text-2xl font-semibold text-[#1e1e1e4c] mt-2">
            projects I developed using my computer science knowledge.
        </p>
    </div>

    <!-- Scroll Container -->
    <div id="scroll-track" class="scroll-track flex gap-16 min-w-max animate-scroll px-6 sm:px-12 xl:px-28 transition-all duration-500">
        @php
            $projects = [
                [
                    'image' => 'stalhub.png',
                    'label' => 'StalHub',
                    'description' => 'Company Management System with Analytics',
                    'bars' => ['Flutter Framework', 'Dart, Kotlin, Swift', 'C++, C, CMake']
                ],
                [
                    'image' => 'stalfolio.png',
                    'label' => 'Stalfolio',
                    'description' => 'Personal Portfolio Website',
                    'bars' => ['Made with Laravel Framework', 'PHP & Blade', 'Tailwind, CSS, JavaScript']
                ],
                [
                    'image' => 'arpokemon.png',
                    'label' => 'AR Pokémon TCG',
                    'description' => 'Augmented Reality Trading Card Simulation',
                    'bars' => ['Vuforia Image Recognition', 'Unity Game Engine', 'Unity AR, ShaderLab, C#']
                ],
                [
                    'image' => 'incident.png',
                    'label' => 'Incident Game',
                    'description' => 'First-Person Thriller Puzzle Game',
                    'bars' => ['Blender', 'Unity Game Engine', 'C#, HLSL']
                ]
            ];
        @endphp

        @foreach (array_merge($projects, $projects) as $project)
            <div class="relative w-[75vw] sm:w-[280px] md:w-[320px] lg:w-[350px] flex-shrink-0 flex flex-col items-center">
                <!-- Main Image Card -->
                <div 
                    class="image-wrapper w-full aspect-[4/3] border-2 border-black rounded-xl overflow-hidden relative bg-white z-10 transition-transform duration-300 hover:scale-110 cursor-pointer"
                    onclick="toggleModal(this)"
                >
                    <img src="{{ asset('images/main/' . $project['image']) }}"
                         alt="{{ $project['label'] }}"
                         class="w-full h-full object-cover pointer-events-none">

                    <!-- Modal Bars -->
                    <div class="modal-bars absolute inset-0 z-20 pointer-events-none">
                        @foreach ($project['bars'] as $bar)
                            <div class="bar-overlay absolute text-xs font-semibold text-white bg-black border border-black flex items-center justify-center opacity-0">
                                {{ $bar }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Labels -->
                <div class="text-center mt-4">
                    <h3 class="text-lg font-semibold text-black">{{ $project['label'] }}</h3>
                    <p class="text-sm text-neutral-500">{{ $project['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

  <!-- Add to your <style> section -->
<style>
    .scroll-track {
        animation: scrollLeft 40s linear infinite;
    }

    .paused {
        animation-play-state: paused !important;
    }

    @keyframes scrollLeft {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    @keyframes barGrowWidth {
        0% { width: 0; opacity: 0; }
        100% { width: 80%; opacity: 1; }
    }

    @keyframes barGrowHeight {
        0% { height: 0; opacity: 0; }
        100% { height: 40px; opacity: 1; }
    }

    @keyframes barShrinkWidth {
        0% { width: 80%; opacity: 1; }
        100% { width: 0; opacity: 0; }
    }

    @keyframes barShrinkHeight {
        0% { height: 40px; opacity: 1; }
        100% { height: 0; opacity: 0; }
    }

    .bar-overlay {
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        opacity: 0;
        font-size: 0.75rem;
        font-weight: 600;
        background-color: black;
        color: white;
        border: 1px solid black;
        overflow: hidden;
    }

    .bar-grow-width { animation: barGrowWidth 0.4s ease forwards; }
    .bar-grow-height { animation: barGrowHeight 0.4s ease forwards; }
    .bar-shrink-width { animation: barShrinkWidth 0.3s ease forwards; }
    .bar-shrink-height { animation: barShrinkHeight 0.3s ease forwards; }
</style>

    <!-- Replace your <script> section with this -->
    <script>
        function toggleModal(imageContainer) {
            const scrollTrack = document.getElementById('scroll-track');
            const bars = imageContainer.querySelectorAll('.bar-overlay');
            const isActive = imageContainer.classList.contains('modal-active');

            if (isActive) {
                // Close: play shrink animation, then cleanup
                imageContainer.classList.remove('modal-active');
                scrollTrack.classList.remove('paused');

                bars.forEach((bar) => {
                    const hasHeight = bar.classList.contains('bar-grow-height');
                    const shrinkClass = hasHeight ? 'bar-shrink-height' : 'bar-shrink-width';

                    // replace grow animation with shrink
                    bar.classList.remove('bar-grow-height', 'bar-grow-width');
                    bar.classList.add(shrinkClass);

                    // remove inline styles + classes after animation ends
                    bar.addEventListener('animationend', () => {
                        bar.className = 'bar-overlay';
                        bar.removeAttribute('style');
                    }, { once: true });
                });

            } else {
                // Open: play grow animation with random unique directions
                imageContainer.classList.add('modal-active');
                scrollTrack.classList.add('paused');

                const directions = ['left', 'right', 'top', 'bottom'];
                const used = new Set();

                bars.forEach((bar, i) => {
                    let dir;
                    do {
                        dir = directions[Math.floor(Math.random() * directions.length)];
                    } while (used.has(dir));
                    used.add(dir);

                    bar.className = 'bar-overlay';
                    bar.style.opacity = '1';

                    switch (dir) {
                        case 'left':
                            bar.style.top = '20%';
                            bar.style.left = '0';
                            bar.style.height = '40px';
                            bar.style.width = '0';
                            bar.classList.add('bar-grow-width');
                            break;
                        case 'right':
                            bar.style.top = '50%';
                            bar.style.right = '0';
                            bar.style.left = 'auto';
                            bar.style.height = '40px';
                            bar.style.width = '0';
                            bar.classList.add('bar-grow-width');
                            break;
                        case 'top':
                            bar.style.top = '0';
                            bar.style.left = '20%';
                            bar.style.height = '0';
                            bar.style.width = '60%';
                            bar.classList.add('bar-grow-height');
                            break;
                        case 'bottom':
                            bar.style.bottom = '0';
                            bar.style.left = '10%';
                            bar.style.height = '0';
                            bar.style.width = '80%';
                            bar.classList.add('bar-grow-height');
                            break;
                    }
                });
            }
        }
    </script>
</section>
