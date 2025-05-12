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
                    <div class="rounded-[15px] p-4 border-2 border-black min-h-[100px] w-full max-w-xs break-words" style="background-color: {{ $bg }};">
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
        <button id="add-pin-btn" class="mt-4 w-[150px] bg-[#1e1e1e] text-white font-semibold py-2.5 rounded-full hover:scale-125 transition-transform duration-200">add a pin.</button>
        <!-- Modal -->
        <div id="pin-modal" class="fixed top-0 left-0 w-full h-full bg-black/50 hidden z-50 flex items-center justify-center">
            <form action="{{ route('pin.store') }}" method="POST" class="bg-white p-6 rounded-lg w-96 space-y-4">
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
