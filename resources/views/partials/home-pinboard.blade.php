<!-- Home Section -->
<section id="home" class="flex flex-col md:flex-row px-6 md:px-12 lg:px-36 py-10 md:py-20 gap-8">
    <!-- Left Column -->
    <div class="w-full md:w-1/2 md:pr-8">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-semibold text-[#1e1e1e] mb-8">hi there,<br>nice to meet you!</h1>
        <div class="space-y-4">
            @foreach (['content writer', 'entrepreneur', 'seo expert', 'copywriter', 'computer science', 'business analyst'] as $role)
                <p><span class="hover-grow inline-block text-xl sm:text-2xl md:text-3xl font-semibold text-[#1e1e1e4c] cursor-pointer">{{ $role }}</span></p>
            @endforeach
        </div>
    </div>

    <!-- Right Column -->
    <div class="w-full md:w-1/2 md:pl-8">
        <p class="text-xl sm:text-2xl md:text-3xl font-semibold text-[#1e1e1e4c] mb-4">leave a message for me.</p>
        <div class="bg-[#fda5a4] rounded-[30px] border-2 border-black p-6 w-full min-h-[363px] max-h-[363px] overflow-y-auto scroll-hide">
            <div class="flex justify-end gap-2 mb-4">
                <div class="w-5 h-5 bg-[#c88d8c] rounded-full border-2 border-black"></div>
                <div class="w-5 h-5 bg-[#c88d8c] rounded-full border-2 border-black"></div>
                <div class="w-5 h-5 bg-[#c88d8c] rounded-full border-2 border-black"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($pins as $index => $pin)
                    @php
                        $colors = ['#FFDFB2', '#FFFFFF', '#C5FFF1'];
                        $bg = $colors[$index % count($colors)];
                    @endphp
                    <div class="rounded-[15px] p-4 border-2 border-black min-h-[100px] w-full max-w-full sm:max-w-xs break-words" style="background-color: {{ $bg }};">
                        <div class="flex items-start gap-2 mb-2">
                            <div class="w-5 h-5 bg-[#cbb28e] rounded-full border-2 border-black flex-shrink-0"></div>
                            <div class="flex-1 font-semibold text-black text-[12px] break-words whitespace-normal">{{ $pin->name }}</div>
                        </div>
                        <p class="text-black text-sm break-words whitespace-pre-wrap"
                           contenteditable="{{ auth()->check() && $pin->user_id === auth()->id() ? 'true' : 'false' }}"
                           data-pin-id="{{ $pin->id }}">{{ $pin->message }}</p>

                        @auth
                            @if ($pin->user_id === auth()->id())
                                <div class="mt-2 flex gap-2">
                                    <form method="POST" action="{{ route('pin.delete', $pin->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 text-sm">Delete</button>
                                    </form>
                                    <form method="POST" action="{{ route('pin.update', $pin->id) }}" class="inline-block">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="message" class="updated-message">
                                        <button type="submit" class="text-blue-600 text-sm update-pin">Update</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                @endforeach
            </div>
        </div>

        @auth
        <button id="add-pin-btn" class="mt-4 w-[150px] bg-[#1e1e1e] text-white font-semibold py-2.5 rounded-full hover:scale-110 transition-transform duration-200">add a pin.</button>

        <!-- Modal -->
        <div id="pin-modal" class="fixed top-0 left-0 w-full h-full bg-black/50 hidden z-50 flex items-center justify-center">
            <form action="{{ route('pin.store') }}" method="POST" class="bg-white p-6 rounded-lg w-11/12 max-w-md space-y-4">
                @csrf
                <h2 class="text-2xl font-bold">Add a Pin</h2>
                <div>
                    <label class="block mb-1">Message</label>
                    <textarea name="message" required class="w-full border rounded px-3 py-2 h-24"></textarea>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" id="cancel-pin" class="px-4 py-2 border rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-[#1e1e1e] text-white rounded">Save</button>
                </div>
            </form>
        </div>
        @else
        <p class="mt-4 text-sm text-gray-600 italic">Log in to add your own pin.</p>
        @endauth
    </div>
</section>

<!-- Logos Section -->
<section class="w-full bg-white py-5 relative overflow-hidden" id="tech-logos">
    <!-- Masked fade overlays -->
    <div class="absolute top-0 bottom-0 left-0 w-2/5 z-10" style="background: linear-gradient(to right, white 0%, transparent 100%);"></div>
    <div class="absolute top-0 bottom-0 right-0 w-2/5 z-10" style="background: linear-gradient(to left, white 0%, transparent 100%);"></div>

    <!-- Scrolling Container -->
    <div class="relative w-full overflow-hidden">
        <div class="scroll-track flex gap-16 min-w-max animate-scroll px-6 sm:px-12 md:px-20">
            <!-- Logos: Duplicated for seamless loop -->
            @foreach (['php', 'python', 'javascript', 'java', 'cpp', 'flutter', 'sql'] as $logo)
                @for ($i = 0; $i < 3; $i++)
                    <img src="/images/logos/{{ $logo }}.svg" class="h-16 sm:h-20 md:h-24 w-auto" alt="{{ ucfirst($logo) }}">
                @endfor
            @endforeach
        </div>
    </div>
</section>

<!-- Styles -->
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
