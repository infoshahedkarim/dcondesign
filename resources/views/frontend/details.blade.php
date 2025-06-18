@extends('layouts.frontend')
@section('title')
Home |
@endsection
@section('page-title')
Home |
@endsection

@section('pageCSS')
<link rel="stylesheet" href="{{ asset('assets/css/details.css') }}">
@endsection

@section('content')


<div class="container">
    <div class="left-panel">
        <div style="flex-grow: .95;"></div>
        <!-- Bottom-aligned tables -->
        <div class="bottom-info">
            <table class="info-table1">
                <tr>
                    <td class="value">
                        <div class="">
                            <h2 style="padding-left: 160px;">ROOPKOTHA</h2>

                            <div class="dohs-box-wrapper">
                                <div class="dohs-box"></div>
                                <h4 class="dohs-text">DOHS, MOHAKHALI, DHAKA.</h4>
                            </div>
                        </div>


                    </td>
                </tr>
            </table>

            <table class="info-table">
                <tr>
                    <td class="label">TYPE</td>
                    <td class="value">Residential</td>
                </tr>
                <tr>
                    <td class="label">CLIENT</td>
                    <td class="value">Amin Mohammad Foundation Ltd.</td>
                </tr>
                <tr>
                    <td class="label">AREA</td>
                    <td class="value">12 Katha</td>
                </tr>
                <tr>
                    <td class="label">FACE</td>
                    <td class="value">North</td>
                </tr>
                <tr>
                    <td class="label">HEIGHT</td>
                    <td class="value">Semi-basement, G Floor,<br>Mezzanine Floor And 12 Floor</td>
                </tr>
                <tr>
                    <td class="label label1">ABOUT THE PROJECT</td>
                    <td class="value value1">It’s a typical apartment complex having 2 units/floor 2200sft each in size.
                        There is a community space in ground floor of the project.</td>
                </tr>
                <tr>
                    <td class="label">DESIGN PERIOD</td>
                    <td class="value">2017</td>
                </tr>
                <tr>
                    <td class="label">STATUS</td>
                    <td class="value">On-going</td>
                </tr>
            </table>

            <div class="swiper-pagination pagination-bottom"></div>
        </div>
        <!-- After info-table -->
    </div>
    <!-- Right Panel: Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{asset('assets/img/1 (22).jpg')}}" loading="lazy" alt="Roopkotha Day View"></div>
            <div class="swiper-slide"><img src="{{asset('assets/img/1 (13).jpg')}}" loading="lazy" alt="Roopkotha Night View"></div>
            <div class="swiper-slide"><img src="{{asset('assets/img/1 (17).jpg')}}" loading="lazy" alt="Roopkotha Entrance"></div>
            <div class="swiper-slide"><img src="{{asset('assets/img/1 (19).jpg')}}" loading="lazy" alt="Roopkotha Perspective"></div>
        </div>

    </div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<script>
    var swiper = new Swiper(".mySwiper", {
        direction: window.innerWidth <= 768 ? "horizontal" : "vertical",
        slidesPerView: 1.3,
        spaceBetween: 0,
        loop: true,
        mousewheel: window.innerWidth > 768,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false
        },
        speed: 1000,
        pagination: {
            el: ".pagination-bottom",
            clickable: true
        }
    });

    window.addEventListener('DOMContentLoaded', () => {
        if (window.innerWidth <= 768) {
            const pagination = document.querySelector('.swiper-pagination');
            const infoTable = document.querySelector('.info-table1');
            if (pagination && infoTable && infoTable.parentNode) {
                infoTable.parentNode.insertBefore(pagination, infoTable);
            }
        }
    });
</script>

@endsection