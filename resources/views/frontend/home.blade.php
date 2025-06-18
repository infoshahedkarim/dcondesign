@extends('layouts.frontend')
@section('title')
Home |
@endsection
@section('page-title')
Home |
@endsection

@section('pageCSS')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endsection

@section('content')



<div class="video-container">
    <video id="video0" class="active" muted playsinline>
        <source src="{{asset('assets/clips/1.mp4')}}" type="video/mp4" />
    </video>
    <video id="video1" muted playsinline>
        <source src="{{asset('assets/clips/2.mp4')}}" type="video/mp4" />

    </video>
    <video id="video2" muted playsinline>
        <source src="{{asset('assets/clips/3.mp4')}}" type="video/mp4" />
    </video>
    <video id="video3" muted playsinline>
        <source src="{{asset('assets/clips/4.mp4')}}" type="video/mp4" />
    </video>
    <video id="video4" muted playsinline>
        <source src="{{asset('assets/clips/5.mp4')}}" type="video/mp4" />
    </video>
    <video id="video5" muted playsinline>
        <source src="{{asset('assets/clips/6.mp4')}}" type="video/mp4" />
    </video>
    <video id="video6" muted playsinline>
        <source src="{{asset('assets/clips/7.mp4')}}" type="video/mp4" />
    </video>
    <video id="video7" muted playsinline>
        <source src="{{asset('assets/clips/8.mp4')}}" type="video/mp4" />
    </video>
    <video id="video8" muted playsinline>
        <source src="{{asset('assets/clips/9.mp4')}}" type="video/mp4" />
    </video>
    <video id="video9" muted playsinline>
        <source src="{{asset('assets/clips/10.mp4')}}" type="video/mp4" />
    </video>
    <video id="video11" muted playsinline>
        <source src="{{asset('assets/clips/12.mp4')}}" type="video/mp4" />
    </video>
    <video id="video12" muted playsinline>
        <source src="{{asset('assets/clips/13.mp4')}}" type="video/mp4" />
    </video>
    <video id="video13" muted playsinline>
        <source src="{{asset('assets/clips/14.mp4')}}" type="video/mp4" />
    </video>
    <video id="video14" muted playsinline>
        <source src="{{asset('assets/clips/15.mp4')}}" type="video/mp4" />
    </video>
</div>

    <div class="footer-nav">
        <div class="nav-item">
            <div class="nav-dot"></div><span class="nav-label">WE</span>
        </div>
        <div class="nav-item">
            <a href="{{route('projects')}}">
                <div class="nav-dot"></div>
            </a><span class="nav-label">PROJECTS</span>
        </div>
        <div class="nav-item">
            <div class="nav-dot"></div><span class="nav-label">AWARDS</span>
        </div>
        <div class="nav-item">
            <div class="nav-dot"></div><span class="nav-label">ASSOCIATES</span>
        </div>
        <div class="nav-item">
            <div class="nav-dot"></div><span class="nav-label">CLIENTS</span>
        </div>
        <div class="nav-item">
            <div class="nav-dot"></div><span class="nav-label">UPDATES</span>
        </div>
    </div>



<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    const dots = document.querySelectorAll('.nav-dot');

    function updateActiveDot(index) {
        dots.forEach(dot => dot.classList.remove('active'));
        dots[index].classList.add('active');
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            swiper.slideToLoop(index);
            updateActiveDot(index);
        });
    });

    swiper.on('slideChange', () => {
        const realIndex = swiper.realIndex;
        updateActiveDot(realIndex);
    });

    updateActiveDot(0); // Set initial active dot
</script>
<script>
    const videos = [
        document.getElementById('video0'),
        document.getElementById('video1'),
        document.getElementById('video2'),
        document.getElementById('video3'),
        document.getElementById('video4'),
        document.getElementById('video5'),
        document.getElementById('video6'),
        document.getElementById('video7'),
        document.getElementById('video8'),
        document.getElementById('video9'),
        document.getElementById('video11'),
        document.getElementById('video12'),
        document.getElementById('video13'),
        document.getElementById('video14'),
    ];

    let current = 0;

    function startCrossfadeTransition() {
        const currentVideo = videos[current];
        const next = (current + 1) % videos.length;
        const nextVideo = videos[next];

        // Prepare next video
        nextVideo.currentTime = 0;
        nextVideo.play();
        nextVideo.classList.add('active');

        // Fade out current video after short delay
        setTimeout(() => {
            currentVideo.classList.remove('active');
            currentVideo.pause();
            current = next;

            // Start checking next video again
            watchVideoProgress(nextVideo);
        }, 800); // sync with CSS transition
    }

    function watchVideoProgress(video) {
        const duration = video.duration;
        const bufferTime = 1; // start transition before end

        const check = () => {
            if (video.currentTime >= duration - bufferTime) {
                startCrossfadeTransition();
            } else {
                requestAnimationFrame(check);
            }
        };

        requestAnimationFrame(check);
    }

    // Start first video and monitoring
    window.addEventListener('load', () => {
        const firstVideo = videos[current];
        firstVideo.play();
        watchVideoProgress(firstVideo);
    });
</script>


@endsection