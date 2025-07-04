@extends('layouts_main.master')

@section('content')

    <div class="py-5 bg-f6">
        <div class="container mb-4">
            <div class="row g-4 ">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>建設機械</h3>
                        <div class="hp-sc-title-line mx-auto"></div>
                        <p>CONSTRUCTION MACHINERY</p>
                    </div>
                </div>
            </div>

            <div class="container mb-4 px-lg-auto px-3">
                <div class="row g-lg-4 g-3">
                    <div class="col-12">
                        <a href="{{ localized_route('construction')}}">
                            <div class="d-flex align-items-center wow fadeInUp" data-wow-delay="0.1s">
                                <img src="{{ asset('assets/images/03/icon_back.png') }}" class="img-fluid me-1" alt="">
                                <p class="text-main mb-0">返回上一頁</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 my-3">
                        <h5 class="text-18 fw-normal text-center bg-white py-2 wow fadeInUp" data-wow-delay="0.1s">請選擇您欲租賃的產品</h5>
                    </div>

                    <div class="col-lg-4">
                        <a href="{{ localized_route('construction.rent.list') }}">
                            <div class="construction wow fadeInUp" data-wow-delay="0.1s">
                                <img src="{{ asset('assets/images/03/rent_1.jpg') }}" class="img-fluid" alt="">
                                <div class="construction-mask d-flex justify-content-center align-items-center text-center">
                                    <p>高空作業車</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4">
                        <div class="construction wow fadeInUp" data-wow-delay="0.1s">
                            <img src="{{ asset('assets/images/03/rent_1.jpg') }}" class="img-fluid" alt="">
                            <div class="construction-mask d-flex justify-content-center align-items-center text-center">
                                <p>挖土機</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="construction wow fadeInUp" data-wow-delay="0.1s">
                            <img src="{{ asset('assets/images/03/rent_1.jpg') }}" class="img-fluid" alt="">
                            <div class="construction-mask d-flex justify-content-center align-items-center text-center">
                                <p>鏟裝車</p>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>

@endsection
