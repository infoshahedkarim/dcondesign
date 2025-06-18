<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="author" content="@shahedkarim">
    <meta name="robots" content="index, follow">
    <!-- Title -->
    <title> @yield('title') Dcon Design Studio</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.ico') }}">


    <link rel="icon" href="{{ asset('assets/images/logo/favicon.ico') }}" sizes="any">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/images/logo/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/mobile-header.css') }}">

    @yield('pageCSS')

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



</head>

<body>

<div class="header1">    
<div class="logo-top-left">
        <a href="{{route('home')}}">
            <img class="logo" src="{{asset('assets/images/DconLogo.png')}}" alt="dcon design" />
        </a>
    </div>
</div>


    <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>


    <div class="mobile-drawer" id="mobileDrawer">
        <div class="drawer-content">
            <nav class="drawer-nav">
                <a href="#">WE</a>
                <a href="{{route('projects')}}">PROJECTS</a>
                <a href="#">AWARDS</a>
                <a href="#">ASSOCIATES</a>
                <a href="#">CLIENTS</a>
                <a href="#">UPDATES</a>
            </nav>
        </div>
    </div>



    @yield('content')

   <script>
    const hamburger = document.getElementById('hamburger');
    const mobileDrawer = document.getElementById('mobileDrawer');
    const drawerLinks = mobileDrawer.querySelectorAll('.drawer-nav a');

    // Toggle menu open/close
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        mobileDrawer.classList.toggle('open');

        // Reset and re-trigger wave animation
        drawerLinks.forEach((link, i) => {
            link.style.animation = 'none';
            link.offsetHeight; // Force reflow
            link.style.animation = `slideWave 0.6s ease forwards`;
            link.style.animationDelay = `${0.1 * (i + 1)}s`;
        });
    });

    // Optional: Close drawer on background click
    mobileDrawer.addEventListener('click', (e) => {
        if (!e.target.closest('.drawer-content')) {
            mobileDrawer.classList.remove('open');
            hamburger.classList.remove('active');
        }
    });
</script>




</body>

</html>