@extends('layouts_main.master')

@section('content')

    <div class="bg-f6 about-tab-link" >
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ localized_route('about') }}" class="ab-tb-link {{ Request::is(App::getLocale() . '/about') ? 'ab-tb-link-active' : '' }}">
                {{ __('about_us') }}
            </a>
            <a href="{{ localized_route('history') }}" class="ab-tb-link {{ Request::is(App::getLocale() . '/history') ? 'ab-tb-link-active' : '' }}">
                {{ __('page_wy_history') }}
            </a>
        </div>
    </div>

    <div class="py-5 bg-about">
        <div class="container my-4">
            <div class="row justify-content-center align-items-center bg-about-content py-4">
                <div class="col-12 mb-3 mt-3">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{ __('about_us') }}</h3>
                        @if (App::getLocale() == 'zh_TW')
                        <div class="hp-sc-title-line mx-auto"></div>
                        <p>ABOUT US</p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-8">
                    <p class="text-18 fw-normal my-3 wow fadeInUp" data-wow-delay="0.1s">
                        &emsp;&emsp;{{__('page_wy_about_content_a')}}<br><br>

                        &emsp;&emsp;{{__('page_wy_about_content_aa')}}<br><br>

                        &emsp;&emsp;{{__('page_wy_about_content_aaa')}}
                    </p>

                    <p class="text-center about-slogan py-3 d-flex flex-column align-items-center wow fadeInUp" data-wow-delay="0.1s">
                        <span class="text-sub mb-0">Reliable Solutions</span>
                        @if (App::getLocale() == 'zh_TW')
                        <span class="text-main mb-0">值得信賴的解決方案</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row justify-content-center align-items-center my-5 pt-4">
                <div class="col-lg-auto d-flex flex-row justify-content-center align-items-center">
                    @if (App::getLocale() == 'zh_TW')
                        <img src="{{ asset('assets/images/01/a_years.gif') }}" class="img-fluid pe-lg-5 pe-2 about-slogan-img" alt="">
                        <img src="{{ asset('assets/images/01/a_area.gif') }}" class="img-fluid ps-lg-5 pe-2 about-slogan-img" alt="">
                    @else
                        <img src="{{ asset('assets/images/01/a_years_en.gif') }}" class="img-fluid pe-lg-5 pe-2 about-slogan-img" alt="">
                        <img src="{{ asset('assets/images/01/a_area_en.gif') }}" class="img-fluid ps-lg-5 pe-2 about-slogan-img" alt="">
                    @endif
                </div>
            </div>
        </div>


    </div>

    <div class="pt-2 pb-5 bg-f6">
        <div class="about-sc-line"></div>
        <div class="container">
            <div class="row g-3">
                <div class="col-12 text-center mb-4">
                    <h4 class="text-18">{{__('page_wy_about_content_case')}}</h4>
                </div>

                <div class="col-lg-4">
                    <img src="{{ asset('assets/images/01/case01.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('assets/images/01/case02.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('assets/images/01/case03.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="pt-3">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center mb-4">
                    <h4 class="text-18">{{__('page_wy_about_content_service')}}</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-ab-service">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 py-lg-5 py-4 my-3 text-center">
                    @if (App::getLocale() == 'zh_TW')
                        <img src="{{ asset('assets/images/01/a_ser_word.gif') }}" class="img-fluid w-50" alt="">
                    @else
                        <img src="{{ asset('assets/images/01/a_ser_word_en.gif') }}" class="img-fluid w-50" alt="">
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-f6">
        <div class="container">
            <div class="row justify-content-center align-content-stretch mb-4" style="min-height: 100%;">
                <div class="col-lg-8 mb-lg-0 mb-3 order-lg-1 order-2">
                    <div class="ab-ser-box d-flex flex-lg-row flex-column justify-content-center align-items-center h-100 px-lg-5 px-3 py-4">
                        <div class="icon text-center me-lg-3 mb-lg-0 mb-3">
                            <img src="{{ asset('assets/images/01/a_ser_icon01.jpg') }}" class="img-fluid mb-22" alt="">
                            <h5 class="text-main">{{__('page_wy_about_content_service_a')}}</h5>
                        </div>
                        <div class="ab-ser-content">
                            <p class="text-18 fw-normal">
                                {{__('page_wy_about_content_service_aa')}}<br>
                                {{__('page_wy_about_content_service_aaa')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-2 order-1 mb-lg-0 mb-3">
                    <img src="{{ asset('assets/images/01/a_ser_pic01.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>

            <div class="row justify-content-center align-content-stretch mb-4" style="min-height: 100%;">
                <div class="col-lg-4 mb-lg-0 mb-3">
                    <img src="{{ asset('assets/images/01/a_ser_pic02.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 mb-lg-0 mb-3">
                    <div class="ab-ser-box d-flex flex-lg-row flex-column justify-content-center align-items-center h-100 px-lg-5 px-3 py-4">
                        <div class="icon text-center me-lg-3 mb-lg-0 mb-3">
                            <img src="{{ asset('assets/images/01/a_ser_icon02.jpg') }}" class="img-fluid mb-22" alt="">
                            <h5 class="text-main">{{__('page_wy_about_content_service_b')}}</h5>
                        </div>
                        <div class="ab-ser-content">
                            <p class="text-18 fw-normal">
                                {{__('page_wy_about_content_service_bb')}}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center align-content-stretch mb-4" style="min-height: 100%;">
                <div class="col-lg-8 mb-lg-0 mb-3 order-lg-1 order-2">
                    <div class="ab-ser-box d-flex flex-lg-row flex-column justify-content-center align-items-center h-100 px-lg-5 px-3 py-4">
                        <div class="icon text-center me-lg-3 mb-lg-0 mb-3">
                            <img src="{{ asset('assets/images/01/a_ser_icon03.jpg') }}" class="img-fluid mb-22" alt="">
                            <h5 class="text-main">{{__('page_wy_about_content_service_c')}}</h5>
                        </div>
                        <div class="ab-ser-content">
                            <p class="text-18 fw-normal">
                                {{__('page_wy_about_content_service_cc')}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-2 order-1 mb-lg-0 mb-3">
                    <img src="{{ asset('assets/images/01/a_ser_pic03.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>

            <div class="row justify-content-center align-content-stretch mb-4" style="min-height: 100%;">
                <div class="col-lg-4 mb-lg-0 mb-3">
                    <img src="{{ asset('assets/images/01/a_ser_pic04.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 mb-lg-0 mb-3">
                    <div class="ab-ser-box d-flex flex-lg-row flex-column justify-content-center align-items-center h-100 px-lg-5 px-3 py-4">
                        <div class="icon text-center me-lg-3 mb-lg-0 mb-3">
                            <img src="{{ asset('assets/images/01/a_ser_icon04.jpg') }}" class="img-fluid mb-22" alt="">
                            <h5 class="text-main">{{__('page_wy_about_content_service_d')}}</h5>
                        </div>
                        <div class="ab-ser-content">
                            <p class="text-18 fw-normal">
                                {{__('page_wy_about_content_service_dd')}}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


@endsection
