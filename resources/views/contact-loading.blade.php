<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loading...</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        setTimeout(() => {
            window.location.href = "{{ route('contact.confirmation') }}";
        }, 3000);
    </script>
</head>
<body class="flex items-center justify-center min-h-screen bg-white">
<video 
    autoplay 
    muted 
    loop 
    playsinline 
    class="w-32 h-32 object-contain"
>
    <source src="{{ asset('videos/amongusloading.webm') }}" type="video/webm">
    Your browser does not support the video tag.
</video>
</body>
</html>