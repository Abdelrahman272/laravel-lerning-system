<script src="https://unpkg.com/scrollreveal"></script>
<script>
    // Initialize the ScrollReveal instance
    var sr = ScrollReveal();

    // Define the animation configurations with different delay values for .animate-bottom-1 and .animate-bottom-2
    sr.reveal('.animate-bottom-1', { origin: 'bottom', distance: '50px', duration: 1000, delay: 300, once: true });
    sr.reveal('.animate-bottom-2', { origin: 'bottom', distance: '50px', duration: 1000, delay: 500, once: true });

    // Stop the animations after they have been triggered once on small devices
    function stopAnimations() {
        if (window.innerWidth < 768) {
            sr.destroy();
        }
    }

    sr.reveal('.animate-bottom-1, .animate-bottom-2', {
        once: true,
        afterReveal: stopAnimations
    });

    // Check viewport width on window resize
    window.addEventListener('resize', stopAnimations);
</script>


<script src="{{asset('frontend/assets/js/main.js')}}"></script>
<script src="{{asset('frontend/assets/js/inspect.js')}}"></script>
<script src="{{asset('frontend/assets/bootstrap/js/bootstrap.bundle.js')}}"></script>

@yield('js')
