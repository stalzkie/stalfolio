<script>
    // Scroll spy for navbar active state
    window.addEventListener('scroll', () => {
        const links = document.querySelectorAll('.nav-link');
        const scrollPos = window.scrollY + 100;

        links.forEach(link => {
            const section = document.querySelector(link.getAttribute('href'));
            if (section && section.offsetTop <= scrollPos && section.offsetTop + section.offsetHeight > scrollPos) {
                links.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
            }
        });
    });
</script>
