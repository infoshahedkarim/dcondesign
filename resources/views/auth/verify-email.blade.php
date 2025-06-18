@extends('layouts.master-without-nav')
@section('title')
Register
@endsection
@section('page-title')
Register
@endsection
@section('body')

<body>
    @endsection
    @section('content')
    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                        <div class="mb-4 pb-2">
                            <a href="index" class="d-block auth-logo">
                                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="30"
                                    class="auth-logo-dark me-start">
                                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="30"
                                    class="auth-logo-light me-start">
                            </a>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12 ">
                                    <div class="card">
                                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                                        <div class="card-body">
                                            @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                {{ __('A fresh verification link has been sent to your email address.') }}
                                            </div>
                                            @endif

                                            {{ __('Before proceeding, please check your email for a verification link.') }}
                                            {{ __('If you did not receive the email') }},
                                            <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                                                @csrf
                                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                            </form>
                                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                                @csrf

                                                <div class="mt-4">
                                                    <button class="btn btn-primary w-100" type="submit">Logout</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->


                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center p-4">
                            <p>© 2014 -
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Ridgeben IT Solutions. All Right Reserved.
                            </p>
                        </div>
                    </div>
                </div>
                @endsection
                @section('scripts')
                <script src="{{ URL::asset('build/js/pages/pass-addon.init.js') }}"></script>
                <!-- App js -->
                <script src="{{ URL::asset('build/js/app.js') }}"></script>
                @endsection