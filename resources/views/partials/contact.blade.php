<!-- Contact Section -->
<section class="flex flex-col items-center justify-center w-full py-20 bg-neutral-50 relative">
    <!-- Title -->
    <div class="w-full text-center mb-10">
        <h1 class="text-6xl font-semibold text-stone-900">contact me</h1>
        <p class="text-2xl font-semibold text-stone-900/30 mt-2">
            want to work with me? send a message or email me at business@stalwrites.com
        </p>
    </div>

    <!-- Contact Form -->
    <form id="contact-form" class="w-[670px] bg-white rounded-2xl outline outline-2 outline-black px-8 py-10 space-y-6">
        @csrf
        <!-- Email -->
        <div class="space-y-1">
            <label class="block font-semibold text-base text-stone-900 tracking-wide">Email</label>
            <input type="email" name="email" required
                class="w-full h-10 px-3 py-2 bg-neutral-200 rounded-2xl outline outline-2 outline-black text-[12px] tracking-tight text-black"
                value="{{ optional(auth()->user())->email }}" readonly />
        </div>

        <!-- Full Name -->
        <div class="space-y-1">
            <label class="block font-semibold text-base text-stone-900 tracking-wide">Full Name</label>
            <input type="text" name="name" required
                class="w-full h-10 px-3 py-2 bg-neutral-200 rounded-2xl outline outline-2 outline-black text-[12px] tracking-tight text-black"
                value="{{ optional(auth()->user())->name }}" readonly />
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
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            });

            if (!response.ok) throw new Error("Submission failed");

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
            alert("An error occurred while submitting your message.");
        }
    });
</script>
