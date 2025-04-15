<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-out {
            animation: fadeOut 1s ease forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
</head>
<body class="bg-neutral-50 flex justify-center items-center min-h-screen">
    <div id="confirmationBox" class="transition-opacity duration-1000">
        <div class="w-[670px] h-96 px-10 py-7 bg-white rounded-2xl outline outline-2 outline-black flex justify-center items-center">
            <h1 class="text-5xl font-semibold text-stone-900 text-center">sent!</h1>
        </div>
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('confirmationBox').classList.add('fade-out');
        }, 2000);

        setTimeout(() => {
            window.location.href = "{{ route('contact') }}";
        }, 3000);
    </script>
</body>
</html>
