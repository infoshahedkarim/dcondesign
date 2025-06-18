<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>



<div class="mobile-menu d-lg-none d-block">
    <button type="button" class="close-button"> <i class="las la-times"></i> </button>
    <div class="mobile-menu__inner">
        <a href="{{route('frontend.index')}}" class="mobile-menu__logo">
            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" class="white-version" style="width:40%; Height:auto;">
            <img src="{{ asset('assets/images/logo/white-logo-two.png') }}" alt="Logo" class="dark-version" style="width:40%; Height:auto;">
        </a>
        <div class="mobile-menu__menu">

            <ul class="nav-menu1 flx-align nav-menu--mobile">
                <li class="nav-menu1__item ">
                    <a href="{{route('frontend.index')}}" class="nav-menu1__link">Home</a>
                </li>
                <li class="nav-menu1__item ">
                    <a href="{{route('frontend.all-project')}}" class="nav-menu1__link">All Ads</a>
                </li>
                <li class="nav-menu1__item ">
                    <a href="{{route('frontend.tolet')}}" class="nav-menu1__link">To-Let</a>
                </li>
                <li class="nav-menu1__item ">
                    <a href="{{route('frontend.sells')}}" class="nav-menu1__link">Sells</a>
                </li>
                <li class="nav-menu1__item">
                    <a href="{{route('frontend.contact')}}" class="nav-menu1__link">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</div>




<header class="header">
    <div class="container container-full">
        <nav class="header-inner d-flex justify-content-between align-items-center" style="position: relative; min-height: 90px;">

            <!-- Logo Start -->
            <div class="logo d-flex align-items-center">
                <a href="{{route('frontend.index')}}" class="link white-version">
                    <img src="{{asset('assets/images/logo/white-logo.png')}}" alt="Logo" style="width:40%; height:auto;">
                </a>
                <a href="{{route('frontend.index')}}" class="link dark-version">
                    <img src="{{asset('assets/images/logo/white-logo.png')}}" alt="Logo" style="width:40%; height:auto;">
                </a>
            </div>

            <!-- Logo End -->

            <!-- Menu Start -->
            <div class="header-menu d-lg-block d-none"
                style="position: absolute; left: 50%; transform: translateX(-50%); top: 50%; transform: translate(-50%, -50%);">
                <ul class="nav-menu flx-align" style="color: white; display: flex; gap: 24px; padding: 0; margin: 0;">
                    <li class="nav-menu__item"><a href="{{route('frontend.index')}}" class="nav-menu__link">Home</a></li>
                    <li class="nav-menu__item"><a href="{{route('frontend.all-project')}}" class="nav-menu__link">All Ads</a></li>
                    <li class="nav-menu__item"><a href="{{route('frontend.tolet')}}" class="nav-menu__link">To-Let</a></li>
                    <li class="nav-menu__item"><a href="{{route('frontend.sells')}}" class="nav-menu__link">Sells</a></li>
                    <li class="nav-menu__item"><a href="{{route('frontend.contact')}}" class="nav-menu__link">Contact</a></li>
                </ul>
            </div>
            <!-- Menu End -->


            <!-- Header Right start -->
            <div class="header-right flx-align">
                <!-- Light Dark Mode -->
                <div class="theme-switch-wrapper position-relative">
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" class="d-none" id="checkbox">
                        <span class="slider text-black header-right__button white-version">
                            <img src="{{asset('assets/images/icons/sun.svg')}}" alt="">
                        </span>
                        <span class="slider text-black header-right__button dark-version">
                            <img src="{{asset('assets/images/icons/moon.svg')}}" alt="">
                        </span>
                    </label>
                </div>
                <button type="button" class="toggle-mobileMenu d-lg-none"> <i class="las la-bars"></i> </button>

            </div>
        </nav>


        <div class="search-banner-overlay w-100" style="z-index: 20; background-color: inherit;">
            <div class="container container-full" style="padding-bottom: 1%;">
                <div class="row gy-sm-5 gy-0 align-items-center">
                    <div class="col-xl-4 col-sm-8 order-xl-0 order-2"></div>
                    <div class="col-xl-4">
                        <div class="banner-two__content">
                            <form action="{{ route('search') }}" class="search-box" method="GET">
                                <input type="text" name="query" class="common-input common-input--md pill shadow-sm" placeholder="Search place, sells &amp; Ads">
                                <button type="submit" class="btn btn-main1 btn-icon icon border-0"
                                    style="padding: 6px 10px; border-radius: 50%; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                    <img src="{{asset('assets/images/icons/search.svg')}}" alt="" style="width: 14px; height: 14px;">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleBtn = document.querySelector(".toggle-mobileMenu");
            const mobileMenu = document.querySelector(".mobile-menu");
            const closeBtn = document.querySelector(".close-button");

            // Open menu
            toggleBtn.addEventListener("click", function() {
                mobileMenu.style.display = "block";
                setTimeout(() => {
                    mobileMenu.style.transform = "translateX(0)";
                    mobileMenu.style.opacity = "1";
                }, 10);
            });

            // Close on button
            closeBtn.addEventListener("click", function() {
                closeMobileMenu();
            });

            // Close on outside click
            document.addEventListener("click", function(e) {
                if (
                    mobileMenu.style.display === "block" &&
                    !mobileMenu.contains(e.target) &&
                    !toggleBtn.contains(e.target)
                ) {
                    closeMobileMenu();
                }
            });

            function closeMobileMenu() {
                mobileMenu.style.transform = "translateX(-100%)";
                mobileMenu.style.opacity = "0";
                setTimeout(() => {
                    mobileMenu.style.display = "none";
                }, 300);
            }
        });
    </script>

</header>