@extends('layouts_main.master')

@section('content')
    <div class="py-5 bg-f6">
        <div class="container mb-4">
            <div class="row g-4 ">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{__('machinery')}}</h3>
                        @if (App::getLocale() == 'zh_TW')
                        <div class="hp-sc-title-line mx-auto"></div>
                        <p>CONSTRUCTION</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="container mb-4 px-lg-auto px-3">
                <div class="row g-lg-4 g-3">
                    <div class="col-12">
                        <a href="{{ localized_route('catetype') }}">
                            <div class="d-flex align-items-center wow fadeInUp" data-wow-delay="0.1s">
                                <img src="{{ asset('assets/images/03/icon_back.png') }}" class="img-fluid me-1"
                                    alt="">
                                <p class="text-main mb-0">{{__('button_back')}}</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 my-3">
                        <h5 class="text-18 fw-normal text-center bg-white py-2 wow fadeInUp" data-wow-delay="0.1s">
                            {{__('select_service')}}
                        </h5>
                    </div>

                    <div class="col-lg-6">
                        <a href="{{ localized_route('construction.buy') }}">
                            <div class="pro-buy construction wow fadeInUp" data-wow-delay="0.1s">
                                <img src="{{ asset('assets/images/03/pic_buy.jpg') }}" class="img-fluid" alt="">
                                <div class="construction-mask d-flex justify-content-center align-items-center text-center">
                                    <p>{{__('sale_service')}}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-6">
                        <a href="{{ localized_route('construction.rent') }}">
                            <div class="pro-rent construction wow fadeInUp" data-wow-delay="0.1s">
                                <img src="{{ asset('assets/images/03/pic_rent.jpg') }}" class="img-fluid" alt="">
                                <div class="construction-mask d-flex justify-content-center align-items-center text-center">
                                    <p>{{__('rental_service')}}</p>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>

            </div>

        </div>
    </div>
@endsection
