@extends('layouts.frontend')
@section('title')
Home |
@endsection
@section('page-title')
Home |
@endsection

@section('pageCSS')
    <link rel="stylesheet" href="{{ asset('assets/css/projects.css') }}">
@endsection

@section('content')

    <header>
    </header>

 <div class="grid-wrapper">
    <div class="grid-container">

        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (1).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (2).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (3).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (4).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (5).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (6).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (7).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (8).jpg') }}');"></div>

        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (31).jpg') }}');"></div>
        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (24).jpg') }}');"></div>

        <div class="menu" data-url="{{route('architecture')}}" style="cursor: pointer;">ARCHITECTURE</div>
        <div class="menu">INTERIOR</div>
        <div class="menu">DIGITAL ART</div>
        <div class="menu">LAND-SCAPING</div>

        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (44).jpg') }}');"></div>
        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (33).jpg') }}');"></div>

        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (1).jpg') }}');"></div>
        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (2).jpg') }}');"></div>
        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (3).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (4).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (5).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (6).jpg') }}');"></div>
        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (7).jpg') }}');"></div>
        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (8).jpg') }}');"></div>
        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (9).jpg') }}');"></div>

        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (1).jpg') }}');"></div>
        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (2).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (3).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (4).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (5).jpg') }}');"></div>
        <div class="img-half" style="background-image: url('{{ asset('assets/img/1 (6).jpg') }}');"></div>
        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (7).jpg') }}');"></div>
        <div class="img-half hide-mobile" style="background-image: url('{{ asset('assets/img/1 (8).jpg') }}');"></div>

    </div>
</div>


    <div class="footer-strip">
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
    </div>


    <script>
        const divs = document.querySelectorAll('.menu, .logo');

        divs.forEach(div => {
            const url = div.dataset.url;

            div.addEventListener('click', () => {
                if (url) {
                    window.location.href = url;
                }
            });
        });
    </script>


    <script>
        const imagePaths = [
            '{{asset('assets/img/1 (1).jpg')}}',
            '{{asset('assets/img/1 (2).jpg')}}',
            '{{asset('assets/img/1 (3).jpg')}}',
            '{{asset('assets/img/1 (4).jpg')}}',
            '{{asset('assets/img/1 (44).jpg')}}',
            '{{asset('assets/img/1 (10).jpg')}}',
            '{{asset('assets/img/1 (11).jpg')}}',
            '{{asset('assets/img/1 (7).jpg')}}',
            '{{asset('assets/img/1 (9).jpg')}}',
            '{{asset('assets/img/1 (34).jpg')}}',
            '{{asset('assets/img/1 (19).jpg')}}',
            '{{asset('assets/img/1 (55).jpg')}}',
            '{{asset('assets/img/1 (60).jpg')}}',
            '{{asset('assets/img/1 (34).jpg')}}',
        ];

        const imgDivs = document.querySelectorAll('.img-half');

        function getRandomImage() {
            return imagePaths[Math.floor(Math.random() * imagePaths.length)];
        }

        setInterval(() => {
            imgDivs.forEach(div => {
                const newImage = getRandomImage();

                // Create a temporary layer for fade effect
                const tempLayer = document.createElement('div');
                tempLayer.style.backgroundImage = `url('${newImage}')`;
                tempLayer.style.position = 'absolute';
                tempLayer.style.top = 0;
                tempLayer.style.left = 0;
                tempLayer.style.right = 0;
                tempLayer.style.bottom = 0;
                tempLayer.style.opacity = 0;
                tempLayer.style.transition = 'opacity 0.8s ease-in-out';
                tempLayer.style.backgroundSize = 'cover';
                tempLayer.style.backgroundPosition = 'center';
                tempLayer.style.zIndex = 2;

                div.appendChild(tempLayer);

                // Fade in new layer
                requestAnimationFrame(() => {
                    tempLayer.style.opacity = 1;
                });

                // After fade, set new image and remove temp
                setTimeout(() => {
                    div.style.backgroundImage = `url('${newImage}')`;
                    div.removeChild(tempLayer);
                }, 800);
            });
        }, 2000);


        
    </script>

    
@endsection