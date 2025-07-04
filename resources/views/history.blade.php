@extends('layouts_main.master')

@section('content')

    <div class="bg-f6 about-tab-link" >
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ localized_route('about') }}" class="ab-tb-link {{ Request::is('about') ? 'ab-tb-link-active' : '' }}">
                關於鴻盛
            </a>
            <a href="{{ localized_route('history') }}" class="ab-tb-link {{ Request::is('history') ? 'ab-tb-link-active' : '' }}">
                發展歷程
            </a>
        </div>
    </div>

    <div class="py-5 bg-history">
        <div class="container my-4">
            <div class="row justify-content-center align-items-center bg-about-content py-4">
                <div class="col-12 mb-3 mt-3">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>發展歷程</h3>
                        <div class="hp-sc-title-line mx-auto"></div>
                        <p>HISTORY</p>
                    </div>
                </div>

                <div class="col-lg-8">
                    <p class="text-18 fw-normal text-center my-3 wow fadeInUp" data-wow-delay="0.1s">
                        鴻盛建設機械自1980年成立，一路引進世界知名的品牌，嚴選最優質的外匯機具<br>
                        為的就是提供給客戶品質優良、可靠又性能卓越的產品
                    </p>

                </div>

                <div class="col-lg-10 history-content">
                    <div class="row justify-content-end m-0 p-0">
                        <div class="col-lg-2 col-auto position-relative justify-content-center history-timeline">
                            <div class="history-year bg-main text-center mx-auto d-flex justify-content-center align-items-center">
                                <span class="text-white">1980</span>
                            </div>

                        </div>
                        <div class="col-lg-5 col text-center d-flex justify-content-start">
                            <div class="w-fit mb-4 mt-2 text-start">
                                <h5 class="text-main fw-normal text-start">成立鴻生鐵工廠</h5>
                                <img src="{{ asset('assets/images/01/his_photo1980.jpg') }}" class="img-fluid" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-start m-0 p-0">
                        <div class="col-lg-5 col text-center d-flex justify-content-lg-end order-2 order-lg-1">
                            <div class="w-fit mb-4 mt-2 text-end">
                                <h5 class="text-sub fw-normal text-lg-end text-start">改組鴻盛建設機械</h5>
                                <img src="{{ asset('assets/images/01/his_photo2006.jpg') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2 col-auto position-relative history-timeline justify-content-center order-1 order-lg-2">
                            <div class="history-year bg-sub text-center mx-auto d-flex justify-content-center align-items-center">
                                <span class="text-white">2006</span>
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-end m-0 p-0">
                        <div class="col-lg-2 col-auto position-relative justify-content-center history-timeline">
                            <div class="history-year bg-main text-center mx-auto d-flex justify-content-center align-items-center">
                                <span class="text-white">2013</span>
                            </div>

                        </div>
                        <div class="col-lg-5 col text-center d-flex justify-content-start">
                            <div class="w-fit mb-4 mt-2 text-start">
                                <h5 class="text-main fw-normal text-start">英國【JCB】經銷商</h5>
                                <img src="{{ asset('assets/images/01/his_photo2013.jpg') }}" class="img-fluid" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-start m-0 p-0">
                        <div class="col-lg-5 col text-center d-flex justify-content-lg-end order-2 order-lg-1">
                            <div class="w-fit mb-4 mt-2 text-end">
                                <h5 class="text-sub fw-normal text-lg-end text-start">韓國【DAEHAN】總代理</h5>
                                <img src="{{ asset('assets/images/01/his_photo2014.jpg') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2 col-auto position-relative history-timeline justify-content-center order-1 order-lg-2">
                            <div class="history-year bg-sub text-center mx-auto d-flex justify-content-center align-items-center">
                                <span class="text-white">2014</span>
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-end m-0 p-0">
                        <div class="col-lg-2 col-auto position-relative justify-content-center history-timeline">
                            <div class="history-year bg-main text-center mx-auto d-flex justify-content-center align-items-center">
                                <span class="text-white">2016</span>
                            </div>

                        </div>
                        <div class="col-lg-5 col text-center d-flex justify-content-start">
                            <div class="w-fit mb-4 mt-2 text-start">
                                <h5 class="text-main fw-normal text-start">日本【HITACHI】經銷商</h5>
                                <h5 class="text-main fw-normal text-start">韓國【EVERDIGM】總代理</h5>
                                <img src="{{ asset('assets/images/01/his_photo2016_1.jpg') }}" class="img-fluid mb-2" alt="">
                                <img src="{{ asset('assets/images/01/his_photo2016_2.jpg') }}" class="img-fluid" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-start m-0 p-0">
                        <div class="col-lg-5 col text-center d-flex justify-content-lg-end order-2 order-lg-1">
                            <div class="w-fit mb-4 mt-2 text-end">
                                <h5 class="text-sub fw-normal text-lg-end text-start">芬蘭【AVANT】經銷商</h5>
                                <img src="{{ asset('assets/images/01/his_photo2018.jpg') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2 col-auto position-relative history-timeline justify-content-center order-1 order-lg-2">
                            <div class="history-year bg-sub text-center mx-auto d-flex justify-content-center align-items-center">
                                <span class="text-white">2018</span>
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-end m-0 p-0">
                        <div class="col-lg-2 col-auto position-relative justify-content-center history-timeline">
                            <div class="history-year bg-main text-center mx-auto d-flex justify-content-center align-items-center">
                                <span class="text-white">2019</span>
                            </div>

                        </div>
                        <div class="col-lg-5 col text-center d-flex justify-content-start">
                            <div class="w-fit mb-4 mt-2 text-start">
                                <h5 class="text-main fw-normal text-start">芬蘭【DYNASET】總代理</h5>
                                <img src="{{ asset('assets/images/01/his_photo2019.jpg') }}" class="img-fluid" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-start m-0 p-0">
                        <div class="col-lg-5 col text-center d-flex justify-content-lg-end order-2 order-lg-1">
                            <div class="w-fit mb-4 mt-2 text-end">
                                <h5 class="text-sub fw-normal text-lg-end text-start">台灣建設機械有限公司設立桃園</h5>
                                <h5 class="text-sub fw-normal text-lg-end text-start">義大利【SIMEX】總代理</h5>
                                <h5 class="text-sub fw-normal text-lg-end text-start">義大利【GF. Gordini】總代理</h5>
                                <img src="{{ asset('assets/images/01/his_photo2020_1.jpg') }}" class="img-fluid mb-2" alt="">
                                <img src="{{ asset('assets/images/01/his_photo2020_2.jpg') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2 col-auto position-relative history-timeline justify-content-center order-1 order-lg-2">
                            <div class="history-year bg-sub text-center mx-auto d-flex justify-content-center align-items-center">
                                <span class="text-white">2020</span>
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-end m-0 p-0">
                        <div class="col-lg-2 col-auto position-relative justify-content-center history-timeline">
                            <div class="history-year bg-main text-center mx-auto d-flex justify-content-center align-items-center">
                                <span class="text-white">2022</span>
                            </div>

                        </div>
                        <div class="col-lg-5 col text-center d-flex justify-content-start">
                            <div class="w-fit mb-4 mt-2 text-start">
                                <h5 class="text-main fw-normal text-start">義大利【CANGINI】總代理</h5>
                                <img src="{{ asset('assets/images/01/his_photo2022.jpg') }}" class="img-fluid" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-start m-0 p-0">
                        <div class="col-lg-5 col text-center d-flex justify-content-lg-end order-2 order-lg-1">
                            <div class="w-fit mb-4 mt-2 text-end">
                                <h5 class="text-sub fw-normal text-lg-end text-start">義大利【MAGNI】總代理</h5>
                                <img src="{{ asset('assets/images/01/his_photo2023.jpg') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-lg-2 col-auto position-relative history-timeline justify-content-center order-1 order-lg-2">
                            <div class="history-year bg-sub text-center mx-auto d-flex justify-content-center align-items-center">
                                <span class="text-white">2023</span>
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-end m-0 p-0">
                        <div class="col-lg-2 col-auto position-relative justify-content-center history-timeline2">
                            <div class="history-year bg-main text-center mx-auto d-flex justify-content-center align-items-center">
                                <span class="text-white">至今</span>
                            </div>

                        </div>
                        <div class="col-lg-5 col text-center">
                            {{-- <div class="w-fit mb-4 mt-2 text-start">
                                <h5 class="text-main fw-normal text-start"></h5>
                                <img src="" class="img-fluid" alt="">
                            </div> --}}

                        </div>
                    </div>


                </div>
            </div>
        </div>



    </div>


@endsection
