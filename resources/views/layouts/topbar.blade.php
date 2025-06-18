<header id="page-topbar" class="isvertical-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('build/images/logo-dark-sm.png') }}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('build/images/logo-dark-sm.png') }}" alt="" height="26">
                    </span>
                </a>

                <a href="index" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ URL::asset('build/images/logo-light-sm.png') }}" alt="" height="26">
                    </span>
                </a>
            </div>

            <!-- Toggle Button -->
<button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn" onclick="toggleMenu()">
    <i class="bx bx-menu align-middle"></i>
</button>

<!-- Sidebar Drawer Menu for Small Devices -->
<div id="sidebarMenu" class="d-none"
    style="position: absolute; top: 60px; left: 10px; width: 260px; background: rgba(255, 255, 255, 0.95); 
           backdrop-filter: blur(5px); border-radius: 10px; box-shadow: 0 10px 20px rgba(0,0,0,0.15); 
           padding: 15px 20px; z-index: 1050; transition: all 0.3s ease;">

    <ul class="metismenu list-unstyled mb-0" id="side-menu" style="margin: 0; padding: 0; list-style: none;">
        <li style="margin-bottom: 12px;">
            <a href="{{ route('back.pcreate') }}" style="display: flex; align-items: center; gap: 10px; padding: 10px; font-weight: 500; border-radius: 8px; text-decoration: none; color: #333;" onmouseover="this.style.background='#f0f0f0'; this.style.color='#d42027';" onmouseout="this.style.background='transparent'; this.style.color='#333';">
                <i class="bx bx-paper-plane icon nav-icon"></i>
                Add a Place
            </a>
        </li>

        <li style="margin-bottom: 12px;">
            <a href="{{ route('back.pshow') }}" style="display: flex; align-items: center; gap: 10px; padding: 10px; font-weight: 500; border-radius: 8px; text-decoration: none; color: #333;" onmouseover="this.style.background='#f0f0f0'; this.style.color='#d42027';" onmouseout="this.style.background='transparent'; this.style.color='#333';">
                <i class="bx bx-grid-vertical icon nav-icon"></i>
                Place Lists
            </a>
        </li>

        <li style="margin-bottom: 12px;">
            <a href="{{ route('back.ccreate') }}" style="display: flex; align-items: center; gap: 10px; padding: 10px; font-weight: 500; border-radius: 8px; text-decoration: none; color: #333;" onmouseover="this.style.background='#f0f0f0'; this.style.color='#d42027';" onmouseout="this.style.background='transparent'; this.style.color='#333';">
                <i class="bx bxl-react icon nav-icon"></i>
                Add a Category
            </a>
        </li>

        <li style="margin-bottom: 12px;">
            <a href="{{ route('back.cshow') }}" style="display: flex; align-items: center; gap: 10px; padding: 10px; font-weight: 500; border-radius: 8px; text-decoration: none; color: #333;" onmouseover="this.style.background='#f0f0f0'; this.style.color='#d42027';" onmouseout="this.style.background='transparent'; this.style.color='#333';">
                <i class="bx bx-book icon nav-icon"></i>
                Category Lists
            </a>
        </li>

        <li style="margin-bottom: 12px;">
            <a href="{{ route('back.create') }}" style="display: flex; align-items: center; gap: 10px; padding: 10px; font-weight: 500; border-radius: 8px; text-decoration: none; color: #333;" onmouseover="this.style.background='#f0f0f0'; this.style.color='#d42027';" onmouseout="this.style.background='transparent'; this.style.color='#333';">
                <i class="bx bx-cloud-download icon nav-icon"></i>
                Create a AD
            </a>
        </li>

        <li style="margin-bottom: 12px;">
            <a href="{{ route('back.show') }}" style="display: flex; align-items: center; gap: 10px; padding: 10px; font-weight: 500; border-radius: 8px; text-decoration: none; color: #333;" onmouseover="this.style.background='#f0f0f0'; this.style.color='#d42027';" onmouseout="this.style.background='transparent'; this.style.color='#333';">
                <i class="bx bx-folder icon nav-icon"></i>
                AD Lists
            </a>
        </li>

        <li>
            <a href="{{ route('contact.messages') }}" style="display: flex; align-items: center; gap: 10px; padding: 10px; font-weight: 500; border-radius: 8px; text-decoration: none; color: #333;" onmouseover="this.style.background='#f0f0f0'; this.style.color='#d42027';" onmouseout="this.style.background='transparent'; this.style.color='#333';">
                <i class="bx bxl-google icon nav-icon"></i>
                Show Emails
            </a>
        </li>

        <li>
            <a href="{{ route('back.bcreate') }}" style="display: flex; align-items: center; gap: 10px; padding: 10px; font-weight: 500; border-radius: 8px; text-decoration: none; color: #333;" onmouseover="this.style.background='#f0f0f0'; this.style.color='#d42027';" onmouseout="this.style.background='transparent'; this.style.color='#333';">
                <i class="bx bx-clipboard icon nav-icon"></i>
                Add Banner
            </a>
        </li>
        <li>
            <a href="{{ route('back.bshow') }}" style="display: flex; align-items: center; gap: 10px; padding: 10px; font-weight: 500; border-radius: 8px; text-decoration: none; color: #333;" onmouseover="this.style.background='#f0f0f0'; this.style.color='#d42027';" onmouseout="this.style.background='transparent'; this.style.color='#333';">
                <i class="bx bx-copy icon nav-icon"></i>
                Banners List
            </a>
        </li>
    </ul>
</div>



            <!-- start page title -->
            <div class="page-title-box align-self-center d-none d-md-block">
                <h4 class="page-title mb-0">@yield('page-title')</h4>
            </div>
            <!-- end page title -->

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center"
                    id="page-header-user-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-2 fw-medium font-size-15">{{ Auth::user()->name }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="p-3 border-bottom">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <p class="mb-0 font-size-11 text-muted">{{ Auth::user()->email }}</p>
                        <p class="mb-0 font-size-11 text-muted">{{ Auth::user()->user_type }}</p>
                    </div>
                    <a class="dropdown-item" href="{{route('profile.show')}}"><i
                            class="mdi mdi-account-circle text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Profile</span></a>
                    <!-- <a class="dropdown-item" href="apps-chat"><i
                            class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Messages</span></a> -->
                    <a class="dropdown-item" href="https://ridgebenit.com/"><i
                            class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Help</span></a>
                    <!-- <a class="dropdown-item d-flex align-items-center" href="#"><i
                            class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle me-3">Settings</span><span
                            class="badge bg-success-subtle text-success ms-auto">New</span></a>
                    <a class="dropdown-item" href="auth-lock-screen"><i
                            class="mdi mdi-lock text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Lock screen</span></a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void();"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    function toggleMenu() {
        const menu = document.getElementById('sidebarMenu');
        if (menu.classList.contains('d-none')) {
            menu.classList.remove('d-none');
        } else {
            menu.classList.add('d-none');
        }
    }

    // Optional: hide when clicking outside
    document.addEventListener('click', function (event) {
        const menu = document.getElementById('sidebarMenu');
        const button = document.querySelector('.vertical-menu-btn');
        if (!menu.contains(event.target) && !button.contains(event.target)) {
            menu.classList.add('d-none');
        }
    });
</script>

</header>
