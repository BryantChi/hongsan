@extends('layouts_main.master')

@section('content')
    <div class="py-5 bg-f6">
        <div class="container mb-4">
            <div class="row g-4 ">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{__('machinery')}}</h3>
                        <div class="hp-sc-title-line mx-auto"></div>
                        <p>CONSTRUCTION MACHINERY</p>
                    </div>
                </div>
            </div>

            <div class="container mb-4 px-lg-auto px-3">
                <div class="row g-lg-4 g-3">
                    <div class="col-12">
                        <a href="{{ localized_route('construction.rent') }}">
                            <div class="d-flex align-items-center wow fadeInUp" data-wow-delay="0.1s">
                                <img src="{{ asset('assets/images/03/icon_back.png') }}" class="img-fluid me-1"
                                    alt="">
                                <p class="text-main mb-0">{{__('button_back')}}</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 my-3">
                        <h5 class="text-18 fw-normal text-center bg-white py-2 wow fadeInUp" data-wow-delay="0.1s">
                            RENT BRAND</h5>
                    </div>


                </div>

                <div class="row">

                    <div class="col-lg-2 mb-3">
                        <div class="category mb-3">
                            <div class="category-header d-flex justify-content-center align-items-center">
                                <h6 class="text-white mb-0">{{__('category')}}</h6>
                            </div>
                            <div class="category-body">
                                <ul class="list-unstyled category-list">
                                    <li class="wow fadeInUp" data-wow-delay="0.1s">
                                        <a href="{{ localized_route('construction.rent') }}" class="text-18">類別1</a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.2s">
                                        <a href="{{ localized_route('construction.rent') }}" class="text-18">類別2</a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">
                                        <a href="{{ localized_route('construction.rent') }}" class="text-18">類別3</a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.4s">
                                        <a href="{{ localized_route('construction.rent') }}" class="text-18">類別4</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="brand mb-3">
                            <div class="brand-header d-flex justify-content-center align-items-center">
                                <h6 class="text-white mb-0">{{__('brand')}}</h6>
                            </div>
                            <div class="brand-body">
                                <ul class="list-unstyled brand-list">
                                    <li class="wow fadeInUp" data-wow-delay="0.1s">
                                        <a href="{{ localized_route('construction.rent') }}" class="text-18">品牌1</a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.2s">
                                        <a href="{{ localized_route('construction.rent') }}" class="text-18">品牌2</a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">
                                        <a href="{{ localized_route('construction.rent') }}" class="text-18">品牌3</a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.4s">
                                        <a href="{{ localized_route('construction.rent') }}" class="text-18">其他品牌</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-10">
                        <div class="row g-3">

                            @for ($i = 0; $i < 16; $i++)
                                <div class="col-lg-3 col-6">
                                    <div class="hot-item-box animate-hover-15">
                                        <img src="{{asset('assets/images/00-hp/hot_pic.jpg')}}" class="img-fluid" alt="">
                                        <div class="hot-item-content bg-main text-center py-lg-3 py-2 px-3">
                                            <h5 class="text-white">產品</h5>
                                        </div>
                                    </div>
                                </div>
                            @endfor


                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>
@endsection
